<?php require_once('../includes/initialize.php'); ?>
<?php if ($session->is_logged_in()) redirect_to("index.php");?>
<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $found_user = User::authenticate($username, $password);

    if($found_user) {
        $session->login($found_user);
        redirect_to("search.php");
    }
}
?>
<?php include_layout_template('login-header.php'); ?>
<form class="form-signin" method="post" action="login.php">
    <h2>Please sign in</h2>
    <div class="form-group">
        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
    </div>
    <div class="form-group">
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
    </div>
    <label><input type="checkbox" value="remember-me">Remember me</label>

    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
</form>

<?php include_layout_template('login-footer.php'); ?>

