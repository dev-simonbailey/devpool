<?php

require(__DIR__."/req/DB.class.php");
require(__DIR__."/req/cred.php");

$DB = new MeekroDB($host, $user, $password, $dbName, $port, $encoding);

$users = $DB->queryFirstRow("SELECT * FROM users WHERE username='simon.bailey'");

$skills = $DB->query("SELECT * FROM devpool01.skillset WHERE user_id = '".$users['id']."'");
 


foreach ($skills as $value) {
  echo $value['group']."<br />";





/*
  foreach ($value as $item_key => $item) {
    if($item_key == "group"){
      switch ($item) {
        case "apps_and_data":
          echo "apps_and_data ==> ".$item_key." ==> ".$item['skill']."<br />";
          break;
        default:
          echo "everything_else ==> ".$item_key." ==> ".$item."<br />";
          break;
      }
    }

  }
  */
}
