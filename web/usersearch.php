<?php
//判断用户是否已经设置cookie，如果未设置$_COOKIE['user_id']时，执行以下代码
if(!isset($_COOKIE['tel'])){
	if(isset($_COOKIE['username'])){
		  $home_url = 'admin.php';
          header('Location: '.$home_url);
	}
	else{
    $home_url = 'custlogin.php';
    header('Location: '.$home_url);
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>查询页面</title>
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
              <li><a href="homepage.php">主页</a></li>
	        <li><a href="usersearch.php#A">查当前套餐</a></li>
            <li><a href="usersearch.php#B"> 查余额</a></li>
            <li><a href="usersearch.php#C"> 查缴费</a></li>
			<li><a href="usersearch.php#D">查扣费</a></li>
            <li><a href="logout.php">注销<?php echo $_COOKIE['tel']; ?></a></li>
		     <li><a href="about.php">关于</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<div class="container">
	 <legend><a name="A"></a></legend>
	 <div class="hero-unit">
        <h1>当前套餐信息</h1>
        <p>当前套餐指此手机号现在所使用的资费套餐，如另有需求，可前往营业厅修改套餐。</p>
	  <?php
	   $con=new mysqli('localhost:3306','root','','xjb');
	   if($con->connect_error){
		   die("Connection failed:".$con->connect_error);
	   }
	   $sql="select * from packageinfo where packageid=(select packageid from businfo where packagestate=1 and tel="."'$_COOKIE[tel]'".");";
	   $result=$con->query($sql);
	   if($result->num_rows==1){
		   $row=mysqli_fetch_array($result);
		   echo "<table class=\"table\"><tr><td>套餐编号</td><td>套餐名称</td><td>套餐资费</td><td>国内流量</td><td>通话时长</td></tr>";
		   echo "<tr><td>".$row['packageid']."</td><td>".$row['packagename']."</td><td>".$row['charge']."元</td><td>".$row['data']."MB</td><td>".$row['calltime']."分钟</td></tr></table>";
	   }
	   else{
		  echo  "<h2>当前无任何套餐!</h2>";
	   }
	  ?>
	  </div>
	  <legend><a name="B"></a></legend>
	   <div class="hero-unit">
        <h1>当前余额信息</h1>
        <p>当前余额指此手机号当前可用余额，如小于0，表示已欠费，状态会被置为停机状态；反之则为正常可用状态。</p>
	  <?php
	   $sql="select * from restmoney where tel="."'$_COOKIE[tel]';";
	  $result=$con->query($sql);
	   if($result->num_rows==1){
		   $row=mysqli_fetch_array($result);
		   $tel=$row['tel'];
		   $count=$row['count'];
		   $sql="select * from stateinfo where tel='$tel';";
		   $result=$con->query($sql);
		   $row=mysqli_fetch_array($result);
		   $state=$row['state'];
		   echo "<table class=\"table\"><tr><td>手机号</td><td>当前余额</td><td>号码状态</td></tr>";
		   echo "<tr><td>".$tel."</td><td>".$count."</td>";
		   if($state==1){
		  echo "<td>正常可用</td></tr></table>";
		   }
		  else{
			  echo "<td>已欠费停机</td></tr></table>";
		  }
	   }
	   else{
		  echo  "<h2>查询出错，无余额信息!</h2>";
	   }
	  ?>
	  </div>
	
	   <legend><a name="C"></a></legend>
	   <div class="hero-unit">
        <h1>缴费记录</h1>
        <p>缴费记录表示此手机号码的缴费记录，包括金额，办理时间以及办理的收款员。</p>
	  <?php
	   $sql="select * from payinfo where tel='$_COOKIE[tel]' order by time desc";
	  $result=$con->query($sql);
	   if($result->num_rows>0){
		   echo "<h2>手机号：".$_COOKIE['tel']."</h2>";
		   echo "<table class=\"table\"><tr><td>缴费金额</td><td>办理时间</td><td>收款员</td></tr>";
          while($row=mysqli_fetch_array($result)){ 
		  echo "<tr><td>".$row['count']."</td><td>".$row['time']."</td><td>".$row['cashier']."</td></tr>";
		  }
		  echo "</table>";
	   }
	   else{
		  echo  "<h2>当前手机号无任何缴费记录!</h2>";
	   }
	  ?>
	  </div>
	  
	  
	   <legend><a name="D"></a></legend>
	   <div class="hero-unit">
        <h1>扣费记录</h1>
        <p>扣费记录表示此手机号码的扣费记录，包括金额，系统扣费时间。</p>
	  <?php
	   $sql="select * from feedesinfo where tel='$_COOKIE[tel]' order by time desc";
	  $result=$con->query($sql);
	   if($result->num_rows>0){
		   echo "<h2>手机号：".$_COOKIE['tel']."</h2>";
		   echo "<table class=\"table\"><tr><td>扣费金额</td><td>系统扣费时间</td></tr>";
          while($row=mysqli_fetch_array($result)){ 
		  echo "<tr><td>".$row['count']."</td><td>".$row['time']."</td></tr>";
		  }
		  echo "</table>";
	   }
	   else{
		  echo  "<h2>当前手机号无任何扣费记录!</h2>";
	   }
	  ?>
	  </div>
	  
	  </div>
		<div name="myModal" class="modal hide fade">
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
	
	</div>
	</body>
	</html>