<?php
/**
 * Created by PhpStorm.
 * User: iman
 * Date: 7/2/16
 * Time: 1:24 PM
 */

if(isset($_GET['id'])) {
    $user = User::find_by_id($_GET['id']);
    $user->report;
    $user->update();
    redirect_to("load_profile.php?id=". $_GET['id']);
}