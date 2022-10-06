<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_08 | Show Students</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <a href="create.php" class="btn btn-outline-primary mt-5">Create A Student</a>
        <?php if (isset($_GET['update'])) : ?>
            <div class="alert alert-success mt-5 text-center">Updated Successfully!</div>
        <?php endif ?>
        <?php if (isset($_GET['delete'])) : ?>
            <div class="alert alert-success mt-5 text-center"><?= "Record # " . $_GET['delete'] ?> Deleted Successfully!</div>
        <?php endif ?>
        <?php
            require_once('connect.php');
            $sql = "SELECT * FROM students";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '<table class="table table-dark mt-5">';
                echo '<thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Age</th>
                                <th scope="col">Address</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead><tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['firstname'] . "</td>";
                    echo "<td>" . $row['lastname'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td class='age'>" . $row['age'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>
                                <a href=\"edit.php?id={$row['id']}\" class='btn btn-warning'>update</a> | 
                                <button class='btn btn-danger' onclick=ConfirmDelete($row[id])>delete</button>
                            </td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<div class='alert alert-warning mt-5'>There is NO Record Yet!</div>";
            }
            $conn->close();
        ?>
        <div class="chart">
            <canvas id="myChart" width="400" height="300"></canvas>
        </div>
    </div>

    <script src="node_modules/chart.js/dist/chart.js"></script>
    <script src="js/common.js"></script>
    <script type="text/javascript">
        function ConfirmDelete(id) {
            if (confirm("Delete Account?")) {
                location.href = `delete.php?id=${id}`;
            }
        }
    </script>
</body>

</html>