<?php
$email = $password = '';
?>

<form action="/php/public/admin/login" method="POST">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>">
    </div>
    <br>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
    </div>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>