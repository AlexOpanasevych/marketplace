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
                <li class="nav-item">
                    <a class="nav-link" href="/superuser-orders">Замовлення</a>
                </li>
                <li class="nav-item active disabled">
                    <a class="nav-link" href="/superuser-feedbacks">Відгуки</a>
                </li>
            </ul>
        </div>
    </nav>

    <main style="padding-top: 70px; min-height: 100vh; margin-bottom: 100px" class="content-wrapper">
        <h1 style="margin-bottom: 30px">Відгуки про сайт</h1>
        @foreach([1,2,3,1 ,1, 1, 1, 1, 1, 2,2,2,2 ] as $i)
            @if($loop -> first)
                <div class="" style="border-bottom: silver 2px solid; border-top: silver 2px solid; font-size: 12px; padding: 30px 0;">
                    <div class="">Користувач: ххххх <span class="text-muted">(email)</span></div>
                    <div style="margin-bottom: 10px" class="text-muted">Дата: ХХХХХ</div>
                    <div style="margin-bottom: 10px" class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                        in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                    <button style=" min-width: 75px; font-size: 10px" type="button" class="btn btn-danger ">Видалити</button>
                </div>
            @else
                <div class="" style="border-bottom: silver 2px solid; font-size: 12px; padding: 30px 0;">
                    <div class="">Користувач: ххххх <span class="text-muted">(email)</span></div>
                    <div style="margin-bottom: 10px" class="text-muted">Дата: ХХХХХ</div>
                    <div style="margin-bottom: 10px" class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                        in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                    <button style=" min-width: 75px; font-size: 10px" type="button" class="btn btn-danger ">Видалити</button>
                </div>
            @endif
        @endforeach
    </main>
@endsection
