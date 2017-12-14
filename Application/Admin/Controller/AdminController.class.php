<?php 
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
/**
*admin
*auth：luoxin
*time：2017/1/4 10:15
*/
class AdminController extends AdminbaseController
{
	protected $m;
	public function __construct()
	{
		# code...
		parent::__construct();
		$this->m=D('Admin');
	}

	/**
	*登录
	*auth：luoxin
	*time：2017/1/4 10:15
	*@param $username $password
	*@return mixed;
	*/
	public function login(){
        $username=I('post.username');
        $password=I('post.password');
        $dataadmin['username']=$username;
		if(!empty($username)&&!empty($password)&&!empty($dataadmin)) {
            $res = $this->m->get_data("find",$dataadmin);
            if ($res) {
                $checked = password_verify($password, $res['password']);
                if ($checked) {
                    session(admin_id, $res['id']);
                    session(admin,$res);
                    $res['ip'] = IP;
                    $res['login_time'] = NOWTIME;
                    $res['login_count'] = $res['login_count']+1;
                    $save_res = $this->m->update_admin($res);
                    if($save_res) {
                        return $this->getinfo(1, '登录成功');
                    }else{
                        $error = "更新登录资料失败!";
                    }
                } else {
                    $error = "密码错误";
                }
            } else {
                $error = "用户名错误";
            }
        }else{
            $error = "参数错误";
        }
        return $this->getinfo(0,$error);
    }

	/**
	*登出
     * 清楚session当中的用户信息
	*auth：luoxin
	*time：2017/1/4 10:31
	*@param
	*@return mixed
	*/
	public function logout(){
		$res=session('[destroy]');
		if(!$res){
			return $this->getinfo(1,'退出成功');
		}
		return $this->getinfo(0,'退出失败');
	}

    /**
     * 添加后台用户
     * auth duyong
     */
    public function addAdmin()
    {
        if(IS_GET) {
            $admin_id = I("admin_id");
            if ($admin_id) {
                $admin = D("Admin");
                $info = $admin->find($admin_id);
                $root = $info['root'];
                if($info['auth']) {
                    $this->auth = explode(",", $info['auth']);
                    $this->auth = array_to_lower($this->auth);
                }
                $this->assign("user", $info);
            } else {
                $root = 0;
                $this->auth = [];
            }
            $auth = $this->menu;
            //权限是否显示判断
            foreach ($auth as $k => $v) {
                if(count($v['menu']) == 0){
                    if($root == 0){
                        if(!in_array(strtolower($v['action']),$this->auth)){
                            $auth[$k]['show'] = false;
                        }else{
                            $auth[$k]['show'] = true;
                        }
                    }else{
                        $auth[$k]['show'] = true;
                    }
                }else {
                    foreach ($v['menu'] as $key => $val) {
                        if ($root == 0) {
                            if (!in_array(strtolower($val['action']), $this->auth)) {
                                $auth[$k]['menu'][$key]['show'] = false;
                            } else {
                                $auth[$k]['menu'][$key]['show'] = true;
                            }
                        } else {
                            $auth[$k]['menu'][$key]['show'] = true;
                        }
                    }
                }
            }
            $this->assign("auth", $auth);
            return $this->display("Admin:addAdmin");
        }else{
            $username = I("username");
            $password = I("password");
            $auth = json_decode(I("auth"),true);
            if(!$username || !$password || !$auth){
                return $this->getinfo(0,"参数不能为空");
            }
            $admin = D("Admin");
            $info = $admin->where(["username"=>$username])->find();
            if($info){
                return $this->getinfo(0,"该账号已存在");
            }
            $data['username'] = $username;
            $data['password'] = password_hash($password,PASSWORD_DEFAULT);
            $data['auth'] = join(",",$auth);
            $res = $admin->add($data);
            if($res){
                return $this->getinfo(1,"添加成功");
            }
            return $this->getinfo(0,"添加失败");
        }
    }

    /**
     * 修改后台用户
     * auth duyong
     */
    public function updateAdmin()
    {
        $admin_id = I("admin_id");
        $password = I("password");
        $auth = json_decode(I("auth"),true);
        if(!$admin_id || !$auth){
            return $this->getinfo(0,"参数错误");
        }
        $admin = D("Admin");
        $info = $admin->find($admin_id);
        if(!$info){
            return $this->getinfo(0,"该账号不存在");
        }
        if($password) {
            if (password_verify($password, $info['password'])) {
                return $this->getinfo(0, "修改的密码不能和原密码相同!");
            }
            $info['password'] = password_hash($password,PASSWORD_DEFAULT);
        }
        $str_auth = join(",",$auth);
        if($str_auth != $info['auth']){
            $info['auth'] = $str_auth;
        }
        $res = $admin->save($info);
        if($res){
            return $this->getinfo(1,"修改成功");
        }
        return $this->getinfo(0,"请至少修改一样资料!");
    }

    public function getAdmin()
    {
        return $this->display("Admin:getAdmin");
    }

    public function getAdminList()
    {
        $res = D("Admin")->get_admin_list([]);
        $this->assign("list",$res['list']);
        $this->assign("show",$res['show']);
        $data = $this->fetch("zj:admin_zj");
        return $this->getinfo(1,$res,$data);
    }






}
 ?>