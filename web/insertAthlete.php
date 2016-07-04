<?php
if(!isset($_COOKIE['username'])){
$home_url = 'logIn.php';
header('Location:'.$home_url);
}
else{
if(isset($_POST['submit'])){
$con=new mysqli('localhost:3306','root','','xjb');
if($con->connect_error){
die("Connection failed:".$con->connect_error);
}
$sql="select * from AthleteInfo where AthleteId=".$_POST['AthleteId'].";";
$result=$con->query($sql);
if($result->num_rows>0){
	echo "<script>alert(\"该运动员编号已存在！\");</script>";
}
else{
	$eventid1=$_POST['EventId1'];
	$eventid2=$_POST['EventId2'];
	$eventid3=$_POST['EventId3'];
	if($_POST['EventId1']==0){
		$eventid1="null";
	}
	if($_POST['EventId2']==0){
		$eventid2="null";
	}
	if($_POST['EventId3']==0){
		$eventid3="null";
	}
$insql="insert into AthleteInfo values(".$_POST['AthleteId'].",'$_POST[AthleteName]','$_POST[Sex]',".$_POST['Age'].",".$_POST['CountryId'].",".$eventid1.",".$eventid2.",".$eventid3.");";

$con->query($insql);
echo "<script>alert(\"录入成功！\");</script>";
}
}
}
?>






<!DOCTYPE html>
<html>
<head>
    <title>运动员登记</title>
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
          <div class="brand">第28届田径世锦赛</div>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="">主页</a></li>
              <li><a href="medal.html">奖牌榜</a></li>
			  <li><a href="schedule.html">赛事日程</a></li>
			  <li><a href="about.html">关于</a></li>
           <li class="dropdown">
		 <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
           管理员
            <i class="icon-caret-down"><?php echo $_COOKIE['username'];?></i>
          </a>
		  <ul class="dropdown-menu" role="menu">
            <li><a href="#icons-new"></a></li>
            <li class="divider"></li>
            
            <li><a href="insertAthlete.php"><i class="icon-edit"></i> 运动员报名</a></li>
            <li><a href="insertGrade.php"><i class="icon-edit"></i> 赛事成绩录入</a></li>
            <li><a href="delete.php"><i class="icon-trash"></i> 删除记录</a></li>
            <li><a href="modify.php"><i class="icon-pencil"></i>  修改纪录</a></li>
            <li><a href="search.php"><i class="icon-eye-open"></i> 查询信息</a></li>
            <li><a href="logout.php"><i class="icon-off"></i> 注销</a></li>
          </ul>
		  </li>           
		   </ul>
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<form class="form-horizontal" role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <fieldset>
                        <legend>运动员信息</legend>
                         <div class="control-group">
                           <label class="control-label" for="inputEmail">编号</label>
                           <div class="controls">
                              <input type="text" id="AthleteId" placeholder="三位数字">
                           </div>
						 </div>
						 <div class="control-group">
                          <label class="control-label" for="inputEmail">姓名</label>
                           <div class="controls">
                              <input type="text" id="AthleteName" placeholder="小于20个字符">
                           </div>
                         </div>
						<div class="control-group">						 
					       <label "control-label">性别</label>
						   <div class="controls">
                            <select id="Sex" name="Sex" onChange="showRight(this.value);">
                             <option value="default">&ndash; 选择性别 &ndash;</option>
                             <option value="M">男</option>
                             <option value="F">女</option>
                            </select>
					      </div>
						</div>
                       <div class="control-group">
                          <label class="control-label" for="inputEmail">年龄</label>
                           <div class="controls">
                              <input type="text" id="Age" placeholder="两位数字">
                           </div>
                        </div>
						 <div class="control-group">						 
					       <label "control-label">国籍</label>
						   <div class="controls">
                            <select id="CountryId" name="CountryId">
                             <option value="000">&ndash; 选择国籍 &ndash;</option>
                             <option value="001">中国</option>
                             <option value="002">美国</option>
                             <option value="003">英国</option>
                             <option value="004">日本</option>
                             <option value="005">韩国</option>
                             <option value="006">加拿大</option>
                             <option value="007">德国</option>
                             <option value="008">法国</option>
			                 <option value="009">澳大利亚</option>
			                 <option value="010">巴西</option>
			                 <option value="011">俄罗斯</option>
			                 <option value="012">印度</option>
			                 <option value="013">瑞典</option>
			                 <option value="014">希腊</option>
                            </select>
					      </div>
						</div>
                    </fieldset>     
                    <fieldset>
                         <legend>参赛信息</legend>
						  <div class="control-group">
                            <label class="control-label">参赛项目1</label>
						    <div class="controls">
                             <SELECT id="EventId1" NAME="EventId1">
                              <OPTION VALUE="00">请选择参赛项目</OPTION>
			                  <option value="01">男子100m</option>
							  <option value="02">男子200m</option>
							  <option value="03">男子400m</option>
							  <option value="04">男子跳高</option>
							  <option value="05">男子1500m</option>
							  <option value="06">女子100m</option>
							  <option value="07">女子200m</option>
							  <option value="08">女子400m</option>
							  <option value="09">女子1000m</option>
							  <option value="10">女子跳高</option>
							  <option value="11">男子三级跳远</option>
							  <option value="12">男子铅球</option>
							  <option value="13">女子铁饼</option>
							  <option value="14">女子标枪</option>
                             </SELECT>
						    </div>
						  </div>
						  <div class="control-group">
                            <label class="control-label">参赛项目2</label>
						    <div class="controls">
                             <SELECT id="EventId2" NAME="EventId2">
                              <OPTION VALUE="00">请选择参赛项目</OPTION>
			                  <option value="01">男子100m</option>
							  <option value="02">男子200m</option>
							  <option value="03">男子400m</option>
							  <option value="04">男子跳高</option>
							  <option value="05">男子1500m</option>
							  <option value="06">女子100m</option>
							  <option value="07">女子200m</option>
							  <option value="08">女子400m</option>
							  <option value="09">女子1000m</option>
							  <option value="10">女子跳高</option>
							  <option value="11">男子三级跳远</option>
							  <option value="12">男子铅球</option>
							  <option value="13">女子铁饼</option>
							  <option value="14">女子标枪</option>
                             </SELECT>
						    </div>
						  </div>
						  <div class="control-group">
                            <label class="control-label">参赛项目3</label>
						    <div class="controls">
                             <SELECT id="EventId3" NAME="EventId3">
                              <OPTION VALUE="00">请选择参赛项目</OPTION>
			                  <option value="01">男子100m</option>
							  <option value="02">男子200m</option>
							  <option value="03">男子400m</option>
							  <option value="04">男子跳高</option>
							  <option value="05">男子1500m</option>
							  <option value="06">女子100m</option>
							  <option value="07">女子200m</option>
							  <option value="08">女子400m</option>
							  <option value="09">女子1000m</option>
							  <option value="10">女子跳高</option>
							  <option value="11">男子三级跳远</option>
							  <option value="12">男子铅球</option>
							  <option value="13">女子铁饼</option>
							  <option value="14">女子标枪</option>
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
 <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>