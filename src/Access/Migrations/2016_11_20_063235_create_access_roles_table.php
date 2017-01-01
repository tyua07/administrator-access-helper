<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_roles', function (Blueprint $table) {
            $table->increments('id');                               //id
            $table->string('role_name', 10)->default('');           //角色名称
            $table->integer('parent_id')->unsigned()->default(0);   //上级角色id
            $table->tinyInteger('level')->unsigned()->default(1);   //等级 默认为：1
            $table->tinyInteger('status')->unsigned()->default(1);  //状态 【1：开启；2：关闭】
            $table->softDeletes();                                  //软删除时间
            $table->timestamps();
            $table->unique('role_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('access_roles');
    }
}
