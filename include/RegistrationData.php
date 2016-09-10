<?php

function insertCustomer($username1, $email1, $password1) {
    require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $conn->query("INSERT INTO CUSTOMER(username, email, password) VALUES('$username1', '$email1', '$password1');");
    $conn->close();
}

function check($username1, $email1) {
    require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $result1 = $conn->query("SELECT username FROM MANAGER WHERE '$username1' = username OR '$email1' = email;");
    $result2 = $conn->query("SELECT username FROM CUSTOMER WHERE '$username1' = username OR '$email1' = email;");
    
    return $result1->num_rows + $result2->num_rows;
    $result1->close();
    $result2->close();
    $conn->close();
}

function checkManager($password1) {
    require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $result1 = $conn->query("SELECT managerPW FROM SYSTEMINFO WHERE managerPW = '$password1';");
    return $result1->num_rows;
    $result1->close();
    $conn->close();
}

function insertManager($username1, $email1, $password1) {
    require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $conn->query("INSERT INTO MANAGER(username, email, password) VALUES('$username1', '$email1', '$password1');");
    $conn->close();
}
?>