<?php include("head.php"); ?>
<?php include("header.php"); ?>

<div id="content">

<?php 
	// if have view then show
	if(isset($view)){
		include ($view);
	}
?>

<?php include("footer.php"); ?>

</div>
<!-- Content / End -->
<?php include("panel_cart.php"); ?>
<?php include("product.php"); ?>