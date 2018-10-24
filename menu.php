<?php
	@session_start();
	require_once("controllers/MenuController.php");

	$menuController = new MenuController();
	$menuController->ShowMenu();
?>