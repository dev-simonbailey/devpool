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
      echo $value['group']."==>".$value['skill']."<br />";
      break;
    case "dev_ops":
      echo $value['group']."==>".$value['skill']."<br />";
      break;
    case "utils":
      echo $value['group']."==>".$value['skill']."<br />";
      break;
  }
}
