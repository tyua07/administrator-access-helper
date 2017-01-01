<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_info', function (Blueprint $table) {
            $table->increments('id')->unsigned();                           //主键id
            $table->string('user_name')->unique();                          //用户名
            $table->char('password', 60);                                   //密码
            $table->char('mobile', 11)->unique();                           //手机号码
            $table->string('email', 30)->unique();                          //邮箱
            $table->string('avatar', 255);                                  //头像
            $table->integer('login_number')->unsigned()->default(1);        //登录次数
            $table->integer('last_login_ip')->unsigned()->default(1);       //最后登录ip
            $table->tinyInteger('status')->unsigned()->default(1);          //状态【1：开启；2：关闭】
            $table->string('qq_open_id', 45)->default('');                  //qq open_id
            $table->string('wechat_open_id', 45)->default('');              //wechat open_id
            $table->softDeletes();                                          //软删除时间
            $table->timestamps();                                           //时间戳
            $table->index(['user_name', 'mobile', 'email']);                //创建联合索引
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin_info');
    }
}
