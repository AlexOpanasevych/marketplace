@extends('templates.template')

@section('title', 'Особистий кабінет')

@section('page-content')
    <div class="container my-account">
        <h1 style="color: black">Особистий кабінет</h1>
        <div class="row">
            <div class="col-md-3 account-menu">
                @include('inc.my-account-menu', ['seller' => null])
            </div>
            <div class="col-md-9 left-part">
                <div class="account-content">
                    <div class="my-info">
                        <h1>Стати спродавцем</h1>
                        <div style="height: 1px; margin-bottom: 40px; background-color: black"></div>

                        {{-- Если не продавец --}}
                        @if(!isset($seller))
                        <form class="d-flex flex-column" action="{{route('seller')}}" id="text-form" method="POST">
                            @csrf
                            <h3>Введіть імя ФОП або назву компанії і адміністрація сайту найближчим часом надасть вам
                                права провдавця:
                            </h3>
                            <label>
                                <input type="text" name="name" class="text_bar"  required>
                            </label>
                            @if($errors->any())
                                <div class="alert">
                                    @foreach($errors->all() as $message)
                                        <p style="font-size: 15px">{{$message}}</p>
                                    @endforeach
                                </div>
                            @endif
                            <div style="width: 100%" class="d-flex justify-content-center">
                                <button type="submit">Надіслати</button>
                            </div>
                        </form>
                        @else
                        <h3>Дякуємо за ваш запит! Адміністрація сайту найближчим часом вирішить, чи надавати вам
                            права продавця!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
