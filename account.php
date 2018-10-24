<meta charset="utf-8"/>
<?php 
	@session_start();
	// import AccountController and AccountModel
	require_once("controllers/AccountController.php");
	require_once("models/AccountModel.php");

	// account controller
	$accountController = new AccountController();
	// account model
	$accountModel = new AccountModel();

	if(isset($_POST['signup'])) // if use choose button signup
	{
		$accountController->ShowSignUp();	
	}
	else if(isset($_POST['login']) || isset($_SESSION[USER])) // if use choose button login or issue session ten_dang_nhap
	{
		$accountController->ShowPanelAccount();
	}
	else if(isset($_POST['login_checkout'])) //if use choose button in checkout cart
	{
		$accountController->ShowLogin();
	}

	//logout
	if(isset($_GET['logout']))
	{
		$accountController->LogOut();	
	}

	//signup
	if(isset($_POST['sign_up']))
	{
		$accountController->AddUser();
	}

	//update account
	if(isset($_POST['update_account']))
	{
		$accountController->UpdateAccount();
	}
	
	$accountController->ShowLogin();
?>