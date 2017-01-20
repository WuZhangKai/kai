<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends CommonController{

	public function index(){

		$id = intval($_GET['id']);
		if(!$id || $id<0){
			$this->error('ID不合法');
		}
		
		$news = D("News")->find($id);
		if(!$news || $news['status'] !=1){
			return $this->error("ID不存在或者咨询被关闭");
		}

		$count = intval($news['count']+1);
		D("News")->updateCount($id,$count);
	
		$content = D("NewsContent")->find($id);
		$news['content'] = htmlspecialchars_decode($content['content']);

		$advNews = D("PositionContent")->select(array('status'=>1,'position_id'=>9),5);
                $rankNews = $this->getRank();

		$this->assign('result',array(
			'rankNews' => $rankNews,
			'advNews' => $advNews,
			'catId' => $news['catid'],
			'news' => $news,
		));

		$this->display("Detail/index");
	}

	public function view(){
		if(!getLoginUsername()){
			$this->error("你更没有权限访问该页面");
		}
		$this->index();
	}
	
}
