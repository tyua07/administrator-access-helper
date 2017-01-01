<?php

namespace Yangyifan\Administrator\Access\Controller;

use Yangyifan\Controller\BaseController;
use Yangyifan\Administrator\Access\Model\AdminInfoModel;
use Yangyifan\Controller\RestfulController;

class AdminInfoController extends BaseController
{
    use RestfulController;

    /**
     * 构造方法
     *
     * @description 方法说明
     * @author @author yangyifan <yangyifanphp@gmail.com>
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 获得当前模型
     *
     * @return AdminInfoModel
     */
    public function getModel()
    {
        return new AdminInfoModel();
    }
}
