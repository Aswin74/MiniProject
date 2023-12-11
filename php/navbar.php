   <?php
    session_start();

    $logChange = '';

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];

        $logChange = '
        <!--User Logged in-->
        <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
            <div class="drop-down">
              <a onclick="dropDown()"><i class="fa-solid fa-user fs-5 me-2 text-pink"></i></a>
              <div class="drop-down_content">
                  <h3 class="text-pink">'.$username.'</h3>
                  <hr class="text-pink"/>
                  <a href="./profile.php"><i class="fa-solid fa-gear me-3 text-pink"></i>Profile</a>
                  <a href="./php/logout.php"><i class="fa-solid fa-right-from-bracket me-3 text-pink"></i>Logout</a>
              </div>
            </div>
        </div>
        ';
    }

    else{

        $logChange = '
        <!--Login/SignUp-->
        <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
            <a href="login.html" class="text-pink text-decoration-none">Login</a>
            <a id="signup" href="login.html" class="text rounded-4 px-3 py-1">Sign Up</a>
        </div>
        ';
    }

   ?>
   
   
   <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent p-0">
        <div class="container-fluid">
            <a class="navbar-brand py-2 me-1 ms-2" href="home.php">
                <img class="logo" src="./img/logo/logo.png" />
            </a>
            <a class="navbar-brand fs-4 fw-medium" href="home.php">HostEx</a>
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="fas fa-bars text-pinker"></span>
            </button>

            <!--OffCanvas-->
            <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title text-pink fw-medium" id="offcanvasNavbarLabel">Hostex</h5>
                    <i class=" btn fa fa-x text-pinker" data-bs-dismiss="offcanvas" aria-label="Close"></i>
                </div>
                <div class="offcanvas-body d-flex flex-column align-items-center flex-lg-row">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="about.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="contact.html">Contact Us</a>
                        </li>
                    </ul>
                    
                <!--Printing the value of logChange specified above-->
                   <?php echo $logChange;?>

                </div>
            </div>
        </div>
    </nav>

 