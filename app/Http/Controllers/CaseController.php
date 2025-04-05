<?php
namespace App\Http\Controllers;

use App\Models\GameCase; // Модель GameCase для работы с базой данных
use Illuminate\Http\Request;

class CaseController extends Controller
{
    // Метод для отображения формы добавления кейса
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

    // Метод для отображения информации о кейсе по ID
    public function view($caseId)
    {
        // Поиск кейса по ID
        $gameCase = GameCase::findOrFail($caseId);

        // Возвращаем вид с информацией о выбранном кейсе
        return view('cases.view', ['gameCase' => $gameCase]);
    }
}
