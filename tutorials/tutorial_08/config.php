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
        mysqli_select_db($conn, 'my_db');
        $table_sql = "CREATE TABLE IF NOT EXISTS students
            (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(50) NOT NULL,
            lastname VARCHAR(50) NOT NULL,
            email VARCHAR(50),
            age INT(10),
            phone VARCHAR(50),
<<<<<<< HEAD
            address Text
            );";
        $user_sql = "CREATE TABLE IF NOT EXISTS users
            (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(50) NOT NULL,
            password VARCHAR(50) NOT NULL
            );";
         $otlink_sql = 'CREATE TABLE IF NOT EXISTS otplinks
         (
             id int NOT NULL AUTO_INCREMENT,
             PRIMARY KEY(id),
             email VARCHAR(50),
             otcode VARCHAR(50),
             expired VARCHAR(32)       
         );';
        if ($conn->query($table_sql)  && $conn->query($user_sql) && $conn->query($otlink_sql)) {
=======
            address TEXT
            )";
            mysqli_select_db($conn, 'my_db');
        if ($conn->query($table_sql) === true) {
>>>>>>> f35a5d6c15bbbb7aba6bf7936b10bc359780eb92
        echo "Table created successfully. <a href='index.php'>HOME PAGE</a>";
        } else {
        echo "Error creating table: " . $conn->error;
        }  
        //Insert Admin 
        $add_admin = "INSERT INTO users(email, password) VALUES ('thanhlaoo1999@gmail.com', MD5('admin321'));";
        if($conn->query($add_admin)){
            echo "<br>Inserted Admin";
        }else {
            echo "Error Inserting ". $conn->error;
        }
    }else {
        echo "Error creating database: " . $conn->error;
    }

    $conn->close();
