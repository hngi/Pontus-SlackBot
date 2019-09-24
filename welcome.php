<?php
   include "session.php";
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
            <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1568801083/eBOOKIES_logo_2_hgcko4.png" alt="favicon">
            <!-- <span>Remove me!</span> -->
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
                        <a href="#">
                            <i class="far fa-star"></i><span>Shelves</span>
                        </a>
                    </li>
                    <li class="navbar--item">
                        <a href="#">
                            <i class="fa fa-bars"></i><span>Categories</span>
                        </a>
                    </li>
                    <li class="navbar--item">
                        <a href="#">
                            <i class="fas fa-book"></i><span>My Book</span>
                        </a>
                    </li>
                    
                    <li class="navbar--item">
                        <a href="#">
                            <i class="fas fa-search"></i><span>Search</span>
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
        <section class="shelve--container">
            <div class="grid-align wrapper">
                <i class="fas fa-less-than control left"></i>
                <i class="fas fa-greater-than control right"></i>
                <div class="card">
                    <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1568800141/half-of-a-yellow-sun-uesiqg_bq4ml1.jpg" alt="Half of a yellow sun">
                </div>
                <div class="card">
                    <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1568800134/african-dawn_z8xy9g.jpg" alt=" African dawn">
                </div>
                <div class="card">
                    <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1568800134/9781415209677-A-Spy-in-Time_bpvpsr.jpg" alt="A spy in time">
                </div>
                <div class="card">
                    <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1568800131/91KLuKxFuOL_xns7l6.jpg" alt="The beauty">
                </div>
                <div class="card">
                    <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1568800111/9a39ede9313c24af5b9bea82747d350c.1200x1200_cuqzyz.jpg" alt="Excellent gown">
                </div>
            </div>
        </section>
        <section class="shelve--container">
            <div class="grid-align wrapper">
                <i class="fas fa-less-than control left"></i>
                <i class="fas fa-greater-than control right"></i>
                <div class="card">
                    <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1568800120/9789783603578_appgzd.jpg" alt="Age of attraction">
                </div>
                <div class="card">
                    <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1568800134/9781415209677-A-Spy-in-Time_bpvpsr.jpg" alt="Endownment indeed">
                </div>
                <div class="card">
                    <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1568800181/Children_s_Madiba_HR_pqrtuz.jpg" alt="The duty of suffering">
                </div>
                <div class="card">
                    <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1568800179/9781910974391_vrluok.jpg" alt="Everlasting promise">
                </div>
                <div class="card">
                    <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1568800164/download_he7tdz.jpg" alt="Charming King">
                </div>
            </div>
        </section>
        <section class="shelve--container">
            <div class="grid-align wrapper">
                <i class="fas fa-less-than control left"></i>
                <i class="fas fa-greater-than control right"></i>
                <div class="card">
                    <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1568800173/SA_Rock_Art_1000x1500_hm7gni.jpg" alt="SA rock art">
                </div>
                <div class="card">
                    <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1568800163/Unknown-2_lgh43l.jpg" alt="">
                </div>
                <div class="card">
                    <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1568800155/Things-Fall-Apart_nhcop0.jpg" alt="Things Fall Apart">
                </div>
                <div class="card">
                    <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1568800154/The-Blessed-Girl_j00k8u.jpg" alt="He blessed girl">
                </div>
                <div class="card">
                    <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1568800146/Madiba_lit_text02_gujodl.jpg" alt="Madiba lit text">
                </div>
            </div>
        </section>
    </main>
    <script src="assets/welcome.js" type="text/javascript"></script>
</body>
</html>