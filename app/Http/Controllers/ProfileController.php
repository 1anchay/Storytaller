<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Models\Transaction;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the profile edit form.
     */
    public function edit()
    {
        $user = Auth::user();
        
        return view('profile.edit', [
            'user' => $user,
            'emailVerified' => $user->hasVerifiedEmail(),
            'balance' => $user->balance,
            'transactions' => Transaction::where('user_id', $user->id)
                                      ->orderBy('created_at', 'desc')
                                      ->take(5)
                                      ->get()
        ]);
    }

    /**
     * Update the user's profile.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => ['nullable', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $user->name = $validatedData['name'];
    
        // Убираем логику сброса email_verified_at
        if ($user->email !== $validatedData['email']) {
            $user->email = $validatedData['email'];
        }
    
        // Если пароль не пустой, хешируем новый пароль
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }
    
        // Обрабатываем загрузку нового фото
        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
            
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $user->profile_photo_path = $path;
        }
    
        $user->save();
    
        return redirect()->route('profile.edit')
            ->with('status', 'Профиль успешно обновлен!');
    }
    

    /**
     * Show transaction history.
     */
    public function transactionHistory()
    {
        $transactions = Transaction::where('user_id', Auth::id())
                                ->orderBy('created_at', 'desc')
                                ->paginate(10);

        return view('profile.transactions', ['transactions' => $transactions]);
    }

    /**
     * Get current balance (API).
     */
    public function getBalance(Request $request)
    {
        $user = $request->user();
        
        return response()->json([
            'success' => true,
            'balance' => $user->balance,
            'currency' => '₽',
            'last_updated' => $user->updated_at->toIso8601String()
        ]);
    }
}