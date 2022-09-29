<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_04</title>
    <style>
        .alert {
            color: red;
        }
    </style>
</head>

<body>
    <form action="login.php" method="POST">
        <label for="name">Email : <input type="email" name="email" id="email" /></label>
        <label for="password">Password: <input type="password" name="password" id="password"></label>
        <button type="submit">Login</button>
    </form>
    <?php
    if (isset($_GET['incorrect'])) {
        echo "<span class='alert'>Incorrect Email or Password</span>";
    }
    if (isset($_GET['error'])) {
        echo "<span class='alert'>Access Denied!</span>";
    }
    ?>
</body>

</html>