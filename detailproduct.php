<?php
	@session_start();
	require_once("models/ProductModel.php");
	//model product
	$productModel = new ProductModel();
	if(isset($_POST['id']))
	{
		$product = $productModel->GetProductByIdProduct($_POST['id']);
		$price = number_format($product->gia);
		$kq = '
				<div class="modal-content">
				<div class="modal-header modal-header-lg dark bg-dark">
					<div class="bg-image"><img src="public/layout/assets/img/photos/'."$product->hinh".'" alt=""></div>
					<h4 class="modal-title" style="text-transform:capitalize">'."$product->ten_san_pham".'</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
				</div>
				<div class="modal-product-details">
					<div class="row align-items-center">
						<div class="col-9">
							<h6 class="mb-0">Mô tả chi tiết</h6>
							<span class="text-muted">'."$product->mo_ta_chi_tiet".'</span>
						</div>
						<div class="col-3 text-lg text-right">'."$price".'đ</div>
					</div>
				</div>
				<div class="modal-body panel-details-container">
				<div tyle="height:300px"><img src="public/layout/assets/img/photos/'."$product->hinh".'" alt=""></div>
				</div>
			</div>';
		$arrCart = array('tensp'=>$kq); 
		echo json_encode($arrCart);	
	}
?>
