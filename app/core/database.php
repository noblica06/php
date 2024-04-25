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
        

        $sql = "SELECT * FROM information_schema.tables WHERE table_name = 'product'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $sql = "CREATE TABLE product ('ID' INT NOT NULL AUTO_INCREMENT , 'Path' TEXT NOT NULL , 'Title' VARCHAR(255) NOT NULL ,'Description' VARCHAR(255) NOT NULL , PRIMARY KEY ('ID'))";
            if(!$conn->query($sql)){
                echo 'Table product could not be created!';
            }
        }

        $sql = "SELECT * FROM information_schema.tables WHERE table_name = 'user'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $sql = "CREATE TABLE user ('ID' INT NOT NULL AUTO_INCREMENT , 'Username' TEXT NOT NULL , 'Password' VARCHAR(255) NOT NULL , PRIMARY KEY ('ID')) ";
            if(!$conn->query($sql)){
                echo 'Table user could not be created!';
            }
        }

        $sql = "SELECT * FROM information_schema.tables WHERE table_name = 'comment'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $sql = "CREATE TABLE comment ('ID' INT NOT NULL AUTO_INCREMENT , 'Name' VARCHAR(255) NOT NULL , 'Email' VARCHAR(255) NOT NULL, 'Body' TEXT NOT NULL , PRIMARY KEY ('ID'))";
            if(!$conn->query($sql)){
                echo 'Table user could not be created!';
            }
        }
    
        return $conn;
    }
    