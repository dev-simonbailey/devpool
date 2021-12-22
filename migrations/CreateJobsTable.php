<?php
/**
* SQL statement to create jobs table
*/
$sql ="CREATE TABLE jobs(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INT         NOT NULL,
        title   CHAR(50)    NOT NULL,
        exp     INT
    );";