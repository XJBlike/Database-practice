<?php
if(isset($_COOKIE['username'])){//����û��Ѿ���¼����ֱ����ת���Ѿ���¼ҳ��
    $home_url = 'admin.php';
    header('Location: '.$home_url);
}
else if(isset($_COOKIE['tel'])){
	 $home_url = 'cust.php';
     header('Location: '.$home_url);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>��ҳ</title>
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
          <div class="brand">�ο�ҳ��</div>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="">��ҳ</a></li>
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
			  <li><a href="custlogin.php">�ֻ��û���¼</a></li>
			  <li><a href="adminlogin.php">������Ա��¼</a></li>
			  <li><a href="about.php">����</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>��ӭʹ�õ��Ź���ϵͳ!</h1>
        <p>��ϵͳ����ѱ��Լ�ëһ�����Ͽ�����������ṩ�ֻ�����ѯ���ɷѼ�¼��ѯ�ȹ��ܣ�Ҳ�������Ա�ṩ¼����Ϣ�ȹ��ܣ�ллʹ�á�</p>
        <p><a href="http://weibo.com/p/1001603894053480593786" class="btn btn-primary btn-large">Like it</a></p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
          <h2>��ѱ�</h2>
          <p>���пƼ���ѧ�����ѧԺ�������ѧ�뼼��1205��ѧ�������˳���˧һ���Ǵ���</p>
        </div>
        <div class="span4">
          <h2>ëһ��</h2>
          <p>���пƼ���ѧ�����ѧԺ�������ѧ�뼼��1205��ѧ�����������ڴ���Ϸ��������</p>
       </div>
        <div class="span4">
          <h2>ϵͳ�ſ�</h2>
          <p>��ϵͳ�ܹ�ΪB/S�ṹ������mysql+php+Apache+html������ʹ�ù���Ϊnotepad+eclipse+chrome��ϵͳWindows 10 x64���������ѯQQ��1130193186��лл��</p>
        </div>
      </div>

      <hr>

      <footer>
        <p>�����շѹ���ϵͳ</p>
      </footer>

    </div>
	
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>