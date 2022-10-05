<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_04</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container">
    <h1>Tutorial_04</h1>
    <h2>LOGIN</h2>
    <form action="login.php" method="POST">
      <div class="input-group">
        <label for="name">Email : </label>
        <input type="email" name="email" id="email" required />
      </div>
      <div class="input-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
      </div>
      <button type="submit" class="btn">Login</button>
    </form>
    <?php
        if (isset($_GET['incorrect'])) {
            echo "<span class='alert'>Incorrect Email or Password!</span>";
        }
        if (isset($_GET['error'])) {
            echo "<span class='alert'>Access Denied!</span>";
        }
    ?>
  </div>
</body>

</html>