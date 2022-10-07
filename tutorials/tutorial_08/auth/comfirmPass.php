<?php
require_once('../connect.php');
$email = $_GET['email'];
$token = $_GET['token'];
$sql = "SELECT * FROM otplinks WHERE email_address = '{$email}' AND otcode = '{$token}' AND expired = 'NO'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $pass = true;
} else {
    $pass = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comfirm Password</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <?php if ($pass) : ?>
            <h1>Reset Your Password</h1>
            <form action="changePassword.php" method="post">
                <label for="">New Password</label>
                <input type="hidden" name="token" value="<?= $token ?>">
                <input type="hidden" name="email" value="<?= $email ?>">
                <input type="password" class="form-control" name='new_pass'>
                <label for="">Comfirm Password</label>
                <input type="password" class="form-control" name='com_pass'>
                <button type="submit" name="submit" class="btn btn-primary mt-3">Save</button>

            </form>
        <?php else : ?>
            <h2> Invalid Link</h2>
        <?php endif ?>
        <?php
            if (isset($_GET['empty'])) {
                echo "<p class='alert alert-warning'>Fill all input data!</p>";
            }
            if (isset($_GET['same'])) {
                echo "<p class='alert alert-warning'>doesn't match passwords!</p>";
            }
        ?>
    </div>
</body>

</html>