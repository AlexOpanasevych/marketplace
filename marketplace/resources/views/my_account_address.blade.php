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
                            <h3>Введіть особисті данні:</h3>
                            <label>
                                <input type="text" name="name" class="text_bar" placeholder="Імя" required>
                            </label>
                            <label>
                                <input type="text" name="lastname" class="text_bar" placeholder="Прізвище" required>
                            </label>
                            <label>
                                <input type="text" name="patronymic" class="text_bar" placeholder="По батькові" required>
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
