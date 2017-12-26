<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2017/12/25
 * Time: 13:49
 */
return array(

    //==============================session设置========================================
//    'SESSION_TYPE' => 'redis',
    //session保存类型
    'SESSION_PREFIX' => 'sess:', //session前缀
    'SESSION_REDIS_HOST'=>'127.0.0.1',
    'SESSION_REDIS_POST'=>"6379",
    'SESSION_REDIS_EXPIRE'=>600,
);