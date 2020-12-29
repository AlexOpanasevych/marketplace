@extends('templates.not_my_template')

@section('title', "Продукт")

@section('page-content')
    <main>
        <div class="delivery">
            <h1>Введіть дані для отримання замовлення:</h1>
            <form class="order_info">
                <p>ФІО:</p>
                <div class="delivery_info">
                    <input type="text" name="second_name" placeholder="Прізвище" required>
                    <input type="text" name="first_name" placeholder="Ім'я" required>
                    <input type="text" name="patronymic" placeholder="По батькові" required>
                </div>
                <p>Адреса:</p>
                <div class="delivery_info">
                    <input type="text" name="area" placeholder="Область" required>
                    <input type="text" name="city" placeholder="Город" required>
                    <input type="text" name="street" placeholder="Вулиця" required>
                </div>
                <div class="delivery_info">
                    <input type="text" name="house_number" placeholder="Номер будинку" required>
                    <input type="text" name="apartment_number" placeholder="Номер квартири">
                    <input type="text" name="post_index" placeholder="Почтовий індекс" required>
                </div>
                <p>Контактні дані:</p>
                <div class="delivery_info">
                    <input type="email" name="email" placeholder="Ел. пошта" style="margin-top: 0">
                    <input type="text" name="phone_number" placeholder="Номер телефону" required>
                    <button type="submit" name="confirm_delivery"><a style="outline: none; color: white; text-decoration: none" href="{{route('home')}}">Оформити замовлення</a></button>
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
