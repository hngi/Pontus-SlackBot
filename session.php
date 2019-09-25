<?php
   include "config.php";
   session_start();
   
  $_SESSION['login_user_username'] ?? '';
  $user_check =  $_SESSION["login_user_email"] ?? '';

   $a = " select * from users where email = '$user_check' ";
   
   $ses_sql = mysqli_query($conn, $a);
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $_SESSION["login_fullname"] = $login_email = $row['full_name'];
   $_SESSION["login_email"] = $login_email = $row['email'];
   $_SESSION["login_username"] = $login_email = $row['username'];

   
   
   function is_login() {
      if(!isset($_SESSION['login_user'])){
         header("location:signin.php");
         die();
      }
   }
?>