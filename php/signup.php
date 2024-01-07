<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform form validation
    $errors = array();

    // Validate username
    if (empty($username)) {
        $errors[] = "Username is required";
    } elseif (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
        $errors[] = "Username should only contain letters, numbers, and underscores";
    }

    // Validate phone number
    if (empty($phone)) {
        $errors[] = "Phone number is required";
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Invalid phone number format";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required";
    }

    // If there are no errors, proceed to database insertion
    if (empty($errors)) {

     // Create a connection to the database
     $conn = new mysqli("localhost", "root", "", "hostex");

     // Check connection
     if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
     }

         // Generate a random user ID
    $user_id = uniqid();

     // Insert details into the table(database)
     $sql = "INSERT INTO account_list (user_id, username, phone, email, password) VALUES ('$user_id', '$username', '$phone', '$email', '$password')";
 
     if ($conn->query($sql) === TRUE) {
         echo "New student added successfully";

         // Redirect to login.html
        header("Location: ../user_details.php?user_id=$user_id");
        exit();
     } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
     }

     // Close the database connection
     $conn->close();
     }   
   else {
        // Display validation errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>

