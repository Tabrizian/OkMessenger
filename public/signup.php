<?php require_once('../includes/initialize.php'); ?>
<?php

if (isset($_POST['submit'])) {
    $user = new User();
    $user->first_name = $_POST['first_name'];
    $user->last_name = $_POST['last_name'];
    $user->email_address = $_POST['email_address'];
    $user->birth_day = strtotime($_POST['year'] + "/" + $_POST['month'] + "/" + $_POST['day']);
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    $user->sex = $_POST['sex'];

    if ($user->insert()) {
        echo "Signup success!";
        redirect_to("login.php");
    } else {
        echo "Signup failed!";
    }
}
?>
<?php include_layout_template('login-header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4  well well-sm">
                <legend><a href=#><i class="glyphicon glyphicon-globe"></i></a> Sign up!</legend>
                <form action="signup.php" method="post" class="form">
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <input class="form-control" name="first_name" placeholder="First Name" type="text"
                                   required autofocus/>
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <input class="form-control" name="last_name" placeholder="Last Name" type="text" required/>
                        </div>
                    </div>
                    <input class="form-control" name="username" placeholder="User Name" type="text"/>
                    <input class="form-control" name="password" placeholder="Password" type="password"/>
                    <input class="form-control" name="email_address" placeholder="Email" type="email"/>
                    <label for="">Birth Date</label>
                    <div class="row">
                        <div class="col-xs-4 col-md-4">
                            <input class="form-control" name="day" placeholder="Day" type="number" min="1" max="31"/>
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <input class="form-control" name="month" placeholder="Month" type="number" min="1" max="12"/>
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <input class="form-control" name="year" placeholder="Year" type="number" min="1900" max="2016"/>
                        </div>
                    </div>
                    <label class="radio-inline">
                        <input type="radio" name="sex" id="inlineCheckbox1" value="male"/>
                        Male
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sex" id="inlineCheckbox2" value="female"/>
                        Female
                    </label>
                    <br/>
                    <br/>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">
                        Sign up
                    </button>
                </form>
            </div>
        </div>
    </div>
<?php include_layout_template('login-footer.php'); ?>