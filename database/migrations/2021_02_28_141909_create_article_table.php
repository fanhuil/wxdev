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
            $table->increments('id')->comment('自增主键');
            $table->string('title')->comment('文章标题');
            $table->string('author')->comment('文章作者');
            $table->string('seo_title')->comment('SEO优化标题');
            $table->string('seo_keyword')->comment('SEO优化关键词');
            $table->string('seo_description')->comment('SEO优化标题');
            $table->text('content')->comment('文章内容');
            $table->integer('is_hot')->default(0)->comment('是否推荐上首页');
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
