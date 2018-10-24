<?php
    @session_start();
    require_once("common/Constant.php");
    require_once('models/ProductModel.php');
    
	class CartController
	{
        // show cart
        function ShowCart()
        {
            $cart = $this->GetCart();
            if($cart) //Nếu có giỏ hàng 
            {
                $productInCart=array();
                foreach($cart as $key => $value)
                {
                        $productInCart[$key]=$value;
                }

                if($productInCart) //Nếu có chọn món
                {
                    $_SESSION[PRODUCT_IN_CART]=$this->GetProductInCart($productInCart);
                }
            }
        }

        // get cart
		function GetCart()
		{
            return isset($_SESSION[GIO_HANG])?$_SESSION[GIO_HANG]:false;
		}

		function GetProductInCart($listProduct)
        {
            $listIdProduct=array();

            foreach($listProduct as $key=>$value)
            {
                $listIdProduct[]=$key;
            }

            $listIdProduct=implode(",",$listIdProduct);

            $productModel = new ProductModel();
            $listProductNew = $productModel->GetProductInCart($listIdProduct);
            $listProductInCart = array(); //Ðua số lượng vào $ds_mon_an listProductInCart
            foreach($listProductNew as $item)
            {
                $item->so_luong=$listProduct[$item->ma_san_pham];
                $listProductInCart[]=$item;
            }
            return $listProductInCart;
        }

        //add product in cart
        function AddProductInCart($idProduct, $number, $price) {
            if($number > 0) {

				if(isset($_SESSION[GIO_HANG][$idProduct])) {
                    $_SESSION[THANH_TIEN] -= @$_SESSION[GIO_HANG][$idProduct]*$price;
                    $_SESSION[SO_LUONG] -= @$_SESSION[GIO_HANG][$idProduct];
                }

				$_SESSION[GIO_HANG][$idProduct] = $number;

                if(isset($_SESSION[THANH_TIEN]))
                {
                    $_SESSION[THANH_TIEN]= @$_SESSION[THANH_TIEN]+$number*$price;
                    $_SESSION[SO_LUONG] = @$_SESSION[SO_LUONG]+$number;
                }
                else
                {
                    $_SESSION[THANH_TIEN] = $number*$price;
                    $_SESSION[SO_LUONG] = $number;
                }

			}
            elseif($number == 0)
            {
                DeleteProductInCart($idProduct, $price);
            }
        }

        //delete product in cart
        function DeleteProductInCart($idProduct, $price) {
            $cart = $this->GetCart();
            $cartNew = array();

    		foreach($cart as $key => $value)
    		{
                if($key != $idProduct)
                {
    				$cartNew[$key] = $value;
                }
    			else
                {
                    $_SESSION[THANH_TIEN]-=$cart[$idProduct]*$price;
                    $_SESSION[SO_LUONG]-=$cart[$idProduct];
                }
            }
            
            // update cart new 
            !empty($cartNew)?$_SESSION[GIO_HANG]=$cartNew:$this->DeleteCart();
        }

        //delete cart
        function DeleteCart() {
            unset($_SESSION[GIO_HANG]);
            unset($_SESSION[THANH_TIEN]);
            unset($_SESSION[SO_LUONG]);
        }

        // get money
        function Money() {
            return isset($_SESSION[THANH_TIEN])?$_SESSION[THANH_TIEN]:0;
        }

        // get number product
        function NumberProduct() {
            return isset($_SESSION[SO_LUONG])?$_SESSION[SO_LUONG]:0;
        }

        // get total product
        function TotalProduct() {
            return isset($_SESSION[SO_LUONG])?$_SESSION[SO_LUONG]:0;
        }

        // update cart
        function UpdateCart($idProduct,$number,$price) {
            if(!is_numeric($number)){
                return false;
            }
            
            $number = (int) $number;
            
            if($number > 0)
			{

				$_SESSION[THANH_TIEN] -= @$_SESSION[GIO_HANG][$idProduct]*$price;
				$_SESSION[THANH_TIEN] += $number*$price;

				$_SESSION[SO_LUONG] -= @$_SESSION[GIO_HANG][$idProduct];
				$_SESSION[SO_LUONG] += $number;

				$_SESSION[GIO_HANG][$idProduct] = $number;

    			return false;
            }
            
            if($number == 0)
            {
                $this->DeleteProductInCart($idProduct, $price);
            }

            return false;
        }
	}
?>