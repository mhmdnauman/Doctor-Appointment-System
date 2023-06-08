<?php 
    
    require_once 'dbmsConnect.php';     // for database Connection

	session_start();
 
    if( ISSET( $_POST['login'] ) ) {

        if( $_POST['txt_email'] != "" || $_POST['txt_password'] != ""){

            $v_username = $_POST['txt_email'];
            $v_password = $_POST['txt_password'];


			$_SESSION["email"] =  $_POST['txt_email'];
			$_SESSION["password"] = $_POST['txt_password'];

            $sqlQuery = $DB_Connection->prepare('SELECT * FROM `patient` WHERE `email`=? AND `password`=? ');
                      
            $sqlQuery->execute(array($v_username, $v_password));

            $dataRecords = $sqlQuery->rowCount();
            $fetch = $sqlQuery->fetch();

			      if( $dataRecords > 0 ) {
				      header("location: view.php");
            }
            else{
                echo"
                <center>
                  <h5 class='text-danger'>Invalid username or password</h5>
                </center>";
            }
        }
      }
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V4</title>
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
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">EMAIL</span>
						<input class="input100" type="text"  name="txt_email" placeholder="Type your Email">
						
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="txt_password" placeholder="Type your password">
					
					</div>
					
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button name="login" class="login100-form-btn">
								Login
							</button>



							

						</div>
					</div>

					<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							
						</span>

						<a href="/Assignment4/SignUpPat.php" class="txt2">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	

</body>
</html>