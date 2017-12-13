<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2017/7/22
 * Time: 9:14
 */
namespace Think\Log\Driver;

class Db{
    protected $options;
    protected $handler;
    public function __construct($config=array())
    {
        if(empty($config)) {
            $config = array (
                'table'     =>  C('LOG_TABLE'),
            );
        }
        $this->options = $config;
        $this->handler =new \Think\Model;
    }

    public function write($log,$destination=''){
        if(IS_CLI){
            return;
        }
        $type = MODULE_NAME;
        $controller = CONTROLLER_NAME;
        $action = ACTION_NAME;
        if(session(uid)){
            $uid = session(uid);
        }else if(session(admin_id)){
            $uid = session(admin_id);
        }else{
            $uid = 0;
        }
        $user = "user_log_id=".session(uid)."\r\nuser_log_phone=".session(user.".username")."\r\n";
        $info = $_SERVER['REMOTE_ADDR'].' '.$_SERVER['REQUEST_URI']."\r\n";
        $log = $info.$user.$log;
        $log = json_encode($log,JSON_UNESCAPED_UNICODE);
        $action_type = I("type","desktop");
        $sql = "insert into ".$this->options['table']." (`model`,`controller`,`action`,`uid`,`log`,`action_type`) VALUES ('{$type}','{$controller}','{$action}',{$uid},{$log},'{$action_type}');";
        $this->handler->execute($sql);
    }
}