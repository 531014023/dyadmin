<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2017/12/21
 * Time: 10:16
 */
namespace Home\Controller;
use Common\Controller\BaseController;
use Org\Wxpay\Wxpay;

class WxpayController extends BaseController
{
    protected $wx;
    public function __construct()
    {
        parent::__construct();
        $this->wx = new Wxpay();
    }

    /**
     * 微信回调
     */
    public function notify()
    {
        $verify_result = $this->wx->verifyNotify();
        if(isset($verify_result['result_code']) && $verify_result['result_code']=='SUCCESS') {
            $this->success($verify_result);
        }else {
            $this->error($verify_result);
        }
    }

    protected function success($verify_result)
    {
        //商户订单号
        $out_trade_no = $verify_result['out_trade_no'];
        //交易号
        $trade_no = $verify_result['transaction_id'];
        //支付金额
        $total_fee = $verify_result['total_fee'] / 100;
        //open_id
        $open_id = $verify_result['openid'];
        //业务逻辑

        //成功后调用
        if(true) {
            $this->wx->success();
        }else {
            //失败后调用
            $this->wx->error($verify_result);
        }
    }

    protected function error($verify_result)
    {
        //失败后业务处理

        //最后调用
        $this->wx->error($verify_result);
    }
}