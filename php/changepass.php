<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../login.html");
    exit();
}

// Include your database connection code
$conn = new mysqli("localhost", "root", "", "hostex");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the logged-in username
$username = $_SESSION['username'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $currentPassword = $_POST["currentpass"];
    $newPassword = $_POST["newpass"];
    $newPassword2 = $_POST["newpass2"];

    // Validate the current password
    // For better security, you should hash and compare passwords
    $sql_check_password = "SELECT * FROM students_list WHERE username = '$username' AND password = '$currentPassword'";
    $result_check_password = $conn->query($sql_check_password);

    if ($result_check_password->num_rows > 0) {
        // Current password is correct
        if ($newPassword == $newPassword2) {
            // Update the password in the database
            $sql_update_password = "UPDATE students_list SET password = '$newPassword' WHERE username = '$username'";

            if ($conn->query($sql_update_password) === TRUE) {
                echo "Password updated successfully";
              //back to profile  
                header("Location: ../profile.php");
                exit();
            } else {
                echo "Error updating password: " . $conn->error;
            }
        } else {
            echo "New passwords do not match";
        }
    } else {
        echo "Incorrect current password";
    }
}

// Close the database connection
$conn->close();
?>

<!-- The HTML form for changing password -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>

    <style>
        body {
            background-color: #f8d7da; 
            color: #721c24; 
            text-align: center;
            padding: 20px;
        }
        label{
        font-size: 20px;}

        h2 {color: #721c24; }
    </style>
</head>
<body>
    <h2>Change Your Password</h2>
    <form method="post" action="">
    <div class="form-group">
        <label for="currentpass">Current password: </label> 
        <input type="password" class="form-control" name="currentpass" required>
    </div><br>
    <div class="form-group">
        <label for="newpass">New password: </label>
        <input type="password" class="form-control" name="newpass" required>
    </div><br>
    <div class="form-group">
        <label for="newpass2">Verify password: </label>
        <input type="password" class="form-control" name="newpass2" required>
    </div><br>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>
    
</body>
</html>
