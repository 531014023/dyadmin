<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function set()
    {
        phpinfo();
    }

    public function get()
    {
       echo session("admin");
    }

    public function test()
    {
        $private_key = 'D:\qq浏览器下载\openssl-1.1.0g\openssl-1.1.0g\rsa_private_key.pem';
        $public_key = 'D:\qq浏览器下载\openssl-1.1.0g\openssl-1.1.0g\rsa_public_key.pem';
        $rsa = new \Org\Util\RSA($public_key,$private_key);
        $data = "123456";
        $ex = $rsa->encrypt($data);
        $ret_d = $rsa->decrypt($ex);
        print_r($data);
        print_r("\r\n");
        print_r($ex);
        print_r("\r\n");
        print_r($ret_d);
    }
}


