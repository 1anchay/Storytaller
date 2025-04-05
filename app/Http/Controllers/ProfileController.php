<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Отображает форму редактирования профиля.
     */
    public function edit()
    {
        // Получаем текущего авторизованного пользователя
        $user = Auth::user();

        // Возвращаем представление с данными пользователя
        return view('profile.edit', compact('user'));
    }

    /**
     * Обновляет данные профиля пользователя.
     */
    public function update(Request $request)
    {
        // Валидация входных данных
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Убедитесь, что это изображение
        ]);

        // Получаем текущего пользователя
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
            $user->profile_photo_url = $path;
        }

        // Сохраняем обновленные данные пользователя
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profile updated!');
    }
}
