<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 后台用户表
         */
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',100)->comment('账号');
            $table->string('truename',50)->default('未知')->comment('真实姓名');
            $table->string('password',255)->comment('密码');
            //  nullbale 可以为null
            $table->string('email',50)->default('')->comment('邮箱');
            $table->string('phone',50)->default('')->comment('手机号码');
            $table->enum('sex',['男','女'])->default('男')->comment('性别');
            $table->char('last_ip',15)->default('')->comment('登录IP');
            $table->timestamps();
            $table->string('remember_token',255)->default('')->comment('记住token');
            // 软删除 生成字段 deleted_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
