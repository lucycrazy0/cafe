<?php 
	require_once("models/OrderModel.php");
	require_once("models/AccountModel.php");
	$accountModel = new AccountModel();
	$orderModel = new OrderModel();
	$user = $accountModel->GetUserByUsername($_SESSION[USER]);
	$orders = $orderModel->GetOrderByCustomer($user->ma_nguoi_dung);
?>
<!-- Page Title -->
<div class="page-title bg-dark dark">
    <!-- BG Image -->
    <div class="bg-image bg-parallax"><img src="public/layout/assets/img/photos/bg-croissant.jpg" alt=""></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 push-lg-4">
                <h2 class="mb-0">THÔNG TIN TÀI KHOẢN</h2>
                <h5 class="text-muted mb-0">Bạn có thể chỉnh sửa thông tin tài khoản của mình.</h5>
            </div>
        </div>
    </div>
</div>

<!-- Section -->
<section class="section bg-light">

    <div class="container">
        <div class="row">
            <div class="col-xl-4 push-xl-8 col-lg-5 push-lg-7">
                <div class="shadow bg-white stick-to-content mb-4">
                    <div class="bg-dark dark p-4"><h5 class="mb-0">HÓA ĐƠN</h5></div>
                    <table class="table-cart">
                    <?php if(isset($orders)){ foreach($orders as $order){ ?>
                        <tr>
                            <td class="title">
                                <span class="name"><a id="<?php echo $order->so_hoa_don;?>" data-toggle="modal" href="#productModalCTHD"><?php echo $order->ngay_hd; ?></a></span>
                            </td>
                            <td class="name text-center"><input type="text" value="<?php if($order->tinh_trang == 0){ echo "ĐANG CHẾ BIẾN"; }elseif($order->tinh_trang == 1){ echo "ĐÃ CHẾ BIẾN"; }elseif($order->tinh_trang == 2){ echo "CHUYỂN SẢN PHẨM"; }elseif($order->tinh_trang == 3){ echo "CHƯA THANH TOÁN"; }elseif($order->tinh_trang == 4){ echo "ĐÃ THANH TOÁN"; }elseif($order->tinh_trang == 5){ echo "CẬP NHẬT ĐH"; }elseif($order->tinh_trang == 6){ echo "HỦY"; }else{ echo "HOÀN TIỀN"; } ?>" size="11" readonly="readonly" style="text-align:center; font-size: small"/></td>
                            <td class="price"><?php echo number_format($order->tri_gia); ?>đ</td>
                        </tr>
                    <?php }
                }?>
                    </table>
                </div>
            </div>
            <div class="col-xl-8 pull-xl-4 col-lg-7 pull-lg-5">
            <form action="account.php" method="post">
                <div class="bg-white p-4 p-md-5 mb-4">
                    <h4 class="border-bottom pb-4"><em class="ti ti-user mr-3 text-primary"></em>THÔNG TIN</h4>
                    <div class="row mb-5">
                        <div class="form-group col-sm-6">
                            <label>Tên:</label>
                            <input type="text" name="name" value="<?php echo $user->ten; ?>" class="form-control" required="required">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Tên đăng nhập</label>
                            <input type="text" name="username" value="<?php echo $user->ten_dang_nhap; ?>" class="form-control" readonly="readonly">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" value="<?php echo $user->password; ?>" class="form-control" required="required">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Địa chỉ</label> 
                            <input type="text" name="address" value="<?php echo $user->dia_chi; ?>" class="form-control" required="required">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Email</label>
                            <input type="email" name="email" value="<?php echo $user->email; ?>"class="form-control" required="required">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" value="<?php echo $user->so_dien_thoai; ?>"class="form-control" required="required">
                        </div>
                        <div class="form-group col-sm-6">
                        	<label>Giới tính</label>
                            <div class="row text-center">
                                <div style="margin:20px 20px 20px 20px">Nam: <input type="radio" name="gender" value="0" <?php if($user->gioi_tinh == 0){ echo "checked"; }?> /></div>
                                <div style="margin:20px 20px 30px 30px">Nữ: <input type="radio" name="gender" value="1" <?php if($user->gioi_tinh == 1){ echo "checked"; }?> /></div>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Ngày sinh</label>
                            <input type="date" name="date" value="<?php echo $user->date; ?>" class="form-control" required="required">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary btn-lg" name="update_account" value="CẬP NHẬT"/>
                </div>
            </form>
            </div>
        </div>
    </div>

</section>