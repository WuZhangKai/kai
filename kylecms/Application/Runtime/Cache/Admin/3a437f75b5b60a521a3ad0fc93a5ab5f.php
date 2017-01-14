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
 $navs = D("Menu")->getAdminMenus(); $index = 'index'; ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    
    <a class="navbar-brand" >kylecms内容管理平台</a>
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    
    
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="/admin.php?c=admin&a=personal"><i class="fa fa-fw fa-user"></i> 个人中心</a>
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

    <div class="container-fluid" >

      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">

          <ol class="breadcrumb">
            <li class="active">
              <i class="fa fa-table"></i>推荐位管理
            </li>
          </ol>
        </div>
      </div>
      <!-- /.row -->
      <div >
        <button  id="button-add" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加 </button>
      </div>
       <div class="row">
        <div class="col-lg-6">
          <h3></h3>
          <div class="table-responsive">
            <form id="singcms-listorder">
              <table class="table table-bordered table-hover singcms-table">
                <thead>
                <tr>
                  <th>id</th>
                  <th>推荐位名称</th>
                  <th>时间</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
               	<?php if(is_array($positions)): $i = 0; $__LIST__ = $positions;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$position): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($position["id"]); ?></td>
                    <td><?php echo ($position["name"]); ?></td>
                    <td><?php echo (date("Y-m-d H:i",$position["create_time"])); ?></td>
                    <td><span  attr-status=""  attr-id="" class="sing_cursor singcms-on-off" id="singcms-on-off" ><?php echo (getStatus($position["status"])); ?></span></td>
                    <td><span class="sing_cursor glyphicon glyphicon-edit" aria-hidden="true" id="singcms-edit" attr-id="<?php echo ($position["id"]); ?>" ></span>
                      <a href="javascript:void(0)" id="singcms-delete"  attr-id="<?php echo ($position["id"]); ?>"  attr-message="删除">
                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                      </a>

                    </td>
                  </tr><?php endforeach; endif; else: echo "" ;endif; ?> 

                </tbody>
              </table>
              <nav>

              <ul >
 		<?php echo ($pageres); ?>               
              </ul>

            </nav>
              
            </form>
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
<script>
  var SCOPE = {
    'edit_url' : 'admin.php?c=position&a=edit',
    'add_url' : 'admin.php?c=position&a=add',
    'set_status_url' : 'admin.php?c=position&a=setStatus',
    'sing_news_view_url' : '/index.php?c=view',
    'listorder_url' : 'admin.php?c=content&a=listorder',
    'push_url' : 'admin.php?c=content&a=push',
  }
</script>
<script src="/kylecms/Public/js/admin/common.js?ver=2.91"></script>



</body>

</html>