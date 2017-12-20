<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2017/12/20
 * Time: 13:10
 */
namespace Admin\Model;
use Common\Model\BaseModel;

class AuthModel extends BaseModel
{
    Protected $autoCheckFields = false;
    public function authCheck($user_auth,$all_auth)
    {
        if(session(admin.".root") == 0) {
            if (!in_array(strtolower(ACTION_NAME), $user_auth)) {
                if (in_array(strtolower(ACTION_NAME), $all_auth)) {
                    $this->error = "您没有此权限!";
                    return false;
                }
            }
        }
        return true;
    }
}