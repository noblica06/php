<?php
$username = $password = '';
?>

<form action="/php/public/admin/login" method="POST">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
    </div>
    <br>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
    </div>
    <br>
    <div class="mb-3 text-center">
        <input type="submit" name="submit" value="Log In" >
    </div>
</form>