<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessAdminRelationNode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_admin_relation_node', function (Blueprint $table) {
            $table->integer('admin_user_id')->unsigned();                           //管理者 id
            $table->integer('node_id')->unsigned();                                 //节点 id
            $table->foreign('admin_user_id')->references('id')->on('admin_info');   //管理者 id 外键索引
            $table->foreign('node_id')->references('id')->on('access_nodes');       //节点 id 外键索引
            $table->unique(['admin_user_id', 'node_id']);                           //创建联合索引
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('access_admin_relation_node');
    }
}
