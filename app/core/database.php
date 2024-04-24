<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'test');
    define('DB_PASSWORD', 'password');
    define('DB_NAME', 'php');

    $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($connection->connect_error) {
        die('Connection failed '. $connection->connect_error);
    }
    