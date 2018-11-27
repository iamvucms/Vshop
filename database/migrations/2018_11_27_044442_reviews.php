<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('reviews', function (Blueprint $table) {
        $table->integer('product_id');
           $table->increments('review_id');
           $table->integer('cus_id');
           $table->text('comment');
           $table->integer('stars');
           $table->timestamp('created_at');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reviews');
    }
}
