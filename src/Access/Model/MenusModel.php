<?php

namespace Yangyifan\Administrator\Access\Model;

use Yangyifan\Library\UtilityLibrary;
use Yangyifan\Model\RestfulModelHelper;
use Yangyifan\Model\QueryModelHelper;

class MenusModel extends BaseModel
{
    use RestfulModelHelper;
    use QueryModelHelper;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'access_menus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['menu_name', 'menu_url', 'status', 'parent_id', 'level', 'sort', 'icon'];

    /**
     * 获得列表显示字段
     *
     * @return array
     */
    public static function getListColumns()
    {
        return [
            ['title' => '菜单名称', 'dataIndex' => 'menu_name',],
            ['title' => '菜单 url', 'dataIndex' => 'menu_url',],
            ['title' => '状态', 'dataIndex' => 'status',],
            ['title' => '等级', 'dataIndex' => 'level',],
            ['title' => '排序', 'dataIndex' => 'sort',],
            ['title' => 'icon', 'dataIndex' => 'icon',],
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

        if ( !empty($request['menu_name']) ) {
            $map['menu_name'] = ['LIKE', '%' . $request['menu_name'] . '%'];
        }

        if ( $request['status'] > 0 ) {
            $map['status'] = $request['status'];
        }

        return $map;
    }

    /**
     * 获得当前用户对应的 menu 数组
     *
     * @param $adminId
     * @return \Illuminate\Support\Collection
     */
    public static function getAdminMenus($adminId)
    {
        if ( $adminId > 0 ) {

            $menuIdArr = AdminInfoRelationMenuModel::getAdminMenus($adminId);

            if ( UtilityLibrary::isArray($menuIdArr) ) {
                return static::multiwhere(['id' => ['in' => $menuIdArr], 'status' => 1 ])
                    ->select(['id', 'menu_name', 'menu_url', 'parent_id', 'level'])
                    ->orderBy('sort', 'ASC')
                    ->get();
            }
        }
        return collect([]);
    }
}
