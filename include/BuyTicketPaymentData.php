<?php

require('include/db.php');

function select($username1) {
    require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $result1 = $conn->query("SELECT	cardNo FROM PAYMENTINFORMATION WHERE username = '$username1' AND saved = 1");
    while ($row = mysqli_fetch_array($result1, MYSQLI_NUM)) {
       $rows[] = $row[0];
    }

    return $rows;
    $result1->close();
    $conn->close();
}   

function insert($cardNo, $CVV, $nameOnCard, $expirationDate, $saved, $username1) {
	require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $result = $conn->query("INSERT INTO	PAYMENTINFORMATION(cardNo, cvv, nameOnCard, expirationDate, saved, username) VALUES ('$cardNo', '$CVV', '$nameOnCard', '$expirationDate', '$saved', '$username1')");
    $conn->close();
}

function getLastOrder() {
	require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $result1 = $conn->query("SELECT	MAX(orderID) FROM ORDER");
    while ($row = mysqli_fetch_array($result1, MYSQLI_NUM)) {
       $rows[] = $row[0];
    }
    return $rows;
    $result1->close();
    $conn->close();
}

function insertOrder($OrderID, $date, $seniorTickets, $childTickets, $adultTickets, $totalTickets, $time, $status, $username1, $CardNo, $title, $theaterID) {
	require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $conn->query("INSERT INTO ORDER(OrderID, date, seniorTickets, childTickets, adultTickets, totalTickets, time, status, username, CardNo, title, theaterID) 
    	VALUES ('$OrderID', '$date', '$seniorTickets', '$childTickets', '$adultTickets', '$totalTickets', '$time', '$status', '$username1', '$CardNo', '$title', '$theaterID')");
    $conn->close();
}
?>


