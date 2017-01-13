<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
	//获取排行
	$rankNews = $this->getRank();
	//获取首页大图数据
	$topPicNews = D("PositionContent")->select(array('status'=>1,'position_id'=>4),1);
	//获取首页小图
	$topSmallNews = D("PositionContent")->select(array('status'=>1,'position_id'=>5),3);
	$listNews = D("News")->select(array('status'=>1,'thumb'=>array('neq','')),30);
	$advNews = D("PositionContent")->select(array('status'=>1,'position_id'=>9),30);
	$this->assign('result',array(
		'topPicNews' => $topPicNews,
		'topSmallNews' => $topSmallNews,
		'listNews' => $listNews,
		'advNews' => $advNews,
		'rankNews' => $rankNews,
		'catId' => 0,
	));
	$this->display();	
    }
}
