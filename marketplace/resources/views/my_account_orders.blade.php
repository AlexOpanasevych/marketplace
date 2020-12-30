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
                        <p>Всього замовлень: {{$orders_list->count()}}</p>
{{--                        {{$orders_list->first()}}--}}
                        @foreach($orders_list as $order)
{{--                            {{print($order)}}--}}
{{--                            <a href="#">adada</a>--}}
                            @include('inc.my-account-order', ['order_info' => $order, 'ordered_products' => $ordered_products_list, 'products_list' => $products_list, 'productprices' => $prod_prices])
                        @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

