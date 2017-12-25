<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;

class IndexController extends AdminbaseController {
    public function index(){
        $this->assign("admin",session(admin));
        $_SERVER['SERVER_IP'] = gethostbyname($_SERVER['SERVER_NAME']);
        $this->assign("server",$_SERVER);
        $this->display("layer:base");
    }

    public function layer_index(){
        $this->assign("admin",session(admin));
        $_SERVER['SERVER_IP'] = gethostbyname($_SERVER['SERVER_NAME']);
        $this->assign("server",$_SERVER);
        $this->display("layer:index");
    }
    public function login(){
        $this->display("layer:login");
    }

    public function layer()
    {
//        $this->display();
        $this->display("layer:base");
    }

    public function test()
    {
    }
}