<?php
    require_once('connect.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM students WHERE id = $id";
    }

    if ($conn->query($sql)) {
        header("location: profile.php?delete=$id");
    } else {
        header("location: profile.php?error=true");
    }
