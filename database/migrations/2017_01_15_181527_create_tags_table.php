<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->timestamps();
        });

        Schema::create('article_tag', function (Blueprint $table) {
            $table->integer('article_id')->unsigned()->index();
            $table->foreign('article_id')->on('articles')->references('id');

            $table->integer('tag_id')->unsigned()->index();
            $table->foreign('tag_id')->on('tags')->references('id');
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
        Schema::table('article_tag', function(Blueprint $table){
            $table->dropForeign('article_tag_article_id_foreign');
            $table->dropForeign('article_tag_tag_id_foreign');
        });

        Schema::dropIfExists('tags');
        Schema::dropIfExists('article_tag');
    }
}
