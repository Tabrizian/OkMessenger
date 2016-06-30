<?php
require_once('../includes/initialize.php');
if (!$session->is_logged_in()) redirect_to("login.php");

if (isset($_POST['send'])) {

    $message = new Message();
    $message->is_private = false;
    $message->destruction_time = -1;
    $message->from_user_id = $session->user_id;
    $message->text = $_POST['message'];

    $message->insert();


}
if (isset($_GET['id']) && isset($_GET['room_type'])) {
    $messages = Message::find_all();
}

?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .well {
            margin: 0px;
        }
    </style>
    <!--<link rel="stylesheet" href="css/bootstrap-responsive.min.css">-->
    <link rel="stylesheet" href="css/main.css">

    <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
</head>
<body style="margin-bottom: 0px; padding-bottom: 0px;">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser
    today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better
    experience this site.</p>
<![endif]-->

<!-- Content -->
<div class="row-fluid">
    <!-- Header -->
    <div class="row-fluid">
        <div class="span12">
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-inner">
                    <a class="brand" href="index.php">&nbsp;&nbsp;&nbsp;<i class="icon-comment icon-white"></i>&nbsp;SimpleChat&nbsp;
                    </a>
                    <ul class="nav pull-right">
                        <li class="divider-vertical"></li>
                        <li class="">
                            <a href="http://github.com/tegioz/chat" data-toggle="modal"><i
                                    class="icon-star icon-white"></i>&nbsp;Fork me on Github&nbsp;</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <!-- Rooms -->
    <div class="row-fluid">
        <div class="span12 well" style="background-color:white; border:0px">
            <!-- Tabs -->
            <div class="row-fluid">
                <div class="span12">
                    <ul id="rooms_tabs" class="nav nav-tabs">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-th"></i>&nbsp;Options&nbsp;<b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#modal_joinroom" data-toggle="modal"><i class="icon-plus"></i>&nbsp;Join
                                        room</a></li>
                                <li><a id="b_leave_room" href="#"><i class="icon-minus"></i>&nbsp;Leave current room</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#modal_setnick" data-toggle="modal"><i class="icon-user"></i>&nbsp;Set
                                        nickname</a></li>
                            </ul>
                        </li>
                        <!-- Room tab -->
                        <li id="MainRoom_tab" class="active"><a href="#MainRoom" data-toggle="tab">MainRoom</a></li>
                        <!-- End Room tab -->
                    </ul>
                </div>
            </div>
            <!-- End Tabs -->
            <!-- Rooms -->
            <div id="rooms" class="tab-content">
                <!-- Room -->
                <div class="tab-pane active" id="MainRoom">
                    <div class="row-fluid">
                        <div class="span12 well">
                            <div id="room_messages" style="min-height:220px; max-height:220px; overflow:auto;">
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
                    <div class="row-fluid">
                        <div class="span12">
                            <h3>Now chatting...</h3>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div id="room_users" class="span12">
                            <span class="badge badge-inverse">ServerBot</span>
                        </div>
                    </div>
                </div>
                <!-- End Room -->
            </div>
            <!-- End Rooms -->
        </div>
    </div>
    <!-- End Rooms -->

    <!-- New message input -->
    <div class="row-fluid">
        <div class="span12">
            <div class="navbar">
                <div class="navbar-inner">
                    <form class="navbar-form" action="index.php" method="post">
                        <input id="message_text" type="text" name="message" class="span9" required autofocus>
                        <button id="b_send_message" type="submit" name="send" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End New message -->

    <!-- Footer -->
    <div class="row-fluid">
        <div class="span12">
            <p class="pull-right"><a href="mailto:sergio.castano.arteaga@gmail.com">
                    <small>Sergio Castaño Arteaga</small>
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    </div>
    <!--<div style="position:absolute; background-color:black; width:100%; height:10px; bottom:0px;"></div>-->
    <!-- End Footer -->
</div>
<!-- End Content -->

<!-- Join room modal -->
<div id="modal_joinroom" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Join room</h3>
    </div>
    <div class="modal-body">
        <input id="room_name" type="text" class="input-xlarge" placeholder="Room name">
        <p>
            <small>Room will be created if it doesn't exist</small>
        </p>
    </div>
    <div class="modal-footer">
        <a id="b_join_room" href="#" class="btn btn-primary">Join now</a>
    </div>
</div>
<!-- End Join room modal -->

<!-- Set nick modal -->
<div id="modal_setnick" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Set nickname</h3>
    </div>
    <div class="modal-body">
        <input id="nickname" type="text" class="input-xlarge" placeholder="Type your nickname here">
        <p>
            <small>Pick up something more cool than anonymous :)</small>
        </p>
    </div>
    <div class="modal-footer">
        <a id="b_set_nickname" href="#" class="btn btn-primary">Set nickname</a>
    </div>
</div>
<!-- End Set nick modal -->

<script src="js/jquery-2.2.3.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.1.min.js"><\/script>')</script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/underscore-min.js"></script>
<script src="js/vendor/handlebars-1.0.rc.1.js"></script>
<script src="/socket.io/socket.io.js"></script>
<script src="js/main.js"></script>
</body>
</html>

