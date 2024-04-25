<?php
class Home extends Controller {
    public function index(){
        $sql = 'SELECT * from comment WHERE IsApproved = FALSE';
        $result = mysqli_query($this->connection, $sql);
        $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $this->view('/home/index',['comments' => $comments]);
    }
    public function addFeedback(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (empty($_POST['name'])) {
                $nameErr = 'Name is required';
              } else {
                // $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $name = filter_input(
                  INPUT_POST,
                  'name',
                  FILTER_SANITIZE_FULL_SPECIAL_CHARS
                );
              }
            
              // Validate email
              if (empty($_POST['email'])) {
                $emailErr = 'Email is required';
              } else {
                // $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
              }
            
              // Validate body
              if (empty($_POST['body'])) {
                $bodyErr = 'Body is required';
              } else {
                // $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $body = filter_input(
                  INPUT_POST,
                  'body',
                  FILTER_SANITIZE_FULL_SPECIAL_CHARS
                );
              }
            
              if (empty($nameErr) && empty($emailErr) && empty($bodyErr)) {
                // add to database
                $sql = "INSERT INTO comment (name, email, body) VALUES ('$name', '$email', '$body')";
                if (mysqli_query($this->connection, $sql)) {
                  // success
                  header('Location: php/public/home/index');
                } else {
                  // error
                  echo 'Error: ' . mysqli_error($this->connection);
                }
              }
        }
    }
}