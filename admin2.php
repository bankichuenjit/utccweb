<?php

 session_start();
if(isset($_session['login'])){
	 echo "test";
     }
  $link = mysqli_connect("localhost","root","","utcc")
  or die("cann't connect to DB.");  
  $sql = "SELECT * FROM users";
  $result = mysqli_query($link,$sql);
  mysqli_set_charset($link,"utf8"); 
  mysqli_close($link);

  ?>
  



 <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #0c426f;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav-right {
  float: right;
}






* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 20%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 100px 20px;
  height: 100%;
}

#Home {background-color: #0c426f;}
#News {background-color: #0c426f;}
#Contact {background-color: #0c426f;}
#About {background-color: #0c426f;}
#gg {background-color: #0c426f;}
</style>
</head>

<body>
<div class="topnav">
 <a> <img border="0" alt="video" src="images/logo.png" width="400" height="120"></a>


  <div class="topnav-right">
  <a href="logout.php"> ออกจากระบบ</a>
</div>
  </div>
<div class="topnav">
 
 
  <div class="topnav-right">

    <a >ADMIN</a>
  </div>
</div>










<button class="tablink" onclick="openPage('Home', this, '#D5D5D8')" id="defaultOpen">ข่าว/กิจกรรม</button>
<button class="tablink" onclick="openPage('News', this, '#D5D5D8')" >Download เอกสาร</button>
<button class="tablink" onclick="openPage('Contact', this, '#D5D5D8')">สาระน่ารู้</button>
<button class="tablink" onclick="openPage('About', this, '#D5D5D8')">ผลงานกองอาคารและสิ่งแวดล้อม</button>
<button class="tablink" onclick="openPage('gg', this, '#D5D5D8')">ติดต่อเจ้าหน้าที่กองอาคารและสิ่งแวดล้อม</button>

<div id="Home" class="tabcontent">
<iframe src="newsdata\index.php" height="850" width="1850"></iframe>
</div>

<div id="News" class="tabcontent">
<iframe src="downloaddata\index.php" height="850" width="1850"></iframe>
</div>

<div id="Contact" class="tabcontent">
<iframe src="infordata\index.php" height="850" width="1850"></iframe>
</div>

<div id="About" class="tabcontent">
<iframe src="workdata\index.php" height="850" width="1850"></iframe>
</div>

<div id="gg" class="tabcontent">
<iframe src="contacdata\index.php" height="850" width="1850"></iframe>
</div>


<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>


</body>
</html>