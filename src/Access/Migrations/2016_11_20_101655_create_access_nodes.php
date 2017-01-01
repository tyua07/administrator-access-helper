<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessNodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_nodes', function (Blueprint $table) {
            $table->increments('id');                                   // id
            $table->string('node_name', 10);                            // 节点名称
            $table->integer('parent_id')->unsigned()->default(0);       // 上级id
            $table->tinyInteger('level')->unsigned()->default(1);       //等级 默认为：1
            $table->string('controller_name', 100)->default('');         // 控制器（包含绝对的命名空间）
            $table->string('method_name', 20)->default('');             // 控制器的方法
            $table->tinyInteger('status')->unsigned()->default(1);      // 状态【1：开启；2：关闭】
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
        Schema::drop('access_nodes');
    }
}
