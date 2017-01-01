<?php

namespace Yangyifan\Administrator\Access\Model;

use Yangyifan\Model\RestfulModelHelper;
use Yangyifan\Model\QueryModelHelper;
use Yangyifan\Model\WhereModelHelper;

class AdminInfoModel extends BaseModel
{
    use RestfulModelHelper;
    use QueryModelHelper;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admin_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_name', 'status', 'password', 'mobile', 'email', 'avatar', 'login_number', 'last_login_ip'];

    /**
     * 获得列表显示字段
     *
     * @return array
     */
    public static function getListColumns()
    {
        return [
            ['title' => '用户名', 'dataIndex' => 'user_name',],
            ['title' => '手机号码', 'dataIndex' => 'mobile',],
            ['title' => '邮箱', 'dataIndex' => 'email',],
            ['title' => '头像', 'dataIndex' => 'avatar',],
            ['title' => '登录次数', 'dataIndex' => 'login_number',],
            ['title' => '最后登录ip', 'dataIndex' => 'last_login_ip',],
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

        if ( !empty($request['user_name']) ) {
            $map['user_name'] = ['LIKE', '%' . $request['user_name'] . '%'];
        }

        if ( !empty($request['mobile']) ) {
            $map['mobile'] = ['LIKE', '%' . $request['mobile'] . '%'];
        }

        if ( !empty($request['email']) ) {
            $map['email'] = ['LIKE', '%' . $request['email'] . '%'];
        }

        if ( $request['status'] > 0 ) {
            $map['status'] = $request['status'];
        }

        return $map;
    }
}
