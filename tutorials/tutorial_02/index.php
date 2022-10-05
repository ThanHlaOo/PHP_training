<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_02</title>
</head>

<body>
    <?php
        $row = 6;
        for ($outer = 1; $outer <= $row; $outer++) {
            for ($space = 1; $space <= $row - $outer; $space++) {
                echo "&nbsp;&nbsp;";
            }
            for ($star = 1; $star <= $outer * 2 - 1; $star++) {
                echo "*";
            }
            echo "<br>";
        }
        for ($outer = 1; $outer <= $row - 1; $outer++) {
            for ($space = 1; $space <= $outer; $space++) {
                echo "&nbsp;&nbsp;";
            }
            for ($star = 1; $star <= ($row - $outer) * 2 - 1; $star++) {
                echo "*";
            }
            echo "<br>";
        }
    ?>
</body>

</html>