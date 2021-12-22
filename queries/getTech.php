<?php

error_reporting(E_ALL);

require_once(__DIR__."/../classes/Connector.php");

$db = new DevPool();

if(!$db) {

    echo $db->lastErrorMsg();

}

$data = json_decode(file_get_contents('php://input'), true);

//$json = '{"HTML":1,"Javascript":2,"CSS":4}';

//$data = json_decode($json, true);

// SELECT distinct(user_id) FROM user_tech WHERE (tech_id=5 AND exp > 3) ORDER BY user_id ASC;

$query1= "SELECT distinct(user_id) FROM user_tech WHERE ";

foreach($data as $key => $value) {

    $query1 .= "(tech_id='".$key."' AND exp > ".$data[$key].")";
    
    $query1 .= " OR ";

}

$query1 = rtrim($query1," OR ")." ORDER BY user_id ASC;";


$result1 = $db->query( $query1 );

$rowCount = 1;

$resultsArray = [];

while( $row1 = $result1->fetchArray( SQLITE3_ASSOC ) ) {

    $query2 = " SELECT first_name, last_name, email, salary
                FROM user_users
                WHERE id = ".$row1['user_id'];
    
    $result2 =  $db->querySingle( $query2 , true);

    $queryJobs = "  SELECT title, exp
                    FROM user_jobs
                    WHERE user_id = ".$row1['user_id'];

    $resultJobs =  $db->query( $queryJobs);

    $query3 = " SELECT tech_id, exp 
                FROM user_tech 
                WHERE user_id = '".$row1['user_id']."'";

    $query3 .= " Order By Case tech_id  ";

    $counter = 1;

    foreach($data as $key => $value) {

        $query3 .= "WHEN '".$key."' THEN ".$counter." ";

        $counter++;
    }

    $query3 .= " Else ".$counter." End";

    //echo $query3;

    //exit();

    
    $result3 = $db->query( $query3 );

    $resultsArray[$rowCount]['id'] = $row1['user_id'];

    $resultsArray[$rowCount]['name'] = $result2['first_name']. " " .$result2['last_name'];
    
    $resultsArray[$rowCount]['email'] = $result2['email'];

    $resultsArray[$rowCount]['salary'] = $result2['salary'];

    $jobsCount = 0;
    
    while( $rowJobs = $resultJobs->fetchArray( SQLITE3_ASSOC ) ) {
    
        $resultsArray[$rowCount]['roles'][$jobsCount]['title'] = [$rowJobs['title']];
    
        $resultsArray[$rowCount]['roles'][$jobsCount]['exp'] = [$rowJobs['exp']];
    
        $jobsCount++;
    
    }
    
    $techPoints = 0;

    $expPoints = 0;

    $reqCount = 0;

    $addCount = 0;

    while( $row3 = $result3->fetchArray( SQLITE3_ASSOC ) ) {

        $techNameQuery = "SELECT tech_name FROM general_tech WHERE id='". $row3['tech_id']."'";

        //echo $techNameQuery;

        $techNameResults =  $db->querySingle( $techNameQuery , true);

        //var_dump($techNameResults);

        if(array_key_exists($row3['tech_id'],$data)){


            $resultsArray[$rowCount]['stack']['required'][$reqCount]['title'] = $techNameResults['tech_name'];
    
            $resultsArray[$rowCount]['stack']['required'][$reqCount]['exp'] = $row3['exp'];
    
            $reqCount++;
        
            //$resultsArray[$rowCount]['stack']['required'][$row3['name']] = $row3['exp'];
        
            $expPoints = $expPoints + $row3['exp'];
        
            $techPoints++;
        
        } else {

            $resultsArray[$rowCount]['stack']['additional'][$addCount]['title'] = $techNameResults['tech_name'];
    
            $resultsArray[$rowCount]['stack']['additional'][$addCount]['exp'] = $row3['exp'];

            $addCount++;
        
        }

    }
    
    $resultsArray[$rowCount]['tech_points'] = $techPoints;

    $resultsArray[$rowCount]['exp_points'] = $expPoints;

    $rowCount++;

}

$keys = array_column($resultsArray, 'tech_points');

array_multisort($keys, SORT_DESC, $resultsArray);

if(empty($resultsArray)){
    http_response_code(400);
    $resultsArray['error'] = "No Results";
    echo json_encode($resultsArray);
} else {
    http_response_code(200);
    header("Content-Type: application/json");
    echo json_encode($resultsArray);
}


$db->close();