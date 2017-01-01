<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_menus', function (Blueprint $table) {
            $table->increments('id');                                   //id
            $table->string('menu_name', 10)->default('');               //菜单名称
            $table->string('menu_url', 30)->default('');                //菜单 url
            $table->integer('parent_id')->unsigned()->default(0);       //上级菜单id
            $table->tinyInteger('level')->unsigned()->default(1);       //等级 默认为：1
            $table->tinyInteger('status')->unsigned()->default(1);      //状态 【1：开启；2：关闭】
            $table->smallInteger('sort')->unsigned()->default(65525);   //排序
            $table->string('icon', 10)->default('');                    // icon 图标
            $table->softDeletes();                                      //软删除时间
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
        Schema::drop('access_menus');
    }
}
