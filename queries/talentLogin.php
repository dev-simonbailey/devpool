<?php

session_start();

$_SESSION['isValid'] = false;

error_reporting( E_ALL );

require_once( __DIR__."/../classes/Connector.php" );

$db = new DevPool();

if( !$db ) {

    echo $db->lastErrorMsg();

}

$email = $_POST['email'];

$passWord = $_POST['password'];

$userQuery = "SELECT * FROM user_users WHERE email='".$email."' AND password='".$passWord."'";

$userRet = $db->query( $userQuery );

if(!empty($userRet->fetchArray( SQLITE3_ASSOC ))){
    $_SESSION['isValid'] = true;
}

if($_SESSION['isValid']){
    echo "Valid User";
} else {
    echo "Invalid User";
}

$db->close();