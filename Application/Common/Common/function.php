<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2017/12/13
 * Time: 15:59
 */
define("NOWTIME",date("Y-m-d H:i:s"));
define("IP",get_client_ip());
define("PAGECOUNT",10);

/**
 * 将数组中所有元素转换为小写
 * @param $array
 * @return mixed
 */
function array_to_lower($array)
{
    foreach ($array as $k => $v) {
        $array[$k] = strtolower($v);
    }
    return $array;
}

/**
 * 将数组中所有元素转换为大写
 * @param $array
 * @return mixed
 */
function array_to_upper($array)
{
    foreach ($array as $k => $v) {
        $array[$k] = strtoupper($v);
    }
    return $array;
}

/**
 * 将数组中所有元素转换为首字母大写
 * @param $array
 * @return mixed
 */
function array_uc_first($array)
{
    foreach ($array as $k => $v) {
        $array[$k] = ucfirst($v);
    }
    return $array;
}


/**
 * 将js生成的时间格式化为php格式
 * @param $time
 * @return string
 */
function formatTime($time){
    $formatTime = preg_replace("/[A-Za-z]+/"," ",$time).":00";
    return $formatTime;
}

/**
 * js读取的base64文件流转换为文件
 * @param $str
 * @return string
 */
function formatDataURL($str){
    $img = str_replace('data:image/jpeg;base64,', '', $str);
    $img = str_replace(' ', '+', $img);
    return base64_decode($img);
}

//todo 待优化
function fileUpload($base64Str,$data_url){
    if($base64Str == ""){
        return "";
    }
    if($data_url){
        $data_url = "/var/www/html".$data_url;
        unlink($data_url);
    }
    $file_name = date("YmdHis").getRandom().".jpg";
    $res = file_put_contents("./Uploads/WZ/{$file_name}",formatDataURL($base64Str));
    if($res){
        $link = "http://119.148.161.5/Uploads/WZ/{$file_name}";
        return $link;
    }else{
        return "";
    }
}
function memory_usage() {
    $memory  = ( ! function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2).'MB';
    return $memory;
}

/**
 * 获取随机数
 * @param int $len
 * @return string
 */
function getRandom($len=6){
    $arr = range(0,9);
    $str = '';
    for($i=0;$i<$len;$i++){
        $index = array_rand($arr);
        $str .= $arr[$index];
    }
    return $str;
}

/**
 * 生成随机字母
 * @param int $len
 * @return string
 */
function getString($len=32){
    $arr = range("a","z");
    $str = "";
    for ($i=0;$i<$len;$i++){
        $index = array_rand($arr);
        $str .= $arr[$index];
    }
    return $str;
}


/*
*计算指定时间之前的日期
*作者：杜勇
*时间：2107 3 2
* 传入 当前时间和天数 单位，返回计算出的时间
* 返回时间差
*/
function diff_time($time,$day,$unit){
    $unittime = strtotime($time);
    $diff = $unittime - $unit*$day;
    $create_time = date("Y-m-d H:i:s",$diff);
    return $create_time;
}

/**计算指定时间之后的日期
 * @param $time
 * @param $day
 * @param $unit
 * @return false|string
 */
function after_time($time, $day, $unit){
    $unit_time = strtotime($time);
    $diff = $unit_time + $unit * $day;
    $create_time = date("Y-m-d H:i:s",$diff);
    return $create_time;
}

/*
    *计算概率
    *作者：杜勇
    *时间：2017 2 15
    * 传入 构造的array 设置的概率和对应的说明
    * 返回选中的k
    */
function chance($award){
    $r = randomFloat(1,100);
    $num = 0;
    foreach ($award as $k => $v) {
        $tmp = $num;
        $num += $v["v"]*100;
        if($r > $tmp && $r <= $num){
            return $k;
        }
    }
    return false;
}

function randomFloat($min = 0, $max = 1) {
    return round($min + mt_rand() / mt_getrandmax() * ($max - $min),2);
}


/**
 * 求最小差值(取和待比较的数差的绝对值最小的那一个)
 * @param $value1
 * @param $value2
 * @param $need
 * @return mixed
 */
function min_diff($value1, $value2, $need)
{
    $diff1 = abs($value1 - $need);
    $diff2 = abs($value2 - $need);
    if($diff1<$diff2){
        return $value1;
    }else if($diff1>$diff2){
        return $value2;
    }else{
        $arr = [$value1,$value2];
        $index = round(mt_rand(0,1));
        return $arr[$index];
    }
}

/**
 * 发送HTTP请求方法
 * @param  string $url    请求URL
 * @param  array  $params 请求参数
 * @param  string $method 请求方法GET/POST
 * @return array  $data   响应数据
 */
function http_curl($url, $params=array(), $method = 'GET', $header = array("Content-type: text/html; charset=utf-8"), $multi = false){
    $opts = array(
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_HTTPHEADER     => $header
    );

    /* 根据请求类型设置特定参数 */
    switch(strtoupper($method)){
        case 'GET':
            $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
            break;
        case 'POST':
            //判断是否传输文件
            $params = $multi ? $params : http_build_query($params);
            $opts[CURLOPT_URL] = $url;
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = $params;
            break;
        default:
            throw new Exception('不支持的请求方式！');
    }

    /* 初始化并执行curl请求 */
    $ch = curl_init();
    curl_setopt_array($ch, $opts);
    $data  = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    if($error) throw new Exception('请求发生错误：' . $error);
    return  $data;
}