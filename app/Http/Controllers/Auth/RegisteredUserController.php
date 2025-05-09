<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log; // Подключение логирования

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
        'password' => [
            'required',
            'confirmed',
            Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(),
        ],
        'terms' => ['required', 'accepted'],
    ], [
        'terms.required' => 'Вы должны принять условия использования',
    ]);

    try {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(), // Автоматически подтверждаем email
            'is_active' => true,
        ]);

        Auth::login($user);

        activity()
            ->causedBy($user)
            ->log('Новый пользователь зарегистрировался');

        return redirect()->route('dashboard')->with('success', 'Вы успешно зарегистрированы!');
    } catch (\Exception $e) {
        Log::error('Ошибка при регистрации пользователя', ['error' => $e->getMessage()]);
        return back()->with('error', 'Произошла ошибка при регистрации. Попробуйте еще раз.');
    }
}

}
