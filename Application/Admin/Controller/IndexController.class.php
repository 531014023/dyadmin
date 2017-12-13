<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;

class IndexController extends AdminbaseController {
    public function index(){
        $this->assign("admin",session(admin));
        $_SERVER['SERVER_IP'] = gethostbyname($_SERVER['SERVER_NAME']);
        $this->assign("server",$_SERVER);
        $this->display();
    }
    public function login(){
        $this->display();
    }
}