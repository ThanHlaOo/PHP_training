<?php
    require_once('connect.php');

    if (isset($_POST['submit'])) {
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $sql = "INSERT INTO students (firstname, lastname, email, phone, address) VALUES ('$fname', '$lname', '$email', '$phone', '$address');";

        if ($conn->query($sql)) {
            header("location: create.php?success=true");
        } else {
            header("location: create.php?fail=$conn->error");
        }
        $conn->close();
    }
