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
else{
	$notel=0;
	$paysuc=0;
	 if(isset($_POST['submit'])){
     $con=new mysqli('localhost:3306','root','','xjb');
    if($con->connect_error){
    die("Connection failed:".$con->connect_error);
    }
    $sql="select * from custinfo where tel='$_POST[tel]';";
    $result=$con->query($sql);
    if($result->num_rows==1){
         $sql="insert into payinfo values('$_POST[tel]',".$_POST['count'].",NOW(),'$_POST[cashier]');";
         $con->query($sql);
         $sql="update restmoney set count = count+".$_POST['count']." where tel='$_POST[tel]';";
         $con->query($sql);
         $sql="select * from restmoney where tel='$_POST[tel]';";
         $result=$con->query($sql);
         $row=mysqli_fetch_array($result);
         if($row['count']<0){
         	$sql="update stateinfo set state=0 where tel='$_POST[tel]';";
         	$con->query($sql);
         	$paysuc=1;
         }
         else{
         	$sql="update stateinfo set state=1 where tel='$_POST[tel]';";
         	$con->query($sql);
         	$paysuc=1;
         }
    }
    else{
         $notel=1;
    }
}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>充值缴费</title>
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
              <li><a href="admin.php">主页</a></li>
			  <li><a href="package.php">套餐详情</a></li>
			   <li><a href="achieve.php">业绩排行</a></li>
            
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
		</ul>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<div class="container">
<form class="form-horizontal" role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<?php
                if($notel==1){
                  echo "<div class=\"alert alert-error\">
                       <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                       <h4>修改失败！</h4>
                       没有查询到此手机号！
                       </div>";
                }
              else if($paysuc==1){ 
                    echo "<div class=\"alert alert-block\">
                       <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                       <h4>修改成功！</h4>
                        充值成功！
                       </div>";
                }
              ?>
 <fieldset>
 <legend>套餐信息</legend>
                     <div class="control-group">
                          <label class="control-label" for="inputEmail">手机号</label>
                           <div class="controls">
                              <input type="text" name="tel" placeholder="11位号码">
                           </div>
                         </div>
                     <div class="control-group">
                          <label class="control-label" for="inputEmail">充值金额</label>
                           <div class="controls">
                              <select name="count">
                              <option value="0">&ndash; 请选择充值金额  &ndash;</option>
                              <option value="20">20元</option>
                              <option value="30">30元</option>
                              <option value="50">50元</option>
                              <option value="100">100元</option>
                              <option value="200">200元</option>
                              <option value="300">300元</option>
                              <option value="500">500元</option>
                              </select>
                           </div>
                         </div>
                         <div class="control-group">
                            <label class="control-label">收款员</label>
						    <div class="controls">
                             <SELECT id="cashier" name="cashier">
                              <OPTION VALUE=0>&ndash; 请选择收款员 &ndash;</OPTION>
                           <?php
                             $conn=new mysqli('localhost:3306','root','','xjb');
                             if($conn->connect_error){
    								die("Connection failed:".$conn->connect_error);
    							}
                               $query="select * from cashierinfo;";
                               $result1=$conn->query($query);
                               if($result1->num_rows>0){
                                 while($row=mysqli_fetch_array($result1)){
                                 	 echo "<option value=".$row['cashier'].">".$row['cashier']."</option>";
                                 }
                               }
                               $conn->close();
                              ?> 
                             </SELECT>
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