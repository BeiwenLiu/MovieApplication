<?php

require('include/db.php');

function select() {
    require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $result1 = $conn->query("SELECT childDiscount, seniorDiscount FROM SYSTEMINFO");
    while ($row = mysqli_fetch_array($result1, MYSQLI_NUM)) {
       $rows = array($row[0], $row[1]);
    }

    return $rows;
    $result1->close();
    $conn->close();
}   
?>


