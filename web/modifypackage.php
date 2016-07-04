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
   $noserver=0;
   $nomodify=0;
   $nouser=0;
   $modifysuc=0;
    if(isset($_POST['submit'])){
     $con=new mysqli('localhost:3306','root','','xjb');
    if($con->connect_error){
    die("Connection failed:".$con->connect_error);
    }

     else if($_POST['serverid']=="XJB"){
        $noserver=1;
      }
    else{
      $sql="select * from custinfo where custname='$_POST[custname]' and ID='$_POST[ID]' and tel='$_POST[tel]';";
      $result=$con->query($sql);
      if($result->num_rows==1){
        $sql="select * from businfo where tel='$_POST[tel]' and packagestate=1;";
        $result=$con->query($sql);
        $row=mysqli_fetch_array($result);

        if($row['packageid']==$_POST['packageid']){
          $nomodify=1;
        }
       else{
          $sql="update businfo set packagestate=0 where tel='$_POST[tel]';";
          $con->query($sql);
          $sql="insert into businfo values('$_POST[tel]',".$_POST['packageid'].",'$_POST[serverid]',1,NOW());";
          $con->query($sql);
          $modifysuc=1;
        }
      }
      else{
        $nouser=1;
      }
     }
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>修改套餐</title>
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
                if($noserver==1){
                  echo "<div class=\"alert alert-error\">
                       <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                       <h4>修改失败！</h4>
                       请选择客服代表！
                       </div>";
                }
                  else if($nomodify==1){
                  echo "<div class=\"alert alert-error\">
                       <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                       <h4>修改失败！</h4>
                       新套餐与当前套餐相同,请重新选择！
                       </div>";
                    }
                else if($nouser==1){
                     echo "<div class=\"alert alert-error\">
                       <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                       <h4>修改失败！</h4>
                       信息输入有误，请检查后重新输入！
                       </div>";
                  }
              else if($modifysuc==1){ 
                    echo "<div class=\"alert alert-block\">
                       <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                       <h4>修改成功！</h4>
                       套餐已修改成功，下月起生效！
                       </div>";
                }
              ?>
                    <fieldset>
                        <legend>修改套餐</legend>
                         <div class="control-group">
                           <label class="control-label" for="inputEmail">用户姓名</label>
                           <div class="controls">
                              <input type="text" name="custname" placeholder="不超过10位英文字母">
                           </div>
						 </div>
						 <div class="control-group">
                           <label class="control-label" for="inputEmail">身份证号</label>
                           <div class="controls">
                              <input type="text" name="ID" id="ID" placeholder="完整18位身份证号">
                           </div>
						 </div>
						  <div class="control-group">
                          <label class="control-label" for="inputEmail">手机号</label>
                           <div class="controls">
                              <input type="text" name="tel" id="tel" placeholder="11位数字">
                           </div>
                         </div>
              <div class="control-group">
                            <label class="control-label">选择新套餐</label>
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
                              <OPTION VALUE="XJB">&ndash; 请选择客服代表 &ndash;</OPTION>
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