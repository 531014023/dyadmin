<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2017/7/20
 * Time: 13:52
 */
namespace Common\Controller;
use Common\Controller\BaseController;
//引入消息推送文件
/*require_once './GatewayClient/Gateway.php';
use GatewayClient\Gateway;*/
class AdminbaseController extends BaseController
{
    protected $auth = [];
    protected $all_auth = [];

    protected $menu = [];

    public function __construct()
    {
        parent::__construct();
//        Gateway::$registerAddress = REGISTERIP;
        session_start();
        if(session(admin_id) && ACTION_NAME == 'login'){
            $this->redirect('admin/index/index');
        }else if(!session(admin_id) && ACTION_NAME != 'login'){
            $this->redirect('admin/index/login');
        }
        if(ACTION_NAME != "login" && session(admin_id)){
            $menu = D("Menu");
            $this->menu = $menu->formatMenu();
            $this->all_auth = $menu->formatAuth();
            if(session(admin.".root") == 0) {
                $admin = D("Admin");
                $auth = $admin->get_auth();
                if ($auth) {
                    $this->auth = $auth;
                }else{
                    $this->error("您没有任何权限!");
                }
            }else{
                $this->auth = $this->all_auth;
            }
            $this->menu = $menu->menuShow($this->menu,$this->auth);
            $title = $menu->titleShow($this->menu);
            $this->assign("menu",$this->menu);
            $this->assign("title",$title);
            $auth = D("Auth");
            $result = $auth->authCheck($this->auth,$this->all_auth);
            if(!$result){
                $this->error("您没有此权限!");
            }
        }
        $this->assign("admin_name_long",C("admin_name_long"));
        $this->assign("admin_name",C("admin_name"));
        $this->assign("company",C("company"));
    }

    public function _empty()
    {
        $this->error("不存在此方法,请先添加此方法后再试!");
    }
}