<?php

require(__DIR__."/req/DB.class.php");
require(__DIR__."/req/cred.php");

$DB = new MeekroDB($host, $user, $password, $dbName, $port, $encoding);

$users = $DB->queryFirstRow("SELECT * FROM users WHERE username='simon.bailey'");

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

foreach ($apps_and_data as $value) {
  echo "apps_and_data"."==>".$value."<br />";
}
echo "<br /><br />";
foreach ($dev_ops as $value) {
  echo "dev_ops"."==>".$value."<br />";
}
echo "<br /><br />";
foreach ($utils as $value) {
  echo "utils"."==>".$value."<br />";
}
echo "<br /><br />";