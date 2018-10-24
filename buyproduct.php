<?php
@session_start();
include ("controllers/CartController.php");
$cartController=new CartController();
$key = $_POST['id'];
$soLuong = ((int)$_POST['soluong']);
$donGia = ((double)$_POST['dongia']);

if($soLuong>=0 && $donGia>0){
    $cartController->AddProductInCart($key, $soLuong, $donGia);
}

$arrGioHang = array('sl'=>$cartController->NumberProduct(), 'st'=>number_format($cartController->Money()));
echo json_encode($arrGioHang);
?>

