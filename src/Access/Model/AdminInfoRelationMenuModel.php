<?php

namespace Yangyifan\Administrator\Access\Model;

use Yangyifan\Model\RestfulModelHelper;
use Yangyifan\Model\QueryModelHelper;
use Yangyifan\Model\WhereModelHelper;
use Illuminate\Database\Eloquent\Model;

class AdminInfoRelationMenuModel extends Model
{

    use WhereModelHelper;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'access_admin_relation_menu';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['admin_user_id', 'menu_id'];

    /**
     * 获得指定管理者下面的菜单
     *
     * @param $adminUserId
     * @return array
     */
    public static function getAdminMenus($adminUserId)
    {
        if ( $adminUserId > 0 ) {
            return static::multiwhere(['admin_user_id' => $adminUserId])->lists('menu_id');
        }
        return [];
    }
}
