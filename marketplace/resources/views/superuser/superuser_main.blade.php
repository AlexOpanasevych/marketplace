@extends('templates.super_template')

@section('title', 'Сотрінка суперюзера')

@section('page-content')
    <nav style="padding: 0; width: 300px" class="navbar navbar-expand-lg navbar-dark fixed-top">

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto sidenav" id="navAccordion">
                <li class="nav-item active disabled">
                    <a class="nav-link" href="/superuser-main">Головна</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/superuser-requests">Запити "стати продавцем" </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/superuser-items">Товари</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/superuser-users">Користувачі</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/superuser-sellers">Продавці</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/superuser-orders">Замовлення</a>
                </li>

            </ul>
        </div>
    </nav>

    <main style="padding-top: 70px; min-height: 100vh" class="content-wrapper">
        <h1 style="margin-bottom: 30px">Головна сторінка</h1>
        <p>Кількість користувачів: <b>{{$user_count}}</b> </p>
        <p>Кількість продавців: <b>{{$seller_count}}</b></p>
        <p>Кількість замовлень: <b>{{$order_count}}</b></p>
        <p>Кількість товарів: <b>{{$products_count}}</b></p>
        <p>Сумарний прибуток за усі замовлення: <b>{{$sum_orders}}</b></p>
    </main>
@endsection
