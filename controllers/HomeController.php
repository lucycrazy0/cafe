<?php 

	require_once("models/ProductModel.php");
	class HomeController
	{
		function ShowHome()
		{
			//models
			$productModel = new ProductModel();
			$categorys = $productModel->ShowProductCategory();
			//views
			$view = "views/home/home.php";
			require_once("public/content.php"); 	
		}	
	}
?>