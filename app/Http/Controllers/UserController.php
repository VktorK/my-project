<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\NoReturn;

class UserController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Вы успешно вышли из системы!');
    }

    public function create()
    {
        return view('user/createUser');
    }

    public function store(UserStoreRequest $request)
    {
        try {
            $data = $request->validationData();

            $user = User::create($data);


            return redirect()->route('welcome')->with('success', 'Вы успешно зарегистрированы и вошли в систему!');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('danger', $e->getMessage());
        }
    }
}
