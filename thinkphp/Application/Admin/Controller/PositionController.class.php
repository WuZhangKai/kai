<?php
/**
*后台Index相关
*/
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
*推荐位管理
*/
class PositionController extends CommonController{

	public function index(){
		//$conds = array();
		//$title = $_GET['title'];
		//if($title){
		//	$conds['title'] = $title;
		//}
		//if($_GET['catid']){
		//	$conds['catid'] = intval($_GET['catid']);
		//}
		$page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
		//$conds['status'] = array('neq',-1);
		$position = D("Position")->getPosition($page,$pageSize);
		$count = D("Position")->getPositionCount();
		$res = new \Think\Page($count,$pageSize);
		$pageres = $res->show();
		$this->assign('pageres',$pageres);
		$this->assign('positions',$position);
		$this->display();
	}

	public function add(){
		if($_POST){
			if(!isset($_POST['name']) || !$_POST['name']){
				return show(0,'推荐位名称不能空');
			} 
			if($_POST['id']){
			    return $this->save($_POST);
			}
			$positionId = D("Position")->insert($_POST);
			if($positionId){
				return show(1,'新增成功',$positionId);	
			}
			return show(0,'新增失败');
		}else{
		       $this->display();
		}
	
	}
	
	public function edit(){
		$positionId = $_GET['id'];
		if(!$positionId){
			//执行跳转
			$this->redirect('admin.php?c=position');
		}
		$position = D("position")->find($positionId);
		if(!$position){
			$this->redirect('admin.php?c=position');		
		}
		$this->assign('position',$position);
		$this->display();
	}
	
	public function save($data){
		$positionId = $data['id'];
		unset($data['id']);
		try{
			$id = D("Position")->updateById($positionId,$data);
			if($id === false){
				show(0,'更新失败');
			}
			return show(1,'更新成功');
		}catch(Exception $e){
			return show(0,$e->getMessage());
		}
	}

	public function setStatus(){
		try{
			if($_POST){
				$id = $_POST['id'];
				$status = $_POST['status'];
				if(!$id){
					return show(0,'ID不存在');
				}
	
				$res = D("Position")->updateStatusById($id,$status);

				if($res){
					return show(1,'操作成功');
				}else{
					return show(0,'操作失败');
				}
				return show(0,'没有提交的内容');
				}
		}catch(Exception $e){
			return show(0,$e->getMessage);
		}
	}

	public function listorder(){
		$listorder = $_POST['listorder'];
		$jumpUrl = $_SERVER['HTTP_REFERER'];
		try{	
			if($listorder){
				foreach($listorder as $newsId=> $v){
					//执行更新
					$id = D("News")->updateNewsListorderById($newsId,$v);	
					if($id === false){
						$errors[] = $newsId;
					}
				}
				if($errors){
					return show(0,'排序失败-'.implode(',',$errors),array('jump_url'=>jumpUrl));
				}
				return show(1,'排序成功',array('jump_url'=>$jumpUrl));
			}
		}catch(Exception $e){
			return show(0,$e->getMessage());
		}
		return show(0,'排序数据失败',array('jump_url' => $jumpUrl));
	}
}
