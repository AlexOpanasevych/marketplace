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
                        <h1>Мої товари ({{$seller->company_name}})</h1>
                        <div style="height: 1px; margin-bottom: 40px; background-color: black"></div>
                        <p style="margin: 0">Всього товарів: {{$seller_products->count()}}</p>
                        <div class="d-flex align-items-center" style="margin-bottom: 50px">
                            <p style="font-weight: normal; margin: 0 10px 0 0;">Тут ви зможете змінити свої товари та додати нові: </p>
                            <a href="{{route('add-product')}}"><img style="height: 30px" src="{{asset('img/plus.svg')}}"></a>
                        </div>
                        <div class="row wow fadeIn card-deck">
                        @foreach($seller_products as $i)
                                <div class="col-lg-4 d-flex align-items-stretch" style="">
                                    @include('inc.my-account-seller-item', ['item' => $i])
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
