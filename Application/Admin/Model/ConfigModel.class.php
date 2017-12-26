<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2017/12/26
 * Time: 13:13
 */
namespace Admin\Model;
use Common\Model\BaseModel;
use Think\Exception;

class ConfigModel extends BaseModel
{
    public function setCheck($map,$type='db')
    {
        foreach ($map as $k=>$v){
            if(empty($v)){
                unset($map[$k]);
            }
        }
        if(empty($map)){
            $this->error = "参数不能为空!";
            return false;
        }
        $result = $this->where(['type'=>$type])->select();
        if(!empty($result)) {
            $update = false;
            foreach ($map as $k => $v) {
                $isset = false;
                foreach ($result as $key=>$val){
                    if($val['key'] == $k && $val['value'] != $v){
                        $result[$key]['value'] = $v;
                        $update = true;
                        $isset = true;
                    }
                    if($val['key'] == $k && $val['value'] == $v) {
                        unset($result[$key]);
                        $isset = true;
                    }
                }
                //新增的字段
                if($isset === false){
                    $arr['key'] = $k;
                    $arr['value'] = $v;
                    $arr['type'] = $type;
                    array_push($result,$arr);
                    $update = true;
                }
            }
            if($update === false){
                $this->error = "没有更新任何数据!";
                return false;
            }
            return $result;
        }else{
            $arr = [];
            foreach ($map as $k=>$v){
                $data['key'] = $k;
                $data['value'] = $v;
                $data['type'] = $type;
                array_push($arr,$data);
            }
            return $arr;
        }
    }

    public function runSet($data,$type='db',$where=[])
    {
        $result = $this->where(['type'=>$type])->select();
        if(empty($result)){
            return $this->add_data($data);
        }else{
            $this->startTrans();
            try {
                $res = false;
                foreach ($data as $k => $v) {
                    $update = false;
                    foreach ($result as $key=>$val){
                        if($v['id'] == $val['id']){
                            $res = $this->update_data($v, $where);
                            $update = true;
                            if(!$res){
                                E($this->getError());
                            }
                        }
                    }
                    //新增了一个字段
                    if($update === false){
                        $res = $this->add_data($v);
                        if(!$res){
                            E($this->getError());
                        }
                    }
                }
                $this->commit();
                return $res;
            }catch (Exception $e){
                $this->rollback();
                $this->error = $e->getMessage();
                return false;
            }
        }
    }
}