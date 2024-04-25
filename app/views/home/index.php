<?php

$name = $email = $body = '';
if(isset($data['errors'])){
  $errors = $data['errors'];
  $nameErr = $errors['nameErr'];
  $emailErr = $errors['emailErr'];
  $bodyErr = $errors['bodyErr'];
}
$products = $data['products'];
?>
<div class="container">
<?php for( $i = 0; $i < 9; $i = $i + 3) : ?>
  
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="<?php echo $products[$i]->path?>" class="card-img-top" style="height: 200px; width: 200px;" alt="Image <?=$i?>">
          <div class="card-body">
              <h5 class="card-title"><?php echo $products[$i]->title?></h5>
              <p class="card-text"><?php echo $products[$i]->description?></p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <img src="<?php echo $products[$i+1]->path?>" class="card-img-top" style="height: 200px; width: 200px;"  alt="Image <?=$i+1?>">
          <div class="card-body">
              <h5 class="card-title"><?php echo $products[$i+1]->title?></h5>
              <p class="card-text"><?php echo $products[$i+1]->description?></p>
          </div>
        </div>
      </div>
      

      <div class="col-md-4">
        <div class="card">
          <img src="<?php echo $products[$i+2]->path?>" class="card-img-top" style="height: 200px; width: 200px;"  alt="Image <?=$i+2?>">
          <div class="card-body">
              <h5 class="card-title"><?php echo $products[$i+2]->title?></h5>
              <p class="card-text"><?php echo $products[$i+2]->description?></p>
          </div>
        </div>
    </div>
</div>

<?php endfor;?>
</div>

<?php if (empty($data['comments'])): ?>
  <p class="lead mt-3">There is no feedback</p>
<?php endif; ?>

<?php foreach ($data['comments'] as $item): ?>
  <div class="card my-3 w-75">
    <div class="card-body text-center">
      <?php echo $item->body; ?>
      <div class="text-secondary mt-2">By <?php echo $item->name; ?></div>
    </div>
  </div>
<?php endforeach; ?>

<form method="POST" action="/php/public/home/addFeedback" class="mt-4 w-75">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control <?php echo !$nameErr ?:
          'is-invalid'; ?>" id="name" name="name" placeholder="Enter your name" value="<?php echo $name; ?>">
        <div id="validationServerFeedback" class="invalid-feedback">
          Please provide a valid name.
        </div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?php echo !$emailErr ?:
          'is-invalid'; ?>" id="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>">
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Comment</label>
        <textarea class="form-control <?php echo !$bodyErr ?:
          'is-invalid'; ?>" id="body" name="body" placeholder="Enter your comment"><?php echo $body; ?></textarea>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Add Comment" class="btn btn-dark w-100">
      </div>
</form>