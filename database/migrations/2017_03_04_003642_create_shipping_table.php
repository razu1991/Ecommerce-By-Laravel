<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping', function (Blueprint $table) {
            $table->increments('id');
           $table->string('shipping_first_name');
            $table->string('shipping_last_name');
            $table->text('shipping_address');
            $table->string('shipping_city');
            $table->string('shipping_company');
            $table->string('shipping_country');
            $table->string('shipping_state');
            $table->string('shipping_postcode');
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
        Schema::dropIfExists('shipping');
    }
}
