<?php

class Home extends Controller {
    public function index($name = 'alex'){
        $user =  $this->model('user');
        $user->name = $name;
        
        $this->view('/home/index', ['name' => $user->name]);
    }
}