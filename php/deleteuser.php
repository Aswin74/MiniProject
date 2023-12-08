<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

// database connection code
$conn = new mysqli("localhost", "root", "", "hostex");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the logged-in username
$username = $_SESSION['username'];

// Check if the delete button is clicked
if (isset($_POST['delete_account'])) {
    // Perform deletion from the database
    $sql = "DELETE FROM students_list WHERE username = '$username'";
    
    if ($conn->query($sql) === TRUE) {
        // Account deleted successfully
        session_destroy(); // Destroy the session
        header("Location: login.html"); // Redirect to a login page
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

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

        h2 {
            color: #721c24; /* Dark red heading color */
        }
    </style>
</head>
<body>
    <h2>Delete Account</h2>
    <h4>Are you sure you want to delete your account?</h4>
    <form method="post" action="">
        <input type="submit" name="delete_account" value="Delete Account">
    </form>
    <h3><b>Note: Deleting your account will remove all your information from our database.</b><br>
    This action cannot be undone!</h4>
    
</body>
</html>