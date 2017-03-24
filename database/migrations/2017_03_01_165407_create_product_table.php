<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('product_qty');
            $table->integer('reorder_level');
            $table->string('product_title');
            $table->string('manufacturer_name');
            $table->string('author_name');
            $table->integer('product_price');
            $table->string('image');
            $table->text('product_short_description');
            $table->text('product_long_description');
            $table->tinyinteger('publication_status');
            $table->tinyinteger('featured_product');
            $table->integer('hit_count');
            $table->integer('sale_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
