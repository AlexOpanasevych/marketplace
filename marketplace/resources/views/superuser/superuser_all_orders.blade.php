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
                <li class="nav-item">
                    <a class="nav-link" href="/superuser-sellers">Продавці</a>
                </li>
                <li class="nav-item active disabled">
                    <a class="nav-link" href="/superuser-orders">Замовлення</a>
                </li>

            </ul>
        </div>
    </nav>

    <main style="padding-top: 70px; min-height: 100vh; margin-bottom: 100px" class="content-wrapper">
        <h1 style="margin-bottom: 30px">Останні замовлення</h1>
        @foreach([1,2,3,1 ,1, 1, 1, 1, 1, 2,2,2,2 ] as $i)
            @if($loop -> first)
                <div class=" d-flex align-items-center" style="height: 50px; border-bottom: silver 2px solid; border-top: silver 2px solid">
                    <div class="row d-flex align-items-center" style="width: 100%; padding: 0; margin: 0; font-size: 12px">
                        <div class="col-md-4">Користувач: ххххх <span class="text-muted">(email)</span></div>
                        <div class="col-md-2">Статус: ХХХХХ</div>
                        <div class="col-md-2 text-muted">Дата: ХХХХХ</div>
                        <div class="col-md-4 d-flex justify-content-end">
                            Загальна сума: <b>xxxxxx грн</b>
                        </div>
                    </div>
                </div>
            @else
                <div class=" d-flex align-items-center" style="height: 50px; border-bottom: silver 2px solid;">
                    <div class="row d-flex align-items-center" style="width: 100%; padding: 0; margin: 0; font-size: 12px">
                        <div class="col-md-4">Користувач: ххххх <span class="text-muted">(email)</span></div>
                        <div class="col-md-2">Статус: ХХХХХ</div>
                        <div class="col-md-2 text-muted">Дата: ХХХХХ</div>
                        <div class="col-md-4 d-flex justify-content-end">
                            Загальна сума: <b>xxxxxx грн</b>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </main>
@endsection
