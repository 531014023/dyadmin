<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2017/12/12
 * Time: 16:24
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
use Think\Exception;

class MenuController extends AdminbaseController
{
    /**
     * 展示列表页面
     */
    public function getMenu()
    {
        return $this->display("Menu:getMenu");
    }

    /**
     * 菜单列表
     */
    public function menuList()
    {
        $menu = D("Menu");
        $res = $menu->get_menu_list();
        $this->assign("menu",$res['list']);
        $this->assign("show",$res['show']);
        $data = $this->fetch("zj:menu_zj");
        return $this->getinfo(1,"查询成功",$data);
    }

    /**
     * 添加菜单
     */
    public function addMenu()
    {
        $menu = D("Menu");
        if(IS_GET) {
            $info = $menu->get_data("select", ["pid" => 0,"use_status"=>1]);
            $this->assign("menu", $info);
            return $this->display("Menu:addMenu");
        }else{
            $map['name'] = I("name");
            $map['icon'] = I("icon");
            $map['href'] = I("href");
            $map['pid'] = I("menu");
            $map['sort'] = I("sort");
            $map['use_status'] = I("use_status");
            $map = $menu->addMenuCheck($map);
            if($map === false){
                return $this->getinfo(0,$menu->getError());
            }
            $res = $menu->add_data($map);
            if($res){
                return $this->getinfo(1,"添加成功");
            }else{
                return $this->getinfo(0,"添加失败");
            }
        }
    }

    /**
     *修改菜单
     */
    public function updateMenu()
    {
        $menu = D("Menu");
        if(IS_GET){
            $menu_id = I("menu_id");
            $menuInfo = $menu->find($menu_id);
            $info = $menu->get_data("select", ["pid" => 0,"use_status"=>1,"id"=>["NEQ",$menu_id]]);
            $this->assign("menu", $info);
            $this->assign("info",$menuInfo);
            $this->assign("root",session(admin.".root"));
            return $this->display("Menu:updateMenu");
        }else{
            $map['id'] = I("id");
            $map['name'] = I("name");
            $map['icon'] = I("icon");
            $map['href'] = I("href");
            $map['pid'] = I("menu");
            $map['sort'] = I("sort");
            $map['use_status'] = I("use_status");
            $info = $menu->updateMenuCheck($map);
            if($info === false){
                return $this->getinfo(0,$menu->getError());
            }
            $res = $menu->runUpdateMenu($info);
            if(!$res){
                return $this->getinfo(0,"修改失败");
            }
            return $this->getinfo(1,"修改成功");
        }
    }

    /***
     * 删除菜单(仅开发调试使用)
     */
    public function delMenu()
    {
        $menu = D("Menu");
        $id = I("id");
        $res = $menu->delete($id);
        if($res){
            return $this->getinfo(1,"删除成功");
        }else{
            return $this->getinfo(0,"删除失败");
        }
    }
}