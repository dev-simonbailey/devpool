<?php

error_reporting(E_ALL);

require_once(__DIR__ . "/../classes/Connector.php");

$db = new DevPool();

if (!$db) {

    echo $db->lastErrorMsg();
}

$query1 = "SELECT talent_id FROM mylists WHERE list_id = 1";

$result1 = $db->query($query1);

$rowCount = 0;

$resultsArray = [];

while ($row1 = $result1->fetchArray(SQLITE3_ASSOC)) {

    $query2 = "SELECT first_name, last_name, id FROM user_users WHERE id = " . $row1['talent_id'];

    $result2 = $db->query($query2);

    while ($row2 = $result2->fetchArray(SQLITE3_ASSOC)) {

        $resultsArray[$rowCount]['list_talent'] = $row2['first_name'] . " " . $row2['last_name'];
        $resultsArray[$rowCount]['id'] = $row2['id'];
        $rowCount++;
    }
}

if (empty($resultsArray)) {
    header("Content-Type: application/json");
    http_response_code(400);
    $errorArray = ['Error' => 'No Records Found'];
    echo json_encode($errorArray);
}
http_response_code(200);
header("Content-Type: application/json");
echo json_encode($resultsArray);

$db->close();
