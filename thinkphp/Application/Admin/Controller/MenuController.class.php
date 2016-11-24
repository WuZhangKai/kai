<?php
/**后台菜单相关...*/

namespace Admin\Controller;
use Think\Controller;
class MenuController extends CommonController{

	public function add(){
		if($_POST){
			if(!isset($_POST['name']) || !$_POST['name']){
				return show(0,'菜单名不能为空');
			}
			if(!isset($_POST['m']) || !$_POST['m']){
				return show(0,'模块名不能为空');
			}
			if(!isset($_POST['c']) || !$_POST['c']){
				return show(0,'控制器不能为空');
			} 
			if(!isset($_POST['f']) || !$_POST['f']){
				return show(0,'方法名不能为空');
			} 
			
			$menuId = D("Menus")->insert($_POST);
			if($menuId){
				return show(1,'新增成功',$menuId);
			}
			return show(0,'新增失败',$menuId);

		}else{
			$this->display();
		}
	}

	public function index(){

		$this->display();
	}
}
