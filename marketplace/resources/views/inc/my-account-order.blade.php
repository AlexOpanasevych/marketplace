<div class="account-order-list d-flex flex-column" style="margin-bottom: 20px">
    <small class="text-muted">
        Номер заказа: {{$order_info->id}}
    </small>
    <small class="text-muted">
        Статус замовлення: {{$order_info->status->status_name}}
    </small>
    <small class="text-muted">
        Дата замовлення: {{$order_info->created_at}}
    </small>
</div>
<div class="row wow fadeIn card-deck">

    @for($i = 0; $i < count($ordered_products); $i++)
        <div class="col-lg-3 d-flex align-items-stretch" style="">
{{--            {{print dd($ordered_products[$i]->first())}}--}}
            @include('inc.my-account-order-item', ['item' => $ordered_products[$i]->first(), 'product' => $products_list[$i][0]])
        </div>
    @endfor

</div>
<div style="font-size: 15px" class="d-flex justify-content-end">Всього: {{array_sum($productprices)}}  грн</div>
<div style="height: 2px; background-color: black; margin-bottom: 50px"></div>
