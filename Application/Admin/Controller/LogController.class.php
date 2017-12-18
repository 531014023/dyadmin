<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2017/8/1
 * Time: 15:57
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;

class LogController extends AdminbaseController
{
    private $log;
    public function __construct()
    {
        parent::__construct();
        $this->log = D("Log");
    }

    /**
     * 查询日志信息
     */
    public function Log(){
        return $this->display("layer_log:getLog");
    }

    /**
     *查询日志
     */
    public function getLog(){
        $where['model'] = I("model",'','ucfirst');
        $where['controller'] = I("controller",'','ucfirst');
        $where['action'] = I("action",'','ucfirst');
        $where['uid'] = I("uid");
        $where['log'] = ["like","%".I("log")."%"];
        $where['create_time'] = ['GT',I("create_time",'','formatTime')];
        foreach ($where as $k=>$v){
            if(empty($v)){
                unset($where[$k]);
            }
            if(is_array($v) && empty($v[1])){
                unset($where[$k]);
            }
        }
        if(empty(I("log"))){
            unset($where['log']);
        }
        $field = "uid,controller,model,action,log,create_time,action_type";
        $res = $this->log->log_list($where,$field);
        if($res) {
            $this->assign("list",$res['list']);
            $this->assign("show",$res['show']);
            $data = $this->fetch("zj:log_zj");
            return $this->getinfo(1,"查询成功",$data);
        }
        return $this->getinfo(0,"系统出错");
    }

    /**
     *查询日志
     */
    public function getLogList(){
        $where['model'] = I("model",'','ucfirst');
        $where['controller'] = I("controller",'','ucfirst');
        $where['action'] = I("action",'','ucfirst');
        $where['uid'] = I("uid");
        $where['log'] = ["like","%".I("log")."%"];
        $where['create_time'] = ['GT',I("create_time")];
        foreach ($where as $k=>$v){
            if(empty($v)){
                unset($where[$k]);
            }
            if(is_array($v) && empty($v[1])){
                unset($where[$k]);
            }
        }
        if(empty(I("log"))){
            unset($where['log']);
        }
        $field = "id,uid,controller,model,action,log,create_time,action_type";
        $res = $this->log->get_log_list($where,$field);
        if($res['data']) {
            $res['status'] = 1;
            return $this->ajaxReturn($res);
        }
        return $this->getinfo(0,"系统出错");
    }

    /**
     * 删除
     */
    public function delLog(){
        $where['model'] = I("model",'','ucfirst');
        $where['controller'] = I("controller",'','ucfirst');
        $where['action'] = I("action",'','ucfirst');
        $where['uid'] = I("uid");
        $where['log'] = ["like","%".I("log")."%"];
        $where['create_time'] = ['GT',I("create_time")];
        foreach ($where as $k=>$v){
            if(empty($v)){
                unset($where[$k]);
            }
            if(is_array($v) && empty($v[1])){
                unset($where[$k]);
            }
        }
        if(empty(I("log"))){
            unset($where['log']);
        }
        if(empty($where)){
            return $this->getinfo(0,"请选择一种条件删除!");
        }
        $res = $this->log->del_log($where);
        if($res){
            return $this->getinfo(1,"删除成功");
        }
        return $this->getinfo(0,"删除失败",$where);
    }

    /**
     * 修改土地等级
     */
    public function updateLevel(){
        $id = I("_id");
        $title = I("title");
        $con = I("con");
        $where['id'] = $id;
        $where[$title] = ["NEQ",$con];
        $data[$title] = $con;
        $res = $this->log->saveLevel($where,$data);
        if($res){
            return $this->getinfo(1,"修改成功");
        }
        return $this->getinfo(0,$this->log->getError());
    }
}