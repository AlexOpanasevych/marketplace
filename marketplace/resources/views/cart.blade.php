@extends('templates.not_my_template')

@section('title', "Главная")

@section('page-content')
    <main>
        <h1 class="num_of_products">Всього товарів: num</h1>
        <div class="shopping_horizontal_line_up"></div>
        <div class="owl-carousel owl-theme">
            <div id="shopping_items">
                <div class="shopping_piece js-item-campaign">
                    <div class="shopping_top_panel">
                        <div class="add_more_back">
                            <div class="add_more">1x</div>
                        </div>
                        <div class="cancel_back">
                            <div class="cancel"></div>
                        </div>
                    </div>
                    <img src="img/5a3a540e634e59.16223150151377204640685054.png" class="shopping_picture" alt="example2">
                    <div class="shopping_bottom_panel">
                        <p>Тест</p>
                        <p>400 &#8372;</p>
                    </div>
                </div>

            </div>
            <div id="shopping_items">
                <div class="shopping_piece js-item-campaign">
                    <div class="shopping_top_panel">
                        <div class="add_more_back">
                            <div class="add_more">1x</div>
                        </div>
                        <div class="cancel_back">
                            <div class="cancel"></div>
                        </div>
                    </div>
                    <img src="img/5a3a540e634e59.16223150151377204640685054.png" class="shopping_picture" alt="example2">
                    <div class="shopping_bottom_panel">
                        <p>Тест</p>
                        <p>400 &#8372;</p>
                    </div>
                </div>

            </div>
            <div id="shopping_items">
                <div class="shopping_piece js-item-campaign">
                    <div class="shopping_top_panel">
                        <div class="add_more_back">
                            <div class="add_more">1x</div>
                        </div>
                        <div class="cancel_back">
                            <div class="cancel"></div>
                        </div>
                    </div>
                    <img src="img/5a3a540e634e59.16223150151377204640685054.png" class="shopping_picture" alt="example2">
                    <div class="shopping_bottom_panel">
                        <p>Тест</p>
                        <p>400 &#8372;</p>
                    </div>
                </div>

            </div><div id="shopping_items">
                <div class="shopping_piece js-item-campaign">
                    <div class="shopping_top_panel">
                        <div class="add_more_back">
                            <div class="add_more">1x</div>
                        </div>
                        <div class="cancel_back">
                            <div class="cancel"></div>
                        </div>
                    </div>
                    <img src="img/5a3a540e634e59.16223150151377204640685054.png" class="shopping_picture" alt="example2">
                    <div class="shopping_bottom_panel">
                        <p>Тест</p>
                        <p>400 &#8372;</p>
                    </div>
                </div>

            </div><div id="shopping_items">
                <div class="shopping_piece js-item-campaign">
                    <div class="shopping_top_panel">
                        <div class="add_more_back">
                            <div class="add_more">1x</div>
                        </div>
                        <div class="cancel_back">
                            <div class="cancel"></div>
                        </div>
                    </div>
                    <img src="img/5a3a540e634e59.16223150151377204640685054.png" class="shopping_picture" alt="example2">
                    <div class="shopping_bottom_panel">
                        <p>Тест</p>
                        <p>400 &#8372;</p>
                    </div>
                </div>

            </div>
        </div>
        <div id="shopping_horizontal_line_down"></div>
        <div id="shopping_bottom_block">
            <h1>Загальна вартість: num &#8372</h1>
                    <div class="shopping_buttons">
                        <a href="main.html" class="shopping_catalog_and_buy_buttons">До товарів</a>
                        <a href="#" class="shopping_catalog_and_buy_buttons" style="background: #499F68">Замовити</a>
                    </div>
        </div>
        <!-- Vendor scripts -->
        <script src="libs/jquery/jquery-3.5.1.min.js"></script>
        <script src="libs/owlcarousel2/owl.carousel.min.js"></script>

        <!-- User scripts -->
        <script src="js/main.js"></script>
    </main>
@endsection
