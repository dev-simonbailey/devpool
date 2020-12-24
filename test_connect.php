<?php

require(__DIR__."/req/DB.class.php");
require(__DIR__."/req/cred.php");

$DB = new MeekroDB($host, $user, $password, $dbName, $port, $encoding);

$users = $DB->queryFirstRow("SELECT * FROM users WHERE username='simon.bailey'");

echo "USERS<br />";
echo "id: ".$users['id']."<br />";
echo "username ".$users['username']."<br />";
echo "password ".$users['password']."<br />";
echo "created ".$users['created']."<br /><br />";

$user_data = $DB->queryFirstRow("SELECT * FROM user_details WHERE user_id='".$users['id']."'");

echo "USER DATA<br />";
echo "id: ".$user_data['id']."<br />";
echo "user_id: ".$user_data['user_id']."<br />";
echo "user_first: ".$user_data['user_first']."<br />";
echo "user_last: ".$user_data['user_last']."<br />";
echo "user_email: ".$user_data['user_email']."<br />";
echo "user_tel: ".$user_data['user_tel']."<br />";
echo "user_looking: ".$user_data['user_looking']."<br />";
echo "user_job_title: ".$user_data['user_job_title']."<br />";
echo "user_salary: ".$user_data['user_salary']."<br />";
echo "user_notice: ".$user_data['user_notice']."<br />";
echo "user_postcode: ".$user_data['user_postcode']."<br /><br />";

$skills = $DB->query("SELECT * FROM devpool01.skillset WHERE user_id = '".$users['id']."'");
 
$apps_and_data  = [];
$dev_ops        = [];
$utils          = [];

foreach ($skills as $value) {

  switch ($value['group']){
    case "apps_and_data":
      array_push($apps_and_data,$value['skill']);
      //echo $value['group']."==>".$value['skill']."<br />";
      break;
    case "dev_ops":
      array_push($dev_ops,$value['skill']);
      //echo $value['group']."==>".$value['skill']."<br />";
      break;
    case "utils":
      array_push($utils,$value['skill']);
      //echo $value['group']."==>".$value['skill']."<br />";
      break;
  }
}

echo "APPS AND DATA<br />";
foreach ($apps_and_data as $value) {
  echo "    ==>".$value."<br />";
}
echo "<br /><br />";

echo "DEV OPS<br />";
foreach ($dev_ops as $value) {
  echo "    ==>".$value."<br />";
}
echo "<br /><br />";

echo "UTILITIES<br />";
foreach ($utils as $value) {
  echo "    ==>".$value."<br />";
}
echo "<br /><br />";