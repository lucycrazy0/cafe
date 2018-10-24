<?php 
	require_once("database.php");

	class AccountModel extends database
	{
		//get user by user name 
		public function GetUserByUsername($username)
		{
			$sql = "select * from nguoi_dung where ten_dang_nhap=?";
			$this->setQuery($sql);
			return $this->loadRow(array($username));
		}

		//get user by username and password
		public function GetUserByUsernameAndPassword($username,$password)
		{
			$sql = "select * from nguoi_dung where ten_dang_nhap=? and mat_khau=?";
			$this->setQuery($sql);
			return $this->loadRow(array($username,md5($password)));
		}

		//add custimer
		public function AddCustomer($user)
		{
			$sql = "insert into khach_hang values(?,?,?,?,?)";
			$this->setQuery($sql);
			$param = $user;
			$result = $this->execute($param);
			 if($result){
				return $this->getLastId();  //If query execute successful, the system will return lastID in table khach_hang
			 }else{
				return false;
			 }
		}

		//add user		
		public function AddUser($user)
		{	
			
			$sql = "insert into nguoi_dung values(?,?,?,?,?,?,?,?,?,?)";
			$this->setQuery($sql);
			$param = $user;
			$result = $this->execute($param);
			if($result){
				return $this->getLastId();  //If query execute successful, the system will return lastID in table khach_hang
			}else{
				return false;
			}
		}

		//update active for user by username
		public function UpdateActiveByUsername($username)
		{
			$sql = "update nguoi_dung set active=? where ten_dang_nhap=?";
			$this->setQuery($sql);
			$param = array(1,$username);
			$result = $this->execute($param);
			
			if($result){
				return $this->getLastId();
			} else{
				return false;	
			}
		}

		//update information for user
		public function UpdateUser($userParamter, $username)
		{
			
			$sql = "update nguoi_dung set ten=?, mat_khau=?, gioi_tinh=?, email=?, so_dien_thoai=?, dia_chi=?, date=? 
					where ten_dang_nhap=?";
			$this->setQuery($sql);
			$param = $userParamter;
			$result = $this->execute($param);
			if($result) {
				return $this->getLastId();
			}else{
				return false;
			}
		}

		//get user DESC
		public function User()
		{
			$sql = "SELECT * FROM nguoi_dung order by ma_nguoi_dung DESC limit 0,1";
			$this->setQuery($sql);
			return $this->loadRow();
		}

		//get customer DESC
		public function Customer()
		{
			$sql = "SELECT * FROM khach_hang order by ma_khach_hang DESC limit 0,1";
			$this->setQuery($sql);
			return $this->loadRow();
		}

		//get last id of user and customer
		public function GetLastId()
		{
			$id_nd = $this->User();
			$id_kh = $this->Customer();
			if($id_kh->ma_khach_hang > $id_nd->ma_nguoi_dung){
				return $id_kh->ma_khach_hang+1;
			}else{
				return $id_nd->ma_nguoi_dung+1;
			}
		}
	}
?>