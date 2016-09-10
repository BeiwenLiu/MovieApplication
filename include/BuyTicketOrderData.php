<?php

require('include/db.php');

function select($data) {
    $conn = new mysqli($servername, $username, $password, $dbname);

    #$result = $conn->query("SELECT * FROM `sheet` WHERE Date='$date'");
    
    
    
    
          #  while($row = $result->fetch_assoc()) {
           #     $temp = "{$row['Zone']}" . "{$row['Time']}";
            #    $_POST[$temp] = $row['People'];

    
    
    $result->close();
    $conn->close();
    
}   

function testing() {
    $val = array("AMC", "Regals", "Carmike", "abhay");
    return $val;
}


?>