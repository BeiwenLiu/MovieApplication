<?php

require('include/db.php');

function select($username1) {
    require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $result1 = $conn->query("SELECT	DISTINCT THEATER.theaterID, name, street, city, state, zip FROM THEATER, PREFERS WHERE THEATER.theaterID = PREFERS.theaterID 
    	AND PREFERS.username = '$username1'");
    while ($row = mysqli_fetch_array($result1, MYSQLI_NUM)) {
       $temp = "";
       for ($i = 1; $i < sizeof($row); $i++) {
       		$temp = $temp . $row[$i] . " ";
       }
       $rows[] = $row[0];
       $rows[] = $temp;
    }
    return $rows;
    $result1->close();
    $conn->close();
} 

function delete($theaterID, $username1) {
	require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $conn->query("DELETE FROM PREFERS WHERE	theaterID = '$theaterID' AND username = '$username1'");
    $conn->close();
}

?>


