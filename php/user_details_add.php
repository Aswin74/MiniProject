<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "hostex");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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

        // SQL query to insert or update data in 'user_details' table
        $sql = "INSERT INTO user_details (user_id, studentName, guardian, relation, gphone, gender, address, nationality, state, district, pincode, clg_name, Aadhaar) 
                VALUES ('$user_id', '$studentName', '$guardianName', '$guardianRelation', '$guardianPhone', '$gender', '$permanentAddress', '$nationality', '$state', '$district', '$postalCode', '$collegeName', '$aadharNumber') 
                ON DUPLICATE KEY UPDATE 
                studentName = VALUES(studentName), 
                guardian = VALUES(guardian), 
                relation = VALUES(relation), 
                gphone = VALUES(gphone), 
                gender = VALUES(gender), 
                address = VALUES(address), 
                nationality = VALUES(nationality), 
                state = VALUES(state), 
                district = VALUES(district), 
                pincode = VALUES(pincode), 
                clg_name = VALUES(clg_name), 
                Aadhaar = VALUES(Aadhaar)";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../profile.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}