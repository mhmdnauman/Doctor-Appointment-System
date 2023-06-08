<?php

session_start(); 
require_once 'dbmsConnect.php';     // for database Connection



$sqlQuery = $DB_Connection->prepare('SELECT * FROM `doctors` WHERE `email`=? AND `password`=? ');
                    
            
$sqlQuery->execute(array($_SESSION["email1"], $_SESSION["password1"]));





        $sqlQuery2 = $DB_Connection->prepare('SELECT * FROM `appointments` WHERE `Doctor`=?');
                
        
        $sqlQuery2->execute(array($_SESSION["name1"]));

   
    


$dataRecords = $sqlQuery->fetchAll( PDO::FETCH_OBJ );

$dataRecords2 = $sqlQuery2->fetchAll( PDO::FETCH_OBJ );
 


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
<center><h1> Requested Appointments:</h1></center>
  </div>

  <div class="card-body">
    

      <?php foreach($dataRecords2 as $appointments): ?>      <!--- the loop generates a row for each record --->
    
    
          <h2>Name: <?= $appointments->Name; ?></h2>
          
        <h2>Email: <?= $appointments->Email; ?></h2>
          
        <h2>Age: <?= $appointments->Age; ?></h2>
          
        <h2>Disease: <?= $appointments->Disease; ?></h2>
        
        <h2>Date:<?= $appointments->Date; ?></h2>
        

        <h2>Time:<?= $appointments->Time; ?></h2>
        
        

        <h2>Gender: <?= $appointments->Gender; ?></h2>
          
        <h2>Phone No: <?= $appointments->PhNo; ?></h2>
          
        <h2>Doctor: <?= $appointments->Doctor; ?></h2>

        <br><br><br><h1>_____________________</h1><br><br><br>
        
        
      <?php endforeach; ?>

    
  </div>
</div>
</div>
</div>

  </div>
</div>

</body>


</html>
  