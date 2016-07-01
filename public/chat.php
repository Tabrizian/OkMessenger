<?php
require_once('../includes/initialize.php');
if (!$session->is_logged_in()) redirect_to("login.php");
$messages = array();
$group = null;
if (isset($_GET['id']) && isset($_GET['room_type'])) {

    $group = Group::find_by_id($_GET['id']);
    log_action($group->name);
    if($_GET['room_type'] == 'g' && isset($_POST['send'])) {
        $message = new Message();
        $message->is_private = false;
        $message->destruction_time = -1;
        $message->from_user_id = $session->user_id;
        $message->text = $_POST['message'];

        $message->insert();


        $group->messages[] = $message->_id;
        $group->update();
    }


}
if (isset($_GET['id']) && isset($_GET['room_type']) && isset($group)) {
    $messages = Message::find_all_ids($group->messages);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <script src="js/jquery-2.2.3.js"></script>
    <script src="js/chat.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/okmessenger/chat.css">
    <link rel="stylesheet" href="css/okmessenger/nav.css">
</head>
<body>

<div class="container-fluid">

    <!-- Second navbar for search -->
    <nav class="navbar navbar-inverse">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img alt="User Pic" src="https://upload.wikimedia.org/wikipedia/commons/c/c2/Ok-blue.png" class="img-circle img-responsive" width="40px" style="margin-top: 5px">


            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-3">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">profile</a></li>
                    <li><a href="#">more message</a></li>
                    <li><a href="#">contact search</a></li>
                    <li><a href="#">refresh</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">User <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">load profile</a></li>
                            <li><a href="#">report</a></li>
                            <li><a href="#">private chat</a></li>
                            <li><a href="#">unfriend</a></li>
                            <li><a href="#">send Unknown message</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="btn btn-default btn-outline btn-circle"  data-toggle="collapse" href="#nav-collapse3" aria-expanded="false" aria-controls="nav-collapse3">text search</a>
                    </li>
                </ul>
                <div class="collapse nav navbar-nav nav-collapse" id="nav-collapse3">
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" style="width: 880px" class="form-control pull-left" placeholder="Search" />
                        </div>
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </form>
                </div>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav><!-- /.navbar -->


</div><!-- /.container-fluid -->








<div class="wrapper">



    <div class="container" id="cont1">


        <div class="left">
            <ul class="people">
                <li class="person" data-chat="person1">
                    <a><img src="https://d30y9cdsu7xlg0.cloudfront.net/png/17241-200.png" alt="" />
                        <span class="name">friend 1</span>
                        <span class="preview">last message</span>
                    </a>
                </li>
                <li class="person" data-chat="person2">
                    <a>
                        <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/17241-200.png" alt="" />
                        <span class="name">friend2</span>
                        <span class="preview">last massage</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="right">
            <div class="top"><span>To: <span class="name">friend 2</span></span></div>

            <div style="padding-left: 1px ; width: 500px">

                <!-- Rooms -->
                <div class="row-fluid">
                    <div class="span12 well" style="background-color:white; border:0px; height: 350px; ;">
                        <!-- Rooms -->
                        <div id="rooms" class="tab-content">
                            <!-- Room -->
                            <div class="tab-pane active" id="MainRoom">
                                <div class="row-fluid">
                                    <div class="span12 well">
                                        <div id="room_messages" style="min-height:260px; max-height:260px; overflow:auto;">
                                            <!-- Message -->
                                            <?php
                                            foreach ($messages as $message_instance) {
                                                echo $message_instance->output_message();
                                            }
                                            ?>
                                            <!-- End Message -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- End Room -->
                        </div>
                        <!-- End Rooms -->
                    </div>
                </div>
                <!-- End Rooms -->

                <div class="row-fluid">
                    <div class="span12">
                        <div class="navbar">
                            <div class="navbar-inner">
                                <form class="navbar-form" action="index.php" method="post">

                                    <input id="message_text" type="text" name="message" class="span9" required autofocus style="width:100%;padding-top: 20px ;margin-top: -45%;margin-bottom:0% ;margin-left: -2%">
                                    <button id="b_send_message" type="submit" name="send" class="btn btn-primary ">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/chat.js"></script>
<script src="js/jquery-2.2.3.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.1.min.js"><\/script>')</script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/underscore-min.js"></script>
<script src="js/vendor/handlebars-1.0.rc.1.js"></script>
<script src="/socket.io/socket.io.js"></script>
<script src="js/main.js"></script>

</body>
</html>