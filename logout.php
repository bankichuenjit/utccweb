<?php
 session_start();
	session_destroy();
	
	
	echo '<h1>Logout สำเร็จ</h1>';
	 header("refresh:1 url= index.php ");
?>