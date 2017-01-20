<?php
/**
 *后台Index相关
 */
namespace Admin\Controller;  
use Think\Controller;
use Think\Exception;


/**
 *基本管理
 */
class BasicController extends CommonController{

	public function index(){
		$res = D("Basic")->select();	
		$this->assign('vo',$res);
		$this->assign('type',1);
		$this->display();
	}

	public function add(){
		if($_POST){
			if(!$_POST['title']){
				return show(0,'站点信息不能为空');
			}
			if(!$_POST['title']){
				return show(0,'站点关键词不能为空');
			}
			if(!$_POST['title']){
				return show(0,'站点描述不能为空');
			}
			//F('basic_web_config',$data);
			D("Basic")->save($_POST);
			return show(1,'配置成功');
		}else{

			return show(0,'没有提价的数据');
		}
	}

	public function cache(){
		$this->assign('type',2);
		$this->display();
	}

	 public function dumpmysql(){
		$this->assign('type',3);
		$this->display();
        }
}
