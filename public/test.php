<?php
require_once("../includes/initialize.php");
$user = User::find_all()[0];
echo $user->id;
?>
