<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2017/12/26
 * Time: 13:14
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;

class ConfigController extends AdminbaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getConfig()
    {
        $db = [
            "db_type"=>C("DB_TYPE"),
            "db_host"=>C("DB_HOST"),
            "db_name"=>C("DB_NAME"),
            "db_user"=>C("DB_USER"),
            "db_pwd"=>C("DB_PWD"),
            "db_port"=>C("DB_PORT"),
            "db_prefix"=>C("DB_PREFIX"),
        ];
        $admin = [
            "admin_name_long"=>C("admin_name_long"),
            "admin_name"=>C("admin_name"),
            "company"=>C("company"),
            "footer_text"=>C("footer_text"),
        ];
        $this->assign("db",$db);
        $this->assign("admin",$admin);
        $this->display("layer_config:getConfig");
    }

    public function setDb()
    {
        $map['DB_TYPE'] = I("DB_TYPE");
        $map['DB_HOST'] = I("DB_HOST");
        $map['DB_NAME'] = I("DB_NAME");
        $map['DB_USER'] = I("DB_USER");
        $map['DB_PWD'] = I("DB_PWD");
        $map['DB_PORT'] = I("DB_PORT");
        $map['DB_PREFIX'] = I("DB_PREFIX");
        $config = D("Config");
        $data = $config->setCheck($map);
        if($data === false){
            $this->getinfo(0,$config->getError());
        }
        $res = $config->runSet($data);
        if($res){
            $this->getinfo(1,"设置成功",$res);
        }
        $this->getinfo(0,$config->getError());
    }

    public function setAdmin()
    {
        $map['admin_name_long'] = I("admin_name_long");
        $map['admin_name'] = I("admin_name");
        $map['company'] = I("company");
        $map['footer_text'] = I("footer_text");
        $config = D("Config");
        $data = $config->setCheck($map,'admin');
        if($data === false){
            $this->getinfo(0,$config->getError());
        }
        $res = $config->runSet($data,'admin');
        if($res){
            $this->getinfo(1,"设置成功",$res);
        }
        $this->getinfo(0,$config->getError());
    }
}