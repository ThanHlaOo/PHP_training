<?php
    require_once('connect.php');
    if (isset($_POST['submit'])) {
        $empty = false;
        function validateInput($input)
        {
            global $conn;
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            $input = strip_tags($input);
            $input = mysqli_real_escape_string($conn, $input);
            return $input;
        }

        if (empty(validateInput($_POST['id']))) {
            $empty = true;
        } else {
            $id = $_POST['id'];
        }
        if (empty(validateInput($_POST['firstname']))) {
            $empty = true;
        } else {
            $fname = $_POST['firstname'];
        }
        if (empty(validateInput($_POST['lastname']))) {
            $empty = true;
        } else {
            $lname = $_POST['lastname'];
        }
        if (empty(validateInput($_POST['age']))) {
            $empty = true;
        } else {
            $age = $_POST['age'];
        }
        if (empty(validateInput($_POST['email']))) {
            $empty = true;
        } else {
            $email = $_POST['email'];
        }
        if (empty(validateInput($_POST['phone']))) {
            $empty = true;
        } else {
            $phone = $_POST['phone'];
        }
        if (empty(validateInput($_POST['address']))) {
            $empty = true;
        } else {
            $address = $_POST['address'];
        }



        if (!$empty) {
            if(!preg_match("/^[0-9]+$/", $age)){
                header("location: edit.php?ageError=true");
                exit();
            }
            $sql = "UPDATE students SET firstname='$fname' , lastname='$lname', email='$email', age='$age', phone='$phone',address='$address'
            WHERE id = $id";

            if ($conn->query($sql)) {
                //echo "success";
                header("location: profile.php?update=true");
            } else {
                //echo "error";
                header("location: edit.php?error=true");
            }
            $conn->close();
        } else {
            //echo "empty";
            header("location: edit.php?empty=true&id=$id");
        }
    }
