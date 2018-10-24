<?php 
	@session_start();
	//models 
	require_once("models/ProductModel.php");
	require_once("models/AccountModel.php");
	class CheckoutController
	{
		function ShowCheckout()
		{
			$productModel = new ProductModel();
			
			//get table
			$tables = $productModel->ShowTable();

			//views
			$view = "views/checkout/checkout.php";
			require_once("public/content.php");	
		}
		function ShowConfirmation()
		{
			//views
			$view = "views/checkout/confirmation.php";
			require_once("public/content.php");	
		}		
	}
?>