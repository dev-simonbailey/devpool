<?php

require(__DIR__."/req/DB.class.php");
require(__DIR__."/req/cred.php");

$DB = new MeekroDB($host, $user, $password, $dbName, $port, $encoding);

$users = $DB->queryFirstRow("SELECT * FROM users WHERE username='simon.bailey'");

$skills = $DB->query("SELECT * FROM devpool01.skillset WHERE user_id = '".$users['id']."'");
 
foreach ($skills as $key => $value) {
  foreach ($value as $item_key => $item) {
    switch ($item_key['group']){
      case "apps_and_data":
        echo $item_key."==>".$item."<br />";
        break;
      default:
        //echo $item_key."==>".$item."<br />";
        break;
    }
  }
}
