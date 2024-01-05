<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--Linking bootstra v5.3-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!--icon pack: font awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--common.css should only contain common styles for all pages-->
  <link rel="stylesheet" href="css/common.css" />
  <!--Add/edit the login page css in booking.css-->
  <link rel="stylesheet" href="css/booking.css" />

  <!--title bar-->
  <link rel="icon" href="./img/logo/logo.png" />
  <title>HostEx | Login</title>
</head>

<body>

 <!--Navbar-->
 <?php include("./php/navbar.php");?>

  <!--Body-->
  <!--First Name, Last Name
  email phone 
  Guardian Name , Guardian relation
  Guardian number.
  Address city state pincode
  College Name , Location , 
  Upload college  id 
  aadhaar no
  Upload Aadhaar
  
  button:-> book your hostel-->

 <form>
  
  <center>
<div class="container"> 
<h1 align="center">Hostel Booking Form</h1>
<hr>
	<table>
	   <th align="left" class="txt1">Name of the student:</th> 
	   <th align="left"><input type="text" placeholder="Enter name"></th></tr>
     <tr><th align="left"> Email:</th> <th align="left"><input type="text" placeholder="Enter Email"></th></tr>
     <tr><th align="left">Phone:</th> <th align="left"><input type="text" placeholder="Phone number"></th></tr>
  </table>
<hr>
    <table>
     <tr><th align="left">Name of Guardian:</th> <th align="left"><input type="text" placeholder="Enter name" ></th></tr>
     <tr><th align="left">Relation to Guardian:</th> <th align="left"><input type="text"  ></th></tr>
     <tr><th align="left">Guardian's phone:</th> <th align="left"><input type="text" placeholder="Phone number"></th></tr>
    </table>
<hr>

    <table>
      <tr><th>
        <label>Gender :  </label>
        <input type="radio" id="male" name="gender" value="Male">
        <label for="male">Male</label> 
        
        <input type="radio" id="female" name="gender" value="Female">
        <label for="female">Female</label>

        <!--<input type="radio" id="others" name="gender" value="Others">
        <label for="others">Others</label> -->
         <br>
      </th></tr>
    </table>
    <hr>

    <table>
      <tr><th align="left">Permanent Address:</th><th align="left" border-radius="50px"> <textarea rows="3" cols="23" placeholder="Enter Address"></textarea></th></tr><br>
      <tr><th align="left">Nationality:</th> <th align="left"><input type="text" ></th></tr>
      <tr><th align="left">State:</th><th align="left"> <input type="text" ></th></tr>
      <tr><th align="left">District:</th><th align="left"><input type="text" ></th></tr>
      <tr><th align="left">Postal code:</th><th align="left"><input type="text" ></th></tr>
</table>
<hr>


    <table>
       <tr><th align="left">Name of the college:</th> <th align="left"><input type="text" ></th></tr>
    </table>

    <table>
      <tr><th <action="/action_page.php">Upload ID:<input type="file" id="myfile" name="filee" ></th></tr></form>
    </table><hr>

    <table>
      <tr><th align="left">Aadhar Number:</th> <th align="left"><input type="text" ></th></tr>
    </table>
  
    <table>
      <tr><th <action="/action_page.php">Upload Aadhar:<input type="file" id="aadhar" name="aadhar" ></th></tr></form>
    </table><hr>

      
    <tr><th align="center"><div class="detail-book-btn">
      <button class="book-now" data-hostel_id=<?php echo $hostel_id ?> data-hname=<?php echo $hname ?> data-price=<?php echo $price ?>>Book Now</button>
  </div></th></tr>
   
	  </table>
    
  </center>
  </body>

  
	</form>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script defer src="js/events.js"></script>
</body>

</html>
