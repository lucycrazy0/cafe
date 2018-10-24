<?php
	@session_start();
	require_once("models/ProductModel.php");
	class MenuController
	{
		function ShowMenu()
		{
			//models 
			$productModel = new ProductModel();
			$coffe = $productModel->ShowProductByIdCategory(1);
			$categorys = $productModel->ShowProductCategory();
			//views
			$view = "views/menu/menu.php";
			require_once("public/content.php");	
		}	
	}
?>