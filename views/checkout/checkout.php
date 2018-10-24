<!-- Page Title -->
<div class="page-title bg-dark dark">
    <!-- BG Image -->
    <div class="bg-image bg-parallax"><img src="public/layout/assets/img/photos/bg-croissant.jpg" alt=""></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 push-lg-4">
                <h2 class="mb-0">THANH TOÁN GIỎ HÀNG</h2>
                <h4 class="text-muted mb-0"></h4>
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
                    <div class="bg-dark dark p-4"><h5 class="mb-0">Giỏ hàng</h5></div>
                    <table class="table-cart">
                    <?php if(isset($_SESSION['gio_hang_mon_an']) && isset($_SESSION['so_luong'])){foreach($_SESSION['gio_hang_mon_an'] as $san_pham_gh){ ?>
                        <tr>
                            <td class="title">
                                <span class="name"><?php echo $san_pham_gh->ten_san_pham; ?></span>
                                <!-- <span class="caption text-muted"><?php echo $san_pham_gh->mo_ta_chi_tiet; ?></span> -->
                            </td>
                            <td class="price" align="center"><input type="text" value="<?php echo $san_pham_gh->so_luong ?>" id="soluonggiohang<?php echo $san_pham_gh->ma_san_pham ?>" name="soluonggiohang<?php $san_pham_gh->ma_san_pham ?>" size="2" readonly="readonly" style="text-align:center"/></td>
                            <td class="price"><?php echo number_format($san_pham_gh->gia); ?></td>
                        </tr>
                    <?php }}?>
                    </table>
                    <div class="cart-summary">
                        <div class="row text-md">
                            <div class="col-7 text-right text-muted">Tổng tiền:</div>
                            <div class="col-5"><strong><?php echo number_format($_SESSION['thanh_tien']); ?></strong></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 pull-xl-4 col-lg-7 pull-lg-5">
                <div class="bg-white p-4 p-md-5 mb-4">
                <?php if(!isset($_SESSION[USER])){ 
					echo '<h4 class="border-bottom pb-4"><i class="ti ti-user mr-3 text-primary"></i>ĐĂNG NHẬP & ĐĂNG KÝ</h4>
							<form action="account.php" method="post">
								<div class="row">
									<div style="margin-left: 10px"><input type="submit" value="ĐĂNG NHẬP" name="login_checkout" class="btn btn-primary" style="width:150px" /></div>
									<div style="margin-bottom: 10px; margin-left: 10px"><input type="submit" value="ĐĂNG KÝ " name="signup" class="btn btn-secondary" style="width:150px"></div>			
								</div>
							  </form>';
				}
				?>
					<form action="checkout.php" method="post" >
                    <?php if(!isset($_SESSION[USER])) {
						echo '<h4 class="border-bottom pb-4 mt-3"><i class="ti ti-user mr-3 text-primary"></i>THÔNG TIN MUA HÀNG</h4>
								 <div class="row mb-5">
								<div class="form-group col-sm-6">
									<label>Tên:</label>
									<input type="text" name="name" class="form-control">
								</div>
								<div class="form-group col-sm-6">
									<label>Số điện thoại:</label>
									<input name="phone" class="form-control">
								</div>
								<div class="form-group col-sm-6">
									<label>E-mail:</label>
									<input type="email" name="email" class="form-control">
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Giới tính:</label>
										<div class="row">
											<div style="margin:20px 20px 20px 20px">Man: <input type="radio" name="gender" value="0" checked required></td></div>
											<div style="margin:20px 20px 30px 30px">Woman: <input type="radio" name="gender" value="1" required></div>
										</div>
									</div>
								</div>
							</div>';	
					}
					?>

                        <h4 class="border-bottom pb-4"><i class="ti ti-package mr-3 text-primary"></i>CHỌN BÀN</h4>
                        <div class="row mb-5">
                            <div class="form-group col-sm-6">
                                <!--<label>Delivery time:</label> -->
                                <div class="select-container">
                                    <select name="number_table" class="form-control">
                                        <option value="chon_ban">Chọn bàn</option>
                                        <?php if(isset($tables)){ foreach($tables as $table) {?>
                                        		<option ="<?php echo $table->ma_ban;?>"><?php echo $table->ten_ban;?></option>
                                        <?php }}?>
                                    </select>
                                </div>
                            </div>
                        </div>
                         <?php if(isset($_SESSION[USER])){
							 $user = $accountModel->GetUserByUsername($_SESSION[USER]); 
							echo '<h4 class="border-bottom pb-4"><i class="ti ti-notepad mr-3 text-primary"></i>ĐỊA CHỈ NHẬN HÀNG</h4>
							<div class="row mb-5">
								<div class="form-group col-sm-6">
									<!--<label>Delivery time:</label> -->
									<div class="select-container">
										<select name="address_shipping" class="form-control">
											<option value="chon_dia_chi">Chọn địa chỉ</option>
											<option value="'."$user->dia_chi".'">'."$user->dia_chi".'</option>
										</select>
									</div>
								</div>
								
								<div class="form-group col-sm-6">
								    <input type="text" name="new_address" class="form-control" placeholder="Nhập địa chỉ mới ..." >
                                </div>
							</div>';
						 }?>
                        <h4 class="border-bottom pb-4"><i class="ti ti-wallet mr-3 text-primary"></i>HÌNH THỨC THANH TOÁN</h4>
                        <div class="row text-lg">
                            <div class="col-md-4 col-sm-6 form-group">
                                <label class="custom-control custom-radio">
                                    <input type="radio" name="payment_type" value="Tại cửa hàng" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Tại cửa hàng</span>
                                </label>
                            </div>
                            <?php if(isset($_SESSION[USER])){
                            	echo '<div class="col-md-4 col-sm-6 form-group">
                                <label class="custom-control custom-radio">
                                    <input type="radio" name="payment_type" value="Tại nhà" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Tại nhà</span>
                                </label>
                            </div>
                            <div class="col-md-4 col-sm-6 form-group">
                                <label class="custom-control custom-radio">
                                    <input type="radio" name="payment_type" value="Internet Banking" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Internet Banking</span>
                                </label>
                            </div>';
 						}?>
                        </div>
                        <div class="text-center">
                    		<input type="submit" value="MUA NGAY" name="order" class="btn btn-primary btn-lg" />
                		</div>
                 	</form>
                </div>
            </div>
        </div>
    </div>

</section>