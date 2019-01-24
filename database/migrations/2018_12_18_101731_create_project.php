<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name', '50');
            $table->smallInteger('brand_id')->unsigned();
            $table->mediumInteger('product_id')->unsigned()->nullable();
            $table->string('caption', '2200')->nullable();
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
        Schema::dropifExists('projects');
    }
}
