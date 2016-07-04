<!DOCTYPE html>
<html>
  <head>
    <title>关于系统</title>
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
		   <?php
		  if(isset($_COOKIE['tel'])){
           echo "<div class=\"brand\">手机用户自助查询系统</div>";
		  }
		  else if(isset($_COOKIE['username'])){
			   echo "<div class=\"brand\">电信收费管理系统</div>";
		  }
		  else{
			  echo "<div class=\"brand\">游客页面</div>";
		  }
		  ?>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="homepage.php">主页</a></li>
			  <?php
    if(!isset($_COOKIE['username'])&&!isset($_COOKIE['tel'])){
			  echo "<li class=\"dropdown\">
		         <a href=\"#\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
           游客功能
           </a>
		  <ul class=\"dropdown-menu\" role=\"menu\">
            <li><a href=\"#icons-new\"></a></li>
            <li class=\"divider\"></li>
			<li><a href=\"package.php\"><i class=\"icon-eye-open\"></i> 线上套餐详情</a></li>
            <li><a href=\"company.html\"><i class=\"icon-eye-open\"></i> 公司概况</a></li>
              <li><a href=\"shop.html\"><i class=\"icon-eye-open\"></i>线下营业厅</a></li>
			<li><a href=\"netshop.html\"><i class=\"icon-eye-open\"></i>网上营业厅</a></li>

          </ul>
		  </li>
		 
		 <li><a href=\"custlogin.php\">手机用户登录</a></li>
			  <li><a href=\"adminlogin.php\">管理人员登录</a></li>";
		  }
		  
   else if(isset($_COOKIE['username'])){
	   echo "<li><a href=\"package.php\">套餐详情</a></li>";
     echo "<li class=\"dropdown\">
          <a href=\"#\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
           业绩排行
          </a>
      <ul class=\"dropdown-menu\" role=\"menu\">  
            <li><a href=\"achieve.php#A\"><i class=\"icon-eye-open\"></i> 表格式</a></li>
             <li><a href=\"achieve.php#B\"><i class=\"icon-eye-open\"></i> 图形式</a></li>
          </ul>
         </li>";
	   echo "<li class=\"dropdown\">
		 <a href=\"#\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
           管理员
          </a>
		  <ul class=\"dropdown-menu\" role=\"menu\">
            <li><a href=\"#icons-new\"></a></li>
			<li><div class=\"divcenter\"><i class=\"icon-user\"></i>";
			echo $_COOKIE['username'];
			echo "</div></li>
            <li class=\"divider\"></li>
            <li><a href=\"insertpackage.php\"><i class=\"icon-edit\"></i> 发布新套餐</a></li>
            <li><a href=\"inserttel.php\"><i class=\"icon-edit\"></i> 创建新手机号</a></li>
            <li><a href=\"deletetel.php\"><i class=\"icon-trash\"></i> 注销手机号</a></li>
            <li><a href=\"modifypackage.php\"><i class=\"icon-pencil\"></i>  修改套餐</a></li>
            <li><a href=\"pay.php\"><i class=\"icon-eye-open\"></i> 充值缴费</a></li>
            <li><a href=\"#myModal\"  data-toggle=\"modal\"><i class=\"icon-off\"></i> 注销</a></li>
          </ul>
		  </li>";
   }
   else{
	   echo "<li><a href=\"package.php\">套餐详情</a></li>";
	    echo "<li class=\"dropdown\">
		 <a href=\"#\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
           手机用户
         </a>
		  <ul class=\"dropdown-menu\" role=\"menu\">
            <li><a href=\"#icons-new\"></a></li>
			<li><div class = \"divcenter\"><i class=\"icon-user\"></i>";
			echo $_COOKIE['tel'];
			echo "</div></li>
            <li class=\"divider\"></li>
			<li><a href=\"usersearch.php#A\"><i class=\"icon-eye-open\"></i> 查当前套餐</a></li>
            <li><a href=\"usersearch.php#B\"><i class=\"icon-eye-open\"></i> 查手机余额</a></li>
            <li><a href=\"usersearch.php#C\"><i class=\"icon-eye-open\"></i> 查缴费记录</a></li>
			<li><a href=\"usersearch.php#D\"><i class=\"icon-eye-open\"></i> 查扣费记录</a></li>
			
            <li><a href=\"#myModal\"  data-toggle=\"modal\"><i class=\"icon-off\"></i> 注销</a></li>
          </ul>
		  </li>";
   }   
		  ?>
		  <li class="active"><a href="">关于</a></li>
      <?php
             if(isset($_COOKIE['username'])){
             echo "<li>
                     <form class=\"form-search\" method=\"POST\" action=\"searchuser.php\">
                           <div class=\"input-prepend input-append\">
                            <span class=\"add-on\">搜索手机号</span>
                              <input class=\"span2\" name=\"tel\" type=\"text\">
                              <button class=\"btn\" type=\"submit\">Go!</button>
                            </div>
                     </form>
                     </li>";
             }
             ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<div class="container">
      <div class="row">
        <div class="span4">
          <h2>徐佳宝</h2>
		  <p>性别:男</p>
          <p>邮箱:1130193186@qq.com</p>
		  <p>电话:15629051257</p>
		  <p>个人简介:谁容许你窥视朕？</p>
          <p><a class="btn" href="xjb.html">more details</a></p>
        </div>
        <div class="span4">
          <h2>毛一鸣</h2>
          <p>性别：男</p>
		  <p>邮箱：m13260644613@163.com</p>
		  <p>电话:13260644613</p>
		  <p>个人简介:让我一个人静静...</p>
       </div>
        <div class="span4">
          <h2>系统开发概况</h2>
          <p>系统环境：windows 10 x64</p>
		  <p>代码编辑器：Sublime Text 3</p>
		  <p>架构：B/S结构</p>
		  <p>软件环境：php5.5.12+Apache2.4.9+MySQL5.6.17</p>
		  <p>网页模板：bootstrap</p>
		  <p>详情联系QQ：1130193186</p>
        </div>
      </div>

      <hr>

      <footer>
        <p>@电信收费信息管理系统</p>
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