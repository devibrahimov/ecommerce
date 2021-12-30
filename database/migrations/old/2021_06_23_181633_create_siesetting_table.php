<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiesettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitesetting', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('site_url')->nullable();
            $table->string('title')->nullable();
            $table->string('meta_content',180)->nullable();
            $table->string('meta_keywords',800)->nullable();
            $table->text('any_meta_tags')->nullable();
            $table->text('g_analytcs_script')->nullable();
            $table->text('whatsapp_script')->nullable();
            $table->text('chat_script')->nullable();
            $table->json('social')->nullable();
            $table->timestamps() ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sitesetting');
    }
}
