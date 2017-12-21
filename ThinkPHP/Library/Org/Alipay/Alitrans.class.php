<?php  
    namespace Org\Alipay;
    use Org\Alipay\AopClient;
    /**
    * 阿里单笔转账
    **/
    class Alitrans{
        public $ali_config = array(
            'app_id'    =>  '2017041806784075',
            'method'    =>  'alipay.fund.trans.toaccount.transfer',
            'url'       =>  'https://openapi.alipay.com/gateway.do',
            'charset'   =>  'utf-8',
            'sign_type' =>  'RSA2',
            'timestamp' =>  '',
            'version'   =>  '1.0',
            'rsaPrivateKey' =>'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCXqtJDEv2NE5+BW4CsqQ9SaDTO1sHvO/AKIuWcF2H2uJc86ddy5zURpH4XHS+bAJGjTUY7ntMB74hbEZI+3yL7+XpXyRNsw1Tc7TxnaIWvWu5cwGcnq+7TbwLI/KoKssaqa6tstI64uLmp0GKTkBm3HwqUcs00Jn9XaHlMLoW9Bv50K65ZJLfRvdSZel2tqwIR+NtfUGCo9HAOvk+hEq8m2tFijRnc0q7jNVS2uU5Ioy9u2RcYUihq82USSl1VS0Rh9/2AhJtMs3xMGQkACVWf1Bt9A/j4xAXkEZmi5vPT3tozyCeFG3OrSnjflBImpMaosek4ZfjjjRbZM3i0sekfAgMBAAECggEAfmQtmxX9VI7w0uVFQx4UFbGfqGtR7KM/c8MHI+BclDXaWznogOnq0MwLBAoffQWpWLRx/gdqgudx86qd/GUJi4CpEvUPigjx9LaDKw3wsmSN1Z/Fl0rx2SNe582fixDW/HiDwDBr68aNetWdAKoKtA9bSsCs/3PBlT8MLo9qhk46PWUVEQD8E9R6LxftTHigapC8TJzCQ/zgKKYbt+uyT4J6EArz++/RT/yjdsy7m3ztOWjKWpr6XC3DrglOyqVa7k6Kn2iGM/DdFX7p+ygX19iLnRQ0KUUwIX7uYYUHIXb1KjzClC64FpCSjXkL6M0M2HHGXov+EyNPRysX6WpfaQKBgQDu9RxDCO6QOo0HF0M7uNSZVmGYpWBl2nbWzQ1pzPfXvxyGhHkuO9UWI97ZPgam1dqtQOBUI/4A6aOyVtq/RCrACXgSYzZHbYrLZo42o6wwTcknSj0cUOkjB+fDuU3Yx3JU0+9XEQgXkyDMCOz7MImRWS7vSyygNof6Phg+b895/QKBgQCie/cOjNU4QBU3tRnNUJ77TQPxPVtIg8mc4wiETaHLRf2cfGqqHm9BKQ6D5IGTV+AT8NRr7CI4VjEV8OZqJTAvIZIuQaREd4Vrvg0h+HUJiLupEQO+sR7LcrnI74738oHRQJ6/hxOnXgi8jhNWdP5D9gDuXbpu6+PCXgmotc+cSwKBgFcwtpw7IRkdVCIXOeALw/8jRr808KSZfy1HarKFKJXfVOA8bB8Tk9/dPM4V1MWBWKZI+tGYxHC+z40eJfkOPW8OxXIoI0ES1kb7Z77GH+kMKO6eJwgy+a5fjxCah64msDAFmNozC7nWZGwugZHyFvAjE34a9vCKlTkY+S2nDJRdAoGAfzvhZ1Ritqx/sOKwdLT3+UMCnkp0i6EfJCooBiogUuPYx0wp3lL8vaKfyioKSU3bmuHQBT6gQUtFHrBITcAXLiD0riIatr59DLSC5iH/y9p1UNuQ+icKPTf2QWFNq90LSMd4R/RHMJ0S7Eu42s+8N42QhxeAING4xQAMQj80dmcCgYEA6SLmfGmCrjynmWUyHKsK2bo2qEKKbaNjqgL0/jviyse6zB93hJMjkTlV3/W8+fmEnVAopJx2bEMW1kXvcg/+aESUsHZI2iKhzKLqsxMKEoB3YqMGo7wq3n1C4wUQQ6CK5JAh1cxHncC3aNqEoBgw1APU1UXRfFQUlA6saEQgkL8=',//私钥
           'alipayrsaPublicKey'=>'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAl6rSQxL9jROfgVuArKkPUmg0ztbB7zvwCiLlnBdh9riXPOnXcuc1EaR+Fx0vmwCRo01GO57TAe+IWxGSPt8i+/l6V8kTbMNU3O08Z2iFr1ruXMBnJ6vu028CyPyqCrLGqmurbLSOuLi5qdBik5AZtx8KlHLNNCZ/V2h5TC6FvQb+dCuuWSS30b3UmXpdrasCEfjbX1BgqPRwDr5PoRKvJtrRYo0Z3NKu4zVUtrlOSKMvbtkXGFIoavNlEkpdVUtEYff9gISbTLN8TBkJAAlVn9QbfQP4+MQF5BGZoubz097aM8gnhRtzq0p435QSJqTGqLHpOGX4440W2TN4tLHpHwIDAQAB'//公钥(自己的程序里面用不到)
        );
        private $payee_type = 'ALIPAY_LOGONID';

        function __construct($param=[]){
            $this->ali_config['app_id'] = $param['app_id'] || '2017041806784075';
            $this->ali_config['rsaPrivateKey'] = $param['rsaPrivateKey'] || 'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCXqtJDEv2NE5+BW4CsqQ9SaDTO1sHvO/AKIuWcF2H2uJc86ddy5zURpH4XHS+bAJGjTUY7ntMB74hbEZI+3yL7+XpXyRNsw1Tc7TxnaIWvWu5cwGcnq+7TbwLI/KoKssaqa6tstI64uLmp0GKTkBm3HwqUcs00Jn9XaHlMLoW9Bv50K65ZJLfRvdSZel2tqwIR+NtfUGCo9HAOvk+hEq8m2tFijRnc0q7jNVS2uU5Ioy9u2RcYUihq82USSl1VS0Rh9/2AhJtMs3xMGQkACVWf1Bt9A/j4xAXkEZmi5vPT3tozyCeFG3OrSnjflBImpMaosek4ZfjjjRbZM3i0sekfAgMBAAECggEAfmQtmxX9VI7w0uVFQx4UFbGfqGtR7KM/c8MHI+BclDXaWznogOnq0MwLBAoffQWpWLRx/gdqgudx86qd/GUJi4CpEvUPigjx9LaDKw3wsmSN1Z/Fl0rx2SNe582fixDW/HiDwDBr68aNetWdAKoKtA9bSsCs/3PBlT8MLo9qhk46PWUVEQD8E9R6LxftTHigapC8TJzCQ/zgKKYbt+uyT4J6EArz++/RT/yjdsy7m3ztOWjKWpr6XC3DrglOyqVa7k6Kn2iGM/DdFX7p+ygX19iLnRQ0KUUwIX7uYYUHIXb1KjzClC64FpCSjXkL6M0M2HHGXov+EyNPRysX6WpfaQKBgQDu9RxDCO6QOo0HF0M7uNSZVmGYpWBl2nbWzQ1pzPfXvxyGhHkuO9UWI97ZPgam1dqtQOBUI/4A6aOyVtq/RCrACXgSYzZHbYrLZo42o6wwTcknSj0cUOkjB+fDuU3Yx3JU0+9XEQgXkyDMCOz7MImRWS7vSyygNof6Phg+b895/QKBgQCie/cOjNU4QBU3tRnNUJ77TQPxPVtIg8mc4wiETaHLRf2cfGqqHm9BKQ6D5IGTV+AT8NRr7CI4VjEV8OZqJTAvIZIuQaREd4Vrvg0h+HUJiLupEQO+sR7LcrnI74738oHRQJ6/hxOnXgi8jhNWdP5D9gDuXbpu6+PCXgmotc+cSwKBgFcwtpw7IRkdVCIXOeALw/8jRr808KSZfy1HarKFKJXfVOA8bB8Tk9/dPM4V1MWBWKZI+tGYxHC+z40eJfkOPW8OxXIoI0ES1kb7Z77GH+kMKO6eJwgy+a5fjxCah64msDAFmNozC7nWZGwugZHyFvAjE34a9vCKlTkY+S2nDJRdAoGAfzvhZ1Ritqx/sOKwdLT3+UMCnkp0i6EfJCooBiogUuPYx0wp3lL8vaKfyioKSU3bmuHQBT6gQUtFHrBITcAXLiD0riIatr59DLSC5iH/y9p1UNuQ+icKPTf2QWFNq90LSMd4R/RHMJ0S7Eu42s+8N42QhxeAING4xQAMQj80dmcCgYEA6SLmfGmCrjynmWUyHKsK2bo2qEKKbaNjqgL0/jviyse6zB93hJMjkTlV3/W8+fmEnVAopJx2bEMW1kXvcg/+aESUsHZI2iKhzKLqsxMKEoB3YqMGo7wq3n1C4wUQQ6CK5JAh1cxHncC3aNqEoBgw1APU1UXRfFQUlA6saEQgkL8=';
            $this->ali_config['alipayrsaPublicKey'] = $param['alipayrsaPublicKey'] || 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAl6rSQxL9jROfgVuArKkPUmg0ztbB7zvwCiLlnBdh9riXPOnXcuc1EaR+Fx0vmwCRo01GO57TAe+IWxGSPt8i+/l6V8kTbMNU3O08Z2iFr1ruXMBnJ6vu028CyPyqCrLGqmurbLSOuLi5qdBik5AZtx8KlHLNNCZ/V2h5TC6FvQb+dCuuWSS30b3UmXpdrasCEfjbX1BgqPRwDr5PoRKvJtrRYo0Z3NKu4zVUtrlOSKMvbtkXGFIoavNlEkpdVUtEYff9gISbTLN8TBkJAAlVn9QbfQP4+MQF5BGZoubz097aM8gnhRtzq0p435QSJqTGqLHpOGX4440W2TN4tLHpHwIDAQAB';
            $this->ali_config['timestamp'] = date("Y-m-d H:i:s");
        }

        //创建转账str
        public function createTransfer($data=array()){
            //构造业务请求参数的集合
            $content = array(
                'out_biz_no'    => $data['out_biz_no'],//商户转账单号
                'payee_type'    => $this->payee_type,//转账账户类型
                'payee_account' =>  $data['payee_account'],//转账账户
                'amount'        =>  floatval($data['amount']),//转账金额,
                'payee_real_name'=> $data['payee_real_name'],//收款方真实姓名
            );
            $con = json_encode($content);
            $aop = new AopClient();
            $param['app_id'] = $this->ali_config['app_id'];//支付宝分配给开发者的应用ID
           $param['method'] = $this->ali_config['method'];//接口名称
           $param['charset'] = $this->ali_config['charset'];//请求使用的编码格式
           $param['sign_type'] = $this->ali_config['sign_type'];//商户生成签名字符串所使用的签名算法类型
           $param['timestamp'] = $this->ali_config['timestamp'];//发送请求的时间
           $param['version'] = $this->ali_config['version'];//调用的接口版本，固定为：1.0
           $param['biz_content'] = $con;//业务请求参数的集合,长度不限,json格式
           //生成签名
           $paramStr = $aop->getSignContent($param);
           $sign = $aop->alonersaSign($paramStr,$this->ali_config['rsaPrivateKey'],'RSA2');
            $param['sign'] = $sign;
            $str = $aop->getSignContentUrlencode($param);
            $url = $this->ali_config['url'].'?'.$str;
            $result = file_get_contents($url);
            $reponse = json_decode($result,true);
            return $reponse['alipay_fund_trans_toaccount_transfer_response'];
        }


        //
    }
?>