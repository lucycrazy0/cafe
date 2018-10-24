<?php
	@session_start();
	include ("controllers/CartController.php");
	include ("models/ProductModel.php");
	$cartController=new CartController();
	$productModel = new ProductModel();
	if(isset($_POST['id']))
	{
		$idProduct = $_POST['id'];
		$price = ((double)$_POST['dongia']);
		$product = $productModel->GetProductByIdProduct($idProduct);
		$nameProduct = $product->ten_san_pham;
		$cartController->DeleteProductInCart($idProduct,$price);
		$arrCart = array('kq'=>'Đã xóa sản phẩm ', 'ma_san_pham'=>$nameProduct);
		echo json_encode($arrCart);
	}
?>

