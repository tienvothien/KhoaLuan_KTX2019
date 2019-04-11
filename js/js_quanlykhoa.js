$(document).ready(function () {
	// xuwrt lý nút thêm khoa mới
	$('#form_themkhoamoi').on('submit', function(event){
          event.preventDefault();
          var ma_khoa_them = $('#ma_khoa_them').val();
          var ten_khoa_them = $('#ten_khoa_them').val();
          if(ma_khoa_them.length==4){

          $.ajax({
          	url: './../dulieu/add_khoamoi.php',
          	type: 'POST',
          	data: {ma_khoa_them:ma_khoa_them,
          		ten_khoa_them:ten_khoa_them
          	},
          	success:function (kql_add_khoa) {
          		if (kql_add_khoa==1) {
          			alert('Mã khoa đã tồn tạo');
					document.getElementById("ma_khoa_them").focus();
          		}else {
          			if (kql_add_khoa==2) {
          				alert('Tên khoa đã tồn tại');
          				document.getElementById("ten_khoa_them").focus();
          			}else {
          				if (kql_add_khoa==99) {
          					alert('Thêm khoa mới thành công');
          					$('#ma_khoa_them').html();
          					$('#ten_khoa_them').html();
          					$('#dulieukhoa').load("./../dulieu/dulieukhoasv.php");
          				}else {
          					alert('Lỗi Thêm');
          				}
          			}
          		}
         	}
          
          });
      }else {
      	alert("Độ dài mã khoa không đúng");
		document.getElementById("ma_khoa_them").focus();

      }
          
      });
});
