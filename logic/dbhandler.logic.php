<?php

    $DB_SERVER = "localhost";
    $DB_USER = "root";
    $DB_PASSWORD = "2000FOTNS...";
    $DB_NAME = "seminar2";

    $conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME);

    if (!$conn) die("Database connection failed: " . mysqli_connect_error());