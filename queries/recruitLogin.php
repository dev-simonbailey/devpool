<?php

session_start();

$_SESSION['isValid'] = false;

error_reporting(E_ALL);

require_once(__DIR__ . "/../classes/Connector.php");

$db = new DevPool();

if (!$db) {

    echo $db->lastErrorMsg();
}

$query = 'SELECT * FROM recruiters WHERE email=:email AND password=:password;';

$stmt = $db->prepare($query);

$stmt->bindParam(':email', $_POST['email']);

$stmt->bindParam(':password', $_POST['password']);

$userRet = $stmt->execute();

if (!empty($userRet->fetchArray(SQLITE3_ASSOC))) {
    $_SESSION['recruiter_isValid'] = true;
}

if ($_SESSION['recruiter_isValid']) {
    //echo "Valid User";
    header("Location: http://localhost:8888/github/devpool/app/recruiter/index.php");
} else {
    header("Location: http://localhost:8888/github/devpool/index.php?nor=true");
}

$db->close();
