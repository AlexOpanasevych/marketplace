@extends('templates.registration_template')

@section('title', "Главная")

@section('page-content')
<div style="padding-top: 50px" class="container">
    <main>
        <div class=login_block style="min-height: 475px">
            <form class=auth_form>
                <p style="font-size: 24px; margin-top: 50px">Відновлення паролю</p>
                <hr style="margin: 20px -50px 0 -50px"/>
                <label>Eлектронна пошта</label>
                <input type="email" name="login_email" required >
                <button class="form_auth_button" type="submit" name="auth_form_submit">Отримати тимчасовий пароль</button>
                <a href="registration.blade.php" id=go_to_reg><p>Я згадав свій пароль</p></a>
            </form>
        </div>
    </main>
</div>
@endsection
