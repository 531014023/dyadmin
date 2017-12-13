<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2017/7/20
 * Time: 14:30
 */
namespace Admin\Model;
use Common\Model\BaseModel;

class AdminModel extends BaseModel
{
    /**
     * 查询后台账号
     * @param $where
     * @return mixed
     */
    public function get_admin($where)
    {
        return $this->where($where)->select();
    }

    public function update_admin($data,$where=array()){
        $res = $this->update_data($data,$where);
        if($res){
            foreach ($data as $k=>$v)
            {
                session(admin.".{$k}",$v);
            }
        }
        return $res;
    }

    /**
     * 获取后台用户的权限
     * @param null $admin_id
     * @return array|mixed
     */
    public function get_auth($admin_id=null)
    {
        if($admin_id){
            $auth = $this->get_field(["id"=>$admin_id],"auth");
        }else {
            $auth = session(admin.".auth");
        }
        if($auth) {
            $auth = explode(",", $auth);
            $auth = array_to_lower($auth);
        }else{
            $auth = [];
        }
        return $auth;
    }
}