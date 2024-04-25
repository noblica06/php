<?php
class Admin extends Controller{
    public function index(){
        if(isset($_SESSION["loggedIn"])){
        $this->view('/admin/dashboard');
        }else{
            $this->view('/admin/login');
        }
    }
    
    public function login(){
        $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $statement = $this->connection->prepare("SELECT * FROM user WHERE username = ?");
        $statement->bind_param('s', $username);
        $statement->execute();
        $result = $statement->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['Password'])) {
                $_SESSION['loggedIn'] = true;
                $this->view('admin/dashboard');
            } else {
                echo 'Incorrect Password';
            }
           
        } else {
            echo "User does not exist.";
        }
    }
}