<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2017/12/13
 * Time: 15:53
 */
//根据uid查询admin用户username
function getAdminUser($uid){
    $data['id']=$uid;
    $res = D('Admin')->get_field($data,"username");
    if(!$res){
        return '无';
    }
    return $res;
}

define("admin_id","admin_id");//管理员session中去uid的key
define("admin","admin");//管理员session中去管理员用户数据的key