<?php  
    namespace Org\Alipay;
    use Org\Alipay\AopClient;
    class Alipay{
        public $alipay_config = array(  
          //appid
           'appid' =>'2017111009837298',
            //商户密钥
           'rsaPrivateKey' =>'MIIEowIBAAKCAQEAySTB8td2Rws+0uETJfNvI5u9feWaRPYrSZXA1r2ntOT6GH3HOHNiQYV0y7j2XQaBgbab1y+fT2hmyA7mlI50K3L6ImxFxbjx88HM0Vp90M7ol9jdGzgZKjCVyjkEgC35hxQpQCdE+ciIZJrE/iiFCRqIWcDy7Q/w2/NlINzcKB8tpPahyrM7ChU4rcrTnrU/elHtXpQ4LvYA1iYlIphmEn1hSKhr7ti8aCNDYj3SRuPbdlt/6G9dVAW3vh8h5ZNB/XkFqOWkXj0RHz2dpGZcVjv+BdG7QTPyS2YNMeunet4t0OuFVwtWEEk+1/bQY/5/intCzWf4QWbcEn8V7+mpFQIDAQABAoIBAH64MZgUNee8JfAk7DNUkggU7eSK6g3YKJ1LQxoGkcldGFKlqwTdbGFq+pH+DPe+SYi2yqde0TbtxxLykEG3HWjiHsPhAnP2eDfhOHAMWodaUx6W+XVUekYiJbwo/7ThQfrfsL1CACp9M7Bt8P1N+cIqfQxOirze9hcb1/JEMk7zd5MADVuRkYge3F8nBNyHSU/I3nuM2GxOrlYkCwCK0GLLOL9p7hxYaB0H1tPCxnnyC3I2H4tPaCmY8xRGwU74otUOuvrrBdwFt8asD1t2T6iRNI6I4M/Bn2Vn+YthER46FczWs685rQ1pGEdwjDg00JG7uT8dMIsKUCqceS1m92ECgYEA5h8nACVpi555JcSzLFqFOIDPRUrtwYxE7BUsDws5UoglWLcucWaLJ0MR96gkKeRaN7SfR4K7iMu2kZCGCqSDNEMHL9xF0ZVEKoQVcTas3klwMvEOHIZWDJvklp2oCqXV5GS0wzWZtt4C3me0YLXWCIUPsR7onF4B0me5rXr64McCgYEA38Ne1RxkCtPsAXZwd5N6DEm0Xom73gAmIJQ4bg7nIYsQyCrhnT2C4MFdwmdzuPj6zMB8RXvIPrnOTTuTGpd1bjhTrSoWngN7O78xwlTJ8O/fThVsxQT1UKKc5mmjnaFTjxJa9xHV17Ma1vxh3Jp1l6s3ODruxNipqwtE9oHtg0MCgYEA5c8me5bhGHViNr2A0UJ02ECKvYBef3M9QSbDoSJsVGdyJG6LCuSFAuiQAOsBcnSBRDA1AI0mCy6lXCkgM3CnNoHZo4ouj2apdGwDndQkPrjIO5dPqFzfgigM1/0J29hRCo0nl+rnXx/HbaPTFuGApXF8gj2DvuSCnUTIwN6Xu/ECgYBhH43j9mS+Bmoj4GLEpDCPcNZnSmVO4MWr0moD61gLSS9JksNG2tIZ+BRYM0sZeIhzowDNsAKkp0WSZE9fdWo1IyG+wcv7Xgt5TW2tqdvVRmioncgOZC6Oh2aO5D9uRf3c1dzB7O3iqAz4T6eydyCfamOXdoz4yAotAcE3NgH/vQKBgEmEKFS3bUccklGuZ2sbEsucWTdnGHYr0ZhmDj3CHGKuGzoQNFv391cncueqso49PumLySTfsrXx8uwfugqacjDxVeEiACvLk0FDveHaXBAyYg3EVtWA06CVGppw6MtpKH9xSIQt4xT4HXLBMrpdkd/gJWg2fcuMYFNBaDn/3GFN',//私钥
           //支付宝公钥
            'alipayrsaPublicKey'=>'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAhUU6BsKChP9uGAScQjq5YOjhqFBptv1wZlWQKG13abk6Q/IX3eXnIt2POCac9xIvhZT2SVtym9HrlS3y9YhqvC0rfQl8AA6QWuGcDpqF7zH7NwkdhG6rlTJ58J+R+sxHEB7RUxh7Xf0K8UgHIAgKu5gOIEEN0cIfXeD1r1/kMF2Ht5+A8QDWJgVSuak6nUKHz8V9rOr2RRzn+LjqvlMwmnJkNi+4j1629XWV42PZ8L+8W/ZcbqMlQEihxb/sKVR1xpjcDcdHTmRI8w1MUmvJquGYeOdm6KS7MrShZkzn5xZD52F3MrcBOYwWZp1V9QNpicRMvgRmLHG857Q3qiPXPQIDAQAB',//公钥(自己的程序里面用不到)
           'partner'=>'2088421540577515',//(商家的参数,新版本的好像用不到)
           'input_charset'=> 'utf-8',//编码
           'notify_url' =>'https://wy.zetaluoxin.cn/home/alipay/notify',//回调地址(支付宝支付成功后回调修改订单状态的地址)
           'payment_type' =>1,//(固定值)
           'seller_id'  =>  '2088821611802126',//合作伙伴身份（PID）
           'charset'    => 'utf-8',//编码
           'sign_type' => 'RSA2',//签名方式
           'timestamp' =>'',
           'version'   =>"1.0",//固定值
           'url'       => 'https://openapi.alipay.com/gateway.do',//固定值
           'method'    => 'alipay.trade.app.pay',//固定值
         );

        function __construct($param=[]){
            $this->alipay_config['appid'] = $param['app_id'] || '2017111009837298';
            $this->alipay_config['rsaPrivateKey'] = $param['rsaPrivateKey'] || 'MIIEowIBAAKCAQEAySTB8td2Rws+0uETJfNvI5u9feWaRPYrSZXA1r2ntOT6GH3HOHNiQYV0y7j2XQaBgbab1y+fT2hmyA7mlI50K3L6ImxFxbjx88HM0Vp90M7ol9jdGzgZKjCVyjkEgC35hxQpQCdE+ciIZJrE/iiFCRqIWcDy7Q/w2/NlINzcKB8tpPahyrM7ChU4rcrTnrU/elHtXpQ4LvYA1iYlIphmEn1hSKhr7ti8aCNDYj3SRuPbdlt/6G9dVAW3vh8h5ZNB/XkFqOWkXj0RHz2dpGZcVjv+BdG7QTPyS2YNMeunet4t0OuFVwtWEEk+1/bQY/5/intCzWf4QWbcEn8V7+mpFQIDAQABAoIBAH64MZgUNee8JfAk7DNUkggU7eSK6g3YKJ1LQxoGkcldGFKlqwTdbGFq+pH+DPe+SYi2yqde0TbtxxLykEG3HWjiHsPhAnP2eDfhOHAMWodaUx6W+XVUekYiJbwo/7ThQfrfsL1CACp9M7Bt8P1N+cIqfQxOirze9hcb1/JEMk7zd5MADVuRkYge3F8nBNyHSU/I3nuM2GxOrlYkCwCK0GLLOL9p7hxYaB0H1tPCxnnyC3I2H4tPaCmY8xRGwU74otUOuvrrBdwFt8asD1t2T6iRNI6I4M/Bn2Vn+YthER46FczWs685rQ1pGEdwjDg00JG7uT8dMIsKUCqceS1m92ECgYEA5h8nACVpi555JcSzLFqFOIDPRUrtwYxE7BUsDws5UoglWLcucWaLJ0MR96gkKeRaN7SfR4K7iMu2kZCGCqSDNEMHL9xF0ZVEKoQVcTas3klwMvEOHIZWDJvklp2oCqXV5GS0wzWZtt4C3me0YLXWCIUPsR7onF4B0me5rXr64McCgYEA38Ne1RxkCtPsAXZwd5N6DEm0Xom73gAmIJQ4bg7nIYsQyCrhnT2C4MFdwmdzuPj6zMB8RXvIPrnOTTuTGpd1bjhTrSoWngN7O78xwlTJ8O/fThVsxQT1UKKc5mmjnaFTjxJa9xHV17Ma1vxh3Jp1l6s3ODruxNipqwtE9oHtg0MCgYEA5c8me5bhGHViNr2A0UJ02ECKvYBef3M9QSbDoSJsVGdyJG6LCuSFAuiQAOsBcnSBRDA1AI0mCy6lXCkgM3CnNoHZo4ouj2apdGwDndQkPrjIO5dPqFzfgigM1/0J29hRCo0nl+rnXx/HbaPTFuGApXF8gj2DvuSCnUTIwN6Xu/ECgYBhH43j9mS+Bmoj4GLEpDCPcNZnSmVO4MWr0moD61gLSS9JksNG2tIZ+BRYM0sZeIhzowDNsAKkp0WSZE9fdWo1IyG+wcv7Xgt5TW2tqdvVRmioncgOZC6Oh2aO5D9uRf3c1dzB7O3iqAz4T6eydyCfamOXdoz4yAotAcE3NgH/vQKBgEmEKFS3bUccklGuZ2sbEsucWTdnGHYr0ZhmDj3CHGKuGzoQNFv391cncueqso49PumLySTfsrXx8uwfugqacjDxVeEiACvLk0FDveHaXBAyYg3EVtWA06CVGppw6MtpKH9xSIQt4xT4HXLBMrpdkd/gJWg2fcuMYFNBaDn/3GFN';
            $this->alipay_config['alipayrsaPublicKey'] = $param['alipayrsaPublicKey'] || 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAhUU6BsKChP9uGAScQjq5YOjhqFBptv1wZlWQKG13abk6Q/IX3eXnIt2POCac9xIvhZT2SVtym9HrlS3y9YhqvC0rfQl8AA6QWuGcDpqF7zH7NwkdhG6rlTJ58J+R+sxHEB7RUxh7Xf0K8UgHIAgKu5gOIEEN0cIfXeD1r1/kMF2Ht5+A8QDWJgVSuak6nUKHz8V9rOr2RRzn+LjqvlMwmnJkNi+4j1629XWV42PZ8L+8W/ZcbqMlQEihxb/sKVR1xpjcDcdHTmRI8w1MUmvJquGYeOdm6KS7MrShZkzn5xZD52F3MrcBOYwWZp1V9QNpicRMvgRmLHG857Q3qiPXPQIDAQAB';
            $this->alipay_config['notify_url'] = $param['notify_url'] || 'https://wy.zetaluoxin.cn/home/alipay/notify';
            $this->alipay_config['seller_id'] = $param['seller_id'] || '2088821611802126';
            $this->alipay_config['timestamp'] = date("Y-m-d H:i:s");
        }

        //生成提交支付宝参数数组
        public function createAppPara($params=array()) {

            //构造业务请求参数的集合(订单信息)
           $content = array();
           $content['body'] = '';
           $content['subject'] = $params['subject'];//商品的标题/交易标题/订单标题/订单关键字等
           $content['out_trade_no'] = $params['out_trade_no'];//商户网站唯一订单号
           $content['timeout_express'] = '1d';//该笔订单允许的最晚付款时间
           $content['total_amount'] = floatval($params['price']);//订单总金额(必须定义成浮点型)
           $content['product_code'] = 'QUICK_MSECURITY_PAY';//销售产品码，商家和支付宝签约的产品码，为固定值QUICK_MSECURITY_PAY
           // $content['store_id'] = 'BJ_001';//商户门店编号
           $con = json_encode($content);//$content是biz_content的值,将之转化成字符串
              //公共参数
           $param = array();
           $Client = new AopClient();//实例化支付宝sdk里面的AopClient类,下单时需要的操作,都在这个类里面
           $param['app_id'] = $this->alipay_config['appid'];//支付宝分配给开发者的应用ID
           $param['method'] = $this->alipay_config['method'];//接口名称
           $param['charset'] = $this->alipay_config['charset'];//请求使用的编码格式
           $param['sign_type'] = $this->alipay_config['sign_type'];//商户生成签名字符串所使用的签名算法类型
           $param['timestamp'] = $this->alipay_config['timestamp'];//发送请求的时间
           $param['version'] = $this->alipay_config['version'];//调用的接口版本，固定为：1.0
           $param['notify_url'] = $this->alipay_config['notify_url'];//支付宝服务器主动通知地址
           $param['biz_content'] = $con;//业务请求参数的集合,长度不限,json格式
           //生成签名
           $paramStr = $Client->getSignContent($param);
           $sign = $Client->alonersaSign($paramStr,$this->alipay_config['rsaPrivateKey'],'RSA2');
            $param['sign'] = $sign;
            $str = $Client->getSignContentUrlencode($param);
            return $str;
        }

        public function queryOrder($out_trade_no=null)
        {
            $this->alipay_config['method'] = "alipay.trade.query";
            $content['out_trade_no'] = $out_trade_no;
            $con = json_encode($content);
            $param = array();
            $Client = new AopClient();//实例化支付宝sdk里面的AopClient类,下单时需要的操作,都在这个类里面
            $param['app_id'] = $this->alipay_config['appid'];//支付宝分配给开发者的应用ID
            $param['method'] = $this->alipay_config['method'];//接口名称
            $param['charset'] = $this->alipay_config['charset'];//请求使用的编码格式
            $param['sign_type'] = $this->alipay_config['sign_type'];//商户生成签名字符串所使用的签名算法类型
            $param['timestamp'] = $this->alipay_config['timestamp'];//发送请求的时间
            $param['version'] = $this->alipay_config['version'];//调用的接口版本，固定为：1.0
            $param['biz_content'] = $con;//业务请求参数的集合,长度不限,json格式
            //生成签名
            $paramStr = $Client->getSignContent($param);
            $sign = $Client->alonersaSign($paramStr,$this->alipay_config['rsaPrivateKey'],'RSA2');
            $param['sign'] = $sign;
            $result = http_curl($this->alipay_config['url'],$param);
            $result = json_decode($result,true);
            dump($result);return;
            //验证签名
            $Client->alipayrsaPublicKey = $this->alipay_config['alipayrsaPublicKey'];
            if($Client->rsaCheckV1($result['sign'])){
                if($result['alipay_trade_query_response']['code'] == "10000" && $result['alipay_trade_query_response']['trade_status'] == "TRADE_SUCCESS"){
                    return true;
                }
            }
            return false;
        }

        public function notifyCheck($data)
        {
            //实例化并传入支付宝公钥
            $aop = new AopClient();
            $aop->alipayrsaPublicKey = $this->alipay_config['alipayrsaPublicKey'];
            //调用支付宝封装好的方法验证签名
            $bool = $aop->rsaCheckV1($data);
            return $bool;
        }
        public function success()
        {
            die('success');
        }

        public function error()
        {
            die('failure');
        }
    }
?>