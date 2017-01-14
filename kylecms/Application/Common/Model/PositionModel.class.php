<?php
namespace Common\Model;
use Think\Model;

/**
 *推荐位model操作
 */
class PositionModel extends Model{
	private $_db = '';
	
	public function __construct(){
		$this->_db = M('position');
	}


	public function getPosition($page=1,$pageSize=10){

                $offset = ($page -1)* $pageSize;
                $list = $this->_db->where('status=1')->order('create_time')->limit($offset,$pageSize)->select();

                return $list;	
	}
	
	 public function getPositionCount($data = array()){

		 return $this->_db->where('status=1')->count();
        }

	public function insert($data){
		if(!$data || !is_array($data)){
			return false;
		}
		$data['create_time'] = time();	
		return $this->_db->add($data);	
	}

	public function updateById($id,$data){
		if(!$id || !is_numeric($id)){
			throw_exception("ID不合法");
		}
		if(!$data || !is_array($data)){
			throw_exception("更新数据不合法");	
		}
	
		return $this->_db->where("id=".$id)->save($data);	
	}

	public function find($id){
		return $this->_db->where("id=".$id)->find();
	}

	public function updateStatusById($id,$status){
		if(!$id || !is_numeric($id)){
			throw_exception("ID不合法");
		}
		
		if(!is_numeric($status)){
			throw_exception("状态不能为非数字");
		}
		$data['status'] = $status;	
		return  $this->_db->where("id=".$id)->save($data);

	}


}
