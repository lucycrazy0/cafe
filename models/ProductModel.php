<?php 
	require_once("database.php");
	class ProductModel extends database
	{
		function ShowProductByIdCategory($idCategory)
		{
			$sql = "SELECT * FROM san_pham where ma_loai=?";
			$this->setQuery($sql);
			return $this->loadAllRows(array($idCategory));	
		}
		function GetProductInCart($string)
        {
            $sql = "Select * from san_pham where ma_san_pham in($string)";
			$this->setQuery($sql);
			return $this->loadAllRows();
        }
		function GetProductByIdProduct($idProduct)
		{
			$sql = "select * from san_pham where ma_san_pham=?";
			$this->setQuery($sql);
			return $this->loadRow(array($idProduct));	
		}
		function ShowProductCategory()
		{
			$sql ="Select * from loai_san_pham";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}
		function ShowTable()
		{
			$sql ="Select * from ban";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}
	}
?>