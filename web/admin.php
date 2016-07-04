<?php
//判断用户是否已经设置cookie，如果未设置$_COOKIE['user_id']时，执行以下代码
if(!isset($_COOKIE['username'])){
	if(isset($_COOKIE['tel'])){
		  $home_url = 'cust.php';
          header('Location: '.$home_url);
	}
	else{
    $home_url = 'adminlogin.php';
    header('Location: '.$home_url);
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>管理员首页</title>
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
          <div class="brand">电信收费管理系统</div>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="">主页</a></li>
			  <li><a href="package.php">套餐详情</a></li>
			   <li class="dropdown">
          <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
           业绩排行
          </a>
      <ul class="dropdown-menu" role="menu">  
            <li><a href="achieve.php#A"><i class="icon-eye-open"></i> 表格式</a></li>
             <li><a href="achieve.php#B"><i class="icon-eye-open"></i> 图形式</a></li>
          </ul>
         </li>
            
	  <li class="dropdown">
		 <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
           管理员
          </a>
		  <ul class="dropdown-menu" role="menu">
            <li><a href="#icons-new"></a></li>
            <li><div class="divcenter"><i class="icon-user"></i><?php echo $_COOKIE['username'];?></div></li>
			<li class="divider"></li>
            
            <li><a href="insertpackage.php"><i class="icon-edit"></i> 发布新套餐</a></li>
            <li><a href="inserttel.php"><i class="icon-edit"></i> 创建新手机号</a></li>
            <li><a href="deletetel.php"><i class="icon-trash"></i> 注销手机号</a></li>
            <li><a href="modifypackage.php"><i class="icon-pencil"></i>  修改套餐</a></li>
            <li><a href="pay.php"><i class="icon-eye-open"></i> 充值缴费</a></li>
            <li><a href="#myModal"  data-toggle="modal"><i class="icon-off"></i> 注销</a></li>
          </ul>
		  </li>
    <li><a href="about.php">关于</a></li>
   <li>
     <form class="form-search" method="POST" action="searchuser.php">
       <div class="input-prepend input-append">
         <span class="add-on">搜索手机号</span>
         <input class="span2" name="tel" type="text">
         <button class="btn" type="submit">Go!</button>
       </div>
     </form>
   </li>  
 
		</ul>
		
	
		
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>欢迎使用管理系统</h1>
        <p>本系统只提供管理人员使用，可以录入套餐信息以及用户缴费信息等，也可删除修改查询所需信息。当然也具备特殊的查看权限，本系统最终解释权归徐佳宝所有，欢迎使用</p>
        <p><a href="http://weibo.com/p/1001603894053480593786" class="btn btn-primary btn-large">Like it</a></p>
      </div>

      <hr>

      <footer>
        <p>@电信资费管理系统</p>
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