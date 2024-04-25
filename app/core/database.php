<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'test');
    define('DB_PASSWORD', 'password');
    define('DB_NAME', 'php');

    function connectDB() {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        return $conn;
    }
    