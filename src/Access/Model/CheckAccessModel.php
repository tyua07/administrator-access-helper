<?php

namespace Yangyifan\Administrator\Access\Model;

use Yangyifan\Exception\UnauthorizedException;
use Yangyifan\Library\UtilityLibrary;

trait CheckAccessModel
{
    /**
     * 获得全部节点 id 的数组
     *
     * @return mixed
     */
    private static function getAllNodeOfId()
    {
        return static::multiwhere(['level' => ['>=' => 3] ])->get(['id', 'controller_name', 'method_name', \DB::raw('CONCAT(controller_name,\'@\',method_name) AS action_name')]);
    }

    /**
     * 全局允许访问的的路由列表
     *
     * @var array
     */
    protected static $globalAllowRoutes = [];

    /**
     * 获取全局允许访问的路由列表
     *
     * @return array
     */
    public static function getGlobalAllowRoutes()
    {
        return static::$globalAllowRoutes;
    }

    /**
     * 获取全局允许访问的路由列表
     *
     * @param array $globalAllowRoutes 全局允许访问的路由列表
     */
    public static function setGlobalAllowRoutes(array $globalAllowRoutes)
    {
        static::$globalAllowRoutes = $globalAllowRoutes;
    }

    /**
     * 验证权限
     *
     * @author yangyifan <yangyifanphp@gmail.com>
     */
    public static function checkAccess($adminUserId)
    {
        $action             = UtilityLibrary::getRouteInfo();//获得当前路由
        $actionName         = implode('@', $action);//获得当前路由(拼接好的)
        $allUserNode        = AdminInfoRelationNodeModel::getAdminNodes($adminUserId);//当前用户对应的全部节点 id
        $allNode            = collect(static::getAllNodeOfId());// 当前应用全部的节点 id
        $allNode            = !empty($allNode) ? collect($allNode->toArray()) : [];// 当前应用全部的节点 id

        //如果当前控制器，不在 nodes 列表里面，则当前控制器允许全部人访问
        if ( $allNode->where('controller_name', $action['controller_name']) == false ) {
            return true;
        }

        //如果当前路由，不在 nodes 列表里面，则当前控制器允许全部人访问
        if ( $allNode->where('action_name', $actionName) == false ) {
            return true;
        }

        //判断当前路由是否在个人设置里面
        $allNode->map(function($item, $key) use($action, $allUserNode, $actionName) {

            $actionName = implode('@', $action);

            if ( $actionName == ltrim($item['action_name'], '\\')) {
                // 判断全局可访问的权限
                if (in_array($actionName, static::getGlobalAllowRoutes())) {
                    return true;
                }

                //判断当前的路由是否允许访问
                if ( $allUserNode->search($item['id']) === false ) {
                    throw new UnauthorizedException();
                }
            }
        });
        return true;
    }
}
