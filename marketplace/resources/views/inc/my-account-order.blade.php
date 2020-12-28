<div class="account-order-list d-flex flex-column" style="margin-bottom: 20px">
    <small class="text-muted">
        Номер заказа: {{$order_info->ordered_number}}
    </small>
    <small class="text-muted">
        Статус замовлення: {{$order_info->status}}
    </small>
    <small class="text-muted">
        Дата замовлення: {{$order_info->created_at}}
    </small>
</div>
<div class="row wow fadeIn card-deck">

    @foreach($order_info->items as $j)
        <div class="col-lg-3 d-flex align-items-stretch" style="">
            @include('inc.my-account-order-item')
        </div>
    @endforeach

</div>
<div style="font-size: 15px" class="d-flex justify-content-end">Всього: 999 грн</div>
<div style="height: 2px; background-color: black; margin-bottom: 50px"></div>
