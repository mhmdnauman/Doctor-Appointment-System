<?php

session_start(); 
require_once 'dbmsConnect.php';     // for database Connection


        $sqlQuery = $DB_Connection->prepare('SELECT * FROM `doctors` WHERE `email`=? AND `password`=? ');
                
        
        $sqlQuery->execute(array($_SESSION["email1"], $_SESSION["password1"]));

   



$dataRecords = $sqlQuery->fetchAll( PDO::FETCH_OBJ );
?>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Doctors Appointment System</title>
<link rel="stylesheet" href="viewstyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

</head>
<body>

<input type="checkbox" id="check">
<!--header area start-->
<header>
  <label for="check" style="float: left;">
    <i style="color:white" class="fas fa-bars" ></i>
  </label>
<center>  <div class="left_area">
    <h3>Dr.<span> APPOINTMENT SYSTEM</span></h3>
  </div></center>
  <div class="right_area">
    <a href="logout.php" class="logout_btn">Logout</a>
  </div>
</header>
<!--header area end-->
<!--mobile navigation bar start-->
<div class="mobile_nav">
  <div class="nav_bar">
    <i class="fa fa-bars nav_btn"></i>
  </div>
  <div class="mobile_nav_items">
  <a href="/Assignment4/view.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
  <a href="/Assignment4/BookApp.php"><i class="fas fa-heartbeat"></i><span>View Appointment Req.</span></a>
  <a href="/Assignment4/AboutDoc.php"><i class="fas fa-info-circle"></i><span>About</span></a>
  </div>
</div>
<!--mobile navigation bar end-->
<!--sidebar start-->
<div class="sidebar">
  <div class="profile_info">

  <?php foreach($dataRecords as $doctors): ?>
    <h4><?= $doctors->name; ?></h4>

     
    <?php endforeach; ?>
  </div>
  <a href="/Assignment4/viewdoc.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
  <a href="/Assignment4/ViewApp.php"><i class="fas fa-heartbeat"></i><span>View Appointment Req.</span></a>
  <a href="/Assignment4/AboutDoc.php"><i class="fas fa-info-circle"></i><span>About</span></a>
</div>
<!--sidebar end-->

<div class="content">
  <div class="card">
  <div class="p-5">
<div class="container-lg">
<div class="card">

  <div class="card-header">
<center><h1> Your Basic Details:</h1></center>
  </div>

  <div class="card-body">
    
<center>

  <h1 style="font-size:45px;"><u>About Us</u></h1>
    <p style="font-size:26px ;"> Our website has been in service since 2 years, and we have appointed more than 10,000 patients. <br>We are 24/7 available to provide treatments & check-ups.</p><br><br>
    <h1 style="font-size:45px;"><i><u>Developer's Team</u></i></h1>
    <section>
        <table  >
            <!-- <th colspan="5">Employee Data</th> -->
         <!--caption style="border: 1px solid black;"><b>Employee DATA</B></caption>-->
    <tr style="font-size: 24px;text-align: justify;background-color: rgb(15, 30, 39);color: aliceblue;">
        <th> Photo</th>
        <th> Name</th>
        <th>Registration No.</th>
        <th>Department</th>
        <th>Contact info:</th>
    </tr>
    <tr>
       
        <td> <img src="Nauman.jpg" style="height:60px;border-radius:25%;" width="60px" ></td>
        <td>Muhammad Nauman</td>
        <td> F19-BSCS-024  </td>
        <td>BSCS-6</td>
        <td>+92 311 8559375</td>
        
    </tr>
    <tr>
        
    <td> <img src="abdullah.jpg" style="height:60px;border-radius:25%;" width="60px" > </td>
        <td>Muhammad Abdullah Farooq</td>
        <td> F19-BSCS-052  </td>
        <td>BSCS-6</td>
        <td>+92 336 7716353</td>
    </tr>
    <tr>
       
    <td> <img src="Khaqan.jpg" style="height:60px;border-radius:25%;" width="60px" ></td>
        <td>Khaqan Aamir</td>
        <td> F19-BSCS-014  </td>
        <td>BSCS-6</td>
        <td>+92 330 5859181</td>

    </tr>
    </table>
    </section>

    </center>
  </div>
</div>
</div>
</div>

  </div>
</div>

</body>


</html>
  