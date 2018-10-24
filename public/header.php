<!-- Header -->
<header id="header" class="light">

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <!-- Logo -->
            <div class="module module-logo light">
                <a href="index.php">
                    <img src="public/layout/assets/img/logo-dark.svg" alt="" width="88">
                </a>
            </div>
        </div>
        <div class="col-md-7">
            <!-- Navigation -->
            <nav class="module module-navigation left mr-4">
                <ul id="nav-main" class="nav nav-main">
                    <li><a href="index.php">TRANG CHỦ</a></li>
                    <li class="has-dropdown">
                        <a href="#">TÀI KHOẢN</a>
                        <div class="dropdown-container">
                            <ul class="dropdown-mega">
                                <?php 
                                    if(isset($_SESSION['ten_dang_nhap']))
                                    {
                                        echo '<li><a href="account.php?logout">THOÁT</a></li>';
                                    }
                                    else
                                    {
                                        echo '<li><a href="account.php">ĐĂNG NHẬP & ĐĂNG KÝ</a></li>';
                                    }
                                ?>
                            	
                            </ul>
                        </div>
                    </li>
                    <!--<li><a href="account.php">Login</a></li> -->
                </ul>
            </nav>
            <div class="module left">
                <a href="menu.php" class="btn btn-outline-secondary"><span>Menu</span></a>
            </div>
        </div>	
        <div class="col-md-2">
        	<a href="account.php" class="module module-cart left" style="margin:3px 0">
                <span class="cart-icon">
                     <i class="ti ti-user"></i>
                </span>
            </a>
            <a href="#" class="module module-cart right" data-toggle="panel-cart">
                <span class="cart-icon">
                    <i class="ti ti-shopping-cart"></i>
                    <span class="notification soluong"><?php if(isset($_SESSION['so_luong'])){ echo $_SESSION['so_luong'];} else{ echo 0; }?></span>
                </span>
                <span class="cart-value"><?php if(isset($_SESSION['thanh_tien'])){ echo number_format($_SESSION['thanh_tien']); }else{ echo 0; }?></span>
            </a>
        </div>
    </div>
</div>

</header>
<!-- Header / End -->

<!-- Header -->
<header id="header-mobile" class="light">

<div class="module module-nav-toggle">
    <a href="#" id="nav-toggle" data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
</div>    

<div class="module module-logo">
    <a href="index.html">
        <img src="public/layout/public/layout/assets/img/logo-horizontal-dark.svg" alt="">
    </a>
</div>

<a href="#" class="module module-cart" data-toggle="panel-cart">
    <i class="ti ti-shopping-cart"></i>
    <span class="notification">2</span>
</a>

</header>
<!-- Header / End -->