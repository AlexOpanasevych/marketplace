@extends('templates.registration_template')

@section('title', "Главная")

@section('page-content')
<main style="padding-top: 50px">
    <div class=login_block>
        <form class=auth_form>
            <p style="font-size: 24px;  margin-top: 50px">Авторизація</p>
            <hr style="margin: 25px -50px 0 -50px"/>
            <label>Eлектронна пошта</label>
            <input type="email" name="login_email" required >
            <label>Пароль</label>
            <input type="password" name="login_pass" required >
            <div class=auth_settings>
                <label class="new_checkbox">Запам'ятати мене
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <a href="password_retrieval.blade.php"><p>Нагадати пароль</p></a>
            </div>
            <button class="form_auth_button" type="submit" name="auth_form_submit">Увійти</button>
            <a href="registration.blade.php" id=go_to_reg><p>Зареєструватися</p></a>
        </form>
    </div>
</main>

@endsection
