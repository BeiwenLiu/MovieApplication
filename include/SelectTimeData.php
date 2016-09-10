<?php

require('include/db.php');

function select($theaterID, $title, $showDate, $showDate2, $time) {
    require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $result1 = $conn->query("SELECT	showTime FROM SHOWTIME WHERE theaterID = '$theaterID' AND title = '$title' AND showDate = '$showDate' AND (showDate > '$showDate2' OR showTime > '$time')");
    while ($row = mysqli_fetch_array($result1, MYSQLI_NUM)) {
       $rows[] = $row[0];
    }

    return $rows;
    $result1->close();
    $conn->close();
}   


?>


