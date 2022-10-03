<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $user = request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => [
                'required', 'min:7', 'max:255',
                Password::min(8)->mixedCase()
            ],

        ]);

        User::create($user);

        return redirect('/');
    }
}
