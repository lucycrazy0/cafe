<?php
	require_once("database.php");
	class OrderModel extends database
	{
		public function AddOrder($order) 
		{
            $query = "INSERT INTO hoa_don VALUES(?,?,?,?,?,?,?,?)";
            $this->setQuery($query);
            $result = $this->execute($order);
            if($result){
                return $this->getLastId();
            } 
            else{
                return false;
            }
        }
		public function AddDetailOrder($detailOrder) {
            $query = "INSERT INTO ct_hoa_don VALUES(?,?,?,?,?)";
            $this->setQuery($query);
            $result = $this->execute($detailOrder);
            if($result){
                return $this->getLastId();
            } 
            else{
                return false;
            }
        }
		public function GetDetailOrder($idOrder){
			$sql ="select sp.ten_san_pham, sp.hinh, sp.gia,ct.so_luong
				   from san_pham sp,ct_hoa_don ct,hoa_don hd
				   where sp.ma_san_pham = ct.ma_san_pham and ct.so_hoa_don = hd.so_hoa_don and hd.so_hoa_don = ? ";
            $this->setQuery($sql);
            return $this->loadAllRows(array($idOrder));
        }
		public function GetOrderByCustomer($key)
        {
            $query = "select hd.ngay_hd, hd.thoi_gian, hd.tri_gia, hd.so_hoa_don, hd.tinh_trang 
                      from nguoi_dung nd, hoa_don hd 
                      where nd.ma_nguoi_dung = hd.ma_khach_hang and nd.ma_nguoi_dung=?";
            $this->setQuery($query);
            return $this->loadAllRows(array($key));
        }	
	}
?>