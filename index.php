<?php
	@session_start();
	require("controllers/HomeController.php");
	require_once("controllers/CheckoutController.php");
	$checkoutController = new CheckoutController();
	$homeController = new HomeController();
	if(isset($_GET['success'])){
		$checkoutController->ShowConfirmation();
	}
	$homeController->ShowHome();
?>