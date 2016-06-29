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

                        <a href="#" class="btn btn-primary">New Group</a>
                        <a href="#" class="btn btn-primary">New Channel</a>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <a href="#" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-log-out"></span> Log out</a>

                        <span class="pull-right">
<a href="#" class="btn btn-warning btn-md"><span class="glyphicon glyphicon-edit"></span>  Edit  </a>
                        </span>
            </div>

        </div>
    </div>
</div>

<?php include_layout_template('login-footer.php'); ?>
