<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2017/12/12
 * Time: 14:51
 */
namespace Admin\Model;
use Common\Model\BaseModel;

class MenuModel extends BaseModel
{
    /**
     * 格式化获取所有菜单
     * @return mixed
     */
    public function formatMenu()
    {
        //得到一级菜单
        $map['pid'] = 0;
        $map['use_status'] = 1;
        $menu = $this->where($map)->order("sort asc,id asc")->select();
        foreach ($menu as $k=>$v){
            $where['pid'] = $v['id'];
            $where['use_status'] = 1;
            $menu[$k]['menu'] = $this->where($where)->order("sort asc,id asc")->select();
        }
        return $menu;
    }

    /**
     * 获取格式化全部权限
     * @return mixed
     */
    public function formatAuth()
    {
        $map['action'] = ["NEQ",""];
        $auth = $this->where($map)->getField("action",true);
        foreach ($auth as $k=>$v){
            $auth[$k] = strtolower($v);
        }
        return $auth;
    }

    /**
     * 权限判断和菜单展示判断
     * @param $menu
     * @param $auth
     * @param $all_auth
     * @return mixed
     */
    public function menuShow($menu, $auth, $all_auth)
    {
        if(session(admin.".root") == 0) {
            if (!in_array(strtolower(ACTION_NAME), $auth)) {
                if (in_array(strtolower(ACTION_NAME), $all_auth)) {
                    $this->error = "您没有此权限!";
                    return false;
                }
            }
        }
        $title = [];
        foreach ($menu as $k=>$v){
            $count = 0;
            $menu[$k]['open'] = "";
            $menu[$k]['display'] = "display:none;";
            if(count($v['menu']) == 0){
                if(strtolower(ACTION_NAME) == strtolower($v['action'])){
                    $title = ["one"=>$v,"two"=>$v];
                }
                if(session(admin.".root") == 0){
                    if(!in_array(strtolower($v['action']),$auth)){
                        $menu[$k]['show'] = "display:none;";
                    }else{
                        $menu[$k]['show'] = "display:block;";
                    }
                }else{
                    $menu[$k]['show'] = "display:block;";
                }
                if(strtolower(ACTION_NAME) == strtolower($v['action'])){
                    $menu[$k]['open'] = "active layui-this";
                }
                $menu[$k]['down'] = "";
                $menu[$k]['child'] = "";
                if($v['href']){
                    $menu[$k]['href'] = U($v['href']);
                }
            }else {
                foreach ($v['menu'] as $key => $val) {
                    if(strtolower(ACTION_NAME) == strtolower($val['action'])){
                        $title = ["one"=>$v,"two"=>$val];
                    }
                    if (session(admin.".root") == 0) {
                        if (!in_array(strtolower($val['action']), $auth)) {
                            $count++;
                            $menu[$k]['menu'][$key]['show'] = "display:none;";
                        } else {
                            $menu[$k]['menu'][$key]['show'] = "display:block;";
                        }
                    } else {
                        $menu[$k]['menu'][$key]['show'] = "display:block;";
                    }
                    $menu[$k]['menu'][$key]["open"] = "";
                    if (strtolower(ACTION_NAME) == strtolower($val['action'])) {
                        $menu[$k]['open'] = "active open layui-nav-itemed";
                        $menu[$k]['display'] = "display:block;";
                        $menu[$k]['menu'][$key]["open"] = "active layui-this";
                    }
                    if($val['href']){
                        $menu[$k]['menu'][$key]['href'] = U($val['href']);
                    }
                }
                if ($count == count($v['menu'])) {
                    //没有该一级菜单下的权限时隐藏一级菜单
                    $menu[$k]['show'] = "display:none;";
                } else {
                    $menu[$k]['show'] = "display:block;";
                }
                $menu[$k]['href'] = "javascript:;";
                $menu[$k]['b'] = "<b class=\"arrow icon-angle-down\"></b>";
                $menu[$k]['down'] = "dropdown-toggle";
                $menu[$k]['child'] = "layui-nav-child";
            }
        }
        return ["menu"=>$menu,"title"=>$title];
    }

    /**
     * 获取菜单列表
     * @return array
     */
    public function get_menu_list()
    {
        $map['pid'] = 0;
        $p = I("p",1);
        $pageCount = I("page",5);
        $count = $this->where($map)->count();
        $page = new \Think\Page($count,$pageCount);
        $show = $page->show();
        //得到一级菜单
        $map['pid'] = 0;
        $menu = $this->where($map)->page($p,$pageCount)->order("sort asc,id asc")->select();
        foreach ($menu as $k=>$v){
            $where['pid'] = $v['id'];
            $menu[$k]['menu'] = $this->where($where)->order("sort asc,id asc")->select();
        }
        return ["list"=>$menu,"show"=>$show];
    }

    /**
     * 获取菜单列表
     * @return array
     */
    public function getMenuList()
    {
        $map['pid'] = 0;
        $p = I("p",1);
        $pageCount = I("page",5);
        $count = $this->where($map)->count();
        //得到一级菜单
        $map['pid'] = 0;
        $menu = $this->where($map)->page($p,$pageCount)->order("sort asc,id asc")->select();
        foreach ($menu as $k=>$v){
            $where['pid'] = $v['id'];
            $res = $this->where($where)->order("sort asc,id asc")->select();
            array_splice($menu,$k+1,0,$res);
        }
        return ["data"=>$menu,"count"=>$count];
    }

    /**
     * 添加菜单参数检查
     * @param $map
     * @return bool
     */
    public function addMenuCheck($map)
    {
        if(!$map['name']){
            $this->error = "菜单名称不能为空!";
            return false;
        }
        if(strlen($map['name'])>24){
            $this->error = "菜单名称长度不能超过8个汉字!";
            return false;
        }
        if($map['pid']){
            $map['icon'] = '';
        }
        if($map['sort'] == ''){
            $map['sort'] = 0;
        }
        $action = explode("/",explode(".",$map['href'])[0]);
        $map['action'] = $action[count($action)-1];
        return $map;
    }

    /**
     * 修改菜单参数检查
     * @param $map
     * @return array|bool
     */
    public function updateMenuCheck($map)
    {
        $map = $this->addMenuCheck($map);
        if($map === false){
            return false;
        }
        $info = $this->find($map['id']);
        $is_update = [];
        //将要修改的新value赋值给旧value
        foreach ($map as $key=>$val){
            foreach ($info as $k=>$v){
                if($val != $v && $key == $k){
                    $info[$k] = $val;
                    array_push($is_update,$k);
                }
            }
        }
        if(empty($is_update)){
            $this->error = "您没有做任何修改!";
            return false;
        }
        return ["info"=>$info,"update"=>$is_update];
    }

    /**
     * 执行菜单修改
     * @param $info
     * @return bool
     */
    public function runUpdateMenu($info)
    {
        if(in_array("use_status",$info['update'])){
            $down = $this->where(["pid" => $info['info']['id']])->select();
            foreach ($down as $k => $v) {
                $v['use_status'] = $info['info']['use_status'];
                $this->save($v);
            }
        }
        $res = $this->save($info['info']);
        if(!$res){
            $this->error = "修改失败";
            return false;
        }
        return $res;
    }
}