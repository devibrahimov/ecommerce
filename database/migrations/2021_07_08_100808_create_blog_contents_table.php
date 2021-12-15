<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_contents', function (Blueprint $table) {

            $table->string('lang');
            $table->unsignedBigInteger('blog_id');
            $table->string('name')->nullable();
            $table->longText('content')->nullable();
            $table->string('meta_content',160)->nullable();
            $table->string('meta_keywords',800)->nullable();
            $table->integer('show')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_contents');
    }
}
