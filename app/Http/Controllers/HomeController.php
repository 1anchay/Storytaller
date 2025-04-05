<?php
// В файле app/Http/Controllers/HomeController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome'); // Это представление будет возвращено при обращении на главную страницу
    }
}
