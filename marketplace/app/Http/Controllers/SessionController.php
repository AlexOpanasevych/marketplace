<?php

namespace App\Http\Controllers;

use App\Address;
use App\Feedback;
use App\Seller;
use App\SellerRequest;
use App\User;
use Illuminate\Auth\Recaller;
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

        $seller = Seller::where('user_id', '=', Auth::user()->id);

        return redirect()->route('info')->with([
            'seller' => $seller,
        ]);
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
            $seller = Seller::where('user_id', '=', Auth::user()->id)->first();
            if ($validator->fails()){
                return back()->withErrors($validator->errors())->with([
                    'seller' => $seller
                ]);
            }
            else {
                $user_id = Auth::user()->id;
                $obj_user = User::find($user_id);
                $obj_user->password = Hash::make($request_data['password']);
                $obj_user->save();
                return back()->with([
                    'seller' => $seller,
                ]);
            }
        }
        return redirect()->intended()->with([
            'seller' => null
        ]);
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
        $seller = Seller::where('user_id', '=', Auth::user()->id)->first();
//        dd($seller);
        if(!$validator->fails()) {

            $firstname = $request->name;
            $lastname = $request->lastname;
            $patronymic = $request->patronymic;
            if(Auth::check()) {
                $user_id = Auth::user()->id;
                $obj_user = User::find($user_id);
                $obj_user->name = $firstname;
                $obj_user->lastname = $lastname;
                $obj_user->patronymic = $patronymic;
                $obj_user->save();
//                dd($obj_user);
                return redirect()->route('info')->with([
                    'seller' => $seller,
                ]);
            }
            return back()->withErrors('You are not login, please login on register')->with([
                'seller' => $seller,
            ]);
        }
        return back()->withErrors($validator->errors())->with([
            'seller' => $seller,
        ]);


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

        $seller = Seller::where('user_id', '=', Auth::user()->id)->first();
        if(!$validator->fails()) {

            $email = $request->email;
            $phone = $request->phone;

            if(Auth::check()) {
                $user_id = Auth::user()->id;
                $obj_user = User::find($user_id);
                $obj_user->email = $email;
                $obj_user->phone = $phone;
                $obj_user->save();
                return back()->with([
                    'seller' => $seller,
                ]);
            }
            return back()->withErrors('You are not login, please login on register')->with([
                'seller' => $seller,
            ]);
        }
        return back()->withErrors($validator->errors())->with([
            'seller' => $seller,
        ]);
    }

    public function changeAddress(Request $request) {
        if(Auth::check()) {

            $record =
                 Address::all()->where('user_id', '=', Auth::user()->id)->first();
            if(!$record) {
                $address = new Address;

                $address->user_id = Auth::user()->id;
                $address->area = $request->region;
                $address->city = $request->city;
                $address->street = $request->street;
                $address->house_number = $request->house;
                $address->post_index = $request->post_index;

                $address->save();
            } else {
                $record->area = $request->region;
                $record->city = $request->city;
                $record->street = $request->street;
                $record->house_number = $request->house;
                $record->post_index = $request->post_index;
                $record->save();
            }
        }
        $seller = Seller::where('user_id', '=', Auth::user()->id)->get();
        return back()->with([
            'seller' => $seller,
        ]);
    }

    public function sendFeedback(Request $request) {
        if(Auth::check()) {
            $text = $request->comment;
            $user_id = Auth::user()->id;

            $feedback = new Feedback;

            $feedback->text = $text;
            $feedback->user_id = $user_id;

            $feedback->save();
        }
        $seller = Seller::where('user_id', '=', Auth::user()->id);
        return back()->with([
            'seller' => $seller,
        ]);
    }

    public function becomeSeller(Request $request)
    {
        if(Auth::check()) {
            $seller = new SellerRequest();
            $seller->company_name = $request->name;
            $seller->user_id = Auth::user()->id;
            $seller->save();
            return back()->with([
                'seller' => $seller
            ]);
        }
        return back()->with([
           'seller' => null,
        ]);
    }
}
