<?php

    session_start(); 
    require_once 'dbmsConnect.php';     // for database Connection
    

    $sqlQuery = $DB_Connection->prepare('SELECT * FROM doctors');
    $sqlQuery->execute();

    $dataRecords = $sqlQuery->fetchAll( PDO::FETCH_OBJ );

    
    $sqlQuery1 = $DB_Connection->prepare('SELECT * FROM `patient` WHERE `email`=? AND `password`=? ');
                      
    $sqlQuery1->execute(array($_SESSION["email"], $_SESSION["password"]));


    $dataRecords1 = $sqlQuery1->fetchAll( PDO::FETCH_OBJ );



    $message = '';




    if(
          isset($_POST['txt_name']) &&
          isset($_POST['txt_email']) 
      ) {

        $v_name = $_POST['txt_name'];
        $v_age = $_POST['combo_age'];
        $v_email = $_POST['txt_email'];
        $v_phno = $_POST['phone'];
        $v_gender = $_POST['gen'];
        $v_date= $_POST['txt_date'];
        $v_time = $_POST['txt_time'];
        $v_disease = $_POST['txt_disease'];
        $v_doctor = $_POST['doc'];
        
        
        //-------------------------------------------------------------

        $sql = 'INSERT INTO `appointments`(`Name`, `Age`, `Email`, `PhNo`, `Gender`, `Date`, `Time`, `Disease`, `Doctor`) 
                            VALUES(:temp_name, :temp_age,  :temp_email, :temp_phno, :temp_gender,:temp_date,:temp_time,:temp_disease, :temp_doctor)';
        
        $statement = $DB_Connection->prepare($sql);
        
          if($statement->execute
              (
                [
                  ':temp_name' => $v_name,
                  ':temp_age' => $v_age,
                  ':temp_email' => $v_email, 
                  ':temp_phno' => $v_phno, 
                  ':temp_gender' => $v_gender, 
                  ':temp_date' => $v_date, 
                  ':temp_time' => $v_time,
                  ':temp_disease' => $v_disease,
                  ':temp_doctor' => $v_doctor
                ]
              )
            ) {
            


        }
   }
   










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

      <?php foreach($dataRecords1 as $patient): ?>
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
      </div>

      <div class="card-body">
        
      <center><table style="width: 600px ;" height="400px" border="1">
            
            <caption style="border: 1px solid black;"><b>List of Doctors</B></caption>
    <tr>
        
        <th>Doctor Name</th>
        <th>Email</th>
        <th>Qualification</th>
        <th>Specialization </th>
    </tr>
    <?php foreach($dataRecords as $doctors): ?>      <!--- the loop generates a row for each record --->
            <tr>
              <td><?= $doctors->name; ?></td>
              <td><?= $doctors->email; ?></td>
              <td><?= $doctors->Specialization; ?></td>
              <td><?= $doctors->Qualification; ?></td>

            </tr>
            <?php endforeach; ?>

 
        </table></center>
    



      </section>
    <h1><i>Book Your Appointment Now!!</i></h1>
    <h3><u>Fill this Form to get Appointment:</u></h3>
    <div class="book" id="book">
        <form  name="myform" action="" method="POST">
        <label for="pname">Patient Name</label>
        <input type="text" value=<?= $patient->name; ?> placeholder="Enter Name" id="pname" name="txt_name"><br><br>
        
        <label for="page">Patient Age:</label>
        <input type="text" placeholder="Enter Age" id="page" value=<?= $patient->age; ?> name="combo_age"><br><br>
        <label for="pemail">Patient Email</label>
        <input type="email" placeholder="Enter Email" id="pemail" value=<?= $patient->email; ?> name="txt_email"><br><br>
        <label for="phone">Patient phone:</label><br><br>
        <input type="tel" id="phone" name="phone" placeholder="0336-xxxxxxx" pattern="[0-9]{4}-[0-9]{7}" required><br><br>
        <small>Format: 0336-7716353</small><br><br>
        
        <p><u><b>Select Gender:</b></p>
         <input type="radio" id="male" class="gender" name="gen" value="male">
         <label for="male">Male:</label><br>
         
         <input type="radio" id="female" class="gender" name="gen" value="female">
         <label for="female">female:</label><br>
         <p><u><b>Select Date&Time:</b></p><br>

         <label for="dt">Date</label>
         <input type="date" name="txt_date" > <br><br>
         <label for="tm">Time</label>
         <input type="time" name="txt_time"><br><br>
         <label for="logo"><b>Enter Disease Type Below:</b></label><br>
         <textarea name="txt_disease" id="txta" width="20px" height="30px" > ..</textarea><br><br>

         <span><u><b>Select Doctor:</b></span>
            <select name="doc" id="doc">
    <?php foreach($dataRecords as $doctors): ?>      <!--- the loop generates a row for each record --->
            <option name="txt_doctor" value=<?= $doctors->name;?>> <?= $doctors->name; ?></option>
            <?php endforeach; ?>
            </select><br><br>
            <input type="submit" value="Submit Form" id="submit" onclick="validation()">

        
         
         </div>
        
    </form>

        
      </div>
    </div>
  </div>
</div>

      </div>
    </div>

    <br><br>

  </body>
<script>


function validation(){
    let x = document.getElementById('pname').value;
    let y = document.getElementById('page').value;
    let z = document.getElementById('pemail').value;
    if (x == "") {
      alert("Name must be filled out");
      window.open("/Assignment4/BookApp.php");
      return false;
    }

    else if (y == ""||y<=0) {
      alert("Enter valid Age");
        window.open("/Assignment4/BookApp.php");
      return false;
    }
    else if (z == ""||z.indexOf('@')<=0) {
      alert("Enter Valid Email ID");
      window.open("/Assignment4/BookApp.php");
      return false;
    }
else{
    alert("Your Appointment has been booked and you will receive a confirmation message shortly after doctor's approval.");
  }




}




</script>

  </html>
      