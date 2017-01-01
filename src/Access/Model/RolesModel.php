<?php

namespace Yangyifan\Administrator\Access\Model;

use Yangyifan\Model\RestfulModelHelper;
use Yangyifan\Model\QueryModelHelper;
use Yangyifan\Model\WhereModelHelper;

class RolesModel extends BaseModel
{
    use RestfulModelHelper;
    use QueryModelHelper;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'access_roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role_name', 'status', 'parent_id', 'level'];

    /**
     * 获得列表显示字段
     *
     * @return array
     */
    public static function getListColumns()
    {
        return [
            ['title' => '角色名称', 'dataIndex' => 'role_name',],
            ['title' => '状态', 'dataIndex' => 'status',],
            ['title' => '等级', 'dataIndex' => 'level',],
            ['title' => '操作', 'dataIndex' => 'handel',],
        ];
    }

    /**
     * 组合搜索条件
     *
     * @param Array $request
     * @return array
     */
    public static function getSearchMap(Array $request)
    {
        $map = [];

        if ( !empty($request['role_name']) ) {
            $map['role_name'] = ['LIKE', '%' . $request['role_name'] . '%'];
        }

        if ( $request['status'] > 0 ) {
            $map['status'] = $request['status'];
        }

        return $map;
    }
}
