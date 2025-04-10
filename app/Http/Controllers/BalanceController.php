<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BalanceController extends Controller
{
    /**
     * Показать основную форму пополнения баланса
     */
    public function showForm()
    {
        return view('balance.topup', [
            'user' => Auth::user(),
            'min_amount' => 10,
            'max_amount' => 100000
        ]);
    }

    /**
     * Показать альтернативную форму пополнения (если нужна)
     */
    public function showTopUpForm()
    {
        return $this->showForm(); // Перенаправляем на основную форму
    }

    /**
     * Обработка пополнения баланса (основной метод)
     */
    public function processPayment(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:10|max:100000',
            'payment_method' => 'required|in:sbp,card,crypto,qiwi,yoomoney'
        ]);

        $user = Auth::user();
        
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'],
            'type' => 'deposit',
            'status' => 'pending',
            'balance_before' => $user->balance,
            'balance_after' => $user->balance + $validated['amount']
        ]);

        // Перенаправляем на платежный шлюз
        return redirect()->route('payment.gateway', $transaction->id);
    }

    /**
     * Альтернативный обработчик (если нужен)
     */
    public function processTopUp(Request $request)
    {
        return $this->processPayment($request);
    }

    /**
     * Платежный шлюз (GET версия)
     */
    public function paymentGateway($transactionId)
    {
        $transaction = Transaction::with('user')->findOrFail($transactionId);
        
        if ($transaction->user_id !== Auth::id()) {
            abort(403);
        }

        if ($transaction->status === Transaction::STATUS_PENDING) {
            $this->confirmPayment($transaction);
            $transaction->refresh();
        }

        return view('balance.gateway', [
            'transaction' => $transaction,
            'payment_method_name' => $this->getPaymentMethodName($transaction->payment_method)
        ]);
    }

    /**
     * Подтверждение платежа
     */
    protected function confirmPayment(Transaction $transaction)
    {
        DB::transaction(function () use ($transaction) {
            $user = $transaction->user;
            $user->balance += $transaction->amount;
            $user->save();

            $transaction->update([
                'status' => 'completed',
                'completed_at' => now(),
                'balance_after' => $user->balance
            ]);
        });
    }

    /**
     * Списание баланса
     */
    public function deductBalance(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0.01',
            'description' => 'required|string|max:255',
            'service_id' => 'nullable|integer', // если списание связано с конкретным сервисом
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = Auth::user();
        $amount = $request->amount;

        if ($user->balance < $amount) {
            return response()->json(['error' => 'Недостаточно средств на балансе'], 400);
        }

        try {
            DB::beginTransaction();

            // Создаем транзакцию на списание
            $transaction = Transaction::create([
                'user_id' => $user->id,
                'amount' => $amount,
                'type' => 'withdrawal',
                'status' => 'completed',
                'description' => $request->description,
                'service_id' => $request->service_id,
                'balance_before' => $user->balance,
                'balance_after' => $user->balance - $amount,
                'completed_at' => now()
            ]);

            // Обновляем баланс пользователя
            $user->balance -= $amount;
            $user->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'new_balance' => $user->balance,
                'transaction_id' => $transaction->id
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Ошибка при списании средств: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Проверка достаточности баланса
     */
    public function checkBalance(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01'
        ]);

        $user = Auth::user();
        $hasEnough = $user->balance >= $request->amount;

        return response()->json([
            'has_enough' => $hasEnough,
            'current_balance' => $user->balance,
            'required_amount' => $request->amount
        ]);
    }

    /**
     * Получить историю транзакций
     */
    public function getTransactionHistory(Request $request)
    {
        $transactions = Transaction::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($transactions);
    }

    /**
     * Получить текущий баланс
     */
    public function getCurrentBalance()
    {
        return response()->json([
            'balance' => Auth::user()->balance
        ]);
    }

    /**
     * Получить название платежного метода
     */
    protected function getPaymentMethodName($method)
    {
        $methods = [
            'sbp' => 'СБП',
            'card' => 'Банковская карта', 
            'crypto' => 'Криптовалюта',
            'qiwi' => 'QIWI',
            'yoomoney' => 'ЮMoney'
        ];

        return $methods[$method] ?? $method;
    }
}