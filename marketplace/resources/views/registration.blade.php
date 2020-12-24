

@extends('templates.registration_template')

@section('title', "Главная")

@section('page-content')
    <main style="margin: 0; padding: 0">
        <div class=login_block style="min-height: 650px">
            <form class=auth_form action="{{route('registration')}}" method="post">
                @csrf
                <p style="font-size: 24px">Реєстрація</p>
                <hr style="margin: 25px -50px 0 -50px"/>
                <label>Ім'я користувача</label>
                <input type="text" name="name" required >
                <label>Eлектронна пошта</label>
                <input type="email" name="email" required >
                <label>Пароль</label>
                <input type="password" name="password" required >
                <button style="margin-top: 50px" class="form_auth_button" type="submit" name="auth_form_submit">Зареєструватися</button>
                <a href="{{route('login')}}" id=go_to_reg><p>Я вже зареєстрований</p></a>
            </form>
        </div>
    </main>
@endsection
