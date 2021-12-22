<?php
error_reporting(E_PARSE);
require_once(__DIR__."/../classes/Connector.php");
$path    = __DIR__.'/../seeds/';
$db = new DevPool();
if(!$db) {
    echo $db->lastErrorMsg();
} else {
    echo "Database connection successful\n";
}
if(!empty($argv[1])){
    include $path.$argv[1].".php";
    $ret = $db->exec($sql);
    if(!$ret){
        echo $db->lastErrorMsg();
        echo ", seeder failed\n";
    } else {
    echo $argv[1].", seeder successfull\n";
    }
} else {
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..'));
    foreach($files as $file){
    $fileName = explode(".",$file);
      include $path.$file;
      $ret = $db->exec($sql);
      if(!$ret){
          echo $db->lastErrorMsg();
          echo ", seeder failed\n";
      } else {
      echo $fileName[0].", seeder successfull\n";
      }
    }
}
$db->close();
echo "Database connection closed\n";