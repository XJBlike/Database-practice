<?php
  $con=new mysqli('localhost:3306','root','','xjb');
  if($con->connect_error){
    die("Connection failed:".$con->connect_error);
  }
  $sql="select * from packageinfo";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>线上套餐</title>
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
	   echo "<li  class=\"active\"><a href=\"\">套餐详情</a></li>";
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
            <li><a href=\"pay.php\"><i class=\"icon-eye-open\"></i> 缴费充值</a></li>
            <li><a href=\"#myModal\"  data-toggle=\"modal\"><i class=\"icon-off\"></i> 注销</a></li>
          </ul>
		  </li>";
   }
   else{
	   echo "<li  class=\"active\"><a href=\"\">套餐详情</a></li>";
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
             <li><a href="about.php">关于</a></li>
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
	<div class="myrow2">
    <h3>Questions:</h3>
	<p>(1)Q:套餐之间有何不同</p>
	<p>   A:主要是套餐资费不同，国内流量不同，通话时长不同。</p>
	<p>(2)Q:学生有优惠吗？</p>
	<p>   A:您好，我们总会推出适用于在校学生的学生优惠套餐，流量相对较多，欢迎选购。</p>
	<p>(3)Q:商务套餐为何稍贵？</p>
	<p>   A:因为商务套餐的适用人群是经常出差的商旅人士，办理商务套餐可以减少很多漫游费，更加划算，欢迎选购。</p>
 </div>
<fieldset>
<legend>线上套餐详情</legend>
    <table class="table table-hover">
	<tr>
	<td>套餐编号</td><td>套餐名</td><td>每月资费</td><td>国内流量</td><td>语音时间</td>
	</tr>
	<?php
	$result=$con->query($sql);
	if($result->num_rows==0){
		echo "<tr>当前无任何套餐</tr>";
	}
	else{
		while($row=mysqli_fetch_array($result)){
			echo '<tr>
	              <td>'.$row['packageid'].'</td><td>'.$row['packagename'].'</td><td>'.$row['charge'].'元</td><td>'.$row['data'].'MB</td><td>'.$row['calltime'].'分钟</td>
	              </tr>';
		}
	}
  $con->close();
	?>
	</table>
     <button class="btn my-btn-primary" onclick="location.reload()">刷新</button>
</fieldset>
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