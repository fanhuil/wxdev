<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 调用生成管理员数据表
         $this->call(UserSeeder::class);
         // 调用生成文章表
         $this->call(ArticleSeeder::class);
         // laravel-admin种子文件生成
        $this->call(Encore\Admin\Auth\Database\AdminTablesSeeder::class);
    }
}
