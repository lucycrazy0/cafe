<?php
@session_start();
//import error message and account model
require_once("common/ErrorMessage.php");
require_once("common/Constant.php");
require_once("models/AccountModel.php");
$accountModel = new AccountModel();
class AccountController
{				
	function ShowLogin()
	{
		//views
		$view = "views/account/login.php";
		require_once(VIEW_CONTENT);	
	}
	
	function ShowSignUp()
	{
		//views
		$view = "views/account/sign_up.php";
		require_once(VIEW_CONTENT);	
	}

	function IsEmptyUsernameAndPassword($username, $password){
		//Trường hợp chưa nhập tên đăng nhập, báo lỗi
		// 2.2.a.3
		empty(trim($username))?setMessage(ERR101_LOGIN_USER):$username=trim($username);
		
		//Trường hợp chưa nhập mật khẩu, báo lỗi
		// 2.2.a.4
		empty(trim($password))?setMessage(ERR102_LOGIN_PASSWORD):$password=trim($password);

		return (!empty(trim($_POST[USERNAME])) && !empty(trim($_POST[PASSWORD])))?true:false;
	}

	function ShowPanelAccount()
	{	
		$accountModel = new AccountModel();

		$username = $_POST[USERNAME];
		$password = $_POST[PASSWORD];
		
		if(!isset($_SESSION[USER])){	
			
			// if username and password not empty
			if(IsEmptyUsernameAndPassword($username,$password)){
				
				$isUsername = $accountModel->GetUserByUsername($username);
				// Trường hợp giá trị không tồn tại trong table nguoi_dung
				// 2.2.a.1
				if(!$isUsername){
					setMessage(ERR103_USER_404);
				}
				else{
					$user = $accountModel->GetUserByUsernameAndPassword($username,$password);
					if($user)
					{
						$_SESSION[USER] = $user->ten_dang_nhap;
						//views
						$view = "views/account/panel_account.php";
						require_once(VIEW_CONTENT);
					}
					else
					{
						//Trường hợp giá trị nhập sai mật khẩu
						//2.2.a.2
						setMessage(ERR104_PASSWORD_FAILD);
					}
				}
			}
		}
		else
		{
			//view
			$view = "views/account/panel_account.php";
			require_once(VIEW_CONTENT);	
		}
	}

	//add user
	function AddUser(){
		$accountModel = new AccountModel();

		$username = $_POST['username']; 
		$password = md5($_POST['password']); 
		$name = $_POST['name'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$date = $_POST['date'];
		$gender = $_POST['gender'];
		$idUser = $accountModel->GetLastId();
		$user[] = array($idUser,2,$name,$username,$password,$address,$email,$phone,$gender,$date);
		$result = $accountModel->AddUser($user);
	
		$this->ShowLogin();

		if($result){
			SetMessage("Đăng ký thành công");
		}else{
			SetMessage("Đăng ký thất bại");
		}
		
	}

	function UpdateAccount(){
		$accountModel = new AccountModel();

		$username = $_POST['username']; 
		$password = $_POST['password']; 
		$name = $_POST['name'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$date = $_POST['date'];
		$gender = $_POST['gender'];
		
		if($user->password == $password){
			$user[] = array($name,$password,$gender,$email,$phone,$address,$date,$username);
		}else{
			$user[] = array($name,md5($password),$gender,$email,$phone,$address,$date,$username);
		}
		
		$result = $accountModel->UpdateUser($user, $username, $password);
		
		if($result){
			SetMessage("Cập nhật thành công");
		}else{
			SetMessage("Cập nhật thất bại");
		}

		SetLocaltion("account.php");
	}

	function LogOut()
	{
		unset($_SESSION[USER]);
		SetLocaltion("account.php");
	}
}
?>