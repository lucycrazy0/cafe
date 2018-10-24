<!-- Section -->
<section class="section section-lg bg-dark">

<!-- Video BG -->
<div class="bg-video" data-property="{videoURL:'https://youtu.be/t4gN-iqeY0E', showControls: false, containment:'self',startAt:1,stopAt:39,mute:true,autoPlay:true,loop:true,opacity:0.8,quality:'hd1080'}"></div>
<div class="bg-image bg-video-placeholder zooming"><img src="public/layout/assets/img/photos/bg-restaurant.jpg" alt=""></div>

<div class="container">
    <div class="row">
        <div class="col-lg-6 push-lg-3">
            <!-- Book a Table -->
            <div class="utility-box">
                <div class="utility-box-title bg-dark dark">
                    <div class="bg-image"><img src="public/layout/assets/img/photos/modal-review.jpg" alt=""></div>
                    <div>
                        <span class="icon icon-primary"><em class="ti ti-bookmark-alt"></em></span>
                        <h4 class="mb-0 mt-3">ĐĂNG KÝ</h4>
                        <p class="lead text-muted mb-0">Hãy điền đầy đủ các thông tin của bạn bên dưới.</p>
                    </div>
                </div>
                <form action="account.php" method="post">
                    <div class="utility-box-content">
                        <div class="form-group">
                            <label>Tên đăng nhập:</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tên:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ:</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>E-mail:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại:</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ngày sinh:</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Giới tính:</label>
                                    <div class="row">
                                    	<div style="margin:20px 20px 20px 20px">Nam: <input type="radio" name="gender" value="0" checked required></td></div>
                                    	<div style="margin:20px 20px 30px 30px">Nữ: <input type="radio" name="gender" value="1" required></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <center><input  class="btn btn-warning btn-custom" value="ĐĂNG KÝ" name="sign_up" type="submit" /></center>
                </form>
            </div>
        </div>
    </div>
</div>
        
</section>