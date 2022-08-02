<?php

error_reporting(E_ALL);

require_once(__DIR__."/../classes/Connector.php");

$db = new DevPool();

if(!$db) {

    echo $db->lastErrorMsg();

}

$query1= "SELECT distinct(tech_name), id FROM general_tech ORDER BY tech_name ASC";

$result1 = $db->query( $query1 );

$rowCount = 0;

$resultsArray = [];

while( $row1 = $result1->fetchArray( SQLITE3_ASSOC ) ) {


    $resultsArray[$rowCount]['tech_name'] = $row1['tech_name'];
    $resultsArray[$rowCount]['id'] = $row1['id'];

    $rowCount++;

}

if(empty($resultsArray)){
    header("Content-Type: application/json");
    http_response_code(400);
    $errorArray = ['Error'=>'No Records Found'];
    echo json_encode($errorArray);
}
http_response_code(200);
header("Content-Type: application/json");
echo json_encode($resultsArray);

$db->close();