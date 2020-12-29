@extends('templates.super_template')

@section('title', 'Сотрінка суперюзера')

@section('page-content')
    <nav style="padding: 0; width: 300px" class="navbar navbar-expand-lg navbar-dark fixed-top">

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto sidenav" id="navAccordion">
                <li class="nav-item ">
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
                <li class="nav-item active disabled">
                    <a class="nav-link" href="/superuser-sellers">Продавці</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/superuser-orders">Замовлення</a>
                </li>

            </ul>
        </div>
    </nav>

    <main style="padding-top: 70px; min-height: 100vh; margin-bottom: 100px" class="content-wrapper">
        <h1 style="margin-bottom: 30px">Всі продавці</h1>
        @foreach($sellers as $i)
            @if($loop -> first)
                <div class=" d-flex align-items-center" style="height: 50px; border-bottom: silver 2px solid; border-top: silver 2px solid">
                    <div class="row d-flex align-items-center" style="width: 100%; padding: 0; margin: 0; font-size: 12px">
                        <div class="col-md-4">Користувач: {{$i->user()->name}}</div>
                        <div class="col-md-4">Назва компанії (ФОП): {{$i->company_name}}</div>
                        <div class="col-md-4 d-flex justify-content-end" style="font-size: 10px">
                            <button style="margin-right: 5px; min-width: 100px; font-size: 12px; font-weight: bold" type="button" class="btn btn-danger "><a href="{{route('ban-seller', ['id' => $i->id])}}">Забрати статус продавця</a></button>
                            <button style=" min-width: 100px; font-size: 12px; font-weight: bold" type="button" class="btn btn-danger "><a href="{{route('ban-products', ['id' => $i->id])}}">Заблокувати товари</a></button>
                        </div>
                    </div>
                </div>
            @else
                <div class=" d-flex align-items-center" style="height: 50px; border-bottom: silver 2px solid;">
                    <div class="row d-flex align-items-center" style="width: 100%; padding: 0; margin: 0; font-size: 12px">
                        <div class="col-md-4">Користувач: {{$i->user()->name}} </div>
                        <div class="col-md-4">Назва компанії (ФОП): {{$i->company_name}}</div>
                        <div class="col-md-4 d-flex justify-content-end" style="font-size: 10px">
                            <button style="margin-right: 5px; min-width: 100px; font-size: 12px; font-weight: bold" type="button" class="btn btn-danger "><a href="{{route('ban-seller', ['id' => $i->id])}}">Забрати статус продавця</a></button>
                            <button style=" min-width: 100px; font-size: 12px; font-weight: bold" type="button" class="btn btn-danger "><a href="{{route('ban-products', ['id' => $i->id])}}">Заблокувати товари</a></button>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </main>
@endsection
