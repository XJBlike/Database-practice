<?php
//�ж��û��Ƿ��Ѿ�����cookie�����δ����$_COOKIE['user_id']ʱ��ִ�����´���
if(!isset($_COOKIE['tel'])){
	if(isset($_COOKIE['username'])){
		$home_url = 'admin.php';
    header('Location: '.$home_url);
	}
    $home_url = 'custlogin.php';
    header('Location: '.$home_url);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>�ֻ��û���ҳ</title>
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
		<div class="brand">�ֻ��û�������ѯϵͳ</div>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="">��ҳ</a></li>
              <li><a href="package.php">�ײ�����</a></li>
            
	  <li class="dropdown">
		 <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
           �ֻ��û�
         </a>
		  <ul class="dropdown-menu" role="menu">
            <li><a href="#icons-new"></a></li>
			<li><div class="divcenter"><i class="icon-user"></i><?php echo $_COOKIE['tel'];?></div></li>
            <li class="divider"></li>
			<li><a href="usersearch.php#A"><i class="icon-eye-open"></i> �鵱ǰ�ײ�</a></li>
            <li><a href="usersearch.php#B"><i class="icon-eye-open"></i> ���ֻ����</a></li>
            <li><a href="usersearch.php#C"><i class="icon-eye-open"></i> ��ɷѼ�¼</a></li>
			<li><a href="usersearch.php#D"><i class="icon-eye-open"></i> ��۷Ѽ�¼</a></li>
            <li><a href="#myModal"  data-toggle="modal"><i class="icon-off"></i> ע��</a></li>
          </ul>
		  </li>
    <li><a href="about.php">����</a></li>
		</ul>
		
	
		
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>��ӭʹ��������ѯϵͳ</h1>
        <p>��ϵͳֻ�ṩ�ֻ��û�ʹ�ã�������������ѯ�ֻ����ײ���Ϣ�������Ϣ�Լ��ɷѿ۷���Ϣ�ȡ�ллʹ�á�</p>
        <p><a href="http://weibo.com/p/1001603894053480593786" class="btn btn-primary btn-large">Like it</a></p>
      </div>

      <hr>
       
      <footer>
        <p>@������ѯϵͳ</p>
      <!--  <a href="#myModal" role="button" class="btn" data-toggle="modal">�鿴��ʾ����</a> -->
      </footer>

    </div>
	<div id="myModal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>ע���û�</h3>
  </div>
  <div class="modal-body">
    <p>ע�����뿪��ҳ�棬�Ƿ�ȷ��ע����</p>
  </div>
  <div class="modal-footer">
    <a href="" class="btn">ȡ��</a>
    <a href="logout.php" class="btn btn-primary">ȷ��</a>
  </div>
</div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>