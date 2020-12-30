@extends('templates.not_my_template')

@section('title', "Продукт")

@section('page-content')
    <main>
        <div class="product_block">
            <div class="product_photo">
                <img id="fixblock" src="{{asset($item->photo_path)}}">
            </div>
            <div class="product_info">
                <p class="product_name">{{$item->product_name}}</p>
                <div class="buy_product">
                    <p>{{$item->price}} &#8372;</p>
                    <a href="{{route('add-cart', ['id' => $item->id])}}"><button class="add_product_to_cart">Придбати</button></a>
                    <div class="favourite_icon" >
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="-5 -25 500 490" style="enable-background:new 0 0 485 485;" xml:space="preserve">
					<path d="M343.611,22.543c-22.614,0-44.227,5.184-64.238,15.409c-13.622,6.959-26.135,16.205-36.873,27.175
					c-10.738-10.97-23.251-20.216-36.873-27.175c-20.012-10.225-41.625-15.409-64.239-15.409C63.427,22.543,0,85.97,0,163.932
					c0,55.219,29.163,113.866,86.678,174.314c48.022,50.471,106.816,92.543,147.681,118.95l8.141,5.261l8.141-5.261
					c40.865-26.406,99.659-68.479,147.681-118.95C455.837,277.798,485,219.151,485,163.932C485,85.97,421.573,22.543,343.611,22.543z"/></svg>
                    </div>
                </div>
                <h1>Опис товару:</h1>
                <p class="product_description">{{$item->description}}</p>
                <div class="product_coments">
                    <form class="add_coment" method="post" action="{{route('add-comment', ['id' => $id])}}">
                        <textarea name="product_comment" required></textarea>
                        <button type="submit" name="add_coment">Залишити відгук</button>
                    </form>
                </div>
                <h1 style="border-radius: 0;">Відгуки інших покупців:</h1>
                <div class="product_description" style="padding-top: 30px">
                    @foreach($product_comments as $i)
{{--                    <h3>{{$i->product->product_name}}</h3>--}}
                    <p>{{$i->text}}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Vendor scripts -->
        <script src="libs/jquery/jquery-3.5.1.min.js"></script>
        <script src="libs/owlcarousel2/owl.carousel.min.js"></script>

        <!-- User scripts -->
        <script src="js/main.js"></script>
    </main>
@endsection
