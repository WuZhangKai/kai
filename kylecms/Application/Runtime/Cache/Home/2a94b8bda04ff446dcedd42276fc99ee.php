<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<?php
 $config = D("Basic")->select(); $navs = D("Menu")->getBarMenus(); ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo ($config["title"]); ?></title>
  <meta name="keywords" content="<?php echo ($config["keywords"]); ?>"/>
  <meta name="description" content="<?php echo ($config["description"]); ?>"/>
  <link rel="stylesheet" href="/kylecms/Public/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="/kylecms/Public/css/home/main.css" type="text/css" />
</head>
<body>
<header id="header">
  <div class="navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a href="">
          <img src="/kylecms/Public/images/logo.png" alt="">
        </a>
      </div>
      <ul class="nav navbar-nav navbar-left">
       _<li><a href="index.php" <?php if($result['catId'] == 0): ?>class="curr"<?php endif; ?>>首页</a></li> <?php if(is_array($navs)): foreach($navs as $key=>$vo): ?><li><a href="index.php?c=cat&id=<?php echo ($vo["menu_id"]); ?>" <?php if($vo['menu_id'] == $result['catId']): ?>class="curr"<?php endif; ?>><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
  </div>
</header>

<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-9">
        <div class="banner">
          <div class="banner-left">
            <a target="_blank"  href="index.php?c=detail&id=<?php echo ($result['topPicNews'][0]['news_idg']); ?>"><img src="<?php echo ($result['topPicNews'][0]['thumb']); ?>" alt=""></a>
          </div>
          <div class="banner-right">
            <ul>
	    <?php if(is_array($result['topSmallNews'])): $i = 0; $__LIST__ = $result['topSmallNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
               <a href="index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>"> <img src="<?php echo ($vo["thumb"]); ?>" alt=""></a>
              </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
          </div>
        </div>
        <div class="news-list">
	<?php if(is_array($result['listNews'])): $i = 0; $__LIST__ = $result['listNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dt><a href="index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>"><?php echo ($vo["title"]); ?></a></dt>
            <dd class="news-img">
              <img src="" alt="<?php echo ($vo["title"]); ?>">
            </dd>
            <dd class="news-intro">
		<?php echo ($vo["description"]); ?>
            </dd>
            <dd class="news-info">
              <?php echo ($vo["keywords"]); ?> <span><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></span> 阅读(<i news-id="<?php echo ($vo["news_id"]); ?>" class="news_count node-<?php echo ($vo["news_id"]); ?>"><?php echo ($vo["count"]); ?></i>)
            </dd>
          </dl><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
      </div>
	<!--网站右侧信息-->
	      <div class="col-sm-3 col-md-3">
        <div class="right-title">
          <h3>文章排行</h3>
          <span>TOP ARTICLES</span>
        </div>
        <div class="right-content">
          <ul>
	   <?php if(is_array($result['rankNews'])): $k = 0; $__LIST__ = $result['rankNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="num<?php echo ($k); ?> curr">
              <a target="_blank" href="/index.php?c=detail$id=<?php echo ($vo["news_id"]); ?>"><?php echo ($vo["small_title"]); ?></a>
	     <?php if($k == 1): ?><div class="intro">
		<?php echo ($vo["description"]); ?>
              </div><?php endif; ?>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <?php if(is_array($result['advNews'])): $i = 0; $__LIST__ = $result['advNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="right-hot">
          <a target="_blank" href="/index.php?c=detail$id=<?php echo ($vo["news_id"]); ?>"><img src="" alt=""></a>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>

   </div>
  </div>
</section>
</body>
<script src="/kylecms/Public/js/jquery-1.10.2.min.js"></script>
<script src="/kylecms/Public/js/count.js"></script>
</html>