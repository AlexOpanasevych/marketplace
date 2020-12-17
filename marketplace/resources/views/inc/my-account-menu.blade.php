@php
    $pages_user = ['Моя інформація'=>'my-account',
    'Моя адреса'=>'my-account/address',
    'Мої замовлення'=>'my-account/my-orders',
    'Обране'=>'my-account/chosen',
    'Відгуки про сайт'=>'my-account/feedback',
    'Стати продавцем'=>'my-account/become-seller',
    'Вийти'=>'logout']
@endphp

<div class="d-flex flex-column justify-content-center account-greeting">
    <p>Вітаю,</p>
{{--    <p class = "account-username">@if(auth()->check()) {{auth()->user()->name}} @endif</p>--}}
</div>



    @foreach($pages_user as $page_name => $page_url)
        @if(\Illuminate\Support\Facades\Request::path() == $page_url)
            <a class="account-current-button hide-button"><div class="d-flex align-items-center">{{$page_name}}</div></a>
        @else
            @if($page_url == $pages_user['Стати продавцем'])
                <a href="/{{$page_url}}" class="hide-button"><div class="d-flex align-items-center seller-button">{{$page_name}}</div></a>
            @else
                <a href="/{{$page_url}}" class="hide-button"><div class="d-flex align-items-center">{{$page_name}}</div></a>
            @endif
        @endif
    @endforeach

