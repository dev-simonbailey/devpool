<?php

require(__DIR__."/req/DB.class.php");
require(__DIR__."/req/cred.php");

$DB = new MeekroDB($host, $user, $password, $dbName, $port, $encoding);

$users = $DB->query("SELECT * FROM users");

var_dump($users);

foreach ($users as $user) {
  foreach ($user as $key => $value) {
    echo $key." ==> ".$value."\n";
  }
}
