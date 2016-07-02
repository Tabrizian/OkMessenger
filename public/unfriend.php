<?php
/**
 * Created by PhpStorm.
 * User: iman
 * Date: 7/2/16
 * Time: 1:59 PM
 */
require_once ('../includes/initialize.php');
if(isset($_GET['id'])) {
    $user = User::find_by_id($session->user_id);
    for($i = 0; $i < count($user->friends); $i++) {
        if($friends[$i] == $_GET['id']) {
            unset($friends[$i]);
        }
    }
}

redirect_to("list.php");