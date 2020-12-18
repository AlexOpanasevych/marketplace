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
                        <h1>Мої товари (Seller-name)</h1>
                        <div style="height: 1px; margin-bottom: 40px; background-color: black"></div>
                        <p style="margin: 0">Всього товарів: ххх</p>
                        <div class="d-flex align-items-center" style="margin-bottom: 50px">
                            <p style="font-weight: normal; margin: 0 10px 0 0;">Тут ви зможете змінити свої товари та додати нові: </p>
                            <a href=""><img style="height: 30px" src="{{asset('img/plus.svg')}}"></a>
                        </div>
                        <div class="row wow fadeIn card-deck">
                            @foreach([1,2,3,4,5,6] as $i)
                                <div class="col-lg-4 d-flex align-items-stretch" style="">
                                    @include('inc.my-account-seller-item')
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
