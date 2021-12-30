<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_content', function (Blueprint $table) {

            $table->unsignedBigInteger('service_id');
            $table->string('lang')->nullable();
            $table->string('name')->nullable();
            $table->longText('content')->nullable();
            $table->string('meta_content',160)->nullable();
            $table->string('meta_keywords',800)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_content');
    }
}
