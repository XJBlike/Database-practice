<?php
define('DB_HOST', 'localhost:3306');
//用户名
define('DB_USER', 'root');
//口令
define('DB_PASSWORD','');
//数据库名
define('DB_NAME','xjb') ;
$wrong=0;
$error_msg = "";
//判断用户是否已经设置cookie，如果未设置$_COOKIE['user_id']时，执行以下代码
if(!isset($_COOKIE['username'])&&!isset($_COOKIE['tel'])){
    if(isset($_POST['submit'])){//判断用户是否提交登录表单，如果是则执行如下代码
        $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $user_username = mysqli_real_escape_string($dbc,trim($_POST['username']));
        $user_password = mysqli_real_escape_string($dbc,trim($_POST['password']));

        if(!empty($user_username)&&!empty($user_password)){
            //MySql中的SHA()函数用于对字符串进行单向加密
            $query = "SELECT  username FROM admin WHERE username = '$user_username' AND "."password = '$user_password'";
            //用用户名和密码进行查询
            $data = mysqli_query($dbc,$query);
            //若查到的记录正好为一条，则设置COOKIE，同时进行页面重定向
            if(mysqli_num_rows($data)==1){
                $row = mysqli_fetch_array($data);
                //setcookie('user_id',$row['user_id']);
                setcookie('username',$row['username']);
                //$home_url='loged.php';
				$home_url = 'admin.php';
                header('Location: '.$home_url);
            }else{//若查到的记录不对，则设置错误信息
                $wrong=1;
            }
        }else{
           $wrong=1;
    }
    }
}else if(isset($_COOKIE['username'])){//如果用户已经登录，则直接跳转到已经登录页面
    $home_url = 'admin.php';
    header('Location: '.$home_url);
}
else{
	 $home_url = 'cust.php';
     header('Location: '.$home_url);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>管理人员登录</title>
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
          <div class="brand">游客主页</div>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="homepage.php">主页</a></li>
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
			  <li class="active"><a href="adminlogin.php">管理人员登录</a></li> 
			  <li><a href="about.php">关于</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<div class="container">	
	<form class="form-horizontal" role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <?php
  if($wrong==1){
    echo "<div class=\"alert alert-error\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
  <h4>登陆失败！</h4>
  用户名或密码错误，请重新输入...
</div>";
  }
  ?>
	<fieldset>
	<legend>管理人员登录</legend>
       <div class="control-group">
        <label class="control-label" for="inputEmail">Username</label>
        <div class="controls">
         <input type="text" name="username" placeholder="Username">
        </div>
       </div>
     <div class="control-group">
      <label class="control-label" for="inputPassword">Password</label>
      <div class="controls">
       <input type="password" name="password" placeholder="Password">
      </div>
     </div>
	</fieldset>
	<div><hr/></div>
	<div class="control-group">
	   <div class="controls">
        <button name="submit" type="submit" class="btn btn-info">提交</button>
        <button id="reset" type="reset" class="btn btn-warning">重置</button>
      </div>
	  </div>
</form>
<div class="myrow">
    <h3>Questions:</h3>
	<p>(1)Q:管理员如何登陆？</p>
	<p>   A:管理员用自己的用户名和密码登录。</p>
	<p>(2)Q:套餐情况？</p>
	<p>   A:管理员可以发布新套餐，但不能删除原套餐。</p>
	<p>(3)Q:能否修改套餐？</p>
	<p>   A:可以帮助用户修改套餐，但是不能修改原套餐具体内容。</p>
 </div>
</div>
	</body>
	 <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</html>