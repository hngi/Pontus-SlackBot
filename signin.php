<!DOCTYPE html>
<html>
    <head>
        <link href="assets/bootstrap.min.css" rel="stylesheet"/>
        <link  href="assets/signUp.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Hind:600&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
               <div class="col-lg-6 col-md-8 col-sm-12">
                    <form class="form" onsubmit="return validateForm()">

                    <div class="form-header">
                        <h3 class="h-underline--blue">Sign In</h3>

                    </div>

                    <div class="form-group">
                        <div class="alert"></div>
                    </div>

                    <div class="form-group">
                        <input id="username" class="form-control" type="text" placeholder="Type your Username here"/>
                    </div>
                    

                    <div class="form-group">
                            <input id="password" class="form-control" type="password" placeholder="Password here"/>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" class="form-check" /> 
                        <span>Keep me signed in</span>
                    </div>

                    <div class="form-group">
                        <button type="submit"  class="btn btn-primary btn-block">Sign In</button>
                    </div>

                    <hr class="styled-hr">

                    <div class="" align="center">
                        <h4 class="bottomH">Forget Password?</h5>
                    <h4 class="bottomH">Don't have an Account? <a href="#">sign up here</a></h5>
                    </div>
                        

                </form>
               </div>
               

            </div>

           
        </section>
      
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/script.js" type="text/javascript"></script>
</html>