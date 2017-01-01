<?php

namespace Yangyifan\Administrator\Access\Model;

use Yangyifan\Model\RestfulModelHelper;
use Yangyifan\Model\QueryModelHelper;
use Yangyifan\Model\WhereModelHelper;
use Illuminate\Database\Eloquent\Model;

class AdminInfoRelationNodeModel extends Model
{
    use WhereModelHelper;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'access_admin_relation_node';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['admin_user_id', 'node_id'];

    /**
     * 获得指定管理者下面的节点
     *
     * @param $adminUserId
     * @return array
     */
    public static function getAdminNodes($adminUserId)
    {
        if ( $adminUserId > 0 ) {
            return static::multiwhere(['admin_user_id' => $adminUserId])->lists('node_id');
        }
        return collect([]);
    }
}
