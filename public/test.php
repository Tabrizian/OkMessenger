<?php
require_once("../includes/initialize.php");
$user = new User();
$user->id = 1;
$user->first_name = "Amin";
$user->last_name = "Ahmad";
$user->update();
?>
