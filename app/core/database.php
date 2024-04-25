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
        

        // $sql = "SHOW TABLES LIKE product";
        // $result = $conn->query($sql);
        // if ($result->num_rows == 0) {
        //     $sql = "CREATE TABLE 'php'.'product' ('ID' INT NOT NULL AUTO_INCREMENT , 'Path' TEXT NOT NULL , 'Title' VARCHAR(255) NOT NULL ,'Description' VARCHAR(255) NOT NULL , PRIMARY KEY ('ID')) ENGINE = InnoDB;";
        //     if(!$conn->query($sql)){
        //         echo 'Table product could not be created!';
        //     }
        // }

        // $sql = "SHOW TABLES LIKE user";
        // $result = $conn->query($sql);
        // if ($result->num_rows == 0) {
        //     $sql = "CREATE TABLE 'php'.'user' ('ID' INT NOT NULL AUTO_INCREMENT , 'Username' TEXT NOT NULL , 'Password' VARCHAR(255) NOT NULL , PRIMARY KEY ('ID')) ENGINE = InnoDB;";
        //     if(!$conn->query($sql)){
        //         echo 'Table user could not be created!';
        //     }
        // }

        // $sql = "SHOW TABLES LIKE comment";
        // $result = $conn->query($sql);
        // if ($result->num_rows == 0) {
        //     $sql = "CREATE TABLE 'php'.'comment' ('ID' INT NOT NULL AUTO_INCREMENT , 'Name' VARCHAR(255) NOT NULL , 'Email' VARCHAR(255) NOT NULL, 'Body' TEXT NOT NULL , PRIMARY KEY ('ID')) ENGINE = InnoDB;";
        //     if(!$conn->query($sql)){
        //         echo 'Table user could not be created!';
        //     }
        // }
    
        return $conn;
    }
    