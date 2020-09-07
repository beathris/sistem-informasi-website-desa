<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrationAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administration_area', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('dusun_name');
            $table->string('kasun_name');
            $table->integer('neighborhood_association'); //RT
            $table->integer('family'); //kk
            $table->integer('amount_of_people');
            $table->string('female');
            $table->string('male');
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
        Schema::dropIfExists('administration_area');
    }
}
