<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function form()
    {
        return view('components.form.login');
    }

    public function login()
    {
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'username' => 'Credenciais inválidos',
            ]);
        }

        session()->regenerate();

        return redirect(route('dashboard'));
    }

    public function logout()
    {
        auth()->logout();

        return redirect(route('login'));
    }
}
