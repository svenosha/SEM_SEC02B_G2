<?php

require_once '../../BusinessLayer/controller/manageLoginAndRegisterController.php';

$user = new manageLoginAndRegisterController();

$user_idd = $_GET["custID"];


if(isset($_GET["custID"])) {
	$user->custsetPw($user_idd);
}


?>
