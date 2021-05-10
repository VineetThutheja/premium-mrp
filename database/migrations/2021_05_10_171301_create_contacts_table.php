<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string("buisnessName");
            $table->string("prefix")->nullable();
            $table->string("firstName");
            $table->string("lastName")->nullable();
            $table->string("mobileNumber");
            $table->string("alternateNumber")->nullable();
            $table->string("contactType");
            $table->string("email")->nullable();
            $table->string("taxNumber")->nullable();
            $table->string("openingBalance")->nullable();
            $table->string("addressLine1")->nullable();
            $table->string("addressLine2")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("country")->nullable();
            $table->string("zipcode")->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
