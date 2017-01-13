<?php
namespace Home\Controller;
use Think\Controller;

class CatController extends CommonController{

	public function index(){

		$id = intval($_GET['id']);
		if(!$id){
			return $this->error('ID不存在');
		}
		$nav = D("Menu")->find($id);
		if(!$nav || $nav['satus'] !=1){
			return $this->error('栏目id不存在或者状态不为正常');
		}
		 $advNews = D("PositionContent")->select(array('status'=>1,'position_id'=>9),30);
		 $rankNews = $this->getRank();
	
		 $this->assign('result',array(
			'advNews' => $advNews,
			'rankNews' => $rankNews,
			'catId' => $id,
        	));	
		$this->display();
	}

}
