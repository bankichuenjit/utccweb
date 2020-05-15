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
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  width: 70%;
  border-left: none;
  height: 1500px;
  display: none;
}

/* Clear floats after the tab */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}








.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 30%;
  height: 20%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}



</style>
</head>


<body>
<div class="topnav">
 <a href="index.php"> <img border="0" alt="video" src="images/logo.png" width="400" height="120"></a>


 
  </div>
<div class="topnav">
 
 
  <div class="topnav-right">
  <a href="about.php">เกี่ยวกับเรา</a>
  <a href="news.php">ข่าว/กิจกรรม</a>
  <a href="http://procurement.utcc.ac.th/procurement.php">ประกาศจัดซื้อ/จัดจ้าง</a>
     <a href="download.php">ดาวน์โหลด</a>
    <a href="infor.php">สาระน่ารู้</a>
    <a href="work.php">ผลงานกองอาคาร</a>
    <a href="contac.php">ติดต่อเรา</a>
  </div>
</div>


<div class="tab">
  <button class="tablinks" onmouseover="openCity(event, 'a')">ประวัติความเป็นมาของฝ่าย / หน่วยงาน</button>
  <button class="tablinks" onmouseover="openCity(event, 'b')">โครงสร้างกองอาคาร</button>
  <button class="tablinks" onmouseover="openCity(event, 'c')">นโยบายบริหาร</button>
  <button class="tablinks" onmouseover="openCity(event, 'd')">ปรัชญา / ปณิธาน</button>
   <button class="tablinks" onmouseover="openCity(event, 'f')">บุคลากร</button>
    
</div>

<div id="a" class="tabcontent">
  <h3>ประวัติความเป็นมาของฝ่าย / หน่วยงาน</h3>
  <dd><img src="images/a.jpg" alt="โครงสร้างกองอาคาร"width="400">
  <p><dd>วันที่ 21 มิถุนายน 2517 วิทยาลัยการค้าโอนมาสังกัดทบวงมหาวิทยาลัย  ย้ายมาอยู่ที่ถนนวิภาวดีรังสิต เขตดินแดง 
  อันเป็นสถานที่ตั้งปัจจุบัน ซึ่งแผนกอาคารสถานที่และซ่อมบำรุง ได้ก่อกำเนิดขึ้นมาเป็นครั้งแรกขึ้นตรงกับสำนักงานผู้อำนวยการ</p>

    <p>
วันที่ 24 ตุลาคม 2527 ทบวงมหาวิทยาลัยได้อนุมัติให้วิทยาลัยการค้าเปลี่ยนประเภทสถาบันเป็นมหาวิทยาลัย     
ในชื่อ   “มหาวิทยาลัยหอการค้าไทย”   (University of the Thai Chamber of Commerce) อักษรย่อ “มกค” (UTCC) 
แผนกอาคารสถานที่และซ่อมบำรุง  
 ได้ถูกจัดโครงสร้างใหม่ เป็นแผนกอาคารสถานที่ ตั้งอยู่ที่อาคาร 12 และแผนกซ่อมบำรุง ตั้งอยู่ที่อาคารแผนกซ่อมบำรุง ข้างอาคารหอประชุมในปัจจุบัน   </p>
    <p>จนถึงวันที่ 1 มิถุนายน 2538 ได้มีการเปลี่ยนโครงสร้างกองอาคารสถานที่และกองซ่อมบำรุง เป็นกองอาคารสถานที่และซ่อมบำรุง   
          โดยมีอาจารย์ไชยวัฒน์ แสงไชย ดำรงตำแหน่งหัวหน้ากองอาคารสถานที่และซ่อมบำรุง  </p>
    <p>ละในวันที่ 26 ธันวาคม 2544 มหาวิทยาลัยได้แต่งตั้งให้ อาจารย์สมพงษ์ แก้วเจริญไพศาล ดำรงตำแหน่งหัวหน้ากองอาคารสถานที่และซ่อมบำรุง 
    และได้มีการเปลี่ยนแปลงชื่อกองอาคารสถานที่และซ่อมบำรุง เป็นกองอาคารสถานที่ อีกครั้งในปี 2547 (ตามประกาศที่ 187/2547)   </p>
       <p>หลังจากนั้นในวันที่ 15 กุมภาพันธ์ 2548 มหาวิทยาลัยได้แต่งตั้งให้ อาจารย์มนตรี ห่วงอาษา เป็นรักษาการหัวหน้ากองอาคารสถานที่  </p>

<p> ต่อมาวันที่ 15 กันยายน 2550 อาจารย์มนตรี ห่วงอาษา ได้ลาออกจากตำแหน่ง จึงได้มีการแต่งตั้งผู้ช่วยอธิการบดีด้านกิจการพิเศษ 
(อาจารย์สมพงษ์ แก้วเจริญไพศาล)
 ดำรงตำแหน่งรักษาการหัวหน้ากองอาคารสถานที่อีกครั้ง </p>

 
 
 
<p>  และในวันที่ 23 เมษายน 2551 มหาวิทยาลัยได้แต่งตั้ง นายพิสุทธิ์ พรรคอนันต์ เป็นหัวหน้ากองอาคารสถานที่จนถึงปัจจุบัน   </p>


</div>

<div id="b" class="tabcontent">
  <h3>โครงสร้างกองอาคาร</h3>
 <img src="images/b.jpg" alt="โครงสร้างกองอาคาร"width="800">
</div>

<div id="c" class="tabcontent">
  <h3>นโยบายบริหาร</h3>
  <p>กองอาคารสถานที่ มีนโยบายในการบริหารงานที่สอดคล้องกับปรัชญาและปณิธานและพร้อมสนับสนุนให้เกิดการทำงานเพื่อให้บรรลุวัตถุประสงค์ของหน่วยงานโดยมีการกำหนดหัวข้อรายละเอียดไว้ดังนี้</p>
  <p>1. สนับสนุนให้มีการนำเทคโนโลยีสารสนเทศเข้ามาใช้ในการทำงานให้มากขึ้น</p>
  <p>2. สนับสนุนให้มีการทำงานที่รวดเร็ว โปร่งใส ตรวจสอบได้และมีประสิทธิภาพ</p>
  <p>3. สนับสนุนให้พนักงานมีการพัฒนาตนเอง และมีส่วนร่วมในการพัฒนาหน่วยงาน    </p>
   <p>4. ส่งเสริมการซื่อสัตย์สุจริตต่อตนเอง ต่อหน่วยงาน และต่อมหาวิทยาลัย    </p>
   <p>5. ส่งเสริมการนำแนวทางเศรษฐกิจพอเพียงมาปรับใช้ในการทำงานและการปฏิบัติตน    </p>
   <p> 6. สนับสนุนนโยบายและกิจกรรมของมหาวิทยาลัย อาทิ ด้านสิ่งแวดล้อม  ด้านความปลอดภัยด้านความเสี่ยงและกิจกรรม 5 ส เป็นต้น </p>

   <p> 7. สนับสนุนส่งเสริมให้มีการอนุรักษ์พลังงานและการประหยัดพลังงานภายในมหาวิทยาลัยฯ    </p>




</div>

<div id="d" class="tabcontent">
  <h3>ปรัชญา / ปณิธาน</h3>
  <h1>บริหารจัดการอย่างมีประสิทธิภาพ รวดเร็ว โปร่งใส และตรวจสอบได้</h1>
</div>

<div id="f" class="tabcontent">
  <h3>บุคลากร</h3>

  <div class="card">
  <img src="images\f\f1.jpg" alt="Avatar" style="width:40%">
  <div class="container">
    <h4><b>ผศ.แน่งน้อย  ใจอ่อนน้อม</b></h4> 
    <p>รองอธิการบดีฝ่ายบริหาร</p> 
  </div>
   </div>

     <div class="card">
  <img src="images\f\f2.jpg" alt="Avatar" style="width:40%">
  <div class="container">
    <h4><b>ผศ.เดชา  อินเด</b></h4> 
    <p>ผู้ช่วยอธิการบดีฝ่ายบริหาร</p> 
  </div>
   </div>

        <div class="card">
  <img src="images\f\f3.jpg" alt="Avatar" style="width:40%">
  <div class="container">
    <h4><b>นายปราโมทย์  ประพฤติ    </b></h4> 
    <p>หัวหน้ากองอาคารสถานที่    </p> 
  </div>
   </div>


   <div class="card">
  <img src="images\f\f4.jpg" alt="Avatar" style="width:40%">
  <div class="container">
    <h4><b>นางอัมรา  กองรอด    </b></h4> 
    <p>รักษาการผู้ช่วยหัวหน้ากองอาคารสถานที่    </p> 
  </div>
   </div>


<div class="card">
  <img src="images\f\f5.jpg" alt="Avatar" style="width:40%">
  <div class="container">
    <h4><b>นายศุภเสฏฐ์  เจริญรัตน์    </b></h4> 
    <p>หัวหน้าแผนกบำรุงรักษาสวน    </p> 
  </div>
   </div>

   <div class="card">
  <img src="images\f\f6.jpg" alt="Avatar" style="width:40%">
  <div class="container">
    <h4><b>นายนราธิป  ภัทรศุภา    </b></h4> 
    <p>รักษาการหัวหน้าแผนกซ่อมบำรุง    </p> 
  </div>
   </div>

      <div class="card">
  <img src="images\f\f7.jpg" alt="Avatar" style="width:40%">
  <div class="container">
    <h4><b>นายพรต  นิ่มสมบุญ    </b></h4> 
    <p>รักษาการหัวหน้าแผนกสถานที่    </p> 
  </div>
   </div>

      <div class="card">
  <img src="images\f\f8.jpg" alt="Avatar" style="width:40%">
  <div class="container">
    <h4><b>นายประดุง  ศรีอุดร     </b></h4> 
    <p>แผนกก่อสร้าง (นายช่าง)    </p> 
  </div>
   </div>



</div>




<div class="clearfix"></div>


<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
   











</body>
</html>