@extends('templates.template')

@section('title', 'Особистий кабінет')

@section('page-content')
    <div class="container my-account">
        <h1 style="color: black">Особистий кабінет</h1>
        <div class="row">
            <div class="col-md-3 account-menu">
                @include('inc.my-account-menu', ['seller' => $seller])
            </div>
            <div class="col-md-9 left-part">
                <div class="account-content">
                    <div class="my-info">
                        <h1>Мої замовлення</h1>
                        <div style="height: 1px; margin-bottom: 40px; background-color: black"></div>
                        <p>Всього замовлень: ххх</p>
                        @foreach([1,2,3] as $i)
                            @include('inc.my-account-order')
                        @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

