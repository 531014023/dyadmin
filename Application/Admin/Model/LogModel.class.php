<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2017/8/6
 * Time: 20:01
 */
namespace Admin\Model;
use Think\Model;

class LogModel extends Model
{
    /**
     * @return mixed
     */
    public function log_list($where=array('model'=>'Home'),$field='*'){
        $p = I("p",1);
        $pageCount = I("page",PAGECOUNT);
        $count = $this->cache(600)->where($where)->count();
        $page = new \Think\Page($count,$pageCount);
        $show = $page->show();
        $res = $this->field($field)->where($where)->page($p,$pageCount)->order("id desc")->select();
        foreach ($res as $k=>$v){
            $res[$k]['log'] = str_replace("\n",'<br/>',$v['log']);
        }
        return array("list"=>$res,'show'=>$show);
    }

    /**
     * @param $where
     * @return mixed
     */
    public function del_log($where)
    {
        return $this->where($where)->delete();
    }
}