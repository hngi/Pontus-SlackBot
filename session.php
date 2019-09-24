<?php
   include "config.php";
   session_start();
   
   $user_check = $_SESSION['login_user'];

   $a = " select * from users where email = '$user_check' ";
   
   $ses_sql = mysqli_query($conn, $a);
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_email = $row['email'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>