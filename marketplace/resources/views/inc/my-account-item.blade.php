<div class="card border-black small" style="background-color: #ebebeb; margin-bottom: 20px">
    <div class="view overlay" style="font-size: 13px">
        <a class="chosen_cancel" href="{{route('cansel-chosen/{id}', ['id' => $item->id])}}"><div><img height="25px" src="{{asset($item->photo_path)}}"></div></a>
        <a href="">
            <div class="mask rgba-white-light">
                <img style="margin-top: 20px" class="card-img-top" src="{{asset('img/5a3a540e634e59.16223150151377204640685054.png')}}">
            </div>
        </a>
        <div class="card-body text-left">
             <a href="" class="black-text" style="color: black">
                 <p style="margin: 0">{{$item->product_name}}</p>
             </a>
            <p class="font-weight-bold blue-text" style="margin: 0">
                <strong>Ціна: </strong><span>{{$item->price}} грн</span>
            </p>
        </div>
    </div>
    <button style="width: 100%; font-size: 14px; height: 40px; margin-bottom: 0; color: white" class="btn mt-auto btn-lg btn-block">
        <a href="{{route('add-to-cart/{id}', ['id' => $id])}}">
        В корзину
        </a>
    </button>
</div>
