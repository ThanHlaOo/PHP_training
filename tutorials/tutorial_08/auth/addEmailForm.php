<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Email</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <form action="sendMail.php" method="post">
        <h1 class="mt-3 mb-3">Add Email To send Mail</h1>
        <input type="email" class="form-control" name="email" placeholder="Reset Email">
        <input type="submit" value="Send Email" class="btn btn-primary mt-5">
    </form>
    </div>
</body>
</html>