<?php
/**
 * SQL statement to create tech table
 */
$sql ="CREATE TABLE tech(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INT         NOT NULL,
        name    CHAR(50)    NOT NULL,
        exp     INT
    );";