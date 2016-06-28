<?php
require_once("../includes/initialize.php");

if($session->is_logged_in()) {
    echo "You're logged in!!!!";
} else {
    echo "You're NOT logged in!!";
}
?>