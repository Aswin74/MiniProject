<?php
session_start();

$conn = new mysqli("localhost", "root", "", "hostex");

//storing user_id from signup into a variable
if (isset($_GET['user_id'])) {
  $user_id = $_GET['user_id'];
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
  <link rel="stylesheet" href="css/common.css" />
  <!--Add/edit the login page css in booking.css-->
  <link rel="stylesheet" href="css/user_details.css" />

  <!--title bar-->
  <link rel="icon" href="./img/logo/logo.png" />
  <title>HostEx | Complete Profile</title>
</head>

<body>
  <div class="container d-flex justify-content-center">
    <form action="./php/user_details_add.php">

      <h1 class="form-title">Complete Your Profile</h1>
      <div class="form-body">
        <!-- Personal Information -->
        <div class="form-input">
          <label for="studentName">Full Name</label>
          <input type="text" class="intext" id="studentName" name="studentName" required />
        </div>

        <!-- Guardian Information -->
        <div class="form-input">
          <label for="guardianName">Guardian</label>
          <input type="text" class="intext" id="guardianName" name="guardianName" required />
        </div>

        <div class="form-input">
          <label for="guardianRelation">Relation to Guardian</label>
          <input type="text" class="intext" id="guardianRelation" name="guardianRelaion" required />
        </div>

        <div class="form-input">
          <label for="guardianPhone">Guardian's phone</label>
          <input type="tel" class="intext" id="guardianPhone" name="guardianPhone" required />
        </div>

        <!-- Gender -->
        <div class="input-field gender">
          <label class="gender-title">Gender :</label>
          <input type="radio" id="male" name="gender" value="Male" required />
          <label class="text-white" for="male">Male</label>

          <input type="radio" id="female" name="gender" value="Female" required />
          <label class="text-white" for="female">Female</label>
        </div>

        <!-- Address Information -->
        <div class="form-input">
          <label for="permanentAddress">Permanent Address</label>
          <textarea class="intext" id="permanentAddress" rows="3" cols="23" name="permanentAddres" required></textarea>
        </div>

        <div class="form-input">
          <label for="nationality">Nationality</label>
          <input type="text" class="intext" id="nationality" name="nationality" required />
        </div>

        <div class="form-input">
          <label for="state">State</label>
          <input type="text" class="intext" id="state" name="state" required />
        </div>

        <div class="form-input">
          <label for="district">District</label>
          <input type="text" class="intext" id="district" name="district" required />
        </div>

        <div class="form-input">
          <label for="postalCode">Postal code</label>
          <input type="text" class="intext" id="postalCode" name="postalCode" required />
        </div>

        <!-- College Information -->
        <div class="form-input">
          <label for="collegeName">Name of the college</label>
          <input type="text" class="intext" id="collegeName" name="collegeName" required />
        </div>

        <!-- ID Upload -->
        <div class="form-input">
          <label for="idUpload">Upload College ID</label>
          <input type="file" class="infile" id="idUpload" name="idUpload" accept=".pdf, .doc, .docx" />
        </div>

        <!-- Aadhar Information -->
        <div class="form-input">
          <label for="aadharNumber">Aadhar Number</label>
          <input type="text" class="intext" id="aadharNumber" name="aadharNumber" required />
        </div>

        <!-- Aadhar Upload >
        <input type="file" class="infile" id="aadharUpload" name="aadhar" accept=".pdf, .jpg, .jpeg, .png" required /-->

        <!-- Submit Button -->
        <input type="submit" class="form-btn form-add" id="submit" value="Submit">
      </div>

    </form>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>