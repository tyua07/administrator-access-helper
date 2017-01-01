<?php

namespace Yangyifan\Administrator\Access\Model;

use Yangyifan\Model\RestfulModelHelper;
use Yangyifan\Model\QueryModelHelper;

class NodesModel extends BaseModel
{
    use RestfulModelHelper;
    use QueryModelHelper;
    use CheckAccessModel;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'access_nodes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['node_name', 'status', 'parent_id', 'level'];

    /**
     * 获得列表显示字段
     *
     * @return array
     */
    public static function getListColumns()
    {
        return [
            ['title' => '节点名称', 'dataIndex' => 'node_name',],
            ['title' => '控制器名称', 'dataIndex' => 'controller_name',],
            ['title' => '方法名称', 'dataIndex' => 'method_name',],
            ['title' => '状态', 'dataIndex' => 'status',],
            ['title' => '操作', 'dataIndex' => 'handel',],
        ];
    }

    /**
     * 组合搜索条件
     *
     * @param array $request 请求数组
     * @return array
     */
    public static function getSearchMap(Array $request)
    {
        $map = [];

        if ( !empty($request['node_name']) ) {
            $map['node_name'] = ['LIKE', '%' . $request['node_name'] . '%'];
        }

        if ( !empty($request['controller_name']) ) {
            $map['controller_name'] = ['LIKE', '%' . $request['controller_name'] . '%'];
        }

        if ( !empty($request['method_name']) ) {
            $map['method_name'] = ['LIKE', '%' . $request['method_name'] . '%'];
        }

        if ( $request['status'] > 0 ) {
            $map['status'] = $request['status'];
        }

        return $map;
    }
}
