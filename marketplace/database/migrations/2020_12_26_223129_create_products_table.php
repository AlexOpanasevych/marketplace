<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('description');
            $table->double('price');
//            $table->float('discount_price');
            $table->string('photo_path');
//            $table->float('rating');
            $table->foreignId('seller_id');
            $table->foreignId('category_id');
            $table->timestamp('publication_date')->default(DB::raw('CURRENT_TIMESTAMP'));
//            $table->boolean('is_promoted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
