<?php

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

            // Save to file if it exists
            if(file_exists(__DIR__ . "/hnd2023.txt")) {
                
                $filePath = __DIR__ . "/hnd2023.txt";

                $data = "<tr> <td>$name</td> <td>$email</td> <td>$zipCode</td> <td>$country</td> </tr>\n";

                file_put_contents($filePath, $data, FILE_APPEND);
                
                echo "Data saved successfully";
            }else {
                echo "Data not saved successfully";
            }
        }


    }

}