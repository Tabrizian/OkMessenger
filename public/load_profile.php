<?php require_once('../includes/initialize.php'); ?>
<?php if (!$session->is_logged_in()) redirect_to("login.php"); ?>
<?php
$user = User::find_by_id($_GET['id']);

?>
<?php include_layout_template('profile-header.php'); ?>

<link rel="stylesheet" href="css/okmessenger/nav.css">
<div class="container-fluid">

    <!-- Second navbar for search -->
    <nav class="navbar navbar-inverse">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar-collapse-3">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img alt="User Pic" src="https://upload.wikimedia.org/wikipedia/commons/c/c2/Ok-blue.png"
                     class="img-circle img-responsive" width="40px" style="margin-top: 5px">
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-3">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="report.php?id=<?php echo $user->_id; ?>">Report</a></li>
                    <li><a href="chat.php?id=<?php echo $user->_id; ?>&room_type=c&privates">Private Chat</a></li>
                    <li><a href="unfriend.php?id=<?php echo $user->_id; ?>">Unfriend</a></li>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav><!-- /.navbar -->


</div><!-- /.container-fluid -->


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
                                                                        src="<?php echo $user->image; ?>"
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
                                <td><?php echo $user->address; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <a href="<?php echo $user->email_address; ?>"><?php echo $user->email_address; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><?php echo $user->phone_number; ?></td>

                            </tr>

                            <tr>
                                <td>Biography</td>
                                <td><?php echo $user->bio; ?></td>
                            </tr>
                            <tr>
                                <td>Reported</td>
                                <td>
                                    <?php
                                    if ($user->reported_no > 10)
                                        echo "Reported";
                                    else
                                        echo "Not Reported";
                                    ?>
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
