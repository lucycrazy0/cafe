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
                        <span class="icon icon-primary"><i class="ti ti-bookmark-alt"></i></span>
                        <h4 class="mb-0 mt-3">ĐĂNG NHẬP</h4>
                        <p class="lead text-muted mb-0">Hãy nhập đúng thông tin tài khoản. </p>
                    </div>
                </div>
                <form action="account.php" method="post">
                    <div class="utility-box-content">
                        <div class="form-group">
                            <label>Tên đăng nhập:</label>
                            <input type="text" name="username" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu:</label>
                            <input type="password" name="password" class="form-control" />
                        </div>
                    </div>
                    <center><input style="width:500px;height:70px;margin-bottom:20px" name="login" class="btn btn-warning" value="ĐĂNG NHẬP" type="submit" /></center>
                    <center><input style="width:500px;height:70px;margin-bottom:20px" name="signup" class="btn btn-secondary" value="ĐĂNG KÝ" type="submit" /></center>
                </form>
            </div>
        </div>
    </div>
</div>
        
</section>