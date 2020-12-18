<div class="account-order-list d-flex flex-column" style="margin-bottom: 20px">
    <small class="text-muted">
        Номер заказа: №ххх
    </small>
    <small class="text-muted">
        Статус замовлення: СТАТУС
    </small>
    <small class="text-muted">
        Дата замовлення: 00:00 01/01/2020
    </small>
</div>
<div class="row wow fadeIn card-deck">

    @foreach([1,2,3,4,5] as $j)
        <div class="col-lg-3 d-flex align-items-stretch" style="">
            @include('inc.my-account-order-item')
        </div>
    @endforeach

</div>
<div style="font-size: 15px" class="d-flex justify-content-end">Всього: 999 грн</div>
<div style="height: 2px; background-color: black; margin-bottom: 50px"></div>
