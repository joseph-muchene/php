<?php

define("DB_HOST", 'localhost');
define('DB_USER', 'joseph');
define("DB_PASS", "123456");
define("DB_NAME", "php_dev");


// create a connection instance
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


// check the connection

if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
} 


