<?php 
	require_once("controllers/CartController.php");
	$cartController = new CartController();
	
	if(isset($_POST["id"]))
	{
		//cập nhật lại giỏ hàng
		$giohang= $cartController->GetCart();

		if(isset($_POST["soluong_moi"])){
			$soluong_moi = $_POST["soluong_moi"];
			$cartController->UpdateCart($_POST["id"],$soluong_moi,$_POST["dongiagiohang"]);
			$arrGioHang = array('kq'=>'Đã cập nhật giỏ hàng ');
			echo json_encode($arrGioHang);
		}
	}
?>