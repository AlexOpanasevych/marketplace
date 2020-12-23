<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $messages = ['name.required' => 'Введіть, будь ласка ім\'я',
            'email.required' => 'Введіть , будь ласка email',
            'email.email' => 'email введено неправильно',
            'password.required' => 'Введіть , будь ласка пароль',
            'password-repeat.required' => 'Введіть , будь ласка підтвердження паролю',
            'password-repeat.same' => 'Пароль та його підтвердження не співпадають',
        ];
        $result = null;
        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'password-repeat' => 'required|same:password',
            ], $messages);
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
        if (User::where('email', '=', $request->input('email'))->count() > 0) {
            return back()->withErrors(['user.exists' => 'Користувач з заданою електронною поштою вже існує!']);
        }
        if (User::where('name', '=', $request->input('name'))->count() > 0) {
            return back()->withErrors(['user.exists' => 'Користувач з заданим ім\'ям вже існує!']);
        }
        $user = User::create(request(['name', 'email', 'password']));

        Auth::login($user, true);

        return redirect()->intended('home');
    }
}
