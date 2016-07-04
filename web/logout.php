<?php
/**cookies注销页面*/
if(isset($_COOKIE['username'])){
    //将各个cookie的到期时间设为过去的某个时间，使它们由系统删除，时间以秒为单位
  // setcookie('user_id','',time()-3600);
    setcookie('username','',time()-3600);
}
if(isset($_COOKIE['tel'])){
	setcookie('tel','',time-3600);
}
//location首部使浏览器重定向到另一个页面
$home_url = 'homepage.php';
header('Location:'.$home_url);
?>