<?php
/**cookiesע��ҳ��*/
if(isset($_COOKIE['username'])){
    //������cookie�ĵ���ʱ����Ϊ��ȥ��ĳ��ʱ�䣬ʹ������ϵͳɾ����ʱ������Ϊ��λ
  // setcookie('user_id','',time()-3600);
    setcookie('username','',time()-3600);
}
if(isset($_COOKIE['tel'])){
	setcookie('tel','',time-3600);
}
//location�ײ�ʹ������ض�����һ��ҳ��
$home_url = 'homepage.php';
header('Location:'.$home_url);
?>