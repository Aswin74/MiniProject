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
        $row = $result->fetch_assoc();
        
        // Store user_id in a variable
        $user_id = $row['user_id'];

        // setting session variables here for the logged-in user
        session_start();
        $_SESSION['username'] = $username;     
        $_SESSION['user_id'] = $user_id;
        // Redirect to profile.php
        header("Location: ../profile.php");
        exit(); // Ensure that no other code is executed after the header

    } else {
        echo "Login failed. Invalid username or password.";
    }

    $conn->close();
}
?>