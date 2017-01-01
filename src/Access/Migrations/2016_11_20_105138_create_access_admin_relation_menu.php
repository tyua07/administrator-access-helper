<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessAdminRelationMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_admin_relation_menu', function (Blueprint $table) {
            $table->integer('admin_user_id')->unsigned();                           //管理者 id
            $table->integer('menu_id')->unsigned();                                 //菜单 id
            $table->foreign('admin_user_id')->references('id')->on('admin_info');   //管理者 id 外键索引
            $table->foreign('menu_id')->references('id')->on('access_menus');       //菜单 id 外键索引
            $table->unique(['admin_user_id', 'menu_id']);                           //创建联合索引
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('access_admin_relation_menu');
    }
}
