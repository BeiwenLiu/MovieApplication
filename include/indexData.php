<?php


function verifyCustomer($username1, $password1) {
    require('db.php');
	$conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $result = $conn->query("SELECT username FROM CUSTOMER WHERE password = '$password1' AND username = '$username1';");
    return $result->num_rows;
    $result->close();
    $conn->close();
}

function verifyManager($username1, $password1) {
    require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $result = $conn->query("SELECT username FROM MANAGER WHERE password = '$password1' AND username = '$username1';");
    return $result->num_rows;
    $result->close();
    $conn->close();
}

?>