<?php 
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;

/**
 *后台计划任务 业务脚本
 */
class CronController{

	public function dumpmysql(){
		$shell = "mysqldump -u".C("DB_USER")."  -p".C("DB_PWD")." ".C("DB_NAME")."> ".HTML_PATH."tmp/cms".date("Ymd").".sql";
		 exec($shell);
		return show(1,'备份成功');
	}	
}
