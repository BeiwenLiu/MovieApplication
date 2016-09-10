<?php

require('include/db.php');

function select() {
    require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $result1 = $conn->query("SELECT	Title AS reviewTitle, rating, comment FROM REVIEW, MOVIE WHERE REVIEW.title = MOVIE.title");

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