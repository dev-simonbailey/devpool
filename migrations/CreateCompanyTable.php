<?php
/**
* SQL statement to create company table
*/
$sql ="CREATE TABLE company(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        company     CHAR(50)    NOT NULL,
        contact     CHAR(50)    NOT NULL,
        email       CHAR(50)    NOT NULL,
        address_1   CHAR(50)    NOT NULL,
        address_2   CHAR(50),
        town        CHAR(50)    NOT NULL,
        county      CHAR(50)    NOT NULL,
        country     CHAR(50)    NOT NULL,
        postcode    CHAR(50)    NOT NULL,
        telephone   CHAR(50)    NOT NULL,
        password    CHAR(50)    NOT NULL,
        key         CHAR(50)    NOT NULL
    );";