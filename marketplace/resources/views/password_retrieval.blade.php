@extends('templates.registration_template')

@section('title', "Главная")

@section('page-content')
    <main style="padding: 0">
        <div class=login_block style="height: 425px">
            <form class=auth_form method="post" action="{{route('reset-password')}}">
                @csrf
                <p style="font-size: 24px">Відновлення паролю</p>
                <hr style="margin: 25px -50px 0 -50px"/>
                <label>Eлектронна пошта</label>
                <input type="email" name="email" required >
                <button class="form_auth_button" type="submit" name="auth_form_submit">Отримати тимчасовий пароль</button>
                <a href="{{route('login')}}" id=go_to_reg><p>Я згадав свій пароль</p></a>
            </form>
        </div>
    </main>
@endsection
