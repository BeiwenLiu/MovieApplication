<?php

require('include/db.php');

function select($username1) {
    require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $result1 = $conn->query("SELECT	cardNo, nameOnCard, expirationDate FROM PAYMENTINFORMATION WHERE username = '$username1' AND saved = 1");
    while ($row = mysqli_fetch_array($result1, MYSQLI_NUM)) {
       $rows[] = $row[0];
       $rows[] = $row[1];
       $rows[] = $row[2];
    }
    return $rows;
    $result1->close();
    $conn->close();
} 

function delete($cardNo) {
	require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $conn->query("UPDATE PAYMENTINFORMATION SET saved = 0 WHERE cardNo = '$cardNo'");
    $conn->close();
}

?>


