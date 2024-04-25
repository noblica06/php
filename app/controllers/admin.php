<?php
class Admin extends Controller{
    public function index(){
        if(isset($_SESSION["loggedIn"])){
            $comments = $this->getCommentsFromDatabase();
            $this->view('/admin/dashboard', ['comments' => $comments]);
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
                $comments = $this->getCommentsFromDatabase();
                $this->view('/admin/dashboard', ['comments' => $comments]);
            } else {
                echo 'Incorrect Password';
            }
           
        } else {
            echo "User does not exist.";
        }
    }

    public function approveComments(){
        
    }

    private function getCommentsFromDatabase(){
        $sql = 'SELECT * from comment WHERE IsApproved = FALSE';
        $result = mysqli_query($this->connection, $sql);
        $commentsDB = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $comments = [];
        foreach($commentsDB as $comm){
            $comment = $this->model('comment');
            $comment->id = $comm['ID'];
            $comment->name = $comm['Name'];
            $comment->email = $comm['Email'];
            $comment->body = $comm['Body'];
            $comments[] = $comment;
        }
        return $comments;
      }
}