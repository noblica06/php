<?php
class Home extends Controller {
  
    public function index(){
        $comments =  $this->getCommentsFromDatabase();
        $products = $this->getProductsFromDatabase();
        $this->view('/home/index',['comments' => $comments, 'products'=>$products]);
    }
    public function addFeedback(){
      $nameErr = $bodyErr = $emailErr = '';
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if (empty($_POST['name'])) {
              $nameErr = 'Name is required';
            } else {
              $name = filter_input(
                INPUT_POST,
                'name',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
              );
            }

            if (empty($_POST['email'])) {
              $emailErr = 'Email is required';
            } else {
              $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            }

            if (empty($_POST['body'])) {
              $bodyErr = 'Body is required';
            } else {
              $body = filter_input(
                INPUT_POST,
                'body',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
              );
            }
          
            if (empty($nameErr) && empty($emailErr) && empty($bodyErr)) {

              $sql = "INSERT INTO comment (name, email, body) VALUES (?, ?, ?)";
              $stmt = $this->connection->prepare($sql);
              $stmt->bind_param("sss", $name, $email, $body);
              if ($stmt->execute()) {
                header("Location: /php/public/home");
              } else {
                echo 'Error: ' . mysqli_error($this->connection);
              }
            }else{
              
              header("Location: /php/public/home");
            }
      }
    }
    private function getCommentsFromDatabase(){
      $sql = 'SELECT * from comment WHERE IsApproved = TRUE';
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

    private function getProductsFromDatabase(){
      $sql = 'SELECT * FROM product';
      $result = mysqli_query($this->connection, $sql);
      $productsDB = mysqli_fetch_all($result, MYSQLI_ASSOC);
      $products = [];
      foreach($productsDB as $prod){
        $product = $this->model('product');
        $product->path = $prod['Path'];
        $product->title = $prod['Title'];
        $product->description = $prod['Description'];
        $products[] = $product;
      }
      return $products;
    }
}