<?php

$conn = new mysqli("localhost", "root", "", "hostex");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
date_default_timezone_set("Asia/Calcutta");

$payment_id = $_POST['payment_id'];
$hostel_id = $_POST['hostel_id'];
$dt = date('Y-m-d h:i:s');

$sql = "insert into orders (hostel_id,payment_id,added_date) values ('" . $hostel_id . "','" . $payment_id . "','" . $dt . "')";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo 'done';
    $_SESSION['payment_id'] = $payment_id;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>