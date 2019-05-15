<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('a_name')->nullable();
            $table->string('a_slug')->index();
            $table->integer('a_author_id')->default(0)->index();
            $table->tinyInteger('a_active')->default(1)->index();
            $table->tinyInteger('a_hot')->default(0);
            $table->integer('a_view')->default(0);
            $table->string('a_description')->nullable();
            $table->string('a_avatar')->nullable();
            $table->string('a_description_seo')->nullable();
            $table->string('a_keyword_seo')->nullable();
            $table->string('a_title_seo')->nullable();
            $table->longText('a_content')->nullable();
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
        Schema::dropIfExists('article');
    }
}
