@extends('templates.template')

@section('title', 'Особистий кабінет')

@section('page-content')
    <div class="container my-account">
        <h1 style="color: black">Особистий кабінет</h1>
        <div class="row">
            <div class="col-md-3 account-menu">
                @include('inc.my-account-menu')
            </div>
            <div class="col-md-9 left-part">
                <div class="account-content">
                    <div class="my-info">
                        <h1>Моя адреса</h1>
                        <div style="height: 1px; margin-bottom: 40px; background-color: black"></div>
                        <form class="d-flex flex-column" action="" method="POST">
                            @csrf
                            <h3>Введіть свою адресу:</h3>
                            <label>
                                <select name="region" class="text_bar" required>
                                    <option value="" disabled selected>Область</option>
                                    <option value="м. Київ">м. Київ</option>
                                    <option value="Київська">Київська</option>
                                    <option value="Хмельницька">Хмельницька</option>
                                    <option value="Донецька">Донецька</option>
                                    <option value="Рівенська">Рівенська</option>
                                    <option value="Одеська">Одеська</option>
                                    <option value="Львівська">Львівська</option>
                                </select>
                            </label>

                            <label>
                                <input type="text" name="city" class="text_bar" placeholder="Місто" required>
                            </label>
                            <label>
                                <input type="text" name="street" class="text_bar" placeholder="Вулиця" required>
                            </label>
                            <label>
                                <input type="text" name="house" class="text_bar" placeholder="Будинок" required>
                            </label>
                            <label>
                                <input type="text" name="post_index" class="text_bar" placeholder="Поштовий індекс" required>
                            </label>

                            @if($errors->any())
                                <div class="alert">
                                    @foreach($errors->all() as $message)
                                        <p style="font-size: 15px">{{$message}}</p>
                                    @endforeach
                                </div>
                            @endif
                            <div style="width: 100%" class="d-flex justify-content-center">
                                <button type="submit">Змінити</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
