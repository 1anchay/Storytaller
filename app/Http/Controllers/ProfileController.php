<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Отображает форму редактирования профиля.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Обновляет данные профиля пользователя.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Валидация для фото
        ]);

        $user = Auth::user();
        
        // Обновляем имя и email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Если загружено новое фото, обрабатываем его
        if ($request->hasFile('profile_photo')) {
            // Удаляем старое фото, если оно существует
            if ($user->profile_photo_path) {
                Storage::delete($user->profile_photo_path);
            }

            // Сохраняем новое фото
            $path = $request->file('profile_photo')->store('profile_photos', 'public');

            // Обновляем путь к фото пользователя
            $user->profile_photo_path = $path;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profile updated!');
    }
}
