<?php

namespace Yangyifan\Administrator\Access\Controller;

use Yangyifan\Controller\BaseController;
use Yangyifan\Administrator\Access\Model\NodesModel;
use Yangyifan\Controller\RestfulController;

class NodesController extends BaseController
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
     * @return NodesModel
     */
    public function getModel()
    {
        return new NodesModel();
    }
}
