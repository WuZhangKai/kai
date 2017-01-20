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
	<div class="row">
	<div class="col-lg-12">
		<a href="admin.php?c=basic"><button type="button" class="btn <?php if($type == 1): ?>btn-primary<?php endif; ?>"> 基本配置</button></a>
		<a href="admin.php?c=basic&a=cache"><button type="button" class="btn <?php if($type == 2): ?>btn-primary<?php endif; ?>"> 缓存配置</button></a>
		<a href="admin.php?c=basic&a=dumpmysql"><button type="button" class="btn <?php if($type == 3): ?>btn-primary<?php endif; ?>"> 数据库备份</button></a>
	</div>
</div>

        <!-- Page Heading -->
               <!-- /.row -->

        <div class="row">
            <div class="col-lg-6">

                <form class="form-horizontal" id="singcms-form">
                    <div class="form-group">
                        <label for="inputname" class="col-sm-2 control-label">站点标题:</label>
                        <div class="col-sm-5">
                            <input type="text" name="title" class="form-control" id="inputname" placeholder="请填写站点标题" value="<?php echo ($vo["title"]); ?>"}>
                        </div>
                    </div>

  		<div class="form-group">
                        <label for="inputname" class="col-sm-2 control-label">站点关键词:</label>
                        <div class="col-sm-5">
                            <input type="text" name="keywords" class="form-control" id="inputname" placeholder="请填写站点关键词" value="<?php echo ($vo["keywords"]); ?>">
                        </div>
                    </div>

		   <div class="form-group">
		      <label for="inputPassword3" class="col-sm-2 control-label">站点描述:</label>
		      <div class="col-sm-5">
			<textarea class="input js-editor" id="editor_singcms" name="description" rows="10"><?php echo ($vo["description"]); ?></textarea>
		      </div>
		    </div>

		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">是否自动备份数据库:</label>
			<div class="col-sm-5">
				<input type="radio" name="dumpmysql" id="optionsRadiosInline1" value="1" <?php if($vo['dumpmysql'] == 1): ?>checked<?php endif; ?>> 是
                                <input type="radio" name="dumpmysql" id="optionsRadiosInline2" value="0" <?php if($vo['dumpmysql'] == 0): ?>checked<?php endif; ?>> 否
			</div>
		</div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-default" id="singcms-button-submit">提交</button>
                        </div>
                    </div>
                </form>


            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!-- Morris Charts JavaScript -->
<script>

    var SCOPE = {
        'save_url' : 'admin.php?c=basic&a=add',
        'jump_url' : 'admin.php?c=basic',
    }
</script>
<script src="/kylecms/Public/js/admin/common.js?ver=2.93"></script>



</body>

</html>