<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_01</title>
    <style>
        table {
            border-collapse: collapse;
            border: 2px solid black;
        }
        .box {
            width: 70px;
            height: 70px;
        }

        .black {
            background-color: #000;
        }

        .white {
            background-color: #fff;
        }
    </style>
</head>

<body>
    <table>
        <?php

        for ($i = 0; $i < 8; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 8; $j++) {
                if($i%2 == 0 ){
                    if ($j % 2 == 0) {
                        echo "<td class='white box'></td>";
                    } else {
                        echo "<td class='black box'></td>";
                    }
                }else{
                    if ($j % 2 == 0) {
                        echo "<td class='black box'></td>";
                    } else {
                        echo "<td class='white box'></td>";
                    }
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>