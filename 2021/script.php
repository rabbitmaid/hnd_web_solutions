<?php

    // Connect to database
    $connection = mysqli_connect("localhost", "root", "", "application");

    if(!$connection) {
        die("Database connection error" . mysqli_connect_error());
    }

    // Create table
    $sql = "
        CREATE TABLE IF NOT EXISTS teachers(
            id INT AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            subject VARCHAR(50) NOT NULL,
            country VARCHAR(20) NOT NULL,
            comment TEXT NOT NULL,
            gender VARCHAR(10) NOT NULL,
            degree_level VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ";

    $result = mysqli_query($connection, $sql);

    if(!$result) {
        die("Table not created: " . mysqli_connect_error());
    }

    
    // Saving data inside the table
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $firstName = $_POST["firstName"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $country = $_POST["country"];
        $comment = $_POST["comment"];
        $gender = $_POST["gender"];
        $degreeLevel = $_POST["degreeLevel"];


        $sql = "
            INSERT INTO teachers(first_name, email, subject, country, comment, gender, degree_level) VALUES('$firstName', '$email', '$subject', '$country', '$comment', '$gender', '$degreeLevel');
        ";

        $result = mysqli_query($connection, $sql);

        if($result) {
            echo "Record inserted successfully";
        }else {
            echo "Something bad happended";
        }

    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="" method="POST">

        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName" placeholder="TUBUO" required />
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="ministry@gmail.com" required />
        </div>

        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" placeholder="programming" required />
        </div>


        <div class="form-group">
            <label for="country">Country</label>
            <select id="country" name="country" required>
                <option disabled selected>none</option>
                <option value="cameroon">Cameroon</option>
                <option value="nigeria">Nigeria</option>
                <option value="togo">Togo</option>
                <option value="gabon">Gabon</option>
            </select>
        </div>

        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea id="comment" name="comment" required></textarea>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>

            <div>
                <label for="M">M</label>
                <input type="radio" name="gender" id="M" value="male" />

                <label for="F">F</label>
                <input type="radio" name="gender" id="F" value="female">
            </div>

        </div>


        <div class="form-group">

            <label for="level">Highest degree level</label>

            <div class="levels">

                <div>
                    <input type="checkbox"  name="degreeLevel" id="post-doc" value="post-doc">
                    <label for="post-doc">Post-Doc</label>
                </div>

                <div>
                    <input type="checkbox"  name="degreeLevel" id="phd" value="phd">
                    <label for="phd">PhD</label>
                </div>

                <div>
                    <input type="checkbox"  name="degreeLevel" id="msc" value="msc">
                    <label for="msc">Master/Msc</label>
                </div>

                <div>
                    <input type="checkbox"  name="degreeLevel" id="bsc" value="bsc">
                    <label for="bsc">Licence/Bsc</label>
                </div>

                <div>
                    <input type="checkbox"  name="degreeLevel" id="bacc" value="bacc">
                    <label for="bacc">BACC/AL-GCE</label>
                </div>

            </div>

        </div>


        <button type="reset">Reset</button>
        <button type="submit">Submit</button>

    </form>





</body>

</html>