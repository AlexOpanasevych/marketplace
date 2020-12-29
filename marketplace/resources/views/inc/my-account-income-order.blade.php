<div class="account-order-list d-flex flex-column" style="margin-bottom: 20px">
    <small class="text-muted">
        Номер заказа: {{$item->ordered_number}}
    </small>
    <small class="text-muted">
        Замовник: {{($order->firstname ?? '') + ' ' + ($order->lastname ?? '') + ' ' + ($order->patronymic ?? '')}}
    </small>
    <small class="text-muted">
        Номер телефона: {{$order->phone}}
    </small>
    <small class="text-muted">
        Електронна адреса: {{$order->email}}
    </small>
    <small class="text-muted">
        Статус замовлення: {{$order->status_id}}
    </small>
    <small class="text-muted">
        Дата замовлення: {{$order->created_at}}
    </small>

</div>
<div class="row wow fadeIn card-deck">

    @foreach($items as $j)
        <div class="col-lg-3 d-flex align-items-stretch" style="">
            @include('inc.my-account-order-item')
        </div>
    @endforeach
        <div style="width: 100%; margin-top:40px" class="d-flex justify-content-center">
            <button type="submit">Підтвердити замовлення</button>
        </div>
</div>
<div style="font-size: 15px" class="d-flex justify-content-end">Всього: {{array_sum($items->values('price'))}} грн</div>
<div style="height: 2px; background-color: black; margin-bottom: 50px"></div>
