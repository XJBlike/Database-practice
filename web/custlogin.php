<?php
define('DB_HOST', 'localhost:3306');
//�û���
define('DB_USER', 'root');
//����
define('DB_PASSWORD','');
//���ݿ���
define('DB_NAME','xjb') ;
$wrong=0;
$error_msg = "";

//�ж��û��Ƿ��Ѿ�����cookie�����δ����$_COOKIE['user_id']ʱ��ִ�����´���
if(!isset($_COOKIE['username'])&&!isset($_COOKIE['tel'])){
     
	if(isset($_POST['submit'])){//�ж��û��Ƿ��ύ��¼�����������ִ�����´���
            
	   $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $user_tel = mysqli_real_escape_string($dbc,trim($_POST['tel']));
        $user_password = mysqli_real_escape_string($dbc,trim($_POST['password']));
        
		//echo "<script>alert(".$user_tel.")</script>"; 
	   //echo "<script>alert(".$user_password.")</script>"; 
        if(!empty($user_tel)&&!empty($user_password)){
			//echo "<script>alert(1)</script>";
            //MySql�е�SHA()�������ڶ��ַ������е������
            $query = "SELECT tel FROM custinfo WHERE tel = '$user_tel' AND password = '$user_password'";
            //���û�����������в�ѯ
            $data = mysqli_query($dbc,$query);
            //���鵽�ļ�¼����Ϊһ����������COOKIE��ͬʱ����ҳ���ض���
            if(mysqli_num_rows($data)==1){
				//echo "<script>alert(1)</script>";
                $row = mysqli_fetch_array($data);               
                setcookie('tel',$row['tel']);       
				$home_url = 'cust.php';
                header('Location: '.$home_url);
            }else{//���鵽�ļ�¼���ԣ������ô�����Ϣ
                $wrong=1;
            }
        }else{
           $wrong=1;
    }
    }
}else if(isset($_COOKIE['username'])){//����û��Ѿ���¼����ֱ����ת���Ѿ���¼ҳ��
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
    <title>�ֻ��û���¼</title>
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
          <div class="brand">�ο���ҳ</div>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="homepage.php">��ҳ</a></li>
			  <li class="dropdown">
		         <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
           �ο͹���
           </a>
		  <ul class="dropdown-menu" role="menu">
            <li><a href="#icons-new"></a></li>
            <li class="divider"></li>
			<li><a href="package.php"><i class="icon-eye-open"></i> �����ײ�����</a></li>
            <li><a href="company.html"><i class="icon-eye-open"></i> ��˾�ſ�</a></li>
              <li><a href="shop.html"><i class="icon-eye-open"></i>����Ӫҵ��</a></li>
			<li><a href="netshop.html"><i class="icon-eye-open"></i>����Ӫҵ��</a></li>

          </ul>
		  </li>
			  <li class="active"><a href="custlogin.php">�ֻ��û���¼</a></li>
			  <li><a href="adminlogin.php">������Ա��¼</a></li>
			  <li><a href="about.php">����</a></li>
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
  <h4>��½ʧ�ܣ�</h4>
  �ֻ��Ż������������������...
</div>";
  }
  ?>
	<fieldset>
	<legend>�ֻ��û���¼</legend>
       <div class="control-group">
        <label class="control-label" for="inputEmail">Tel</label>
        <div class="controls">
         <input type="text" name="tel" placeholder="Telphone number">
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
        <button name="submit" type="submit" class="btn btn-info">�ύ</button>
        <button name="reset" type="reset" class="btn btn-warning">����</button>
      </div>
	  </div>
</form>
 <div class="myrow">
    <h3>Questions:</h3>
	<p>(1)Q:�ֻ��û���ε�½��</p>
	<p>   A:�ο����ȵ��ͽ�Ӫҵ�������֤����һ���ֻ��ţ�Ȼ��ѡ��һ���ײͣ��趨���룬�������ֻ��ŵ�¼����ϵͳ�����û�����ֱ���ֻ��������¼��</p>
	<p>(2)Q:�ײ������</p>
	<p>   A:���ã���ǰ�����ܹ������4g�ײͶ������ڵ�����->�ο͹����в�ѯ�õ����������ȿ���ʹ���Ŀ��ײͣ�Ȼ����ȥӪҵ������</p>
	<p>(3)Q:�ܷ��޸��ײͣ�</p>
	<p>   A:��ǰϵͳ�����޸��ײͣ���Ҫ��Ӫҵ���ɹ�����ԱЭ�������������㣬�����½⣡</p>
 </div>
</div>
	</body>
	 <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</html>