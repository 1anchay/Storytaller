<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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