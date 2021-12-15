<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarouselContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousel_content', function (Blueprint $table) {

            $table->unsignedBigInteger('carousel_id');
            $table->string('lang');
            $table->string('title')->nullable();
            $table->string('content',500)->nullable();
            $table->text('url')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carousel_content');
    }
}
