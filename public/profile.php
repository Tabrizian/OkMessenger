<?php require_once('../includes/initialize.php'); ?>
<?php if (!$session->is_logged_in()) redirect_to("login.php"); ?>
<?php include_layout_template('profile-header.php'); ?>
<?php
$user = User::find_by_id($session->user_id);
log_action("Reloaded");
if (isset($_POST['new_group'])) {

    $group = new Group();
    $group->description = $_POST['group_description'];
    $group->name = $_POST['group_name'];
    $group->members = array($user->_id);

    $group->insert();
}
?>
<div class="row">

    <div
        class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">


        <div class="panel panel-info">
            <div class="panel-heading">

                <h3 class="panel-title"><?php echo $user->full_name(); ?></h3>

            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"><img alt="User Pic"
                                                                    src="<?php echo $user->image;?>"
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
                            <td><?php echo strftime('%D', $user->birthday); ?></td>
                        </tr>

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
                            <td><a href="<?php echo $user->email_address; ?>"><?php echo $user->email_address; ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td><?php echo $user->phone_number; ?></td>
                        </tr>


                        <tr>
                            <td>Biography</td>
                            <td><?php echo $user->bio; ?>
                            </td>

                        </tr>
                        </tbody>
                    </table>

                    <a href="#" class="btn btn-primary" role="button" data-toggle="modal" data-target="#login-modal">new
                        group</a>

                    <a href="#" class="btn btn-primary" role="button" data-toggle="modal" data-target="#login-modal1">new
                        channel</a>
                </div>
            </div>
        </div>


        <!-- BEGIN # MODAL LOGIN -->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" align="center">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                        <br/>
                        <br/>
                        <div>
                            <img id="img_logo" src="https://avatars1.githubusercontent.com/u/10105175?v=3&s=400"
                                 class="img-circle img-responsive  col-lg-11" class="avatar img-circle img-thumbnail"
                                 alt="avatar">
                            <br/>
                            <h5>Upload group photo...</h5>
                            <br/>
                            <input type="file" class="text-center center-block well well-sm">
                        </div>

                    </div>
                    <!-- Begin # DIV Form -->
                    <div id="div-forms">
                        <!-- Begin # Login Form -->
                        <form id="login-form" method="post" action="profile.php">
                            <div class="modal-body">
                                <div id="div-login-msg">
                                    <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                    <span id="text-login-msg">specify group info</span>
                                </div>
                                <input id="group_name" class="form-control" type="text" placeholder="Group name "
                                       name="group_name" required>
                                <input id="group_description" class="form-control" type="text"
                                       placeholder="Group description" name="group_description" required>

                            </div>
                            <div class="modal-footer">
                                <div>
                                    <button type="submit" name="new_group" class=" btn btn-primary btn-block btn-lg" aria-label="Close">
                                        Create
                                    </button>

                                </div>
                            </div>
                        </form>
                        <!-- End # Login Form -->
                    </div>
                    <!-- End # DIV Form -->
                </div>
            </div>
        </div>

        <!-- END # MODAL LOGIN -->

        <!-- BEGIN # MODAL LOGIN -->
        <div class="modal fade" id="login-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" align="center">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                        <br/>
                        <br/>
                        <div>
                            <img id="img_logo1" src="https://avatars1.githubusercontent.com/u/10105175?v=3&s=400"
                                 class="img-circle img-responsive  col-md-11" class="avatar img-circle img-thumbnail"
                                 alt="avatar">
                            <br/>
                            <h5>Upload channel photo...</h5>
                            <br/>
                            <input type="file" class="text-center center-block well well-sm">
                        </div>

                    </div>
                    <!-- Begin # DIV Form -->
                    <div id="div-forms1">
                        <!-- Begin # Login Form -->
                        <form id="login-form1" action="profile.php" method="post">
                            <div class="modal-body">
                                <div id="div-login-msg1">
                                    <div id="icon-login-msg1" class="glyphicon glyphicon-chevron-right"></div>
                                    <span id="text-login-msg1">specify channel info</span>
                                </div>
                                <input id="channel_name"  class="form-control" type="text" placeholder="Channel Name "
                                       required>
                                <input id="channel_description"  class="form-control" type="text"
                                       placeholder="Channel Description" required>

                            </div>
                            <div class="modal-footer">
                                <div>
                                    <button type="submit" class=" btn btn-primary btn-block btn-lg" data-dismiss="modal"  name="new_channel" aria-label="Close">
                                        Create
                                    </button>

                                </div>
                            </div>
                        </form>
                        <!-- End # Login Form -->
                    </div>
                    <!-- End # DIV Form -->
                </div>
            </div>
        </div>

        <!-- END # MODAL LOGIN -->


        <div class="panel-footer">
            <a href="logout.php" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-log-out"></span> Log out</a>

                        <span class="pull-right">
<a href="edit_profile.php" class="btn btn-warning btn-md"><span class="glyphicon glyphicon-edit"></span>  Edit  </a>
                        </span>
        </div>

    </div>
</div>
<?php include_layout_template('login-footer.php'); ?>
