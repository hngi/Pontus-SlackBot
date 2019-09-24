<?php

// Config file to connect to database
require_once "config.php";

// Setting all field variables to be empty
$full_name = $email = $username = $phone_number = $password = $confirm_password = "";
$full_name_error = $email_error = $username_error = $phone_number_error = $password_error = $confirm_password_error = "";
    if(isset($_POST["reg"])) {
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
    // Validate Full Name
    if (empty($_POST["full_name"])) {
        $full_name_error = "Name is required";
    } else {
        $full_name = trim($_POST["full_name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$full_name)) {
          $full_name_error = "Only letters and white space allowed";
        }
    }
    
    // Validate Username
    if (empty($_POST["username"])) {
        $username_error = "Name is required";
    } else {
        $username = trim($_POST["username"]);
        // check if username length is between 5 and 20
        if (!preg_match("/^\w{5,20}$/", $username)) {
          $username_error = "Username can be alphanumeric and must be between 5 and 20 characters";
        } else { 
            $a = "SELECT username FROM users WHERE username = '$username' ";
            $result = mysqli_query($conn, $a);
            // Check if Username exists
            if  (mysqli_num_rows($result) > 0) {
                $username_error = "Username already exists";
            }
        }
    }
    
    // Validate Phone Number
    if (empty($_POST["phone_number"])) {
        $phone_number_error = "Phone Number is required";
    } else {
        $phone_number = trim($_POST["phone_number"]);
        // check if username length is between 5 and 20
        if (!preg_match("/^[0-9]{11}+$/", $phone_number)) {
          $phone_number_error = "Phone number must be 11 digits";
        } else { 
            $a = "SELECT phone_number FROM users WHERE phone_number = '$phone_number' ";
            $result = mysqli_query($conn, $a);
            // Check if phone number exists
            if  (mysqli_num_rows($result) > 0) {
                $phone_number_error = "Phone number already exists";
            }
        }
    }
 
    // Validate email
    if (empty($_POST["email"])) {
        $email_error = "Email is required";
    } else {
        $email = trim($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format";
    } else { 
        $a = "SELECT email FROM users WHERE email = '$email' ";
        $result = mysqli_query($conn, $a);
        // Check if email exists
        if  (mysqli_num_rows($result) > 0) {
            $email_error = "Email already exists";
        }
    }
    
    
}

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_error = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_error = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_error = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_error) && ($password != $confirm_password)){
            $confirm_password_error = "Password did not match.";
        }
    }


    
    // Hashing the password 
    $password = password_hash($password, PASSWORD_DEFAULT);


    
    // Check input errors before inserting in database
    if(empty($full_name_error) && empty($email_error) && empty($username_error) && empty($phone_number_error) && empty($password_error) && empty($confirm_password_error)){
        
        // Inserting details into database
        $a = "INSERT INTO users (full_name, email, username, phone_number, password) VALUES ('$full_name','$email','$username','$phone_number','$password' )";
        if(mysqli_query($conn, $a)) {
            echo "<script> alert('Registration succesful! You may now login')</script>";
            //header("refresh: 5; url=login.php");
            @header("location: index.php");
        }    
    }
    
    // Close connection
    mysqli_close($conn);
}
}
    
?>