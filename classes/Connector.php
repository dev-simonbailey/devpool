<?php
class DevPool extends SQLite3 {
      function __construct() {
         $this->open(__DIR__.'/../database/devpool.db');
      }
   }