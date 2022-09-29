<?php
if (isset($_POST['submit'])) {
    $birthday = $_POST['bday'];
    $today = time();
    $bday = strtotime($_POST['bday']);
    if ($today >= $bday) {
        $day_age = ($today - $bday) / (60 * 60 * 24);
        $age = round($day_age / 365);
        if (floor($day_age / 365)) {
            header("location: index.php?age=$age&bday=$birthday");
        } else {
            $day_age = round($day_age);
            header("location: index.php?day=$day_age&bday=$birthday");
        }
    } else {
        header("location: index.php?error=true&bday=$birthday");
    }
}
