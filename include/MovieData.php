<?php

function select($title1) {
    require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $result1 = $conn->query("SELECT title, releaseDate, rating, length, genre FROM MOVIE WHERE title = '$title1';");

    while ($row = mysqli_fetch_array($result1, MYSQLI_NUM)) {
        for ($i = 0; $i < sizeof($row); $i++) {
            $rows[] = $row[$i];
        }
    }

    return $rows;
    $result1->close();
    $conn->close();
}   


?>