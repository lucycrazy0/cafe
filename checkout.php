<?php
	@session_start();
	require_once("controllers/CheckoutController.php");
	require_once("controllers/OrderController.php");
	require_once("models/AccountModel.php");
	require_once("common/Constant.php");

	$checkoutController = new CheckoutController();
	$orderController = new OrderController();
	$accountModel = new AccountModel();
	
	function CheckInputTableAndAddress($number_table, $address_shipping){
		return (($number_table != CHOSSE_TABLE && $address_shipping != CHOSSE_ADDRESS) 
			&& !empty($_POST[NEW_ADDRESS]) || 
		($number_table == CHOSSE_TABLE && $address_shipping == CHOSSE_ADDRESS 
			&& empty($_POST[NEW_ADDRESS])));
	}

	function CheckInputNotEmpty($address_shipping){
		return $address_shipping != CHOSSE_TABLE && !empty($_POST[NEW_ADDRESS]);
	}

	function CheckErrorInput($number_table, $address_shipping,$checkoutController){
		if(CheckInputTableAndAddress($number_table, $address_shipping)){
			SetMessage("Bạn chưa chọn hoặc chỉ được chọn duy nhất 1 hình thức vận chuyển sản phẩm");
			$checkoutController->ShowCheckout();
		}else if(CheckInputNotEmpty($address_shipping)){
			SetMessage("Bạn chỉ được chọn 1 địa chỉ nhận hàng");
			$checkoutController->ShowCheckout();
		}else{
			return true;
		}
	}

	if(!isset($_SESSION[SO_LUONG]))
	{
		SetMessage("Bạn chưa chọn sản phẩm");
		SetLocaltion("menu.php");
	}
	
	if(isset($_POST['order']))
	{
		if(isset($_SESSION[USER]))
		{
			if(!isset($_POST[PAYMENT_TYPE])){
				SetMessage("Bạn chưa chọn hình thức thanh toán");
				SetLocaltion("checkout.php");
			}
			$number_table = $_POST['number_table'];
			$address_shipping = $_POST['address_shipping'];
			$payment = $_POST['payment_type'];
			$date = date('Y-m-d');
			$hour = date("H:i:s");
			$status = 0;
			//get user
			$user = $accountModel->GetUserByUsername($_SESSION[USER]);
			// check error input
			if($this->CheckErrorInput($number_table, $address_shipping,$checkoutController)){
				if($number_table != CHOSSE_TABLE){
					$orderController->AddOrderAndDetailOrder($hour,$date,$user->ma_nguoi_dung,$status,$number_table,$payment);
				}else if(!empty($_POST[NEW_ADDRESS])){
					$address_shipping = $_POST[NEW_ADDRESS];
					$orderController->AddOrderAndDetailOrder($hour,$date,$user->ma_nguoi_dung,$status,$address_shipping,$payment);
				}else if($address_shipping != CHOSSE_ADDRESS){
					$orderController->AddOrderAndDetailOrder($hour,$date,$user->ma_nguoi_dung,$status,$address_shipping,$payment);
				}
			}
		}else{

			$name = empty($_POST['name'])?" ":$_POST['name'];
			$phone = empty($_POST['phone'])?" ":$_POST['phone'];
			$email = empty($_POST['email'])?" ":$_POST['email'];
			$gender = empty($_POST['gender'])?" ":$_POST['gender'];
			$number_table = $_POST['number_table'];
			$payment = $_POST['payment_type'];
			$date = date('Y-m-d');
			$hour = date("H:i:s");
			$status = 0;

			//get id customer
			$idCustomer = $accountModel->GetLastId();
			// add customer model
			$params = [$idCustomer,$name,$gender,$email,$phone];
			$accountModel->AddCustomer($params);

			$orderController->AddOrderAndDetailOrder($hour,$date,$idCustomer,$status,$number_table,$payment);	
		}	
	}
	
	$checkoutController->ShowCheckout();
?>