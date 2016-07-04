<?php
//判断用户是否已经设置cookie，如果未设置$_COOKIE['user_id']时，执行以下代码
if(!isset($_COOKIE['tel'])){
	if(isset($_COOKIE['username'])){
		$home_url = 'admin.php';
    header('Location: '.$home_url);
	}
    $home_url = 'custlogin.php';
    header('Location: '.$home_url);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>手机用户首页</title>
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
		<div class="brand">手机用户自助查询系统</div>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="">主页</a></li>
              <li><a href="package.php">套餐详情</a></li>
            
	  <li class="dropdown">
		 <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
           手机用户
         </a>
		  <ul class="dropdown-menu" role="menu">
            <li><a href="#icons-new"></a></li>
			<li><div class="divcenter"><i class="icon-user"></i><?php echo $_COOKIE['tel'];?></div></li>
            <li class="divider"></li>
			<li><a href="usersearch.php#A"><i class="icon-eye-open"></i> 查当前套餐</a></li>
            <li><a href="usersearch.php#B"><i class="icon-eye-open"></i> 查手机余额</a></li>
            <li><a href="usersearch.php#C"><i class="icon-eye-open"></i> 查缴费记录</a></li>
			<li><a href="usersearch.php#D"><i class="icon-eye-open"></i> 查扣费记录</a></li>
            <li><a href="#myModal"  data-toggle="modal"><i class="icon-off"></i> 注销</a></li>
          </ul>
		  </li>
    <li><a href="about.php">关于</a></li>
		</ul>
		
	
		
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>欢迎使用自助查询系统</h1>
        <p>本系统只提供手机用户使用，您可以自助查询手机号套餐信息、余额信息以及缴费扣费信息等。谢谢使用。</p>
        <p><a href="http://weibo.com/p/1001603894053480593786" class="btn btn-primary btn-large">Like it</a></p>
      </div>

      <hr>
       
      <footer>
        <p>@自助查询系统</p>
      <!--  <a href="#myModal" role="button" class="btn" data-toggle="modal">查看演示案例</a> -->
      </footer>

    </div>
	<div id="myModal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>注销用户</h3>
  </div>
  <div class="modal-body">
    <p>注销后将离开此页面，是否确定注销？</p>
  </div>
  <div class="modal-footer">
    <a href="" class="btn">取消</a>
    <a href="logout.php" class="btn btn-primary">确定</a>
  </div>
</div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>