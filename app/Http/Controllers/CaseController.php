<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Skin;
use App\Models\UserSkin;

class CaseController extends Controller
{
    // Проверка баланса
    public function checkBalance(Request $request)
    {
        $user = $request->user();
        $requiredAmount = $request->input('amount');
        
        if ($user->balance < $requiredAmount) {
            return response()->json([
                'success' => false,
                'message' => 'Недостаточно средств на балансе'
            ], 400);
        }
        
        return response()->json(['success' => true]);
    }

    // Покупка кейса (списание средств)
    public function purchaseCase(Request $request)
    {
        $user = $request->user();
        $casePrice = $request->input('price');
        
        // Проверяем баланс
        if ($user->balance < $casePrice) {
            return response()->json([
                'success' => false,
                'message' => 'Недостаточно средств для покупки кейса'
            ], 400);
        }
        
        // Списание средств
        $user->balance -= $casePrice;
        $user->save();
        
        return response()->json(['success' => true]);
    }

    // Открытие кейса (получение предмета)
    public function openCase(Request $request)
    {
        $user = $request->user();
        
        // Логика выпадения предмета (можно сделать сложнее)
        $skins = Skin::all();
        $droppedSkin = $skins->random();
        
        // Добавляем предмет пользователю
        UserSkin::create([
            'user_id' => $user->id,
            'skin_id' => $droppedSkin->id,
            'status' => 'inventory'
        ]);
        
        return response()->json([
            'success' => true,
            'skin' => $droppedSkin
        ]);
    }
}