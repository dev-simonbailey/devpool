<?php

session_start();

$_SESSION['isValid'] = false;

error_reporting(E_ALL);

require_once(__DIR__ . "/../classes/Connector.php");

$db = new DevPool();

if (!$db) {

    echo $db->lastErrorMsg();
}

htmlspecialchars($_POST['email'],  ENT_QUOTES, 'UTF-8');

$email = htmlspecialchars($_POST['email'],  ENT_QUOTES, 'UTF-8'); //$_POST['email'];

$passWord = htmlspecialchars($_POST['password'],  ENT_QUOTES, 'UTF-8'); //$_POST['password'];

$userQuery = "SELECT * FROM user_users WHERE email='" . $email . "' AND password='" . $passWord . "'";

$userRet = $db->query($userQuery);

if (!empty($userRet->fetchArray(SQLITE3_ASSOC))) {
    $_SESSION['isValid'] = true;
}

if ($_SESSION['isValid']) {
    echo "Valid User";
} else {
    echo "Invalid User";
}

$db->close();
