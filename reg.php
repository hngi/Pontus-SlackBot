<?php

// Config file to connect to database
require_once "config.php";
require "functions.php"; 
require "validation_functions.php";
require "session.php";



    $full_name = mysqli_real_escape_string($conn, $_POST['fullname']) ?? '';
    $username = mysqli_real_escape_string($conn, $_POST['username'])  ?? '';
    $email = mysqli_real_escape_string($conn, $_POST['email'])  ?? '';
    $password = mysqli_real_escape_string($conn, $_POST['password'])  ?? '';
    $_SESSION['errorMsg'] = '';
    $_SESSION['succussMsg'] = '';
       

    if (is_post_request() && isset($_POST['reg'])) {

        if(is_blank($full_name)) {
            $_SESSION['errorMsg'] = "Full name cannot be blank.";
        } elseif (!has_length($full_name, array('min' => 2, 'max' => 255))) {
           echo $_SESSION['errorMsg'] = "Full name must be between 2 and 255 characters.";
        }

        if(is_blank($email)) {
            $_SESSION['errorMsg'] = "Email cannot be blank.";
        } elseif (!has_length($email, array('max' => 255))) {
            $_SESSION['errorMsg'] = "Last name must be less than 255 characters.";
        } elseif (!has_valid_email_format($email)) {
            $_SESSION['errorMsg'] = "Email must be a valid format.";
        } elseif (checkDatabase($conn,"users","email",$email) == true) {
            $_SESSION['errorMsg'] = "Email not allowed. Try another.";
        }

        if(is_blank($username)) {
            $_SESSION['errorMsg'] = "Username cannot be blank.";
        } elseif (!has_length($username, array('min' => 8, 'max' => 255))) {
            $_SESSION['errorMsg'] = "Username must be between 8 and 255 characters.";
        } elseif (checkDatabase($conn,"users","username",$username) == true) {
            $_SESSION['errorMsg'] = "Username not allowed. Try another.";
        }

       
        if(is_blank($password)) {
            $_SESSION['errorMsg'] = "Password cannot be blank.";
        } elseif (!has_length($password, array('min' => 6))) {
            $_SESSION['errorMsg'] = "Password must contain 6 or more characters";
        } elseif (!preg_match('/[A-Z]/',$password)) {
            $_SESSION['errorMsg'] = "Password must contain at least 1 uppercase letter";
        } elseif (!preg_match('/[a-z]/',$password)) {
            $_SESSION['errorMsg'] = "Password must contain at least 1 lowercase letter";
        } elseif (!preg_match('/[0-9]/',$password)) {
            $_SESSION['errorMsg'] = "Password must contain at least 1 number";
        } elseif (!preg_match('/[^A-Za-z0-9\s]/',$password)) {
            $_SESSION['errorMsg'] = "Password must contain at least 1 symbol";
        }
    
        // Hashing the password 
        $password = password_hash($password, PASSWORD_DEFAULT);


    
    // Check input errors before inserting in database
    if(empty($_SESSION['errorMsg'])){
        
        // Inserting details into database
        $sql = "INSERT INTO users (full_name, email, username, password) VALUES ('$full_name','$email','$username','$password' )";
        if(mysqli_query($conn, $sql)) {
            $_SESSION['succussMsg'] = "Registration succesful! You may now login";
            redirect_to("signin.php?success=".$_SESSION['succussMsg']);
        }else{
            //die(mysqli_error($conn));
        }    
    }else{
        redirect_to("signup.php?error=".$_SESSION['errorMsg']);
    }
    
    
    
}

// Close connection
mysqli_close($conn);
?>