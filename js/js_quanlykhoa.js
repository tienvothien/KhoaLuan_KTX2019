$(document).ready(function () {
	// Xem chi tiet thoong tin khoa
	$(document).on('click', '.view_chitietkhoa', function(){
           var id_chitietkhoa = $(this).attr("id");
           if(id_chitietkhoa != '')
           {
                $.ajax({
                     url:"./../dulieu/select.php",
                     method:"POST",
                     data:{id_chitietkhoa:id_chitietkhoa},
                     success:function(data){
                          $('#thongtin_chitietkhoa').html(data);
                          $('#dataModal').modal('show');
                     }
                });
           }
      });
	// sửa thông tin khoa
	$(document).on('click', '.id_sua_khoa', function(){
           var id_khoa_sua = $(this).attr("id");
           // alert(id_khoa_sua);
           $.ajax({
                url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_khoa_sua:id_khoa_sua},
                dataType:"json",
                success:function(data_suakhoa){
                    $('#ma_khoa_sua123').val(data_suakhoa.ma_khoa);
                    $('#ten_khoasua_12').val(data_suakhoa.ten_khoa);
                    $('#id_khoa_sua_12').val(data_suakhoa.id_khoa);
                    $('#insert').val("Cập nhật");
                    $('#modal_sua_khoa').modal('show');
                }
           });
      });
	// xử lý khi bấn nút cập nhật lại thông tin khoa
	// cap nhat tt thiết bi
      	$('#from_suathongtin_khoa').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
	        	if($('#ma_khoa_sua123').val().length==4){
		          	$.ajax({
						url:"./../dulieu/insert.php",
						method:"POST",
						data:$('#from_suathongtin_khoa').serialize(),
						success:function(kq_capnhat_thongtin_khoa){
							if(kq_capnhat_thongtin_khoa==1){
								alert('Mã Khoa hoặc tên khoa đã tồn tại');
								document.getElementById(ma_khoa_them).focus();
							}else {
								if (kq_capnhat_thongtin_khoa==99) {
									alert('Cập nhật thông tin Khoa thành công');
									$('#from_suathongtin_khoa')[0].reset();
	                                $('#modal_sua_khoa').modal('hide');
	                                $('#dulieukhoa').load("./../dulieu/dulieukhoasv.php")
								}else {
									alert('Lỗi cập nhật');
								}
							}
	                    }
					});
				}else {
					alert('Độ dài Mã Khoa không đúng');
					document.getElementById("ma_khoa_sua123").focus();
				}
         	}   
      	});
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
