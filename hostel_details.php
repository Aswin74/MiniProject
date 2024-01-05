<?php
session_start();

$conn = new mysqli("localhost", "root", "", "hostex");

//if hostel id is set
if (isset($_GET['hostel_id'])) {
    $hostel_id = $_GET['hostel_id'];

    $sql = "SELECT * FROM hostel_list WHERE hostel_id =$hostel_id";
    $hostel_data = mysqli_query($conn, $sql);

    //Accessing the data into a variable with hostel_id
    while ($hostel = mysqli_fetch_assoc($hostel_data)) {
        $product_id = $hostel['hostel_id'];
        $hname = $hostel['hname'];
        $location = $hostel['location'];
        $price = $hostel['price'];
        $hphone = $hostel['hphone'];
        $haddress = $hostel['haddress'];
        $description = $hostel['description'];
        $hostel_image1 = $hostel['hostel_image1'];
        $hostel_image2 = $hostel['hostel_image2'];
    }
}


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
    <link rel="stylesheet" href="./css/common.css" />
    <link rel="stylesheet" href="./css/details.css" />
    <!--Add/edit the details page css in details.css-->

    <!--title bar-->
    <link rel="icon" href="./img/logo/logo.png" />
    <title>HostEx | Details</title>
</head>

<body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top sp-2">
        <div class="container-fluid">

            <div>
                <a class="fa-solid fa-arrow-left fs-4 text-pink p-2" onclick="history.back()"></a>
            </div>
            <div>
                <a class="navbar-brand py-2 me-1 ms-2" href="home.php">
                    <img class="logo mb-2" src="./img/logo/logo.png" />
                    <a class="navbar-brand fs-4 fw-medium" href="home.php">HostEx</a>
                </a>
            </div>

        </div>
    </nav>

    <!--Body-->
    <div class="content row">

        <!-- Carousel -->
        <div class="content-carousel col-lg-8">
            <div class="carousel-img-block">
                <div class="carousel-img">
                    <img src="./img/hostel_images/<?php echo $hostel_image2; ?>" class="show_image" alt="hostel image" />
                    <img src="./img/hostel_images/<?php echo $hostel_image1; ?>" alt="hostel image" />
                </div>
            </div>

            <div class="carousel-btn">
                <button id="prev" onclick="prev()">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>

                <button id="next" onclick="next()">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>

            <ul class="carousel-dots">
                <li class="active"></li>
                <li></li>
            </ul>

        </div>

        <!-- Details -->
        <div class="content-details col-lg-4">
            <div class="details">
                <div class="detail-price">₹.
                    <?php echo $price ?>/<span style="font-size:60%">month</span>
                </div>
                <div class="detail-name">
                    <?php echo $hname ?>
                </div>
                <div class="detail-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <div class="detail-location tag">
                    <?php echo $location ?>
                </div>
                <div class="detail-phone">
                    <i class="fa-solid fa-phone">
                        <?php echo $hphone ?>
                    </i>
                </div>
                <div class="detail-description">
                    <?php echo nl2br($description) ?>
                </div>

                <!--book now button-->
                <div class="detail-book-btn">
                    <button class="book-now" data-hostel_id=<?php echo $hostel_id ?> data-hname=<?php echo $hname ?> data-price=<?php echo $price ?>>Book Now</button>
                </div>
            </div>
        </div>
    </div>


    <!-- PAYMENT PROCESS PHP & jQuery-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        $(".book-now").click(function() {
            <?php if (isset($_SESSION['username'])) : ?>

                var price = $(this).data('price');
                var hostel_id = $(this).data('hostel_id');
                var hname = $(this).data('hname');


                var options = {
                    "key": "rzp_test_tQxI3YgXxMPulM", //  Key ID generated from the Dashboard
                    "amount": price * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                    "currency": "INR",
                    "name": "HostEx",
                    "description": hname,
                    "image": "img/logo/logo.png",
                    "handler": function(response) {
                        var payment_id = response.razorpay_payment_id;

                        $.ajax({
                            url: "./php/payment-process.php",
                            type: "POST",
                            data: {
                                hostel_id: hostel_id,
                                payment_id: payment_id
                            },

                            success: function(finalresponse) {
                                if (finalresponse == 'done') {
                                    window.location.href = "http://localhost/MiniProject/php/pay-success.php";
                                } else {
                                    alert('Please check console.log to find error');
                                    console.log(finalresponse);
                                }
                            }
                        })

                    },
                    "theme": {
                        "color": "#da0b24"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
                e.preventDefault();
            <?php else : ?>
                // Redirect to login.html if the user is not logged in
                window.location.href = "login.html";
            <?php endif; ?>
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./js/events.js"></script>

</body>

</html>