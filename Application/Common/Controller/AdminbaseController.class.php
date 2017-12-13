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
            $all_auth = $menu->formatAuth();
            if(session(admin.".root") == 0) {
                $admin = D("Admin");
                $auth = $admin->get_auth();
                if ($auth) {
                    $this->auth = $auth;
                }else{
                    $this->error("您没有任何权限!");
                }
            }else{
                $this->auth = $all_auth;
            }
            $menus = $menu->menuShow($this->menu,$this->auth,$all_auth);
            $this->menu = $menus['menu'];
            if($this->menu === false){
                $this->error("您没有此权限!");
            }
            $this->assign("menu",$this->menu);
            $this->assign("title",$menus['title']);
        }
        $this->assign("admin_name_long",C("admin_name_long"));
        $this->assign("admin_name",C("admin_name"));
        $this->assign("company",C("company"));
    }
}