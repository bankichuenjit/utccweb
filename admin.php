<?php
  $link = mysqli_connect("localhost","root","","utcc")
  or die("cann't connect to DB.");  
  $sql = "SELECT * FROM users";
  $result = mysqli_query($link,$sql);
  mysqli_set_charset($link,"utf8"); 
   session_start();
   ?>

<!DOCTYPE html>
<html lang="th">
<head></head>
<body>
 <?php
$user = $_POST['username'];
$pwd = $_POST['password'];

while($data = mysqli_fetch_array($result)){
if(($user== $data['username'] )&&($pwd  == $data['password'])){
	$_session['login'] = $user ;
   echo $_session['login'];
   header("refresh:1 url= admin2.php ");
   echo ' <br />';

   echo '<h1>Login สำเร็จ</h1>';
   echo ' <br />';
	
	
}else
   echo "<h1>username หรือ password ผิด</h1>" ;
   
}
?>


	
	</body>
	</html>


