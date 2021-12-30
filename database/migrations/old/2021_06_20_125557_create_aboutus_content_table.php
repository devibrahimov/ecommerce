<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutusContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutus_content', function (Blueprint $table) {

            $table->bigInteger('about_id');
            $table->string('lang',5);
            $table->string('header',250)->nullable();
            $table->text('content')->nullable();
            $table->string('meta_content',160)->nullable();
            $table->string('meta_keywords',800)->nullable();
            $table->bigInteger('show')->default(0);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aboutus_content');
    }
}
