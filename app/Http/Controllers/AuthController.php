<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:5',
        ]);

        $isAdmin = $request->input('admin') === 'true'; // Проверяем, является ли пользователь администратором

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'is_admin' => $isAdmin,
        ]);

        session(['user' => $user->toArray()]);

        return redirect('/login')->with('success', 'Регистрация успешна!');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Валидация данных формы входа (добавьте необходимую валидацию)
        // Поиск пользователя по имени
        $user = User::where('name', $request->input('name'))->first();
        // Проверка пароля
        if ($user && Hash::check($request->input('password'), $user->password)) {
            // Аутентификация успешна
            session(['user' => $user->toArray()]);

            if ($user->is_admin) {
                // Если пользователь - администратор
                return redirect('/')->with('success', 'Добро пожаловать!');
            } else {
                // Если пользователь - обычный пользователь
                return redirect('/')->with('success', 'Добро пожаловать!');
            }
        }

        // Неверные учетные данные
        return back()->withErrors(['name' => 'Неверное имя или пароль']);
    }

    public function logout()
    {
        session()->forget('user');

        return redirect('/login');
    }

    public function dashboard()
    {
        // Логика для отображения информации на странице /dashboard
        return view('dashboard');
    }
}
