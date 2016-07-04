<?php
if(!isset($_COOKIE['username'])){
	if(isset($_COOKIE['tel'])){
		$home_url = 'cust.php';
        header('Location:'.$home_url);
	}
	else{
		$home_url = 'adminlogin.php';
        header('Location:'.$home_url);
	}
}
else{
$telexist=0;
$wrongpassword=0;
$inserttelsuc=0;
$wrongpackageid=0;
$sthempty=0;
if(isset($_POST['submit'])){
$con=new mysqli('localhost:3306','root','','xjb');
if($con->connect_error){
die("Connection failed:".$con->connect_error);
}
if(empty($_POST['custname'])||empty($_POST['tel'])||empty($_POST['ID'])||empty($_POST['password1'])||empty($_POST['password2'])||empty($_POST['packageid'])||empty($_POST['serverid'])||empty($_POST['count'])||empty($_POST['cashier'])){
	$sthempty=1;
}
if($_POST['password1']!=$_POST['password2']){
   $wrongpassword=1;
}
else{
   $sql="select * from custinfo where tel='$_POST[tel]';";
   $result=$con->query($sql);
   if($result->num_rows>0){
	$telexist=1;
   }
   else{
        $insql="insert into custinfo values('$_POST[tel]','$_POST[password1]','$_POST[custname]','$_POST[ID]');";
       $con->query($insql);
       if($_POST['packageid']==0){
       	$wrongpackageid=1;
       }
       else{
       $insql="insert into businfo values('$_POST[tel]',".$_POST['packageid'].",'$_POST[serverid]',1,NOW());";
       $con->query($insql);
       $insertpay="insert into payinfo values('$_POST[tel]',".$_POST['count'].",NOW(),'$_POST[cashier]');";
       $con->query($insertpay);
       $insertrest="insert into restmoney values('$_POST[tel]',".$_POST['count'].");";
       $con->query($insertrest);
       $insertrest="insert into stateinfo values('$_POST[tel]',1);";
       $con->query($insertrest);
       $inserttelsuc=1;
      }
      }
   }
   }
}
?>






<!DOCTYPE html>
<html>
<head>
    <title>创建新手机号</title>
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
            <li><a href="pay.php"><i class="icon-eye-open"></i> 缴费充值</a></li>
            <li><a href="#myModal"  data-toggle="modal"><i class="icon-off"></i> 注销</a></li>
          </ul>
		  </li>
    <li><a href="about.php">关于</a></li>
		</ul>
		
	
		
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<form class="form-horizontal" role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
	                <?php
	                if($sthempty==1){
	                	echo "<div class=\"alert alert-error\">
                       <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                       <h4>录入失败！</h4>
                       请完整输入所有信息！
                       </div>";
	                }
	                else{
                      if($telexist==1){
                       echo "<div class=\"alert alert-error\">
                       <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                       <h4>录入失败！</h4>
                       此手机号已存在！
                       </div>";
                       }
                     else{
                      if($wrongpassword==1){
  	 					 echo "<div class=\"alert alert-error\">
  								<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
  								<h4>录入失败！</h4>
  								两次密码输入不一致
								</div>";
  								}
  						
  						else{
  							if($wrongpackageid==1){
  								echo "<div class=\"alert alert-error\">
  								<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
  								<h4>录入失败！</h4>
  								没有选择套餐
								</div>";
  							}
  							else if($inserttelsuc==1){
  								echo "<div class=\"alert alert-block\">
  								<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
  								<h4>录入成功！</h4>
  								此手机号已投入使用，谢谢
								</div>";
  							}
  						}
  					}
  				}
  				   ?>
                    <fieldset>
                        <legend>用户信息</legend>
                         <div class="control-group">
                           <label class="control-label" for="inputEmail">用户姓名</label>
                           <div class="controls">
                              <input type="text" name="custname" placeholder="不超过10位英文字母">
                           </div>
						 </div>
						 <div class="control-group">
                           <label class="control-label" for="inputEmail">身份证号</label>
                           <div class="controls">
                              <input type="text" name="ID" id="ID" placeholder="18位">
                           </div>
						 </div>
						 <div class="control-group">
                          <label class="control-label" for="inputEmail">手机号</label>
                           <div class="controls">
                              <input type="text" name="tel" id="tel" placeholder="11位数字">
                           </div>
                         </div>
						<div class="control-group">						 
					       <label "control-label">新密码</label>
						   <div class="controls">
                              <input type="password" name="password1" placeholder="不超过10位">
                           </div>
						</div>
                      <div class="control-group">						 
					       <label "control-label">确认密码</label>
						   <div class="controls">
                              <input type="password" name="password2" placeholder="不超过10位">
                           </div>
					  </div>
                    </fieldset>     
                    <fieldset>
                         <legend>套餐信息</legend>
						  <div class="control-group">
                            <label class="control-label">选择套餐</label>
						    <div class="controls">
                             <SELECT id="packageid" name="packageid">
                              <OPTION VALUE=0>&ndash; 请选择套餐 &ndash;</OPTION>
                              <?php
                              $conn=new mysqli('localhost:3306','root','','xjb');
                             if($conn->connect_error){
                             die("Connection failed:".$conn->connect_error);
                               }
                               $query="select * from packageinfo;";
                               $result=$conn->query($query);
                               if($result->num_rows>0){
                                 while($row=mysqli_fetch_array($result)){
                                 	 echo "<option value=".$row['packageid'].">".$row['packagename']."套餐</option>";
                                 }
                               }
                              ?>
                             </SELECT>
						    </div>
						  </div>
						    <div class="control-group">
                            <label class="control-label">客服代表</label>
						    <div class="controls">
                             <SELECT id="serverid" name="serverid">
                              <OPTION VALUE=0>&ndash; 请选择客服代表 &ndash;</OPTION>
                              <?php
                               $query="select * from serverinfo;";
                               $result=$conn->query($query);
                               if($result->num_rows>0){
                                 while($row=mysqli_fetch_array($result)){
                                 	 echo "<option value=".$row['serverid'].">".$row['servername']."</option>";
                                 }
                               }
                              ?>
                             </SELECT>
						    </div>
						  </div>						 
                    </fieldset>
                     <fieldset>
                         <legend>初次缴费</legend>
						  <div class="control-group">
                            <label class="control-label">缴费金额</label>
						      <div class="controls">
                              <input type="text" name="count" placeholder="不超过4位">
                           </div>
						    </div>
						  </div>
						    <div class="control-group">
                            <label class="control-label">收款员</label>
						    <div class="controls">
                             <SELECT id="cashier" name="cashier">
                              <OPTION VALUE=0>&ndash; 请选择收款员 &ndash;</OPTION>
                              <?php
                               $query="select * from cashierinfo;";
                               $result=$conn->query($query);
                               if($result->num_rows>0){
                                 while($row=mysqli_fetch_array($result)){
                                 	 echo "<option value=".$row['cashier'].">".$row['cashier']."</option>";
                                 }
                               }
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