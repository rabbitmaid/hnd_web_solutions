<?php

require_once __DIR__ . "/db_connect.php";

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = $_POST['email'];
    $name = $_POST['name'];
    $zipCode = $_POST['zipCode'];
    $country = $_POST['country'];


    // Simple input validation
    if(empty($email) || empty($name) || empty($zipCode) || empty($country)) {
        echo "All data must be entered before submission";
    }
    else {

        // Check for valid email

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "The email address is not valid";
        }else {

            // Create table

            $sql = "CREATE TABLE IF NOT EXISTS SWE(
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                country VARCHAR(50) NOT NULL,
                zip_code VARCHAR(50) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );";

            $result = mysqli_query($connection, $sql);

            if(!$result) {
                die("Table not created successfully! " . mysqli_error($connection));
            }

            // Save records

            $sql = "INSERT INTO SWE(name, email, country, zip_code)
                VALUES('$name', '$email', '$country', '$zipCode')";

            
            $result = mysqli_query($connection, $sql);

            if(!$result) {
                die("Record not created successfully! " . mysqli_error($connection));
            }
            else {
                echo "Record created successfully";
            }

        }


    }

}