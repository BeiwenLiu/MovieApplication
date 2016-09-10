<?php

require('include/db.php');

function select($username1, $movie1) {
    require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $result1 = $conn->query("SELECT	DISTINCT THEATER.name, THEATER.theaterID FROM PREFERS, THEATER, PLAYSAT, MOVIE 
    	WHERE PREFERS.theaterID = PLAYSAT.theaterID AND THEATER.theaterID = PREFERS.theaterID AND '$username1' = 
    	PREFERS.username AND PLAYSAT.title = '$movie1'");

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