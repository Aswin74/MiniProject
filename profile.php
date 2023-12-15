<html>
<?php
session_start();

if (isset($_SESSION['username'])) {
  // The user is logged in
  $username = $_SESSION['username'];
  // Fetch additional profile information from the database if needed
  // Display the user's profile
  //echo "Welcome to your profile, $username!";

  // Add more profile information as needed
} else {
  // The user is not logged in, redirect to login page
  header("Location: login.html");
  exit();
}
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--Linking bootstra v5-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!--icon pack: font awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--common.css should only contain common styles for all pages-->
  <link rel="stylesheet" href="css/common.css" />
  <link rel="stylesheet" href="css/profile.css" />
  <!--Add/edit the about page css in about.css-->

  <!--title bar-->
  <link rel="icon" href="./img/logo/logo.png" />
  <title>HostEx | Profile</title>
</head>

<body>
  <!--Create Each Contents/sections inside a div-->

  <!--navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent p-0">
    <div class="container-fluid">
      <a class="navbar-brand py-2 me-1 ms-2" href="home.php">
        <img class="logo" src="https://i.ibb.co/kJwz4xz/logo.png" />
      </a>
      <a class="navbar-brand fs-4 fw-medium" href="home.php">HostEx</a>
      <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="fas fa-bars text-pinker"></span>
      </button>

      <!--OffCanvas-->
      <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header border-bottom">
          <h5 class="offcanvas-title text-pink fw-medium" id="offcanvasNavbarLabel">HostEx</h5>
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

          <!--Login/SignUp-->
          <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
            <div class="drop-down">
              <a onclick="dropDown()"><i class="fa-solid fa-user fs-5 me-2 text-pink"></i></a>
              <div class="drop-down_content">
                  <h3 class="text-pink"><?php echo $username ?></h3>
                  <hr class="text-pink"/>
                  <a href="./profile.php"><i class="fa-solid fa-gear me-3 text-pink"></i>Profile</a>
                  <a href="./php/logout.php"><i class="fa-solid fa-right-from-bracket me-3 text-pink"></i>Logout</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </nav>

  <!--Body-->

  <div class="container mt-4">
    <div class="content">
      <h1>Your Account</h1>
      <div class="row">
        <div class="col-md-5 col-xl-4">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title mb-0">Profile Settings</h5>
            </div>
            <div class="list-group list-group-flush" role="tablist">
              <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">Account</a>
              <?php echo '<a class="list-group-item list-group-item-action" href="./php/changepass.php">Change password</a>'; ?>
              <?php echo '<a class="list-group-item list-group-item-action" href="privacy.html">Privacy and safety</a>'; ?>
              <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">Email notifications</a>
              <?php echo '<a class="list-group-item list-group-item-action" href="./php/deleteuser.php">Delete Account</a>'; ?>
              <?php echo '<a class="list-group-item list-group-item-action" href="./php/logout.php">Logout</a>'; ?>
            </div>
          </div>
        </div>
        <div class="col-md-7 col-xl-8">
          <div class="tab-content">
            <div class="tab-pane fade show active" id="account" role="tabpanel">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Account info</h5>
                </div>
                <div class="card-body">
                  <!-- form content for Account tab -->
                  <?php
                      $conn = new mysqli("localhost", "root", "", "hostex");

                      if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                      }
                      $sql = "SELECT * FROM account_list WHERE username = '$username'";
                      $result = $conn->query($sql);
                      
                      if ($result->num_rows > 0) {
                          $userData = $result->fetch_assoc();
                      
                          //Populate Form Fields
                          $fullname = $userData['fullname'];
                          $email = $userData['email'];
                          $phone = $userData['phone'];
                          $address = $userData['address'];
                      } else {
                          echo "User not found!";
                          exit;
                      } 
                  ?>
                  <div class="info" align="left">
                  <form method="post" action="./php/profiledata.php">
                    <label for="username">Username: </label> <?php echo $username ?> <br><br>
                    <input type="hidden" name="username" value="<?php echo $username ?>" />
                    <label for="Name">Full name:</label>
                    <input type="text" name="fullname" placeholder="Your Name" value="<?php echo $fullname; ?>"><br>
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>"><br>
                    <label for="phone">Phone no:</label>
                    <input type="text" name="phone" placeholder="Phone" value="<?php echo $phone; ?>"><br>
                    <label for="address">Address:</label><br>
                    <textarea name="address" rows="3" cols="23" placeholder="Enter Address"><?php echo $address; ?></textarea><br>
                    <input type="submit" id="submit" value="Update">
                  <form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Bootstrap plugin-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="js/events.js"></script>
</body>

</html>