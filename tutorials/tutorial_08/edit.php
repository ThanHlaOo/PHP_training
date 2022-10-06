<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_08 | Edit</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php
        require_once('connect.php');
        if (isset($_GET['id']) || isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM students WHERE id = $id";
            $record = $conn->query($sql)->fetch_assoc();
        }

    ?>
    <div class="container">
        <form action="update.php" method="POST" class="mt-5">
            <input type="text" name="id" hidden value="<?= isset($record['id']) ? $record['id'] : 0 ?>">
            <div class="d-flex justify-content-between mb-4">
                <h3 class="m-0">Update</h3>
                <a href="index.php" class="btn btn-outline-secondary btn-sm">HOME</a>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">First Name</span>
                </div>
                <input type="text" class="form-control" name="firstname" value="<?= isset($record['firstname']) ? $record['firstname'] : '' ?>" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Last Name</span>
                </div>
                <input type="text" class="form-control" name="lastname" value="<?= isset($record['lastname']) ? $record['lastname'] : '' ?>" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                </div>
                <input type="email" class="form-control" name="email" value="<?= isset($record['email']) ? $record['email'] : '' ?>" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Phone Number</span>
                </div>
                <input type="text" class="form-control" name="phone" value="<?= isset($record['phone']) ? $record['phone'] : '' ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Age</span>
                </div>
                <input type="text" class="form-control" name="age" value="<?= isset($record['age']) ? $record['age'] : '' ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Address</span>
                </div>
                <input type="text" class="form-control" name="address" value="<?= isset($record['address']) ? $record['address'] : '' ?>">
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Update</button>

        </form>
        <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-Danger mt-5 text-center">Updating Error!</div>
        <?php endif ?>
        <?php if (isset($_GET['empty'])) : ?>
            <div class="alert alert-danger mt-5 text-center">Input fields cannot be empty!</div>
        <?php endif ?>
        <?php if (isset($_GET['ageError'])) : ?>
            <div class="alert alert-danger mt-5 text-center">Please enter Valide Age </div>
        <?php endif ?>
    </div>
</body>

</html>