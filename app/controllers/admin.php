<?php
class Admin extends Controller{
    public function index(){
        if(isset($_SESSION["loggedIn"])){
        $this->view('/admin/index');
        }else{
            $this->view('/admin/login');
        }
    }

}