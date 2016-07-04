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
    <title>业绩排行</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

            <script>  
            //绘制饼图  
            function drawCircle(canvasId, data_arr, color_arr, text_arr)  
            {  
                var c = document.getElementById(canvasId);  
                var ctx = c.getContext("2d");  
  
                var radius = c.height / 2 - 20; //半径  
                var ox = radius + 20, oy = radius + 20; //圆心  
  
                var width = 30, height = 10; //图例宽和高  
                var posX = ox * 2 + 20, posY = 30;   //  
                var textX = posX + width + 5, textY = posY + 10;  
  
                var startAngle = 0; //起始弧度  
                var endAngle = 0;   //结束弧度  
                for (var i = 0; i < data_arr.length; i++)  
                {  
                    //绘制饼图  
                    endAngle = endAngle + data_arr[i] * Math.PI * 2; //结束弧度  
                    ctx.fillStyle = color_arr[i];  
                    ctx.beginPath();  
                    ctx.moveTo(ox, oy); //移动到到圆心  
                    ctx.arc(ox, oy, radius, startAngle, endAngle, false);  
                    ctx.closePath();  
                    ctx.fill();  
                    startAngle = endAngle; //设置起始弧度  
  
                    //绘制比例图及文字  
                    ctx.fillStyle = color_arr[i];  
                    ctx.fillRect(posX, posY + 20 * i, width, height);  
                    ctx.moveTo(posX, posY + 20 * i);  
                    ctx.font = 'bold 12px 微软雅黑';    //斜体 30像素 微软雅黑字体  
                    ctx.fillStyle = color_arr[i]; //"#000000";  
                    var percent = text_arr[i] + "：" + 100 * data_arr[i] + "%";  
                    ctx.fillText(percent, textX, textY + 20 * i);  
                }  
            }  
  
            function init() {  
                //绘制饼图  
                //比例数据和颜色
               var color = new Array("#00FF21", "#FFAA00", "#00AABB", "#FF4400","#EE11C2","#F08080","#8B4513","#4D4D4D","#00FA9A","#FF00FF"); 
                var s = document.getElementById("mytable");
                var data = new Array(s.rows.length-1); 
                var data_arr = new Array(s.rows.length-1); 
                var color_arr=new Array(s.rows.length-1);
                 var text_arr = new Array(s.rows.length-1);
                 var k=0;
                 var all=0;
                for(var i=1;i<s.rows.length;i++){
                      text_arr[k]=s.rows[i].cells[1].innerHTML;
                      color_arr[k]=color[k];
                      data[k]=parseInt(s.rows[i].cells[2].innerHTML);
                      all+=data[k];
                      k++;
                  }
                   for(var m=0;m<k;m++){
                     data_arr[m]=data[m]/all;
                     data_arr[m]=data_arr[m].toFixed(2);
                   }
                    
                   drawCircle("canvas_circle", data_arr,color_arr,text_arr);
                }
                  
                 

  
            //页面加载时执行init()函数  
            window.onload = init;  
        </script> 
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
  <a name="A"></a>
<div class="hero-unit">
        <h2>客服代表业绩排行表</h2>
        <p>本页面将所有客服代表的业绩统计并排序，规则为推荐套餐数目多的排名靠前，此排名仅供参考。</p>
      </div>

      <table class="table table-hover" id="mytable">
      <tr><td>客服代表编号</td><td>客服代表名</td><td>业绩数额</td></tr>
      <?php
      $con=new mysqli('localhost:3306','root','','xjb');
        if($con->connect_error){
           die("Connection failed:".$con->connect_error);
             }
        $sql="select serverid,count(*) times from businfo group by serverid order by count(*) desc;";
        $result=$con->query($sql);
        while($row=mysqli_fetch_array($result)){
          $serverid=$row['serverid'];
          $sql="select * from serverinfo where serverid='$serverid';";
          $result1=$con->query($sql);
          $row1=mysqli_fetch_array($result1);
          $servername=$row1['servername'];
          echo "<tr><td>$serverid</td><td>$servername</td><td>".$row['times']."</td></tr>";
        }
      ?>

     </table>
      <hr>
      <a name="B"></a>
      <div class="hero-unit">
        <h2>客服代表业绩分布图</h2>
        <p>本页面将所有客服代表的业绩统计并绘图，规则为推荐套餐数目多的占比较大，此图仅供参考。</p>
      </div>

        <div style="text-align:center;">  
            <canvas id="canvas_circle" width="500" height="300" style="border:0px solid #0026ff;" >  
                浏览器不支持canvas  
            </canvas>  
        </div>  
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