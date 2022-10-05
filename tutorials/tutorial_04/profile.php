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
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <div class="container">
    <h1>Welcome to HOME Page</h1>
    <a href="logout.php" class="profile-btn">Logout</a>
  </div>
</body>

</html>