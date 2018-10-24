<?php
    @session_start();
    require_once ("controllers/CartController.php");
    $cartController=new CartController();
    
    $key = $_POST['id'];
    $number = ((int)$_POST['soluong']);
    $price = ((double)$_POST['dongia']);

    if($number>=0 && $price>0){
        $cartController->AddProductInCart($key, $number, $price);
    }

    $arrCart = array('sl'=>$cartController->NumberProduct(), 'st'=>number_format($cartController->Money()));
    echo json_encode($arrCart);
?>

