<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2017/9/12
 * Time: 15:23
 */
namespace Common\Model;
use Think\Model\RelationModel;
//引入消息推送文件
/*require_once './GatewayClient/Gateway.php';
use GatewayClient\Gateway;*/
class BaseModel extends RelationModel
{

    /**
     * 长连接在线通知
     * @param $uid
     * @param $arr
     * @return bool
     */
    /*protected function onlineNotice($uid, $arr,$callback=null){
        if(Gateway::isUidOnline($uid)){
            \Think\Log::record("cash:".$arr['num'],"DEBUG");
            Gateway::sendToUid($uid,json_encode($arr));
            return true;
        }
        if($callback) {
            call_user_func($callback,$uid,$arr);
        }
        return false;
    }*/

    /**
     * 添加数据
     * @param $data
     * @return bool|mixed|string
     */
    public function add_data($data)
    {
        if(isset($data[0]) && is_array($data[0]))
        {
            $res = $this->addAll($data);
        }else{
            $res = $this->add($data);
        }
        if(!$res)
        {
            $this->error = "添加数据失败";
        }
        return $res;
    }

    /**
     * 查询数据
     * @param $select
     * @param array $where
     * @param string $field
     * @param bool $field_bol
     * @return mixed
     */
    public function get_data($select, $where=array(),$pinkId=array(), $field='*', $field_bol=false)
    {
        return $this->field($field,$field_bol)->where($where)->$select($pinkId);
    }

    /**
     * @param array $where
     * @param string $field
     * @param bool $bool
     * @return mixed
     */
    public function get_field($where=array(), $field='*', $bool = false)
    {
        return $this->where($where)->getField($field,$bool);
    }

    /**
     * 更新数据
     * @param $where
     * @param $save
     * @return bool
     */
    public function update_data($save, $where=array())
    {
        if(empty($where)){
            $res = $this->save($save);
        }else {
            $res = $this->where($where)->save($save);
        }
        if(!$res)
        {
            $this->error = "更新数据失败";
        }
        return $res;
    }

    /**
     * 删除数据
     * @param array $where
     * @param null $del_id
     * @return bool|mixed
     */
    public function del_data($where=array(), $del_id=null)
    {
        if(empty($where) && $del_id)
        {
            $res = $this->delete($del_id);
        }else if($where && !$del_id){
            $res = $this->where($where)->delete();
        }else{
            $this->error = "参数错误";
            return false;
        }
        if(!$res)
        {
            $this->error = "删除数据失败";
        }
        return $res;
    }
}