<?php
/**
 * Created by PhpStorm.
 * User: iman
 * Date: 7/2/16
 * Time: 4:31 AM
 */
require_once ('../includes/initialize.php');
$user = User::find_by_id($_GET['id']);
$current_user = User::find_by_id($session->user_id);
if(!in_array($user->_id, $current_user->friends)) {
    $current_user->friends[] = $user->_id;
}

redirect_to("profile.php");