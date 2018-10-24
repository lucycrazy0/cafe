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
                        url:"xoa_gio_hang.php",
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
			
			/*$(document).ready(function() {
            $('.btnXoa').click(function() {

			
			var $key=$(this).attr("id");
            
            var $dongiainput="#dongia"+$key;
            var $dongia=$($dongiainput).val();

            var form_data = {
                id    : $key,
                dongia  : $dongia,
                };
			alert($key);
			alert($dongia);
			$.ajax({
                    url:"xoa_gio_hang.php",
                    type: 'POST',
                    async : false,
                    data: form_data,
                    dataType: 'json',
                	success: function(data){                   
                   		alert("ÄĂ£ xĂ³a");                  
                	},
					error: function(error){
						alert(error.statusText)	
					}
            });
            return false;
            }); //click         
            }); // ready
  //Äá»‹nh dáº¡ng sá»‘
    function formatCurrency(num) 
    {
       var num = num.toString().replace(/\$|\,/g,'');
       if(isNaN(num))
       num = "0";
       sign = (num == (num = Math.abs(num)));
       num = Math.floor(num*100+0.50000000001);
       num = Math.floor(num/100).toString();
       for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
       num = num.substring(0,num.length-(4*i+3))+','+
       num.substring(num.length-(4*i+3));
       return (((sign)?'':'-') + num);
    }*/