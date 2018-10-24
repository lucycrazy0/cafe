<?php 
	require_once("controllers/CartController.php");
	$cartController = new CartController();

	//cập nhật lại giỏ hàng
	$cart = $cartController->GetCart();
	if($cart && isset($_POST["soluong_moi"]) && isset($_POST["id"])){
		$numberNew = $_POST["soluong_moi"];
		$cartController->UpdateCart($_POST["id"],$numberNew,$_POST["dongiagiohang"]);
		$arrCart = array('kq'=>'Đã cập nhật giỏ hàng ');
		echo json_encode($arrCart);
	}
		
?>