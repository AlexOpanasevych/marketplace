@extends('templates.not_my_template')

@section('title', "Главная")

@section('page-content')
    <main>
        <h1 class="num_of_products">Всього товарів: {{$overall_products}}</h1>
        <div class="shopping_horizontal_line_up"></div>
        <div class="owl-carousel owl-theme">

        @foreach($cart_products as $cart_product)
                <div id="shopping_items">
                    <div class="shopping_piece js-item-campaign">
                        <div class="shopping_top_panel">
                            <a href="{{route('increment-cart', ['id' => $cart_product->id])}}" class="add_more_back" style="text-decoration: none; color: black">
                                <div class="add_more">{{$cart_product->product_number}}x</div>
                            </a>
                            <a href="{{route('remove-cart', ['id' => $cart_product->id])}}" class="cancel_back">
                                <div class="cancel"></div>
                            </a>
                        </div>
                        <img src="{{asset('img/products/'.$cart_product->product->photo_path)}}" class="shopping_picture" alt="example2">
                        <div class="shopping_bottom_panel">
                            <p>{{$cart_product->product->product_name}}</p>
                            <p style="font-size: 16px">{{$cart_product->product->price}} &#8372;</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div id="shopping_horizontal_line_down"></div>
        <div id="shopping_bottom_block">
            <h1>Загальна вартість: {{$overall_price}} &#8372</h1>
                    <div class="shopping_buttons">
                        <a href="{{route('home')}}" class="shopping_catalog_and_buy_buttons">До товарів</a>
                        <a href="{{route('cart-confirm')}}" class="shopping_catalog_and_buy_buttons" style="background: #499F68">Замовити</a>
                    </div>
        </div>
        <!-- Vendor scripts -->
        <script src="libs/jquery/jquery-3.5.1.min.js"></script>
        <script src="libs/owlcarousel2/owl.carousel.min.js"></script>

        <!-- User scripts -->
        <script src="js/main.js"></script>
    </main>
@endsection
