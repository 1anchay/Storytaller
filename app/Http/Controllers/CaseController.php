<?php
// app/Http/Controllers/CaseController.php

namespace App\Http\Controllers;

use App\Models\GameCase;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    // Метод для отображения формы добавления кейса (если необходимо)
    public function create()
    {
        return view('cases.create'); // Отобразить форму для создания нового кейса
    }

    // Метод для сохранения нового кейса
    public function store(Request $request)
    {
        // Валидация входных данных
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Сохранение изображения в storage и получение пути
        $imagePath = $request->file('image')->store('public/cases');

        // Создание нового кейса в базе данных
        GameCase::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => basename($imagePath), // Сохраняем только имя файла изображения
        ]);

        // Перенаправление на страницу со списком кейсов после успешного сохранения
        return redirect('/cases');
    }
}
