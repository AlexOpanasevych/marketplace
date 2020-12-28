<div class="card border-black small " style="background-color: #ebebeb; margin-bottom: 20px; margin-left: 0; margin-right: 0">
    <div class="view overlay d-flex flex-column h-100" style="font-size: 13px">
        <a href="">
            <div class="mask rgba-white-light">
                <img style="margin-top: 20px" class="card-img-top" src="{{asset($item->photo_path)}}">
            </div>
        </a>
        <div class="card-body text-left">
             <a href="" class="black-text" style="color: black">
                 <p style="margin: 0; font-size: 10px">{{$item->product_name}}</p>
             </a>
            <p class="font-weight-bold blue-text" style="margin: 0; font-size: 10px">
                <strong>Ціна: {{$item->price}}</strong>
            </p>
        </div>
        <div class="card-footer mt-auto">
            <p class="font-weight-bold blue-text" style="margin: 0; font-size: 10px">
                <strong>Кількість: {{$item->count}}</strong>
            </p>
        </div>
    </div>
</div>
