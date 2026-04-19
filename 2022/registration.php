<?php

// Connect to Database
$connection = mysqli_connect("localhost", "root", "", "application");

if (!$connection) {
    die("Connection error: " . mysqli_connect_error());
}


// Create Table

$sql = "CREATE TABLE IF NOT EXISTS users(
                id INT AUTO_INCREMENT PRIMARY KEY,
                first_name VARCHAR(255) NOT NULL,
                last_name VARCHAR(255) NOT NULL,
                course VARCHAR(50) NOT NULL,
                gender VARCHAR(50) NOT NULL,
                phone VARCHAR(50) NOT NULL,
                address TEXT,
                email VARCHAR(255),
                password TEXT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        );
    ";

$result = mysqli_query($connection, $sql);

if (!$result) {
    die("Table not created successfully: " . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $course = $_POST['course'];
    $gender = $_POST['gender'];
    $countryCode = $_POST['countryCode'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retypePassword = $_POST['retypePassword'];


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(first_name, last_name, course, gender, phone, address, email, password) 
                VALUES('$firstName', '$lastName', '$course', '$gender', '$countryCode $phoneNumber', '$address', '$email', '$hashedPassword')";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <style>
        form {
            border: 1px solid black;
            width: 400px;
            padding: 8px;
        }

        textarea {
            width: 100%;
            height: 100px;
        }
    </style>
</head>

<body>

    <header>
        <div class="left">
            <a href="" class="logo">delidded</a>

            <nav>
                <a href="#">HTML</a>
                <a href="#">CSS</a>
                <a href="#">JavaScript</a>
                <a href="registration.html">Registration</a>
            </nav>

        </div>
        <div class="right">
            <a href="#">Login</a>
        </div>
    </header>

    <main>

        <h1>Register</h1>


        <form action="" method="POST" id="registrationForm">

            <label for="firstName">First Name: </label>
            <input type="text" name="firstName" id="firstName" />

            <br /> <br />

            <label for="lastName">Last Name: </label>
            <input type="text" name="lastName" id="lastName" />

            <br /> <br />

            <label for="course">Course</label>
            <select name="course" id="course">
                <option disabled selected>Course</option>
                <option value="web_programming">Web Programming I</option>
                <option value="analysis_1">Analysis I</option>
            </select>

            <br /> <br />

            <label for="gender">Gender</label> <br />

            <input type="radio" name="gender" value="male" id="male">
            <label for="male">Male</label><br />

            <input type="radio" name="gender" value="female" id="female">
            <label for="female">Female</label> <br />

            <input type="radio" name="gender" value="other" id="other">
            <label for="other">Other</label> <br />

            <br />

            <label for="phone">Phone: </label>
            <span>
                <input type="text" name="countryCode" id="countryCode" placeholder="+91" style="width: 40px;">
                <input type="text" name="phoneNumber" id="phone">
            </span>

            <br /> <br />

            <label for="address">Address</label> <br />
            <textarea name="address" id="address"></textarea>

            <br /> <br />

            <label for="email">Email</label>
            <input type="email" name="email" id="email" />
            <br /> <br />

            <label for="password">Password</label>
            <input type="password" name="password" id="password" />
            <br /> <br />

            <label for="retypePassword">Retype Password</label>
            <input type="password" name="retypePassword" id="retypePassword" />
            <br /> <br />

            <button type="submit">Submit</button>

        </form>


    </main>


    <script>
        const registrationForm = document.getElementById('registrationForm');

        registrationForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const password = document.getElementById('password');
            const retypePassword = document.getElementById('retypePassword');

            if (password.value !== "" && retypePassword !== "") {

                if (password.value === retypePassword.value) {
                    registrationForm.submit();
                } else {
                    alert("The password must match the retype password");
                }
            } else {
                alert("The password fields cannot be empty");
            }

        });
    </script>

</body>

</html>