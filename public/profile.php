<?php require_once('../includes/initialize.php'); ?>
<?php if(!$session->is_logged_in()) redirect_to(); ?>
<?php include_layout_template('profile-header.php'); ?>
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


        <div class="panel panel-info">
            <div class="panel-heading">

                <h3 class="panel-title">Iman Tabrizian</h3>

            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://avatars1.githubusercontent.com/u/10105175?v=3&s=400" class="img-circle img-responsive"> </div>


                <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>Username:</td>
                            <td>@I_Tabrizian</td>
                        </tr>

                        <tr>
                            <td>Date of Birth</td>
                            <td>01/24/1996</td>
                        </tr>

                        <tr>
                        <tr>
                            <td>Gender</td>
                            <td>Male</td>
                        </tr>
                        <tr>
                            <td>Home Address</td>
                            <td>Tehran,Iran</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><a href="mailto:tabrizian@outlook.com">tabrizian@outlook.com</a></td>
                        </tr>
                        <td>Phone Number</td>
                        <td>+982122774661(Landline)<br>+989377371367(Mobile)
                        </td>

                        </tr>

                        </tr>
                        <td>Biography</td>
                        <td>I’m Iman Tabrizian studying computer software engineering at Amirkabir University of technology, Tehran, Iran.
                        </td>

                        </tr>
                        </tbody>
                    </table>

                    <a href="#" class="btn btn-primary" role="button" data-toggle="modal" data-target="#login-modal">new group</a>

                    <a href="#" class="btn btn-primary" role="button" data-toggle="modal" data-target="#login-modal1">new channel</a>
                </div>
            </div>
        </div>


        <!-- BEGIN # MODAL LOGIN -->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" align="center">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                        <br/>
                        <br/>
                        <div >
                            <img id="img_logo" src="https://avatars1.githubusercontent.com/u/10105175?v=3&s=400" class="img-circle img-responsive  col-lg-11" class="avatar img-circle img-thumbnail" alt="avatar">
                            <br/>
                            <h5>Upload group photo...</h5>
                            <br/>
                            <input type="file" class="text-center center-block well well-sm">
                        </div>

                    </div>
                    <!-- Begin # DIV Form -->
                    <div id="div-forms">
                        <!-- Begin # Login Form -->
                        <form id="login-form">
                            <div class="modal-body">
                                <div id="div-login-msg">
                                    <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                    <span id="text-login-msg">specify group info</span>
                                </div>
                                <input id="login_username" class="form-control" type="text" placeholder="group name " required>
                                <input id="login_password" class="form-control" type="text" placeholder="group description" required>

                            </div>
                            <div class="modal-footer">
                                <div>
                                    <button type="submit" class=" btn btn-primary btn-block btn-lg" data-dismiss="modal" aria-label="Close">
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
        <div class="modal fade" id="login-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" align="center">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                        <br/>
                        <br/>
                        <div >
                            <img id="img_logo1" src="https://avatars1.githubusercontent.com/u/10105175?v=3&s=400" class="img-circle img-responsive  col-md-11" class="avatar img-circle img-thumbnail" alt="avatar" >
                            <br/>
                            <h5>Upload channel photo...</h5>
                            <br/>
                            <input type="file" class="text-center center-block well well-sm">
                        </div>

                    </div>
                    <!-- Begin # DIV Form -->
                    <div id="div-forms1">
                        <!-- Begin # Login Form -->
                        <form id="login-form1">
                            <div class="modal-body">
                                <div id="div-login-msg1">
                                    <div id="icon-login-msg1" class="glyphicon glyphicon-chevron-right"></div>
                                    <span id="text-login-msg1">specify channel info</span>
                                </div>
                                <input id="login_username1" class="form-control" type="text" placeholder="channel name " required>
                                <input id="login_password1" class="form-control" type="text" placeholder="channel description" required>

                            </div>
                            <div class="modal-footer">
                                <div>
                                    <button type="submit" class=" btn btn-primary btn-block btn-lg" data-dismiss="modal" aria-label="Close">
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
            <a href="#" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-log-out"></span> Log out</a>

                        <span class="pull-right">
<a href="#" class="btn btn-warning btn-md"><span class="glyphicon glyphicon-edit"></span>  Edit  </a>
                        </span>
        </div>

    </div>
</div>
</div>

</div>
<?php include_layout_template('login-footer.php'); ?>
