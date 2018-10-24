$(document).ready(function() {	
	$('.masp').click(function() {
		var $key=$(this).attr("id");
		var form_data = {
				id    : $key
		};
		$.ajax({
			url:"chi_tiet_san_pham.php",
			type: 'POST',
			async : false,
			data: form_data,
			dataType: 'json',
			success: function(data){
				$('.modal-dialog').html(data['tensp']);
				$('#productModal').modal('show');                 
			},
			error: function(error){
				alert(error.statusText)	
			}
		});
		return false;
	}); //click
}); // ready