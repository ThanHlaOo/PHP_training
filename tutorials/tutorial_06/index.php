<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_06</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container">
    <h1>Tutorial 06</h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
      <label for="photo">Choose Image</label><input type="file" name="photo" id="photo" accept="image/png, image/jpeg, image/jpg, image/gif" required>
      <br><br>
      <label for="path">Choose Directory</label><input type="text" name="path" id="path" required>
      <input type="submit" name="submit" value="Upload">
    </form>
  </div>
  <?php

    if (isset($_POST['submit'])) {
        $path = $_POST['path'];
        $file_name = $_FILES['photo']['name'];
        $file_type = $_FILES['photo']['type'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_error = $_FILES['photo']['error'];
        $file_size = $_FILES["photo"]["size"];
        if (!empty($path)) {
            $dir = "../tutorial_06/$path/";
            if ($file_error) {
                if ($file_error == 1) {
                echo "<div class='alert'>Uploaded File exceeds the Upload_max_file size!</div>";
                } else {
                echo "<div class='alert'>File Error!</div>";
                }
                exit();
            } elseif (
                $file_type === 'image/jpeg'
                || $file_type === "image/png"
                || $file_type == 'image/jpg'
                || $file_type === 'image/gif'
            ) {
                echo "<div class=output>";
                echo "<span>Upload: </span> " . $file_name . "<br><br>";
                echo "<span>Type: </span>" . $file_type . "<br><br>";
                echo "<span>Size: </span>" . ($file_size / 1024) . " Kb<br><br>";
                echo "<span>Path: </span>" . getcwd() . "\\" . $path . "<br><br>";
                echo "</div>";
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }
                if (file_exists($dir . $file_name)) {
                    echo "<div class='alert'>$file_name is already existed!</div>";
                } else {
                    move_uploaded_file($file_tmp, $dir . $file_name);
                    echo "<div class='success'>Uploaded Successfully!</div>";
                }
            } else {
                echo "<div class='alert'>Invalid File!</div>";
            }
            } else {
                echo "<div class='alert'>Please Choose Directory</div>";
            }
    }
  ?>
</body>

</html>