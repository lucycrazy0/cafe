    $(document).ready(function() {
            $('.btnxoa').click(function() {
                var kq = confirm("Bạn thật sự muốn xóa khỏi giỏ hàng");
                if(kq == true)
                {
                    var $key=$(this).attr("id");
                    var $dongiainput="#dongiagiohang"+$key;
                    var $dongia=$($dongiainput).val();
        
                    var form_data = {
                            id    : $key,
                            dongia  : $dongia,
                        };
                    //alert($key);
                    //alert($dongia);
                    $.ajax({
                        url:"deletecart.php",
                        type: 'POST',
                        async : false,
                        data: form_data,
                        dataType: 'json',
                        success: function(data){                   
                            alert(data['kq'] + data['ma_san_pham']);
                            window.location="menu.php";                
                        },
                            error: function(error){
                            alert(error.statusText)	
                        }
                    });
                }
            }); //click         
    }); // ready