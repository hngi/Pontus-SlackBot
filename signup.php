
<?php require "functions.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <link href="assets/bootstrap.min.css" rel="stylesheet"/>
        <link  href="assets/signUp.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Hind:600&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
    <body>


    </head>
    <body>
        
        <section class="loginBox">

            <div class="">
 
                <div class="col-lg-6 mq-none">
                   <div class="text-box">
                    <div class="abtimage">
                            <img src="assets/image/bg-sign.jpeg" width="100%">
                        </div>
                   </div>
               </div> 
               <div class="col-lg-6 col-md-8 col-md-12">
                    <form class="form"  method="POST" onsubmit="return validateForm() action="reg.php">
                    <form class="form" onsubmit="return validateForm()">

                    <div class="form-header">
                        <h3 class="h-underline--blue">Sign Up</h3>

                    </div>

                    <div class="form-group">
                        <div class="alert"></div>
                    </div>
                    <?php 
                        if(isset($_GET['error'])){
                            $errormsg =  urldecode($_GET['error']);
                            echo "<script> alert('$errormsg');</script>";
                        }
                    ?>
                    
                    <div class="form-group">
                        <input id="fullname" class="form-control" name="fullname"  type="text" placeholder="Type your full name here" required/>
                    </div>

                    <div class="form-group">
                        <input id="username" class="form-control" name="username" type="text" placeholder="Type your username here" required/>
                    </div>

                    <div class="form-group">
                        <input id="email" class="form-control" name="email" type="text" placeholder="Type your email address here" required/>
                    </div>
 
                    <div class="form-group">
                        <input id="password" class="form-control" name="password" type="password" placeholder="Password here" required/>

                    <div class="form-group">
                        <input id="email" class="form-control" type="text" placeholder="Type your email address here"/>
                    </div>

                    
                    <div class="form-group">
                            <input id="name" class="form-control" type="text" placeholder="Type your full name here"/>
                        </div>
                        

                    <div class="form-group">
                            <input id="password" class="form-control" type="password" placeholder="Password here"/>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" class="form-check" /> 
                        <span>Keep me signed in</span>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="reg" class="btn btn-primary btn-block"><a href="signin.php"></a> continue </button>
                        <button type="submit" class="btn btn-primary btn-block"><a href="signin.php"></a> continue </button>
                    </div>
                    <p align="center" >or</p>


                    <div class="form-group">
                            <button type="submit"  class="btn btn-primary btn-block">Signup with Google</button>
                        </div>

                    <hr class="styled-hr">

                    <div class="" align="center">
                    <h4 class="bottomH">Already have an Account? <a href="signin.php">sign in here</a></h5>
                    </div>
                        

                </form>
               </div>
               

            </div>

           
        </section>
      
    </body>
    <script src="assets/bootstrap.min.js"></script>
    <script src="assets/jquery.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/script.js" type="text/javascript"></script>
</html>
