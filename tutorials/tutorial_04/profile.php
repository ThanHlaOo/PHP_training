<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: index.php?error=true");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        .btn {
            padding: 10px 15px;
            border: 1px solid #000;
            text-decoration: none;
            color: #000;
        }

        .btn:hover {
            background-color: #000;
            color: #fff;
        }
    </style>
</head>

<body>

    <h1>Welcome to HOME Page</h1>
    <a href="logout.php" class="btn">Logout</a>
</body>

</html>