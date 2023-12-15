<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];

    $conn = new mysqli("localhost", "root", "", "hostex");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle Form Submission and Update
    // Assuming form has fields with 'name' attributes like 'fullname', 'email', etc.
    $updatedFullName = $conn->real_escape_string($_POST['fullname']);
    $updatedEmail = $conn->real_escape_string($_POST['email']);
    $updatedPhoneNumber = $conn->real_escape_string($_POST['phone']);
    $updatedAddress = $conn->real_escape_string($_POST['address']);

    // Update the database with the new values
    $updateSql = "UPDATE account_list SET fullname = '$updatedFullName', email = '$updatedEmail', phone = '$updatedPhoneNumber', address = '$updatedAddress' WHERE username = '$username'";

    if ($conn->query($updateSql) === TRUE) {
        echo "Profile updated successfully!";
        header("Location: ../profile.php");
        exit(); 
    } else {
        echo "Error updating profile: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>