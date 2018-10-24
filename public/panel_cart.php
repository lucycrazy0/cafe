<?php 
	@session_start();
    require_once("controllers/CartController.php");
    require_once("common/Constant.php");

	$cartController = new CartController();
	$cartController->ShowCart();
	$priceProduct = 0;
?>

<!-- Panel Cart -->
<div id="panel-cart">
<div class="panel-cart-container">
    <div class="panel-cart-title">
        <h5 class="title">GIỎ HÀNG</h5>
        <button class="close" data-toggle="panel-cart"><i class="ti ti-close"></i></button>
    </div>
    <div class="panel-cart-content">
        <table class="table-cart">
            <?php if(isset($_SESSION[PRODUCT_IN_CART]) && isset($_SESSION[SO_LUONG])){
                foreach($_SESSION[PRODUCT_IN_CART] as $productCart){ 
            ?>
            <tr>
                <td class="title">
                    <span class="name"><?php echo $productCart->ten_san_pham; ?></span>
                    <!-- <span class="caption text-muted"><?php echo $productCart->mo_ta_chi_tiet; ?></span> -->
                </td>
                <td class="price"><?php echo number_format($productCart->gia); ?>đ</td>
                <td class="price"><input type="text" value="<?php echo $productCart->so_luong ?>" id="soluonggiohang<?php echo $productCart->ma_san_pham ?>" name="soluonggiohang<?php $productCart->ma_san_pham ?>" size="4"/></td>
                <td class="actions">
                	<input type="hidden" id="dongiagiohang<?php echo $productCart->ma_san_pham; ?>" value="<?php echo $productCart->gia ?>" name="dongiagiohang<?php echo $productCart->ma_san_pham ?>"/>
                  	<input type="hidden" value="<?php $priceProduct += $productCart->so_luong*$productCart->gia ?>" />
                    <a class="action-icon btnCN" href="javascript:void(0)" id="<?php echo $productCart->ma_san_pham;?>"><i class="ti ti-pencil"></i></a>
                    <a class="action-icon btnxoa" href="javascript:void(0)" id="<?php echo $productCart->ma_san_pham;?>"><i class="ti ti-close"></i></a>
                </td>
            </tr>
        <?php }}else{ echo '<center>Bạn chưa chọn sản phẩm</center>';}?>
        </table>
        <?php if(isset($_SESSION[PRODUCT_IN_CART]) && isset($_SESSION[SO_LUONG])){ $tien = number_format($priceProduct);?>
        <?php echo '<div class="cart-summary">
            <div class="row text-lg">
                <div class="col-7 text-right text-muted">Tổng tiền:</div>
                <div class="col-5"><strong>'.$tien.'đ</strong></div>
            </div>;
        </div>' ?> 
        <?php }?>
    </div>
</div>
<a href="checkout.php" class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>THANH TOÁN</span></a>
</div>

<!-- Panel Mobile -->
<nav id="panel-mobile">
<div class="module module-logo bg-dark dark">
    <a href="#">
        <img src="assets/img/logo-light.svg" alt="" width="88">
    </a>
    <button class="close" data-toggle="panel-mobile"><i class="ti ti-close"></i></button>
</div>
<nav class="module module-navigation"></nav>
<div class="module module-social">
    <h6 class="text-sm mb-3">Follow Us!</h6>
    <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
    <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
    <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
    <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
    <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
</div>
</nav>

<!-- Body Overlay -->
<div id="body-overlay"></div>