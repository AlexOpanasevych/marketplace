<div class="card border-black small" style="background-color: #ebebeb; margin-bottom: 30px; margin-right: 0; margin-left: 0">
    <div class="view overlay" style="font-size: 13px">
        <a class="chosen_cancel" href="{{route('remove-product/{id}', ['id' => $item->id])}}"><div><img height="25px" src="{{asset('img/delete_acc.svg')}}"></div></a>
        <a href="{{route('product/{id}', ['id' => $item->id])}}">
            <div class="mask rgba-white-light">
                <img style="margin-top: 20px" class="card-img-top" src="{{asset('img/5a3a540e634e59.16223150151377204640685054.png')}}">
            </div>
        </a>
        <div class="card-body text-left">
             <a href="" class="black-text" style="color: black">
                 <p style="margin: 0">{{$item->product_name}}</p>
             </a>
            <p class="font-weight-bold blue-text" style="margin: 0">
                <strong>Ціна: </strong><span{{$item->price}} грн</span>
            </p>
            <p class="font-weight-bold blue-text" style="margin: 0">
                <strong>Наявність: </strong><span>В наявності</span>
            </p>
            <p class="font-weight-bold blue-text" style="margin: 0">
                <strong>Категорія: </strong><span></span>
            </p>
        </div>
    </div>
    <div class="mt-auto">
        <button style="width: 100%; font-size: 14px; height: 40px; margin: 0; color: white" class="btn  btn-lg btn-block">
            Змінити
        </button>
        <button style="width: 100%; font-size: 14px; height: 40px; color: white; background-color: #4F7CAC !important; margin: 5px 0 0;" class="btn  btn-lg btn-block">
            Просувати товар
        </button>
    </div>
</div>
