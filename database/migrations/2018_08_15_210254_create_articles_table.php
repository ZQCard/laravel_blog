<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author', 20);
            $table->integer('category_id')->index();
            $table->string('poster', 150);
            $table->string('title', 50);
            $table->string('keywords', 60);
            $table->string('excerpt');
            $table->integer('visit_count')->default(0);
            $table->integer('comment_count')->default(0);
            $table->integer('praise_count')->default(0);
            $table->integer('score')->default(0);
            $table->text('content');
            $table->softDeletes();
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
        Schema::dropIfExists('articles');
    }
}
