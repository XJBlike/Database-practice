<!DOCTYPE html>
<html>
  <head>
    <title>����ϵͳ</title>
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
		   <?php
		  if(isset($_COOKIE['tel'])){
           echo "<div class=\"brand\">�ֻ��û�������ѯϵͳ</div>";
		  }
		  else if(isset($_COOKIE['username'])){
			   echo "<div class=\"brand\">�����շѹ���ϵͳ</div>";
		  }
		  else{
			  echo "<div class=\"brand\">�ο�ҳ��</div>";
		  }
		  ?>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="homepage.php">��ҳ</a></li>
			  <?php
    if(!isset($_COOKIE['username'])&&!isset($_COOKIE['tel'])){
			  echo "<li class=\"dropdown\">
		         <a href=\"#\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
           �ο͹���
           </a>
		  <ul class=\"dropdown-menu\" role=\"menu\">
            <li><a href=\"#icons-new\"></a></li>
            <li class=\"divider\"></li>
			<li><a href=\"package.php\"><i class=\"icon-eye-open\"></i> �����ײ�����</a></li>
            <li><a href=\"company.html\"><i class=\"icon-eye-open\"></i> ��˾�ſ�</a></li>
              <li><a href=\"shop.html\"><i class=\"icon-eye-open\"></i>����Ӫҵ��</a></li>
			<li><a href=\"netshop.html\"><i class=\"icon-eye-open\"></i>����Ӫҵ��</a></li>

          </ul>
		  </li>
		 
		 <li><a href=\"custlogin.php\">�ֻ��û���¼</a></li>
			  <li><a href=\"adminlogin.php\">������Ա��¼</a></li>";
		  }
		  
   else if(isset($_COOKIE['username'])){
	   echo "<li><a href=\"package.php\">�ײ�����</a></li>";
     echo "<li class=\"dropdown\">
          <a href=\"#\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
           ҵ������
          </a>
      <ul class=\"dropdown-menu\" role=\"menu\">  
            <li><a href=\"achieve.php#A\"><i class=\"icon-eye-open\"></i> ���ʽ</a></li>
             <li><a href=\"achieve.php#B\"><i class=\"icon-eye-open\"></i> ͼ��ʽ</a></li>
          </ul>
         </li>";
	   echo "<li class=\"dropdown\">
		 <a href=\"#\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
           ����Ա
          </a>
		  <ul class=\"dropdown-menu\" role=\"menu\">
            <li><a href=\"#icons-new\"></a></li>
			<li><div class=\"divcenter\"><i class=\"icon-user\"></i>";
			echo $_COOKIE['username'];
			echo "</div></li>
            <li class=\"divider\"></li>
            <li><a href=\"insertpackage.php\"><i class=\"icon-edit\"></i> �������ײ�</a></li>
            <li><a href=\"inserttel.php\"><i class=\"icon-edit\"></i> �������ֻ���</a></li>
            <li><a href=\"deletetel.php\"><i class=\"icon-trash\"></i> ע���ֻ���</a></li>
            <li><a href=\"modifypackage.php\"><i class=\"icon-pencil\"></i>  �޸��ײ�</a></li>
            <li><a href=\"pay.php\"><i class=\"icon-eye-open\"></i> ��ֵ�ɷ�</a></li>
            <li><a href=\"#myModal\"  data-toggle=\"modal\"><i class=\"icon-off\"></i> ע��</a></li>
          </ul>
		  </li>";
   }
   else{
	   echo "<li><a href=\"package.php\">�ײ�����</a></li>";
	    echo "<li class=\"dropdown\">
		 <a href=\"#\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
           �ֻ��û�
         </a>
		  <ul class=\"dropdown-menu\" role=\"menu\">
            <li><a href=\"#icons-new\"></a></li>
			<li><div class = \"divcenter\"><i class=\"icon-user\"></i>";
			echo $_COOKIE['tel'];
			echo "</div></li>
            <li class=\"divider\"></li>
			<li><a href=\"usersearch.php#A\"><i class=\"icon-eye-open\"></i> �鵱ǰ�ײ�</a></li>
            <li><a href=\"usersearch.php#B\"><i class=\"icon-eye-open\"></i> ���ֻ����</a></li>
            <li><a href=\"usersearch.php#C\"><i class=\"icon-eye-open\"></i> ��ɷѼ�¼</a></li>
			<li><a href=\"usersearch.php#D\"><i class=\"icon-eye-open\"></i> ��۷Ѽ�¼</a></li>
			
            <li><a href=\"#myModal\"  data-toggle=\"modal\"><i class=\"icon-off\"></i> ע��</a></li>
          </ul>
		  </li>";
   }   
		  ?>
		  <li class="active"><a href="">����</a></li>
      <?php
             if(isset($_COOKIE['username'])){
             echo "<li>
                     <form class=\"form-search\" method=\"POST\" action=\"searchuser.php\">
                           <div class=\"input-prepend input-append\">
                            <span class=\"add-on\">�����ֻ���</span>
                              <input class=\"span2\" name=\"tel\" type=\"text\">
                              <button class=\"btn\" type=\"submit\">Go!</button>
                            </div>
                     </form>
                     </li>";
             }
             ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<div class="container">
      <div class="row">
        <div class="span4">
          <h2>��ѱ�</h2>
		  <p>�Ա�:��</p>
          <p>����:1130193186@qq.com</p>
		  <p>�绰:15629051257</p>
		  <p>���˼��:˭����������ޣ�</p>
          <p><a class="btn" href="xjb.html">more details</a></p>
        </div>
        <div class="span4">
          <h2>ëһ��</h2>
          <p>�Ա���</p>
		  <p>���䣺m13260644613@163.com</p>
		  <p>�绰:13260644613</p>
		  <p>���˼��:����һ���˾���...</p>
       </div>
        <div class="span4">
          <h2>ϵͳ�����ſ�</h2>
          <p>ϵͳ������windows 10 x64</p>
		  <p>����༭����Sublime Text 3</p>
		  <p>�ܹ���B/S�ṹ</p>
		  <p>���������php5.5.12+Apache2.4.9+MySQL5.6.17</p>
		  <p>��ҳģ�壺bootstrap</p>
		  <p>������ϵQQ��1130193186</p>
        </div>
      </div>

      <hr>

      <footer>
        <p>@�����շ���Ϣ����ϵͳ</p>
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