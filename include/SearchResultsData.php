<?php

require('include/db.php');

function select($input, $movie) {
    require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $result1 = $conn->query("SELECT DISTINCT THEATER.theaterID, THEATER.name, THEATER.city, THEATER.state, THEATER.street, THEATER.zip FROM 
    	THEATER, PLAYSAT, MOVIE WHERE (THEATER.name = '$input' OR THEATER.city = '$input' OR THEATER.state = '$input') AND 
    	PLAYSAT.theaterID = THEATER.theaterID AND PLAYSAT.title = '$movie' AND PLAYSAT.playing = 1");

 
    while ($row = mysqli_fetch_array($result1, MYSQLI_NUM)) {
    	$temp = "";
    	$theaterID = $row[0];
        for ($i = 1; $i < sizeof($row); $i++) {
        	$temp = $temp . $row[$i] . " ";
            
        }
        $rows[] = $temp;
        $rows[] = $theaterID;
    }

    return $rows;
    $result1->close();
    $conn->close();
}   


function insert($theaterID, $username1) {
    require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $conn->query("INSERT INTO PREFERS(theaterID,username) VALUES('$theaterID','$username1')");
    $conn->close();
} 



function getName($input) {
    require('db.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $result1 = $conn->query("SELECT	name FROM THEATER WHERE	name = '$input' OR city = '$input' OR state = '$input'");

    $temp = "";
    while ($row = mysqli_fetch_array($result1, MYSQLI_NUM)) {
        for ($i = 0; $i < sizeof($row); $i++) {
        	$temp = $temp . $row[$i] . " ";
            
        }
        $rows[] = $temp;
    }

    return $rows;
    $result1->close();
    $conn->close();
}   


?>
