<?php


    session_start(); 
    require_once 'dbmsConnect.php';     // for database Connection

    $message = '';

      if(
            isset($_POST['txt_name']) &&
            isset($_POST['txt_email']) && 
            isset($_POST['txt_password'])
        ) {

          $v_name = $_POST['txt_name'];
          $v_email = $_POST['txt_email'];
          $v_password = $_POST['txt_password'];
          $v_height = $_POST['slider_height'];
          $v_age = $_POST['combo_age'];
          $v_gender= $_POST['radio_gender'];
          $v_address = $_POST['txt_add'];
          $v_specialization = $_POST['txt_spec'];
          $v_qualification = $_POST['txt_qual'];
          
          
          //-------------------------------------------------------------

          $sql = 'INSERT INTO doctors(name, email, password,height,gender,address,age,Qualification,Specialization) 
                              VALUES(:temp_name, :temp_email, :temp_password,:temp_height,:temp_gender,:temp_address,:temp_age,:temp_Specialization,:temp_Qualification)';
          
          $statement = $DB_Connection->prepare($sql);
          
            if($statement->execute
                (
                  [
                    ':temp_name' => $v_name,
                    ':temp_email' => $v_email, 
                    ':temp_password' => $v_password, 
                    ':temp_height' => $v_height, 
                    ':temp_gender' => $v_gender, 
                    ':temp_age' => $v_age,
                    ':temp_address' => $v_address, 
                    ':temp_Qualification' => $v_qualification,
                    ':temp_Specialization' => $v_specialization
                  ]
                )
              ) {
              

                
 
    if( ISSET( $_POST['login'] ) ) {

        if( $_POST['txt_email'] != "" || $_POST['txt_password'] != ""){

            $v_username = $_POST['txt_email'];
            $v_password = $_POST['txt_password'];


			$_SESSION["email1"] =  $_POST['txt_email'];
			$_SESSION["password1"] = $_POST['txt_password'];

            $sqlQuery = $DB_Connection->prepare('SELECT * FROM `doctors` WHERE `email`=? AND `password`=? ');
                      
            $sqlQuery->execute(array($v_username, $v_password));

            $dataRecords = $sqlQuery->rowCount();
            $fetch = $sqlQuery->fetch();

			      if( $dataRecords > 0 ) {
				      header("location: viewdoc.php");
            }
            else{
                echo"
                <center>
                  <h5 class='text-danger'>Invalid username or password</h5>
                </center>";
            }
        }
      }

          }
     }
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up - Dr. Appointment System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/login.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form  method="POST"   >
					<span class="login100-form-title p-b-49">
						Sign Up
					</span>


                    
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Name</span>
						<input class="input100" type="text" name="txt_name" placeholder="Type your name">
					
					</div>



                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">EMAIL</span>
						<input class="input100" type="text"  name="txt_email" placeholder="Type your Email">
						
					</div>



                    
					<div class="wrap-input100 validate-input m-b-23" >
						<span class="label-input100">Password</span>
						<input class="input100" type="password"  name="txt_password" placeholder="Type your password">
						
					</div>

					<div class="wrap-input100 validate-input" >
						<span class="label-input100">Qualification</span>
						<input class="input100" type="text" name="txt_qual" placeholder="Type your qualification">
					
					</div>
					
                    
					<div class="wrap-input100 validate-input" >
						<span class="label-input100">Specialization</span>
						<input class="input100" type="text" name="txt_spec" placeholder="Type your Specialization">
					
					</div>
		
			
<br><br>
                    
					<div class="wrap-input100 validate-input" >
						<span class="label-input100">Height</span>
                              <br><input type="range" name="slider_height" id="height" class="form-control">

					</div>

        			
<br><br>            
                    

                        <div class="wrap-input100 validate-input" >
                        <span class="label-input100">Gender</span>
                            <div class="form-check">     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input" type="radio" value="male" name="radio_gender" id="gender">
                            <label class="form-check-label" for="gender">
                                Male
                            </label>

                        <input class="form-check-input" type="radio" value="female" name="radio_gender" id="gender">
                         <label class="form-check-label" for="gender">
                        Female
                        </label>
                        </div>
                   
			
                        <br><br>
                    
                    
					<div class="wrap-input100 validate-input" >
						<span class="label-input100">Address</span>
						<input class="input100" type="text" name="txt_add" placeholder="Type your Address">
					
					</div>


                    
                    
					<div class="wrap-input100 validate-input" >
						<span class="label-input100">Age</span>
						<input class="input100" type="number" name="combo_age" placeholder="Type your Age">
					
					</div>
					
					
					
					
<br><br>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button name="login" class="login100-form-btn" onclick=show() >
								Sign Up
							</button>



							

						</div>
					</div>

					<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							
						</span>

					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	



</body>

<script>
function show(){

    alert("You Have Signed Up Successfully!");
}

</script>

</html>