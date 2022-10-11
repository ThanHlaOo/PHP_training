<?php
    include('library/phpqrcode/phpqrcode.php');
    $path = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Image' . DIRECTORY_SEPARATOR;

    $empty = false;
    //check dir exist or not
    if (!is_dir($path)) {
        mkdir($path, 0777);
    }
    $imgDir = 'Image/';
    $errorCorrectionLevel = 'H';
    $filename = $path . "default_" . uniqid() . ".png";
    $matrixPointSize = 5;
    if (isset($_GET['data'])) {

        $data = $_GET['data'];
        if (trim($data) == '') {
            $empty = true;
        }
        // user data create QR
        else {
            $filename = $path . uniqid() . md5($data . '|' . $errorCorrectionLevel . '|' . $matrixPointSize) . '.png';
            QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
            header('location: index.php?success=true');
            exit();
        }
    }
    // default data
    else {
        QRcode::png('Let\'s create QR code.', $filename, $errorCorrectionLevel, $matrixPointSize, 2);
        // echo "this is no data";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 07</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-4 mb-5">Tutorial_07</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
            <div class="input-group input-group-sm mb-3">
                <label for="data">Enter Data to QR:</label>
                <input type="text" name="data" class="form-control mb-3 ml-3" value="<?= isset($_GET['success']) ? '' : htmlspecialchars($_GET['data']) ?>" placeholder="Please Type Something!">
            </div>
            <input type="submit" value="SAVE" name="submit" class="btn btn-primary mb-4">
        </form>
        <?php
        if ($empty) {
            echo '<div class="alert alert-danger"> Empty Data! </p>';
        } else {
            echo '<img src="' . $imgDir . basename($filename) . '" width="300" height="300"/>';
        }
        if (isset($_GET['success'])) {
            echo '<div class="alert alert-success">Successfully Exported</div>';
        }
        ?>
    </div>
</body>

</html>