<?php

error_reporting(E_ALL);

require_once(__DIR__ . "/../classes/Connector.php");

$db = new DevPool();

if (!$db) {

    echo $db->lastErrorMsg();
}

$query = 'SELECT * FROM users;';

$stmt = $db->prepare($query);

$userRet = $stmt->execute();

while ($rowUser = $userRet->fetchArray(SQLITE3_ASSOC)) {

    $firstName = htmlspecialchars($rowUser['first_name']);
    $lastName = htmlspecialchars($rowUser['last_name']);

    echo "Name: " . $firstName . " " . $lastName . "\n";

    $techQuery = 'SELECT `name`, `exp` FROM tech WHERE user_id=:userid;';

    $stmt = $db->prepare($query);

    $stmt->bindParam(':userid', htmlspecialchars($rowUser['id']));

    $techRet = $stmt->execute();

    while ($rowTech = $techRet->fetchArray(SQLITE3_ASSOC)) {

        $techName = htmlspecialchars($rowTech['name']);
        $techExp = htmlspecialchars($rowTech['exp']);

        echo "TECH => " . $techName . " -> EXP => " . $techExp . "\n";
    }

    $jobsQuery = 'SELECT `title`, `exp` FROM jobs WHERE user_id=:userid;';

    $stmt = $db->prepare($query);

    $stmt->bindParam(':userid', htmlspecialchars($rowUser['id']));

    $jobsRet = $stmt->execute();


    while ($rowJobs = $jobsRet->fetchArray(SQLITE3_ASSOC)) {

        $jobsTitle = htmlspecialchars($rowJobs['title']);
        $jobsExp = htmlspecialchars($rowJobs['exp']);
        echo "Jobs => " . $jobsTitle . " -> EXP => " . $jobsExp . "\n";
    }

    echo "\n";
}

$db->close();
