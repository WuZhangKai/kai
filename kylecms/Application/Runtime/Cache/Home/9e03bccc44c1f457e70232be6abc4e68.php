<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<?php
 $config = D("Basic")->select(); $navs = D("Menu")->getBarMenus(); ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo ($config["title"]); ?></title>
  <meta name="keywords" content="<?php echo ($config["keywords"]); ?>"/>
  <meta name="description" content="<?php echo ($config["description"]); ?>"/>
  <link rel="stylesheet" href="/thinkphp/Public/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="/thinkphp/Public/css/home/main.css" type="text/css" />
</head>
<body>
<header id="header">
  <div class="navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a href="">
          <img src="/thinkphp/Public/images/logo.png" alt="">
        </a>
      </div>
      <ul class="nav navbar-nav navbar-left">
       _<li><a href="index.php" <?php if($result['catId'] == 0): ?>class="curr"<?php endif; ?>>首页</a></li> <?php if(is_array($navs)): foreach($navs as $key=>$vo): ?><li><a href="index.php?c=cat&id=<?php echo ($vo["menu_id"]); ?>" <?php if($vo['menu_id'] == $result['catId']): ?>class="curr"<?php endif; ?>><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
  </div>
</header>

	<section>
		<div class="container" style="">
			<h1 style="color:red"><?php echo ($message); ?></h1>
			<h3 id="location" >系统将在<span style="color:red">3</span>秒后自动跳转</h3>
		<div>
	</section>
</body>
<script src="/thinkphp/Public/js/jquery-1.10.2.min.js"></script>
<script>
	var url = "index.php";
	var time = 3;
	setInterval("refer()",1000);
	function refer(){
		if(time==0){
			location.href = url;
		}
		$("#location span").html(time);
		time--;
	}
</script>