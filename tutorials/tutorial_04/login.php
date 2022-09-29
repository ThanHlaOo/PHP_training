<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

if ($email === 'thanhlaoo1999@gmail.com' && $password === 'admin321') {
    $_SESSION['user'] = ['name' => 'than'];
    header("location: profile.php");
} else {
    header("location: index.php?incorrect=true");
}
