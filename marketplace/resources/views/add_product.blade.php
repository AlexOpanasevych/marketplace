@extends('templates.not_my_template')

@section('title', "Продукт")

@section('page-content')
    <main style="min-height: 100vh">
        <div class="delivery" style="margin-top: 50px;">
            <h1>Введіть інформацію про товар:</h1>
            <form class="order_info">
                <div class="delivery_info">
                    <input type="text" name="product_name" placeholder="Назва товару" required>
                    <input type="text" name="product_quantity" placeholder="Кількість товару" required>
                    <input type="text" name="product_price" placeholder="Ціна товару" required>
                </div>
                <p>Опис товару:</p>
                <div class="delivery_info">
                    <textarea name="product_descripton" required></textarea>
                </div>
                <div class="delivery_info" style="margin-top: 25px;">
                    <input type="button" value="Оберіть фото" id="btn_add_photo" />
                    <input type="file" name="product_photo" id="file" style="display:none" required>
                    <select name="product_category" required>
                        <option disabled selected>Оберіть категорію</option>
                        <option>category1</option>
                        <option>category2</option>
                        <option>category3</option>
                    </select>
                    <button type="submit" name="confirm_delivery">Оформити замовлення</button>
                </div>
            </form>
        </div>
        <!-- Vendor scripts -->
        <script src="libs/jquery/jquery-3.5.1.min.js"></script>
        <script src="libs/owlcarousel2/owl.carousel.min.js"></script>

        <!-- User scripts -->
        <script src="js/main.js"></script>
    </main>
@endsection
