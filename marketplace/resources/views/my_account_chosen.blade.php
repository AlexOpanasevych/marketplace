@extends('templates.template')

@section('title', 'Особистий кабінет')

@section('page-content')
    <div class="container my-account">
        <h1 style="color: black">Особистий кабінет</h1>
        <div class="row">
            <div class="col-md-3 account-menu">
                @include('inc.my-account-menu', ['seller' => $seller])
            </div>
            <div class="col-md-9 left-part">
                <div class="account-content">
                    <div class="my-info">
                        <h1>Обране</h1>
                        <div style="height: 1px; margin-bottom: 40px; background-color: black"></div>
                        <div class="row wow fadeIn card-deck">
                        @foreach($chosen_list as $i)
                                <div class="col-lg-4 d-flex align-items-stretch" style="">
                                    @include('inc.my-account-item', ['item' => $i])
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
