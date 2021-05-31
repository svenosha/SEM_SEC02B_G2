<?php

require_once '../../BusinessLayer/controller/manageLoginAndRegisterController.php';

$user = new manageLoginAndRegisterController();

$user_idd = $_GET["spID"];


if(isset($_GET["spID"])) {
	$user->spsetPw($user_idd);
}


?>