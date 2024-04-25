<?php

require_once 'database.php';

class Controller 
{
    protected $connection;

    public function __construct(){
        $this->connection = connectDB();
    }
    
    public function model($model){
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []){
        require_once 'database.php';
        
        require_once '../app/views/inc/header.php';

        require_once '../app/views/'. $view . '.php';

        require_once '../app/views/inc/footer.php';
    }
}