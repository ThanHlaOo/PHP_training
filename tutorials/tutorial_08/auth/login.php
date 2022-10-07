<?php
    require_once('../connect.php');
    session_start();
    $email = $_POST['email'];
    $password = MD5($_POST['password']);
    $sql = "SELECT * FROM users WHERE email='{$email}' AND password = '{$password}'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user'] = $row;
        header("location: ../profile.php");
    } else {
        header("location: index.php?incorrect=true");
    }
