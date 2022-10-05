<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_03</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1>Tutorial_03</h1>
        <?php
            $today = date("Y-m-d");
            echo "<h3>Today is $today</h3>";
            if (isset($_GET["bday"])) {
                $today = $_GET["bday"];
            }
        ?>
        <form action="calculateAge.php" method="POST">
            <label>
                Enter your birthday:
                <input type="date" name="bday" value="<?= $today ?>" />
            </label>

            <p><input type="submit" class="btn" value="Calculate" name="submit"></p>

        </form>
        <?php
            if (isset($_GET['error'])) {
                echo "<span class='danger'>You are not born!</span>";
            }
            if (isset($_GET['age'])) {
                $age = $_GET['age'];
                echo "<span class='output'> Your age is $age Years Old</span>";
            }
            if (isset($_GET['day'])) {
                $day = $_GET['day'];
                echo "<span class='output'> Your age is $day Days</span>";
            }
        ?>
    </div>
</body>

</html>