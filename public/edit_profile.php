<?php require_once('../includes/initialize.php');
if(!$session->is_logged_in()) redirect_to("login.php");
$user = User::find_by_id($session->user_id);

if(isset($_POST['submit'])) {
    $user->first_name = $_POST['first_name'];
    $user->last_name = $_POST['last_name'];
    $user->username = $_POST['username'];
    log_action($_POST['username'] . " " . $_POST['password'] . " " . $_POST['conf_password']);
    if(!($_POST['password'] == $_POST['conf_password'])) {
        $session->message("Passwords don't match");
    } else {
        $user->password = $_POST['password'];
        $user->email_address = $_POST['email_address'];
        $user->address = $_POST['address'];
        $user->birthday = strtotime($_POST['year'] . '/' . $_POST['month'] . '/' . $_POST['day']);

        $success = $user->update();
        if($success) {
            $session->message("User updated successfully.");
        } else {
            $session->message("User update failed.");

        }
    }
}

?>


<?php include_layout_template('profile-header.php'); ?>
<h1 class="page-header">Edit Profile</h1>
<div class="row">


    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-9 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-1 toppad" >


        <!-- left column -->
        <div class="col-md-4 col-sm-6 col-xs-10">
            <div class="text-center">
                <img src="https://avatars1.githubusercontent.com/u/10105175?v=3&s=400" class="img-circle img-responsive  col-lg-11" class="avatar img-circle img-thumbnail" alt="avatar">

                <h5>Upload a different photo...</h5>
                <input type="file" class="text-center center-block well well-sm">
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
            <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-coffee"></i>
                <?php echo $session->message; ?>
            </div>
            <h3>Personal info</h3>
            <form class="form-horizontal" role="form" method="post" action="edit_profile.php">
                <div class="form-group">
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="first_name" value="<?php echo $user->first_name; ?>" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Last name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="last_name" value="<?php echo $user->last_name; ?>" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Address:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="address" value="<?php echo $user->address; ?>" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="email_address" value="<?php echo $user->email_address; ?>" type="email">
                    </div>
                </div>
                <label class="col-lg-3 control-label">Birth Date:</label>
                <div class="row">
                    <div class=" col-xs-2 col-sm-2">
                        <input class="form-control" name="day" placeholder="Day" type="number" min="1" max="31" value="
                        <?php strftime("%d", $user->birthday); ?>"/>
                    </div>
                    <div class="col-xs-12 col-md-2">
                        <input class="form-control" name="month" placeholder="Month" type="number" min="1" max="12" value="
                        <?php strftime("%M", $user->birthday); ?>"/>
                    </div>
                    <div class="col-md-12 col-md-2">
                        <input class="form-control" name="year" placeholder="Year" type="number" min="1900" max="2016" value="value="
                        <?php strftime("%Y", $user->birthday); ?>""/>
                    </div>
                </div>
                </br>
                <div class="form-group">
                    <label class="col-md-3 control-label">Username:</label>
                    <div class="col-md-8">
                        <input class="form-control" name="username" value="<?php echo $user->username?>" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Password:</label>
                    <div class="col-md-8">
                        <input class="form-control" name="password" value="" type="password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Confirm password:</label>
                    <div class="col-md-8">
                        <input class="form-control" name="conf_password" value="" type="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input class="btn btn-primary" value="Save Changes" type="submit" name="submit">
                        <span></span>
                        <input class="btn btn-default" value="Cancel" type="reset">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_layout_template('login-footer.php'); ?>