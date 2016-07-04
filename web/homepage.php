<?php
if(isset($_COOKIE['username'])){//如果用户已经登录，则直接跳转到已经登录页面
    $home_url = 'admin.php';
    header('Location: '.$home_url);
}
else if(isset($_COOKIE['tel'])){
	 $home_url = 'cust.php';
     header('Location: '.$home_url);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>首页</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
  
  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="brand">游客页面</div>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="">主页</a></li>
			   <li class="dropdown">
		         <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
           游客功能
           </a>
		  <ul class="dropdown-menu" role="menu">
            <li><a href="#icons-new"></a></li>
            <li class="divider"></li>
			<li><a href="package.php"><i class="icon-eye-open"></i> 线上套餐详情</a></li>
            <li><a href="company.html"><i class="icon-eye-open"></i> 公司概况</a></li>
              <li><a href="shop.html"><i class="icon-eye-open"></i>线下营业厅</a></li>
			<li><a href="netshop.html"><i class="icon-eye-open"></i>网上营业厅</a></li>

          </ul>
		  </li>
			  <li><a href="custlogin.php">手机用户登录</a></li>
			  <li><a href="adminlogin.php">管理人员登录</a></li>
			  <li><a href="about.php">关于</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>欢迎使用电信管理系统!</h1>
        <p>本系统由徐佳宝以及毛一鸣联合开发，向大众提供手机余额查询，缴费记录查询等功能，也向管理人员提供录入信息等功能，谢谢使用。</p>
        <p><a href="http://weibo.com/p/1001603894053480593786" class="btn btn-primary btn-large">Like it</a></p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
          <h2>徐佳宝</h2>
          <p>华中科技大学计算机学院计算机科学与技术1205班学生，除了长得帅一无是处。</p>
        </div>
        <div class="span4">
          <h2>毛一鸣</h2>
          <p>华中科技大学计算机学院计算机科学与技术1205班学生，现在正在打游戏，嘻嘻。</p>
       </div>
        <div class="span4">
          <h2>系统概况</h2>
          <p>此系统架构为B/S结构，采用mysql+php+Apache+html开发，使用工具为notepad+eclipse+chrome，系统Windows 10 x64，详情可咨询QQ：1130193186，谢谢。</p>
        </div>
      </div>

      <hr>

      <footer>
        <p>电信收费管理系统</p>
      </footer>

    </div>
	
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>