<?php
// app/Http/Controllers/CaseController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function index()
    {
        // Пример кейсов с изображениями и ценами
        $cases = [
            [
                'type' => 'Steam Key',
                'description' => 'Получите случайный ключ для Steam, включая игры на любую платформу!',
                'price' => 499,
                'image' => 'steam-case.jpg',
            ],
            [
                'type' => 'Minecraft Account',
                'description' => 'Купите Minecraft аккаунт с полным доступом!',
                'price' => 799,
                'image' => 'minecraft-case.jpg',
            ],
            [
                'type' => 'CS:GO Skins',
                'description' => 'Получите уникальные скины для CS:GO!',
                'price' => 1200,
                'image' => 'csgo-case.jpg',
            ],
            [
                'type' => 'Steam Wallet',
                'description' => 'Получите пополнение для вашего Steam кошелька!',
                'price' => 1000,
                'image' => 'steam-wallet-case.jpg',
            ],
        ];

        return view('welcome', compact('cases'));
    }
}
