<?php
/**
 *后台Index相关
 */
namespace Admin\Controller;
use Think\Controller;
class PositioncontentController extends CommonController{
	
	public function index(){
		$positions = D("Position")->getPosition();
		//获取推荐位里面的内容
		$data['status'] = array('neq',-1);
		if($_GET['title']){
			$data['title'] = trim($_GET['title']);
			$this->assign('title',$data['title']);
		}
		$data['position_id'] = $_GET['position_id'] ? intval($_GET['position_id']) : $positions[0]['id'];
		$contents = D("PositionContent")->select($data);
		$this->assign('positions',$positions);
		$this->assign('contents',$contents);
		$this->assign('position_id',$data['position_id']);
		$this->display();
	}
}
