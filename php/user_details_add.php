<?php
session_start();

$conn = new mysqli("localhost", "root", "", "hostex");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//storing user_id from signup into a variable
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Personal Information
    $studentName = $_POST['studentName'];

    // Guardian Information
    $guardianName = $_POST['guardianName'];
    $guardianRelation = $_POST['guardianRelation'];
    $guardianPhone = $_POST['guardianPhone'];

    // Gender
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

    // Address Information
    $permanentAddress = $_POST['permanentAddress'];
    $nationality = $_POST['nationality'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $postalCode = $_POST['postalCode'];

    // College Information
    $collegeName = $_POST['collegeName'];

    // Aadhar Information
    $aadharNumber = $_POST['aadharNumber'];

    // SQL query to insert data into 'user_details' table
    $sql = "INSERT INTO user_details (user_id, studentName, guardianName, guardianRelation, guardianPhone, gender, permanentAddress, nationality, state, district, postalCode, collegeName, aadharNumber) VALUES ('$user_id', '$studentName', '$guardianName', '$guardianRelation', '$guardianPhone', '$gender', '$permanentAddress', '$nationality', '$state', '$district', '$postalCode', '$collegeName', '$aadharNumber')";

    if ($conn->query($sql) === TRUE) {
        header("../php/profile.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
