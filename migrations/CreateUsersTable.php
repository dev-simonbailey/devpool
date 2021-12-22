<?php
/**
 * SQL statement to create users table
 */
$sql ="CREATE TABLE users(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        first_name  CHAR(50)    NOT NULL,
        last_name   CHAR(50)    NOT NULL,
        email       CHAR(50),
        password    CHAR(50)
    );";