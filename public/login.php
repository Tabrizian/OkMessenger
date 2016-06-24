<?php require_once('../includes/initialize.php'); ?>
<?php include_layout_template('login-header.php'); ?>
<form class="form-signin">
    <h2>Please sign in</h2>
    <label for="input_email" class="sr-only">Email address</label>
    <input type="email" id="input_email" class="form-control" placeholder="Email address" required autofocus>
    <label for="input_password" class="sr-only">Password</label>
    <input type="password" id="input_password" class="form-control" placeholder="Password" required>
    <label><input type="checkbox" value="remember-me">Remember me</label>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>

<?php include_layout_template('login-footer.php'); ?>

