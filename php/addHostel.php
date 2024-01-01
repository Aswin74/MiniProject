<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Retrieve Hostel data from Modal
    $hname = $_POST['hname'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $hphone = $_POST['hphone'];
    $haddress = $_POST['haddress'];
    $description = $_POST['description'];

    //For accepting image format. 

    $hostel_image1 = $_FILES['hostel_image1']['name'];
    $hostel_image2 = $_FILES['hostel_image2']['name'];

    //accessing temporary name for images

    $temp_image1 = $_FILES['hostel_image1']['tmp_name'];
    $temp_image2 = $_FILES['hostel_image2']['tmp_name'];

    $errors = array();

    //Text field validation
    if(empty($hname) || empty($location)){
        $errors[] = "Required Field";
    } elseif(!preg_match("/^[a-zA-Z0-9  -]+$/", $hname) || !preg_match("/^[a-zA-Z0-9 ]+$/", $location)){
        $errors[] = 'name / location Should only contain letters and numbers';
    }

    if(empty($haddress) || empty($description)){
        $errors[] = "address / description Required Field";
    }
    
    // Validate phone number
    if (empty($hphone)) {
        $errors[] = "Phone number is required";
    } elseif (!preg_match("/^[0-9]{10}$/", $hphone)) {
        $errors[] = "Invalid phone number format";
    }

    //price validation
    if(empty($price))
        $errors[] = "Price Cannot be null";
    elseif(!is_numeric($price))
        $errors[] = 'Price should only contain numbers';

    // Image validation

    if(empty($hostel_image1) || empty($hostel_image2)){
        $errors[] = "Upload 2 Images";
    }
    else{

    //moving uploaded files into folder

        move_uploaded_file($temp_image1,"../img/hostel_images/$hostel_image1");
        move_uploaded_file($temp_image2,"../img/hostel_images/$hostel_image2");
    }

    //errors array empty then add hostel
    if(empty($errors)){

       // Create a connection to the database
        $conn = new mysqli("localhost", "root", "", "hostex");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //adding values to the dB by binding to prevent SQL inection
        $add_sql = "INSERT INTO hostel_list (hname, location, price, hphone, haddress,
        description, hostel_image1, hostel_image2) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($add_sql);
        $stmt->bind_param("ssdsssss",$hname,$location,$price,$hphone,$haddress,$description,
                $hostel_image1, $hostel_image2);
        $stmt->execute();

        // Check if the execution was successful
        if($stmt->affected_rows > 0){
            header("Location: ../home.php");
            $conn->close();
            exit();
        }else {
            echo "Error: " . $add_sql . "<br>" . $conn->error;
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