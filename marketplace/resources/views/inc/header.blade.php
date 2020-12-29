<header class="d-flex align-items-center justify-content-between">
    <a href="{{route('home')}}"><img style="height: 60px" src="{{asset('img/logo.svg')}}"></a>
    <div id="catalog">
        <button class="categories_popup_btn">Каталог товарів</button>
        <div class="categories_popup_fade">
            <div class="categories_popup">
                @for($i = 0; $i < count($category_list); $i++)
                    @if(isset($chosen_id) && $category_list[$i]->id == $chosen_id)
                        @if($i != count($category_list) - 1)
                            <a name="category" style="color:black">{{$category_list[$i]->category_name}}</a>
                        @else
                            <a name="category" style="color:black" style="border: none">{{$category_list[$i]->category_name}}</a>
                        @endif
                    @else
                        @if($i != count($category_list) - 1)
                            <a href="{{route('home-category', ['id' => $category_list[$i]->id])}}" name="category">{{$category_list[$i]->category_name}}</a>
                        @else
                            <a href="{{route('home-category', ['id' => $category_list[$i]->id])}}" name="category" style="border: none">{{$category_list[$i]->category_name}}</a>
                        @endif
                    @endif
                @endfor
            </div>
        </div>
    </div>
    <div id="product_search">
        <input type="search" name="search" placeholder="Пошук товарів">
        <input type="submit" value="Найти">
    </div>
    <div id=header_buttons>

        <a href="{{route('chosen')}}" style="margin: 0 10px"><img src="{{asset('img/favorites.svg')}}"></a>
        <a href="{{route('cart')}}" style="margin: 0 10px"><img src="{{asset('img/cart.svg')}}"></a>
        <a href="{{route('info')}}" style="margin: 0 10px"><img src="{{asset('img/profile.svg')}}"></a>
    </div>
</header>

