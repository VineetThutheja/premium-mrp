<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("referenceNo");
            $table->string("orderDate");
            $table->string("quotationNo");
            $table->integer("contactId");
            $table->integer("branchId")->nullable();
            $table->float("subtotal")->default(0.00);
            $table->float("totalTax")->default(0.00);
            $table->float("total")->default(0.00);
            $table->string("discountType")->nullable();
            $table->float("discount")->nullable();
            $table->float("discountAmount")->nullable();
            $table->integer("purchaseTaxId")->nullable();
            $table->float("purchaseTax")->default(0.00);
            $table->string("shippingDetails")->nullable();
            $table->float("shippingCharges")->default(0.00);
            $table->float("purchaseTotal")->default(0.00);
            $table->string("additionalDetails")->nullable();
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
        Schema::dropIfExists('orders');
    }
}
