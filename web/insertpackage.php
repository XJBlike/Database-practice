<?php
if(!isset($_COOKIE['username'])){
	if(!isset($_COOKIE['tel'])){
$home_url = 'adminlogin.php';
header('Location:'.$home_url);
}
else{
	$home_url = 'cust.php';
header('Location:'.$home_url);
}
}
else{
$wrong=0;
$right=0;
if(isset($_POST['submit'])){
$con=new mysqli('localhost:3306','root','','xjb');
if($con->connect_error){
die("Connection failed:".$con->connect_error);
}
if($_POST['packageid']==0){
	$wrong=1;
}
else{
$insql="insert into packageinfo values(".$_POST['packageid'].",'$_POST[packagename]',".$_POST['charge'].",".$_POST['data'].",".$_POST['calltime'].");";
$con->query($insql);
$right=1;
}
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>发布新套餐</title>
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
                    <fieldset>
                    <?php
                      if($wrong==1){
                       echo "<div class=\"alert alert-error\">
                       <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                       <h4>录入失败！</h4>
                       请检查输入数据是否符合规范...
                       </div>";
                       }
                      if($right==1){
  	 					 echo "<div class=\"alert alert-error\">
  								<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
  								<h4>录入成功！</h4>
  								可进入套餐详情查看
								</div>";
  								}
  				   ?>
                        <legend>套餐信息</legend>
                         <div class="control-group">
                           <label class="control-label" for="inputEmail">套餐编号</label>
                           <div class="controls">
                              <select id="packageid" name="packageid">
                              <option value="0">&ndash; 请选择编号 &ndash;</option>
                           <?php
                           $conn=new mysqli('localhost:3306','root','','xjb');
                           if($conn->connect_error){
                           die("Connection failed:".$conn->connect_error);
                            }
                                $package = array(1,0,0,0,0,0,0,0,0,0);
                                $query="select * from packageinfo;";
                                $result=$conn->query($query);                        
                                while($row=mysqli_fetch_array($result)){
                                	$num=$row['packageid'];
                                	$package[$num]=1;
                                }
                               $arrlength=count($package);
                               for($x=1;$x<$arrlength;$x++){
                               	if($package[$x]==0){
                               		echo "<option value=".$x.">".$x."</option>";
                               	}
                               }
                             ?>  
                            </select>
                           </div>
						 </div>
						 <div class="control-group">
                          <label class="control-label" for="inputEmail">套餐名称</label>
                           <div class="controls">
                              <input type="text" name="packagename" placeholder="只允许英文">
                           </div>
                         </div>
						 <div class="control-group">
                          <label class="control-label" for="inputEmail">套餐资费</label>
                           <div class="controls">
                              <input type="text" name="charge" placeholder="1000以下正整数">元
                           </div>
                         </div>
						<div class="control-group">
                          <label class="control-label" for="inputEmail">国内流量</label>
                           <div class="controls">
                              <input type="text" name="data" placeholder="10000以下整数">MB
                           </div>
                         </div>
                         <div class="control-group">
                          <label class="control-label" for="inputEmail">通话时长</label>
                           <div class="controls">
                              <input type="text" name="calltime" placeholder="1000以下正整数">分钟
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
	<legend>线上套餐详情</legend>
    <table class="table table-hover">
	<tr>
	<td>套餐编号</td><td>套餐名</td><td>每月资费</td><td>国内流量</td><td>语音时间</td>
	</tr>
	<?php
	$connection=new mysqli('localhost:3306','root','','xjb');
                           if($connection->connect_error){
                           die("Connection failed:".$connection->connect_error);
                            }
	$sql="select * from packageinfo;";
	$result=$connection->query($sql);
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
  $connection->close();
	?>
	</table>
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