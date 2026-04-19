<?php

// Connect to database
$connection = mysqli_connect("localhost", "root", "", "school");

if (!$connection) {
    die("Database connection error: " . mysqli_connect_error());
}
