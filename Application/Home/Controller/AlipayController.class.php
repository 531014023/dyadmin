<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2017/12/21
 * Time: 12:37
 */
namespace Home\Controller;
use Common\Controller\BaseController;
use Org\Alipay\Alipay;
use Org\Alipay\Alitrans;

class AlipayController extends BaseController
{
    protected $alipay;
    protected $alitrans;

    public function __construct()
    {
        parent::__construct();
        $this->alipay = new Alipay();
        $this->alitrans = new Alitrans();
    }

    public function notify()
    {
        $data = $_POST;
        $bool = $this->alipay->notifyCheck($data);
        if($bool){
            //成功逻辑

            //成功后调用
            $this->alipay->success();
        }
        //失败调用
        $this->alipay->error();
    }
}