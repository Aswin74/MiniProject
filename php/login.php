<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate the username and password against the database
    $conn = new mysqli("localhost", "root", "", "hostex");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM account_list WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login successful! Welcome, $username!";
        // setting session variable here for logged-in user
        session_start();
        $_SESSION['username'] = $username;
        // Redirect to profile.php
        header("Location: ../profile.php");
        exit(); // Ensure that no other code is executed after the header

    } else {
        echo "Login failed. Invalid username or password.";
    }

    $conn->close();
}
?>