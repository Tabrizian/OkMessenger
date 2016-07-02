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
    log_action("User frineds number is " . count($user->friends));
    for($i = 0; $i < count($user->friends); $i++) {
        
        log_action("Friend user id is " . );
        if($friends[$i]->id == $_GET['id']) {
            unset($friends[$i]);
            log_action("Unfriended");
        }
    }
    $user->update();
}

redirect_to("list.php");