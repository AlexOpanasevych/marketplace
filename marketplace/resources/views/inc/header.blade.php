<header class="d-flex align-items-center justify-content-between">
    <a href="{{route('home')}}"><img style="height: 60px" src="{{asset('img/logo.svg')}}"></a>
    <div id="catalog">
        <button class="categories_popup_btn">Каталог товарів</button>
        <div class="categories_popup_fade">
            <div class="categories_popup">
                <a href="#" name="category">category1</a>
                <a href="#" name="category">category2</a>
                <a href="#" name="category" style="border: none">category_last</a>
            </div>
        </div>
    </div>
    <div id="product_search">
        <input type="search" name="search" placeholder="Пошук товарів">
        <input type="submit" value="Найти">
    </div>
    <div id=header_buttons>
        <a href="{{route('chosen')}}"><img src="{{asset('img/favorites.svg')}}"></a>
        <a href="{{route('cart')}}"><img src="{{asset('img/cart.svg')}}"></a>
        <a href="{{route('info')}}"><img src="{{asset('img/profile.svg')}}"></a>
    </div>
</header>

