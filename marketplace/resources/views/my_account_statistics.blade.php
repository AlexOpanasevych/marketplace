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
                        <h1>Моя статистика ({{$seller->first()->company_name}})</h1>
                        <div style="height: 1px; margin-bottom: 40px; background-color: black"></div>
                        <div style="margin-bottom: 20px">
                            <canvas id="orders-num" style="background-color: white"></canvas>
                        </div>
                        <div style="margin-bottom: 20px">
                            <canvas id="orders-money" style="background-color: white"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var temperatureCtx = document.getElementById('orders-num').getContext('2d');
        var temperatureChart = new Chart(temperatureCtx, {
            type: 'bar',
            data: {
                labels: ['Мій Товар 1', 'Мій Товар 2', 'Мій Товар 3', 'Мій Товар 4', 'Мій Товар 5', 'Мій Товар 6'],
                datasets: [{
                    label: 'Кількість покупок',
                    data: [99, 12, 33, 55, 12, 12],
                    backgroundColor:
                        'rgba(44, 156, 242, 0.5)',
                    borderColor:
                        'rgba(44, 156, 242)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Графік кількості покупок товарів',
                    fontSize: 20
                },
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Мій товар',
                            fontSize: 15
                        }
                    }],
                    yAxes: [{
                        display: true,
                        ticks: {
                            suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                            // OR //
                            beginAtZero: true   // minimum value will be 0.
                        }
                    }]
                }
            }
        });



        var temperatureCtx = document.getElementById('orders-money').getContext('2d');
        var temperatureChart = new Chart(temperatureCtx, {
            type: 'bar',
            data: {
                labels: ['Мій Товар 1', 'Мій Товар 2', 'Мій Товар 3', 'Мій Товар 4', 'Мій Товар 5', 'Мій Товар 6'],
                datasets: [{
                    label: 'Прибуток за товар, грн',
                    data: [990, 1200, 330, 5500, 120, 12000],
                    backgroundColor:
                        'rgba(44, 156, 242, 0.5)',
                    borderColor:
                        'rgba(44, 156, 242)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Графік cумарних прибутків за товар',
                    fontSize: 20
                },
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Мій товар',
                            fontSize: 15
                        }
                    }],
                    yAxes: [{
                        display: true,
                        ticks: {
                            suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                            // OR //
                            beginAtZero: true   // minimum value will be 0.
                        }
                    }]
                }
            }
        });
    </script>
@endsection
