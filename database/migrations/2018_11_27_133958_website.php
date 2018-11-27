<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Website extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop_name');
            $table->string('contact_mail');
            $table->string('contact_phone');
            $table->string('shop_address');
            $table->string('shop_facebook');
            $table->string('shop_instagram');
            $table->string('shop_printerest');
            $table->string('shop_twitter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('website');
    }
}
