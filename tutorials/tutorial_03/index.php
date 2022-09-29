<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_03</title>
    <style>
        .danger {
            color: red;
        }
    </style>
</head>

<body>
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

        <p><input type="submit" value="Calculate" name="submit"></p>

    </form>
    <?php
    if (isset($_GET['error'])) {
        echo "<span class='danger'>You are not born!</span>";
    }
    if (isset($_GET['age'])) {
        $age = $_GET['age'];
        echo "Your age is $age Years Old";
    }
    if (isset($_GET['day'])) {
        $day = $_GET['day'];
        echo "Your age is $day Days";
    }
    ?>
</body>

</html>