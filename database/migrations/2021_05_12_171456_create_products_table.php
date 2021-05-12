<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->string("productName");
            $table->string("sku")->nullable();
            $table->float("price");
            $table->float("openingStock");
            $table->integer("categoryId")->nullable();
            $table->integer("brandId")->nullable();
            $table->integer("taxId");
            $table->integer("productTypeId");
            $table->integer("primaryUnitId");
            $table->float("secondaryUnit")->nullable();
            $table->integer("secondaryUnitId")->nullable();
            $table->string("description")->nullable();
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
        Schema::dropIfExists('products');
    }
}
