<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    public function store(Request $request)
    {
        $result = $request->input('email');
        if (filter_var($result, FILTER_VALIDATE_EMAIL)){
            if (!Auth::attempt(['email' => $result, 'password' => $request->input('password')], $request->has('remember'))) {
                return
                    back()->withErrors([
                    'message' => 'Email чи пароль неправильні, спробуйте знову'
                ]);
            }
        }
//        else {
//            if (Auth::attempt(['name' => $result, 'password' => $request->input('password')]) == false) {
//                return back()->withErrors([
//                    'message' => 'Ім\'я чи пароль неправильні, спробуйте знову'
//                ]);
//            }
//        }



        return redirect()->home();
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
                return redirect()->intended('info');
            }
        }
        return redirect()->intended();
    }

    public function resetPassword(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function changeUserData(Request $request) {

        $messages = [
            'name.required' => 'Будь ласка, введіть ім\'я',
            'lastname.required' => 'Будь ласка, введіть прізвище',
            'patronymic.required' => 'Будь ласка, введіть по-батькові'
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'patronymic' => 'required',
        ], $messages);
        if(!$validator->fails()) {

            $firstname = $request->name;
            $lastname = $request->lastname;
            $patronymic = $request->patronymic;
            if(Auth::check()) {
                $user_id = Auth::user()->id;
                $obj_user = User::find($user_id);
                $obj_user->firstname = $firstname;
                $obj_user->lastname = $lastname;
                $obj_user->patronymic = $patronymic;
                $obj_user->save();
                return back();
            }
            return back()->withErrors('You are not login, please login on register');
        }
        return back()->withErrors($validator->errors());


    }

    public function changeContacts(Request $request) {

        $messages = [
            'email.email' => 'Будь ласка, введіть email правильно',
            'email.required' => 'Будь ласка, введіть email',
            'phone.required' => 'Будь ласка, введіть номер телефону',
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'phone' => 'required',
        ], $messages);

        if(!$validator->fails()) {

            $email = $request->email;
            $phone = $request->phone;

            if(Auth::check()) {
                $user_id = Auth::user()->id;
                $obj_user = User::find($user_id);
                $obj_user->email = $email;
                $obj_user->phone = $phone;
                $obj_user->save();
                return back();
            }
            return back()->withErrors('You are not login, please login on register');
        }
        return back()->withErrors($validator->errors());
    }
}
