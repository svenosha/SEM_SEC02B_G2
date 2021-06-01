<?php

require_once '../../BusinessLayer/controller/manageLoginAndRegisterController.php';

$user = new manageLoginAndRegisterController();

$user_idd = $_GET["runnerID"];


if(isset($_GET["runnerID"])) {
	$user->runsetPw($user_idd);
}


?>
