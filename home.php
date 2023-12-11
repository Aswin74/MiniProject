<?php
$conn = new mysqli("localhost", "root", "", "hostex");
$sql = "SELECT * FROM hostel_list";
$result = mysqli_query($conn, $sql);

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Linking bootstra v5.3-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--icon pack: font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--common.css should only contain common styles for all pages-->
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/home.css" />
    <!--Add/edit the home page css in home.css-->

  <!--title bar-->
  <link rel="icon" href="./img/logo/logo.png" />
  <title>HostEx | Home</title>
</head>

<body>

    <!--Navbar-->
    <?php include("./php/navbar.php")?>

    <!--Body-->
    <!-- Search Bar -->
    <form method="GET" class="container-fluid home-search">
        <div class="search">
            <input name="search" type="text" value="<?php if (isset($_GET['search'])) {
                                                        echo ($_GET['search']);
                                            } ?>" placeholder="Search Hostels.." autocomplete="off"/>

            <button class="search-btn">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </form>

    <!--Cards-->
    <div class="container">
        <div class="cards-group">

            <!--Card: Searching-->
            <?php
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                $query = "SELECT * FROM hostel_list WHERE CONCAT(hname, price,location,description) LIKE '%$search%'";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {

                    while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                        <div class="card">
                            <div class="glassback"></div>
                            <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/25/24/cb/33/8-bed-mixed-gender-dorm.jpg?w=300&h=-1&s=1" />
                            <div class="card-content">
                                <div class="card-price">₹.<?php echo $row["price"] ?>/<span style="font-size:60%">month</span> </div>
                                <div class="card-name"><?php echo $row["hname"] ?></div>
                                <div class="card-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <div class="card-location tag"><?php echo $row["location"] ?></div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    echo "<h1 class='text-pink'>No results</h1>";
                }
            } elseif (!isset($_GET['search']) || empty($_GET['search'])) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="card">
                        <div class="glassback"></div>
                        <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/25/24/cb/33/8-bed-mixed-gender-dorm.jpg?w=300&h=-1&s=1" />
                        <div class="card-content">
                            <div class="card-price">₹.<?php echo $row["price"] ?>/<span style="font-size:60%">month</span> </div>
                            <div class="card-name"><?php echo $row["hname"] ?></div>
                            <div class="card-rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="card-location tag"><?php echo $row["location"] ?></div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <div>
        <i class="fa-solid fa-circle-plus add-btn"></i>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./js/events.js"></script>
</body>

</html>