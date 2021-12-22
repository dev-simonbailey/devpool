<?php
/**
 * SQL statement to create recruiters table
 */
$sql ="CREATE TABLE recruiters(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        company_id  INT         NOT NULL,
        first_name  CHAR(50)    NOT NULL,
        last_name   CHAR(50)    NOT NULL,
        email       CHAR(50)    NOT NULL,
        password    CHAR(50)    NOT NULL
    );";