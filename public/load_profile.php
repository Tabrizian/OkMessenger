<?php require_once('../includes/initialize.php'); ?>
<?php if (!$session->is_logged_in()) redirect_to("login.php");?>
<?php
$user = User::find_by_id($session->user_id);

?>
<?php include_layout_template('profile-header.php'); ?>

<div class="row">

    <div
        class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">


        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $user->full_name(); ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center"><img alt="User Pic"
                                                                        src="https://avatars1.githubusercontent.com/u/10105175?v=3&s=400"
                                                                        class="img-circle img-responsive"></div>

                    <div class=" col-md-9 col-lg-9 ">
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td>Username:</td>
                                <td>@<?php echo $user->username; ?></td>
                            </tr>

                            <tr>
                                <td>Date of Birth</td>
                                <td><?php echo strftime("%D", $user->birthday); ?></td>
                            </tr>

                            <tr>
                            <tr>
                                <td>Gender</td>
                                <td><?php echo $user->sex; ?></td>
                            </tr>
                            <tr>
                                <td>Home Address</td>
                                <td><?php echo $user->home_address; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><a href="<?php echo $user->email_address; ?>"><?php echo $user->email_address; ?></a></td>
                            </tr>
                            <td>Phone Number</td>
                            <td><?php echo $user->phone_number; ?></td>

                            </tr>

                            </tr>
                            <td>Biography</td>
                            <td><?php echo $user->bio; ?>
                            </td>

                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include_layout_template('login-footer.php'); ?>
