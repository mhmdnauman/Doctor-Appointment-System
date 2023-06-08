<?php

    session_start(); 
    require_once 'dbmsConnect.php';     // for database Connection
    

            $sqlQuery = $DB_Connection->prepare('SELECT * FROM `patient` WHERE `email`=? AND `password`=? ');
                      
            $sqlQuery->execute(array($_SESSION["email"], $_SESSION["password"]));

       



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
        <a href="/Assignment4/BookApp.php"><i class="fas fa-heartbeat"></i><span>Book an Appointment</span></a>
        <a href="/Assignment4/DelApp.php"><i class="fas fa-heart-broken"></i><span>Delete an Appointment</span></a>
        <a href="/Assignment4/EditApp.php"><i class="fas fa-align-center"></i><span>Edit an Appointment</span></a>
        <a href="/Assignment4/AboutPat.php"><i class="fas fa-info-circle"></i><span>About</span></a>

      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
      <div class="profile_info">

      <?php foreach($dataRecords as $patient): ?>
        <h4><?= $patient->name; ?></h4>

         
        <?php endforeach; ?>
      </div>
        <a href="/Assignment4/view.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="/Assignment4/BookApp.php"><i class="fas fa-heartbeat"></i><span>Book an Appointment</span></a>
        <a href="/Assignment4/DelApp.php"><i class="fas fa-heart-broken"></i><span>Delete an Appointment</span></a>
        <a href="/Assignment4/EditApp.php"><i class="fas fa-align-center"></i><span>Edit an Appointment</span></a>
        <a href="/Assignment4/AboutPat.php"><i class="fas fa-info-circle"></i><span>About</span></a>
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
        

          <?php foreach($dataRecords as $patient): ?>      <!--- the loop generates a row for each record --->
            
        
              <h2>Name: <?= $patient->name; ?></h2>
              
            <h2>Email: <?= $patient->email; ?></h2>
              
            <h2>Height:<?= $patient->height; ?></h2>
              
            <h2>Gender: <?= $patient->gender; ?></h2>
              
            <h2>Address: <?= $patient->address; ?></h2>
              
            <h2>Age: <?= $patient->age; ?></h2>

            
            
          <?php endforeach; ?>

        
      </div>
    </div>
  </div>
</div>

      </div>
    </div>

  </body>


  </html>
      