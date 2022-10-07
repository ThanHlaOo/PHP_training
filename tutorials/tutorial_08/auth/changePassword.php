<?php 
    require_once("../connect.php");
    $empty= false;
    if(isset($_POST['token'])) {
        $token = $_POST['token'];
    }
    if(isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    //print_r($_POST);
    //exit();
    function inputValidate($data) {
        global $conn;
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = strip_tags($data);
        $data = mysqli_real_escape_string($conn, $data);
        return $data;
    }
    if (isset($_POST['submit'])) {
        echo $_POST['new_pass'];
        if (!empty(inputValidate($_POST['new_pass']))) {
            $pass = $_POST['new_pass'];
        } else {
            $isEmpty = true;
        }
        if (!empty(inputValidate($_POST['com_pass']))) {
            $cpass = $_POST['com_pass'];
        } else {
            $isEmpty = true;
        }
        if ($empty) {
            header("location: comfirmPass.php?empty=true&token=$token&email=$email");
        }
        if ($pass == $cpass) {
        
            try{
                $expired = "UPDATE otplinks SET expired='YES' WHERE otcode='$token'";
                $execute_expired = $conn->query($expired);
                $query = "UPDATE users SET password = MD5('$pass') WHERE email='$email';";
                $execute = $conn->query($query);
                if ($execute) {
                    header("location: index.php?reset=success");
                }
            }catch(Exception $e){
                echo "Error".$e;
            }
        } else {
            header("location: comfirmPass.php?same=false&token=$token&email=$email");
        }
    }
