@extends('templates.registration_template')

@section('title', "Главная")

@section('page-content')
    <main style="padding: 0">
        <div class=login_block>
            <form method="POST" action="{{route('login')}}" class=auth_form>
                @csrf
                <p style="font-size: 24px">Авторизація</p>
                <hr style="margin: 25px -50px 0 -50px"/>
                <label>Eлектронна пошта</label>
                <input type="email" name="email" required >
                <label>Пароль</label>
                <input type="password" name="password" required >
                <div class=auth_settings>
                    <label style="margin-top: 0;" class="new_checkbox">Запам'ятати мене
                        <input type="checkbox" name="remember">
                        <span class="checkmark"></span>
                    </label>
                    <a href="{{route('reset-password')}}"><p style="margin: 0">Забули пароль?</p></a>
                </div>
                <button class="form_auth_button" type="submit" name="auth_form_submit">Увійти</button>
                <a href="{{route('registration')}}" id=go_to_reg><p>Зареєструватися</p></a>
            </form>
        </div>
    </main>

@endsection
