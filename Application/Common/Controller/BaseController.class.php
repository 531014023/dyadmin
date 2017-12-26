<?php
namespace Common\Controller;
use Think\Controller;
class BaseController extends Controller{

    public function __construct()
    {
        parent::__construct();
        $config =   M('Config')->getField('key,value');
        C($config); // 合并配置参数到全局配置
    }

    function getinfo($status,$info='',$data=''){
			$val['status'] = $status;
			$val['info'] = $info;
			$val['data'] = $data;
			$this->ajaxReturn($val,'',JSON_UNESCAPED_UNICODE);
            //JSON_UNESCAPED_UNICODE
		}
		function upload(){//上传文件f
			$config = array(    
				'maxSize'    =>    0,
				'rootPath'	=>		'./Uploads/',
				'savePath'   =>    '',    
				'saveName'   =>    ["getRandom",[10]],
				'exts'       =>    array('jpg', 'gif', 'png', 'jpeg','mp3','mp4','mov','flac'), 
				'autoSub'    =>    true,    
				'subName'    =>    array('date','Ymd')
			);
			//实例化上传类
			$upload = new \Think\Upload($config);
			//上传文件
			$info = $upload->upload();
			if($info){
			    $retArr = [];
				foreach ($info as $val) {
					$type = explode('/', $val['type']);
					if($type[0] == 'image'){
					    //资源文件地址
						$arr['file_url'] = $val['savepath'].$val['savename'];
                        //资源类型
                        $arr['file_type']= '0';
						#生成缩略图
//						$image = new \Think\Image();
//						$image->open($config['rootPath'].$val['savepath'].$val['savename']);
//						$image->thumb(150,150)->save('./Public/Uploads/'.$val['savepath']."thumb".$val['savename']);
//						//预览图地址
//						$arr['file_img'] = $val['savepath']."thumb".$val['savename'];
					}
					if($type[0] == 'video'){
						$arr['file_url'] = $val['savepath'].$val['savename'];
                        //资源文件名称
                        //资源文件类型
                        $arr['file_type'] = '1';

					}
					//资源文件名称
                    $arr['file_name'] = $val['name'];
                    //资源文件大小
                    $arr['files_ize'] = $val['size'];
                    $arr['type'] = $type[0];
                    array_push($retArr,$arr);
				}
				// dump($arr);die;
				return $retArr;
			}
			return $upload->getError();
		}

		function check_verify($code, $id = ''){    //验证码校验
			$verify = new \Think\Verify();    
			return $verify->check($code, $id);
		}

		function verify(){//验证码生成
			$config =    array(    
				'fontSize'		=>		30,    // 验证码字体大小    
				'length'		=>		4,     // 验证码位数    
				'useNoise'		=>		false, // 关闭验证码杂点
				'useImgBg'		=>		false,//是否使用背景图片	
			);
			$Verify = new \Think\Verify($config);
			$Verify->entry();
		}

		function uploadify(){//异步上传图片处理
			foreach ($_FILES as $v) {
				if($v['error'] != 0){
					$this->getinfo(false,'上传出错',$v['error']);
				}else{
					$info = $this->upload();
					is_array($info)?$this->getinfo(true,'上传成功',$info):$this->getinfo(false,'上传失败',$info);
				}
			}
		}
		//权限验证
		function auth($user_id='1',$mode='url',$relation='and'){
			$Auth = new \Think\Auth();
			  //需要验证的规则列表,支持逗号分隔的权限规则或索引数组
			  $name = CONTROLLER_NAME . '/' . ACTION_NAME;
			  //当前用户id
			  $uid = $user_id;
			  //分类
			  $type = MODULE_NAME;
			  //执行check的模式
			  //'or' 表示满足任一条规则即通过验证;
			  //'and'则表示需满足所有规则才能通过验证
			  if ($Auth->check($name, $uid, $type, $mode, $relation)) {
			  	return true;
			  }else {
			   	return false;
			  }
		}

}
?>