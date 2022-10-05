<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";

    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $create_db = "CREATE DATABASE IF NOT EXISTS my_db";
    //Create database
    if($conn->query($create_db)){
        echo "Database Created successfully.";
        // Create table
        $table_sql = "CREATE TABLE IF NOT EXISTS students
            (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(50) NOT NULL,
            lastname VARCHAR(50) NOT NULL,
            email VARCHAR(50),
            phone VARCHAR(50),
            address VARCHAR(50)
            )";
            mysqli_select_db($conn, 'my_db');
        if ($conn->query($table_sql) === true) {
        echo "Table created successfully. <a href='index.php'>HOME PAGE</a>";
        } else {
        echo "Error creating table: " . $conn->error;
        }

    }else {
        echo "Error creating database: " . $conn->error;
    }

    $conn->close();
