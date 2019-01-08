<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('account_id', 30)->nullable();
            $table->string('brand_name', 140)->nullable();
            $table->string('phone_number', 13)->nullable();
            $table->string('address', 160)->nullable();
            $table->string('website_url', 300)->nullable();
            $table->string('caption', 2200)->nullable();
            $table->text('logo_path')->nullable();
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
        Schema::dropIfExists('brands');
    }
}
