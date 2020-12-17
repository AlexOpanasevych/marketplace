

@extends('templates.template')

@section('title', "Главная")

@section('page-content')
    <main style="padding-top: 50px">
        <div class=login_block style="min-height: 585px;">
            <form class=auth_form>
                <p style="font-size: 24px; margin-top: 50px">Реєстрація</p>
                <hr style="margin: 10px -50px 0 -50px"/>
                <label>Ім'я користувача</label>
                <input type="text" name="login_email" required >
                <label>Eлектронна пошта</label>
                <input type="email" name="login_email" required >
                <label>Пароль</label>
                <input type="password" name="login_pass" required >
                <button style="margin-top: 50px" class="form_auth_button" type="submit" name="auth_form_submit">Зареєструватися</button>
                <a href="login.html" id="go_to_reg"><p>Я вже зареєстрований</p></a>
            </form>
        </div>
    </main>
@endsection
