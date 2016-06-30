<?php

/**
 * Created by PhpStorm.
 * User: iman
 * Date: 6/30/16
 * Time: 10:52 PM
 */

require_once ("../includes/initialize.php");
if($session->is_logged_in()) {
    $session->logout();
}
redirect_to("login.php");