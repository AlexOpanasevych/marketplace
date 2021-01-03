@extends('templates.not_my_template')

@section('title', "Главная")

@section('page-content')
    <main>

            <div class="products">
                    @for($i = 0; $i < count($product_list); $i++)
                    <div class="product">
                        <a class="add_product_to" href="{{route('add-chosen', ['id' => $product_list[$i]->id])}}">
                        @if(!count($chosen_list))
                            <img class="fav_icon" src="{{asset('img/heart.svg')}}"/>
                        @else
                            @for($j = 0; $j < count($chosen_list); $j++)
                                @if($i == $j)
                                    <img class="fav_icon" src="{{asset('img/heart_chosen.svg')}}"/>
{{--                                    {{unset($chosen_list[$j]}}--}}
                                @else
                                    <img class="fav_icon" src="{{asset('img/heart.svg')}}"/>
                                @endif

                            @endfor
                        @endif

                        </a>
                        <img src="{{asset('img/products/'.$product_list[$i]->photo_path)}}" class="product_icon">
                        @if(in_array($product_list[$i]->id, $products_id))
                            <div class="add_product_to" style="margin-top: 47px">
                                <img class="cart_icon" src="{{asset('img/shopping-cart.svg')}}">
                            </div>
                        @else
                            <a class="add_product_to add_product_to_hover" style="margin-top: 47px; display: block" href="{{route('add-cart', ['id' => $product_list[$i]->id])}}">
                                <img class="cart_icon" src="{{asset('img/shopping-cart-empty.svg')}}">
                            </a>
                        @endif
                        <a href="{{route('product', ['id' => $product_list[$i]->id])}}" class="product_name">{{$product_list[$i]->product_name}}</a>
                        <p class="product_price">{{$product_list[$i]->price}} &#8372;</p>
                    </div>
                    @endfor


            </div>

        <!-- Vendor scripts -->
        <script src="libs/jquery/jquery-3.5.1.min.js"></script>
        <script src="libs/owlcarousel2/owl.carousel.min.js"></script>

        <!-- User scripts -->
        <script src="js/main.js"></script>
    </main>
@endsection
