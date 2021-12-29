<?php

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

while( $rowUser = $userRet->fetchArray( SQLITE3_ASSOC ) ) {
    
    echo "Name: ".$rowUser['first_name']." ".$rowUser['last_name']."\n";
    
    //$techQuery = "SELECT `name`, `exp` FROM tech WHERE user_id='".$rowUser['id']."';";
    
    //$techRet = $db->query( $techQuery );
    
    //while( $rowTech = $techRet->fetchArray( SQLITE3_ASSOC ) ) {
    
    //    echo "TECH => ".$rowTech['name']." -> EXP => ".$rowTech['exp']."\n";
    
    //}
    
    //$jobsQuery = "SELECT `title`, `exp` FROM jobs WHERE user_id='".$rowUser['id']."';";
    
    //$jobsRet = $db->query( $jobsQuery );
    
    //while( $rowJobs = $jobsRet->fetchArray( SQLITE3_ASSOC ) ) {
    
    //    echo "Jobs => ".$rowJobs['title']." -> EXP => ".$rowJobs['exp']."\n";
    
    //}

    echo "\n";
}

$db->close();