<!-- Page Title -->
<div class="page-title bg-light">
<div class="container">
<div class="row">
<div class="col-lg-8 push-lg-4">
    <h2 class="mb-0">DANH SÁCH THỰC ĐƠN</h2>
    <h5 class="text-muted mb-0 mt-1">Mang đến cho các bạn trải nghiệm tuyệt vời nhất</h5>
</div>
</div>
</div>
</div>

<!-- Page Content -->
<div class="page-content">
<div class="container">
<div class="row no-gutters">
<div class="col-md-3">
    <!-- Menu Navigation -->
    <nav id="menu-navigation" class="stick-to-content" data-local-scroll>
        <ul class="nav nav-menu bg-dark dark">
        <?php foreach($categorys as $category){?>
            <li><a href="#<?php echo $category->ma_loai;?>"><?php echo $category->ten_loai;?></a></li>
       	<?php }?>
        </ul>
    </nav>
</div>
<div class="col-md-9">
	<?php foreach($categorys as $category){?>
    <!-- Menu Category / Burgers -->
    <div id="<?php echo $category->ma_loai;?>" class="menu-category">
        <div class="menu-category-title">
            <div class="bg-image"><img src="public/layout/assets/img/photos/<?php echo $category->hinh_loai; ?>" alt=""></div>
            <h2 class="title"><?php echo $category->ten_loai; ?></h2>
        </div>
        <div class="menu-category-content">
        <?php $products = $productModel->ShowProductByIdCategory($category->ma_loai);
			  foreach($products as $product){ 
			  
		?>
            <!-- Menu Item -->
            <div class="menu-item menu-list-item">
                <div class="row align-items-center">
                    <div class="col-sm-6 mb-2 mb-sm-0">
                        <h6 class="mb-0" style="text-transform:capitalize" ><a class="masp" id="<?php echo $product->ma_san_pham;?>" data-toggle="modal" href="#productModal"><?php echo $product->ten_san_pham;?></a></h6>
                        <span class="text-muted text-sm"><?php echo $product->mo_ta_tom_tat;?></span>
                    </div>
                    <div class="col-sm-6 text-sm-right">
                        <span class="text-md mr-4"><span class="text-muted">Giá</span> <?php echo number_format($product->gia);?>đ</span>
                        <input type="hidden" id="dongia<?php echo $product->ma_san_pham;?>" value="<?php echo $product->gia;?>"/>
       					<input type="hidden" value="1" id="soluong<?php echo $product->ma_san_pham;?>"/>
                        <button class="btn btn-outline-secondary btn-sm mua" href="javascript:void(0)" id="<?php echo $product->ma_san_pham; ?>"><span>THÊM GIỎ HÀNG</span></button>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
    <?php }?>
</div>
</div>
</div>
</div>