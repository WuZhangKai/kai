<?php

namespace Common\Model;
use Think\Model;

class MenusModel extends Model{
	private $_db = '';
	
	public function __contruct(){
		$this->_db = M('menus');
	}

	public function insert($data = array()){
		if(!$data || !is_array($data)){
			return 0;
		}
		
	}

}
