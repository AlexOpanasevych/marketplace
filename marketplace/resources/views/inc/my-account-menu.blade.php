@php
    $pages_user = ['Моя інформація'=>'my-account',
    'Моя адреса'=>'my-account/address',
    'Мої замовлення'=>'my-account/my-orders',
    'Обране'=>'my-account/chosen',
    'Відгуки про сайт'=>'my-account/feedback',
    'Стати продавцем'=>'my-account/become-seller',
    'Вийти'=>'logout'];

    $pages_seller = ['Моя інформація'=>'my-account',
    'Моя адреса'=>'my-account/address',
    'Мої замовлення'=>'my-account/my-orders',
    'Обране'=>'my-account/chosen',
    'Відгуки про сайт'=>'my-account/feedback',
    'Мої товари'=>'my-account/my-items',
    'Моя статистика'=>'my-account/my-statistics',
    'Вийти'=>'logout']
@endphp

<div class="d-flex flex-column justify-content-center account-greeting">
    <p style="margin-bottom: 5px">Вітаю,</p>
{{--    <p class = "account-username">@if(auth()->check()) {{auth()->user()->name}} @endif</p>--}}
    <p class = "account-username">user-email</p>
</div>

{{-- Коли користувачі будуть ділитись на клієнтів і продавців ДОБАВИТИ IF --}}
{{--  Если не продавец  --}}
{{--
    @foreach($pages_user as $page_name => $page_url)
        @if(\Illuminate\Support\Facades\Request::path() == $page_url)
            <a class="account-current-button hide-button"><div class="d-flex align-items-center">{{$page_name}}</div></a>
        @else
            @if($page_url == $pages_user['Стати продавцем'])
                <a href="/{{$page_url}}" class="hide-button"><div class="d-flex align-items-center justify-content-between seller-button">{{$page_name}}<img style="height: 40px" src="{{asset('img/best-seller.svg')}}"></div></a>
            @else
                <a href="/{{$page_url}}" class="hide-button"><div class="d-flex align-items-center">{{$page_name}}</div></a>
            @endif
        @endif
    @endforeach--}}

{{--  Если продавец  --}}

@foreach($pages_seller as $page_name => $page_url)
    @if(\Illuminate\Support\Facades\Request::path() == $page_url)
        <a class="account-current-button hide-button"><div class="d-flex align-items-center">{{$page_name}}</div></a>
    @else
        @if($page_url == $pages_seller['Мої товари'] or  $page_url == $pages_seller['Моя статистика'])
            <a href="/{{$page_url}}" class="hide-button"><div class="d-flex align-items-center seller-button">{{$page_name}}</div></a>
        @else
            <a href="/{{$page_url}}" class="hide-button"><div class="d-flex align-items-center">{{$page_name}}</div></a>
        @endif
    @endif
@endforeach
