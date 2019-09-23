<?php
   include("config.php");
   session_start();
   if(isset($_SESSION["login_user"]))  
    {  
        header("location:welcome.php");  
    }

   $error = "";
   if(isset($_POST["login"])) {
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // email and password sent from form 
      
      $email = mysqli_real_escape_string($conn,$_POST['email']);
	  $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $a = "SELECT * FROM users WHERE email = '$email' ";
      $result = mysqli_query($conn,$a);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myemail and $mypassword, table row must be 1 row
		
      if($count > 0) {
		 //session register("myemail");
		
		 while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $row["password"]))  
                     {  
                          //return true;  
						  $_SESSION["login_user"] = $email;  
						  
                          header("location: welcome.php");  
                     }  
                     else  
                     {  
                          //return false;  
                          $error = "Your Login Name or Password is invalid";  
                     }  
                }         
         
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" , initial-scale="1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Team Jupiter">
    <meta name="description" content="A practical example of user authentication">
    <meta name="keywords" content=" login, signup, auth, authenticate, authentication">
    <!--style sheet-->
    <link rel="stylesheet" type="text/css" href="assets/style.css" />
    <!--Javascript-->

    <title>Login</title>
</head>

<body>
    <div id="container" class="row">
        <!--<img src="assets/books3.jpg" alt="opened book">-->
        <main id="main">
            <div id="loginulcontainer" class="col-sm-12">
                <div id="login-tab" class="active">LOGIN</div>
                <div id="register-tab">REGISTER</div>
                <div id="logincontainer">
                    
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control inputbox" placeholder="Email" id="login-username">
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control inputbox" placeholder="Password" id="login-password">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="login" class="btn btn-primary" value="LOGIN">
                        </div>
                        <span style="color:red;"><?php echo $error;?></span>
                        <div class="textcenter signuptxt">Don't have an account?<a href="#" class="link registerlink"> Sign up</a></div>
                        <p class="textcenter forgettxt"><a href="#" class="textcenter link forgetlink">Forget password?</a></p>
                    </div>
                </form>
                <div id="registercontainer" hidden>
                <?php
                    include "reg.php";
                ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="full_name" class="form-control inputbox" placeholder="Full name" value="<?php echo $full_name; ?>" id="register-fullname"><span style="color:red;"><?php echo $full_name_error; ?></span></br>
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control inputbox" placeholder="Username" value="<?php echo $username; ?>" id="register-username"><span style="color:red;"><?php echo $username_error; ?></span></br>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" class="form-control inputbox" placeholder="Email" value="<?php echo $email; ?>" id="register-email"><span style="color:red;"><?php echo $email_error; ?></span></br>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone_number" class="form-control inputbox" placeholder="Phone Number" value="<?php echo $phone_number; ?>" id="register-username"><span style="color:red;"><?php echo $phone_number_error; ?></span></br>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control inputbox" placeholder="Password" value="" id="register-password"><span style="color:red;"><?php echo $password_error; ?></span></br>
                        </div>

                        <div class="form-group">
                            <input type="password" name="confirm_password" class="form-control inputbox" placeholder="Confirm Password" value="" id="register-confirmpassword"><span style="color:red;"><?php echo $confirm_password_error; ?></span></br>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="reg" class="btn btn-primary" value="REGISTER">
                        </div>

                        <div class="textcenter signuptxt">Already have an account?<a href="#" class="link loginlink"> login</a></div>
                    </form>
                </div>

            </div>

        </main>

    </div>
    <script src="assets/main.js"></script>

</body>

</html>