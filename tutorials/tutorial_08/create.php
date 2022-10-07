<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_08 | INSERT DATA</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form action="insert.php" method="POST" class="mt-5">
            <div class="d-flex justify-content-between mb-4">
                <h3 class="m-0">Create a Student</h3>
                <a href="profile.php" class="btn btn-outline-secondary btn-sm">HOME</a>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">First Name</span>
                </div>
                <input type="text" class="form-control" name="firstname" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Last Name</span>
                </div>
                <input type="text" class="form-control" name="lastname" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                </div>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Phone Number</span>
                </div>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Age</span>
                </div>
                <input type="number" class="form-control" name="age" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Address</span>
                </div>
                <input type="text" class="form-control" name="address">
            </div>
            <button class="btn btn-primary" type="submit" name="submit">CREATE</button>

        </form>
        <?php if (isset($_GET['success'])) : ?>
            <div class="alert alert-success mt-5 text-center">One Record has been added</div>
        <?php endif ?>
        <?php if (isset($_GET['fail'])) : ?>
            <div class="alert alert-danger mt-5">Inserting a record Fail! <?= $_GET['fail'] ?></div>
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