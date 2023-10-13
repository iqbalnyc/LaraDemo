<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string('orderId');
            $table->string('userEmail');
            $table->string('product_id');
            $table->string('product_name');
            $table->string('product_image');
            $table->float('price');
            $table->float('quantity');
            $table->string('discountType');
            $table->string('orderStatus');
            $table->float('discountAmount');
            $table->float('total_amount');
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
        Schema::dropIfExists('order_details');
    }
};
