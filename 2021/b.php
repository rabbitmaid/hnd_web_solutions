<?php

// Connect to database
$connection = mysqli_connect("localhost", "root", "", "application");

if (!$connection) {
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

if (!$result) {
    die("Table not created: " . mysqli_error($connection));
}


// Saving data inside the table

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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

    

    if ($result) {
        echo "Record inserted successfully";
    } else {
        echo "Something bad happended " . mysqli_error($connection);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web 2021 (b)</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="" method="POST">

        <table>
            <tr>
                <td>
                    <label for="firstName">First Name:</label>
                </td>
                <td>
                    <input type="text" id="firstName" placeholder="TUBUO" name="firstName" required />
                </td>
            </tr>

            <tr>
                <td>
                    <label for="email">Email:</label>
                </td>
                <td>
                    <input type="email" id="email" placeholder="ministry@gmail.com" name="email" required />
                </td>
            </tr>

            <tr>
                <td><label for="subject">Subject:</label></td>
                <td><input type="text" id="subject" placeholder="programming" name="subject" required /></td>
            </tr>

            <tr>
                <td> <label for="country">Country:</label></td>
                <td>

                    <select id="country" name="country" required>
                        <option disabled selected>none</option>
                        <option value="cameroon">Cameroon</option>
                        <option value="nigeria">Nigeria</option>
                        <option value="togo">Togo</option>
                        <option value="gabon">Gabon</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td> <label for="comment">Comment:</label></td>
                <td> <textarea id="comment" name="comment" required></textarea></td>
            </tr>

            <tr>
                <td><label for="gender">Gender:</label></td>
                <td>
                    <label for="M">M</label>
                    <input type="radio" name="gender" value="male" id="M" />

                    <label for="F">F</label>
                    <input type="radio" name="gender" value="female" id="F">
                </td>
            </tr>

            <tr>
                <td> <label for="level">Highest degree level:</label></td>
                <td>
                    <div class="levels">

                        <div>
                            <input type="checkbox" value="post-doc" id="post-doc">
                            <label for="post-doc">Post-Doc</label>
                        </div>

                        <div>
                            <input type="checkbox" value="phd" name="degreeLevel" id="phd">
                            <label for="phd">PhD</label>
                        </div>

                        <div>
                            <input type="checkbox" value="msc" name="degreeLevel" id="msc">
                            <label for="msc">Master/Msc</label>
                        </div>

                        <div>
                            <input type="checkbox" value="bsc" name="degreeLevel" id="bsc">
                            <label for="bsc">Licence/Bsc</label>
                        </div>

                        <div>
                            <input type="checkbox" value="bacc" name="degreeLevel" id="bacc">
                            <label for="bacc">BACC/AL-GCE</label>
                        </div>

                    </div>
                </td>
            </tr>

        </table>

        <button type="reset">Reset</button>
        <button type="submit">Submit</button>

    </form>





</body>

</html>