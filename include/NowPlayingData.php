<?php

function select() {
    require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $result1 = $conn->query("SELECT DISTINCT title FROM PLAYSAT WHERE playing=1;");

    while ($row = mysqli_fetch_array($result1, MYSQLI_NUM)) {
        $rows[] = $row[0];
    }

    return $rows;
    $result1->close();
    $conn->close();
}   
?>