<?php

use Illuminate\Database\Seeder;
// 文章模型
use App\Models\Article;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 清空数据表
        Article::truncate();
        // 添加模拟数据
        factory(Article::class,20)->create();
    }
}
