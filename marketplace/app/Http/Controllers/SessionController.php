<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    public function store(Request $request)
    {
        $result = $request->input('usernameEmail');
        if (filter_var($result, FILTER_VALIDATE_EMAIL)){
            if (Auth::attempt(['email' => $result, 'password' => $request->input('password')], $request->has('remember')) == false) {
                return back()->withErrors([
                    'message' => 'Email чи пароль неправильні, спробуйте знову'
                ]);
            }
        }
        else {
            if (Auth::attempt(['name' => $result, 'password' => $request->input('password')]) == false) {
                return back()->withErrors([
                    'message' => 'Ім\'я чи пароль неправильні, спробуйте знову'
                ]);
            }
        }



        return redirect()->intended();
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function admin_credential_rules(array $data)
    {
        $messages = [
            'password.required' => 'Будь ласка, введіть пароль',
            'password-repeat.required' => 'Будь ласка, підтвердіть пароль',
            'password-repeat.same' => 'Пароль та його підтвердження не співпадають'
        ];

        return Validator::make($data, [
            'password' => 'required',
            'password-repeat' => 'required|same:password',
        ], $messages);
    }

    public function changePassword(Request $request) {
        if (Auth::check()) {
            $request_data = $request->all();
            $validator = $this->admin_credential_rules($request_data);
            if ($validator->fails()){
                return back()->withErrors($validator->errors());
            }
            else {
                $user_id = Auth::user()->id;
                $obj_user = User::find($user_id);
                $obj_user->password = Hash::make($request_data['password']);
                $obj_user->save();
                return redirect()->intended();
            }
        }
        return redirect()->intended();
    }

    public function resetPassword(){
        return;
    }
}
