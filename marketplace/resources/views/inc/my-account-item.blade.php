<div class="card border-black small" style="background-color: #ebebeb; margin-bottom: 20px">
    <div class="view overlay" style="font-size: 13px">
        <a class="chosen_cancel" href="{{route('remove-chosen', ['id' => $item->id])}}"><div><img height="25px" src="{{asset($item->photo_path)}}"></div></a>
        <a href="">
            <div class="mask rgba-white-light">
                <img style="margin-top: 20px" class="card-img-top" src="{{asset('img/products'.$item->product()->first()->photo_path)}}">
            </div>
        </a>
        <div class="card-body text-left">
             <a href="" class="black-text" style="color: black">
                 <p style="margin: 0">{{$item->product()->first()->product_name}}</p>
             </a>
            <p class="font-weight-bold blue-text" style="margin: 0">
                <strong>Ціна: </strong><span>{{$item->product()->first()->price}} грн</span>
            </p>
        </div>
    </div>
    <button style="width: 100%; font-size: 14px; height: 40px; margin-bottom: 0; color: white" class="btn mt-auto btn-lg btn-block">
        <a href="{{route('add-cart', ['id' => $item->product()->first()->id])}}">
        В корзину
        </a>
    </button>
</div>
