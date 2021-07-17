<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
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
            $table->integer("orderId");
            $table->integer("productId");
            $table->string("description")->nullable();
            $table->float("quantity")->default(0.00);
            $table->integer("primaryUnitId")->nullable();
            $table->float("secondaryQuantity")->default(0.00);
            $table->integer("secondaryUnitId")->nullable();
            $table->float("price")->default(0.00);
            $table->float("discount")->default(0.00);
            $table->integer("taxId")->nullable();
            $table->float("subtotalBeforeTax")->default(0.00);
            $table->float("totalTax")->default(0.00);
            $table->float("lineTotal")->default(0.00);
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
}
