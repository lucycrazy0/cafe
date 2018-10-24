<?php 
	@session_start();
	require_once("models/OrderModel.php");
	require_once("controllers/CartController.php");
	
	class OrderController
	{
		function AddOrderAndDetailOrder($hour,$date,$idCustomer,$status,$number_table,$pay)
		{
			// model
			$orderModel = new OrderModel();
			$cartController = new CartController();
			$orderParams = [NULL,$hour,$date,$idCustomer,$_SESSION[THANH_TIEN],$status,$number_table,$pay];
			$idOrder = $orderModel->AddOrder($orderParams);
			if($idOrder > 0)
			{
				$products = $_SESSION[PRODUCT_IN_CART];
				foreach($products as $product)
				{
					$detailOrderParams = [NULL,$idOrder,$product->ma_san_pham,$product->so_luong,$product->gia];
					$orderModel->AddDetailOrder($detailOrderParams);
				}
				$cartController->DeleteCart();

				// navigation index
				SetLocaltion("index.php?success");			
			}	
		}
    }
?>