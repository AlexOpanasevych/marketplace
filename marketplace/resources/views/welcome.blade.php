@extends('templates.not_my_template')

@section('title', "Главная")

@section('page-content')
    <main>

            <div class="products">
                @for($j = 0; $j < 10; $j++)
                    @for($i = 0; $i < count($product_list); $i++)
                    <div class="product">

                        <div class="add_product_to">
                            <div class="fav_icon"></div>
                        </div>
                        <img src="{{asset('img/products/'.$product_list[$i]->photo_path)}}" class="product_icon">
                        <div class="add_product_to" style="margin-top: 47px">
                            <div class="cart_icon">
                            </div>
                        </div>
                        <p class="product_name">{{$product_list[$i]->product_name}}</p>
                        <p class="product_price">{{$product_list[$i]->price}} &#8372;</p>
                    </div>
                    @endfor
                @endfor
            </div>
    </main>
@endsection
