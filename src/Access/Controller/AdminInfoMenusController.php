<?php

namespace Yangyifan\Administrator\Access\Controller;

use Yangyifan\Administrator\Access\Model\MenusModel;
use Yangyifan\Controller\BaseController;
use Yangyifan\Response\CodeHelp;
use Yangyifan\Response\ResponseHelper;

class AdminInfoMenusController extends BaseController
{
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
     * @return MenusModel
     */
    public function getModel()
    {
        return new MenusModel();
    }

    /**
     * 显示指定数据信息
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = $id > 0  ? $this->getModel()->getAdminMenus($id) : false;
        return $data
            ? (new ResponseHelper(CodeHelp::SUCCESS, '获得数据成功', $data))->json()
            : (new ResponseHelper(CodeHelp::FATAL_ERROR, '获得数据失败'))->json();
    }

}
