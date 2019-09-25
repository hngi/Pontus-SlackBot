<?php require "session.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/Dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard | Slackbot</title>
  </head>
  <body>
    <div class="container first-child"></div>
    <div class="container second-child"></div>
    <div class="container third-child">
        <div class="row">
            <div class="col-lg-3">
                <section class="left">
                    <div class="logo">
                        <h3 class="text-center">Slackbot</h3>
                    </div>
                        <div class="user-welcome text-center mt-1">Welcome <span class="text-success"> <?php echo $_SESSION["login_fullname"] ?? ''; ?></span></div> 
                        <div class="user-welcome text-center mt-1">Your Email is <span class="text-success"> <?php echo $_SESSION["login_email"] ?? ''; ?></span></div>  

                        <div class="sidebar-info">
                            <h3 class="mt-4">Basics</h3>
                            <ul>
                                <li><i class="fa fa-check"></i> Lorem lique earum voluptatibus.</li>
                                <li><i class="fa fa-check"></i> Lorem lique earum voluptatibus.</li>
                                <li><i class="fa fa-check"></i> Lorem lique earum voluptatibus.</li>
                                <li><i class="fa fa-check"></i> Lorem lique earum voluptatibus.</li>

                            </ul>
                        </div>
                    
                </section>
            </div>
            <div class="col-lg-9">
                <section class="right">
                    <header class="d-flex">
                            <div class="img">
                                <a href="logout.php" class="btn btn-danger">Log out</a>
                            <img src="assets/images/disability.svg" alt="user-image" class="rounded-circle" width="50">
                            </div>
                    </header>
                    <hr>

                        <div class="section-info">
                            <h3 class="text-grey">Details here</h3>
                            <div class="wrapper mt-5 mb-5">
                                    
                            <div class="card d-flex p-4 text-white">
                                    <img src="assets/images/disability.svg" alt="user-image" width="50">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus magnam consequuntur possimus accusantium officia nisi vitae, obcaecati cupiditate error neque placeat totam? Suscipit voluptate maiores cupiditate. Qui nemo deserunt cupiditate.</p>
                            </div>
                        </div>
                            <div class="wrapper d-flex mt-5 mb-5">
                                    
                            <div class="card -flex p-4 text-white">
                                    <img src="assets/images/disability.svg" alt="user-image" class="rounded-circle" width="50">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus magnam consequuntur possimus accusantium officia nisi vitae, obcaecati cupiditate error neque placeat totam? Suscipit voluptate maiores cupiditate. Qui nemo deserunt cupiditate.</p>
                            </div>
                        </div>                                



                            <div class="input d-flex mt-5">
                                <input type="text" class="form-control mr-4" placeholder="Please type your message here">
                                <button class="btn btn-primary" style="height: auto;">ENTER </button>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>