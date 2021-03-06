<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>cms后台管理平台</title>
    <!-- Bootstrap Core CSS -->
    <link href="/kylecms/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/kylecms/Public/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/kylecms/Public/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/kylecms/Public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/kylecms/Public/css/sing/common.css" />
    <link rel="stylesheet" href="/kylecms/Public/css/party/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="/kylecms/Public/css/party/uploadify.css">

    <!-- jQuery -->
    <script src="/kylecms/Public/js/jquery-1.10.2.min.js"></script>
    <script src="/kylecms/Public/js/bootstrap.min.js"></script>
    <script src="/kylecms/Public/js/dialog/layer.js"></script>
    <script src="/kylecms/Public/js/dialog.js"></script>
    <script type="text/javascript" src="/kylecms/Public/js/party/jquery.uploadify.js"></script>

</head>

    




<body>
<div id="wrapper">

  <!--navigation -->
<?php
 $navs = D("Menu")->getAdminMenus(); $username = getLoginUsername(); foreach($navs as $k=>$v){ if($v['c']==admin && $username !='admin'){ unset($navs[$k]); } } $index = 'index'; ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    
    <a class="navbar-brand" >kylecms内容管理平台</a>
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    
    
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo getLoginUsername(); ?><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="admin.php?c=admin&a=personal"><i class="fa fa-fw fa-user"></i> 个人中心</a>
        </li>
       
        <li class="divider"></li>
        <li>
          <a href="admin.php?c=login&a=loginout"><i class="fa fa-fw fa-power-off"></i> 退出</a>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav nav_list">
      <li <?php echo (getActive($index)); ?>>
        <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> 首页</a>
      </li>
      <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li <?php echo (getActive($nav["c"])); ?>>
        <a href="<?php echo (getAdminMenuUrl($nav)); ?>"><i class="fa fa-fw fa-bar-chart-o"></i><?php echo ($nav["name"]); ?></a>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
	<div class="col-lg-12">
		<a href="admin.php?c=basic"><button type="button" class="btn <?php if($type == 1): ?>btn-primary<?php endif; ?>"> 基本配置</button></a>
		<a href="admin.php?c=basic&a=cache"><button type="button" class="btn <?php if($type == 2): ?>btn-primary<?php endif; ?>"> 缓存配置</button></a>
		<a href="admin.php?c=basic&a=dumpmysql"><button type="button" class="btn <?php if($type == 3): ?>btn-primary<?php endif; ?>"> 数据库备份</button></a>
	</div>
</div>

		<!-- /.row -->
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label for="inputname" class="col-sm-2 control-label">数据库备份:</label>
					<div class="col-sm-5">
						<button type="button" class="btn" id="dumpmysql">开始备份</button>
					</div>
				</div>

				

			</div>

		</div>
		<!-- /.row -->

	</div>
	<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<script type="text/javascript" src="/kylecms/Public/js/admin/form.js"></script>
<script>
  $("#dumpmysql").click(function(){

	var url = 'admin.php?c=cron&a=dumpmysql';
	var jump_url = 'admin.php?c=basic&a=dumpmysql';
	var postData = {};

	$.post(url, postData,function(result){
	  if(result.status==1) {
		// 成功
		return dialog.success(result.message,jump_url);
	  }else if(result.status==0) {
		return dialog.error(result.message);
	  }

	},"JSON");
  });

</script>
<script src="/kylecms/Public/js/admin/common.js?ver=2.93"></script>



</body>

</html>