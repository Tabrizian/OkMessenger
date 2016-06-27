<?php
require_once("../includes/initialize.php");
$user = new User();
$user->id = 2;
$user->first_name = "Iman";
$user->last_name = "Ahmad";
$user->insert();
?>
