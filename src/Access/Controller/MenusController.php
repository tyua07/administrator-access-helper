<?php

namespace Yangyifan\Administrator\Access\Controller;

use Yangyifan\Administrator\Access\Model\MenusModel;
use Yangyifan\Controller\BaseController;
use Yangyifan\Controller\RestfulController;

class MenusController extends BaseController
{
    use RestfulController;

    /**
     * 构造方法
     *
     * @author @author yangyifan <yangyifanphp@gmail.com>
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 获得当前模型
     *
     * @return MenusModel
     */
    public function getModel()
    {
        return new MenusModel();
    }
}
