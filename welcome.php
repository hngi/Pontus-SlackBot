<?php
    require_once "config.php";
    include "session.php";
   
    is_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="assets/welcome.css">
</head>
<body>
    <header class="header">
        <div class="favicon">
            <h1>PONTUS-SLACKBOT</h1>
        </div>
        <nav>
            <ul class="navbar wrapper">
                <div class="toggle--nav">
                    <li class="navbar--item toggle--icon"><i class="fa fa-bars"></i></li>
                </div>
                <div class="nav--link_container dropdown">
                    <li class="navbar--item toggle--icon close"><i class="fa fa-times"></i></li>
                    <li class="navbar--item">
                        <a href="#">
                            <i class="fas fa-user-tie"></i><span>Welcome, <?php echo $row['username']?></span>
                        </a>
                    </li>
                    <li class="navbar--item">
                        <a href="Dashboard.php">
                            <i class="far fa-star"></i><span>View yours Conversion</span>
                        </a>
                    </li>
                    
                    <li class="navbar--item">
                        <a href="logout.php" class="danger">
                            <i class="far fa-user"></i><span>Logout</span>
                        </a>
                    </li>
                </div>
                 
            </ul>
        </nav>
    </header>
    <main class="main--page wrapper">
        <br /> <br /> <br /> <br /> <br />
        <h2>
            <p>
                This is a slack bot that saves users conversations to an external hard drive. Task for Stage 3 
            </p>
            <br /> <br /> 
            <p>
                Features: User sign up (on external drive), User link external drive with slack workspace, 
                User send conversation to external drive from slack workspace, 
                user login to the external drive to see their slack conversations.
            </p>
        </h2>
    </main>
    <script src="assets/welcome.js" type="text/javascript"></script>
</body>
</html>
