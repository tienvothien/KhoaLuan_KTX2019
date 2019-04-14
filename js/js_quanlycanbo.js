$(document).ready(function () {
	// Xem chi tiet thoong tin can_bo
	$(document).on('click', '.view_chitietcan_bo', function(){
           var id_chitietcan_bo = $(this).attr("id");
           if(id_chitietcan_bo != '')
           {
                $.ajax({
                     url:"./../dulieu/select.php",
                     method:"POST",
                     data:{id_chitietcan_bo:id_chitietcan_bo},
                     success:function(data){
                          $('#thongtin_chitietcan_bo').html(data);
                          $('#dataModal').modal('show');
                     }
                });
           }
      });
	// sửa thông tin can_bo
	$(document).on('click', '.id_sua_can_bo', function(){
           var id_can_bo_sua = $(this).attr("id");
           // alert(id_can_bo_sua);
           $.ajax({
                url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_can_bo_sua:id_can_bo_sua},
                dataType:"json",
                success:function(data_suacan_bo){
                    $('#ma_can_bo_sua123').val(data_suacan_bo.ma_can_bo);
                    $('#ho_can_bosua_12').val(data_suacan_bo.ho_can_bo);
                    $('#ten_can_bosua_12').val(data_suacan_bo.ten_can_bo);
                    $('#dlgioitinhsua').val(data_suacan_bo.gioitinh);
                    $('#dlgioitinhsua').html(data_suacan_bo.gioitinh);
                    
                    $('#ngaysinh_can_bosua_12').val(data_suacan_bo.ngay_sinh);
                    $('#sdt_can_bosua_12').val(data_suacan_bo.sdt);
                    $('#email_can_bosua_12').val(data_suacan_bo.email);
                    $('#insert').val("Cập nhật");
                    $('#modal_sua_can_bo').modal('show');
                }
           });
      });
	// xử lý khi bấn nút cập nhật lại thông tin can_bo
	// cap nhat tt thiết bi
    $('#from_suathongtin_can_bo').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
	        	if($('#ma_can_bo_sua123').val().length==3){
		          	$.ajax({
						url:"./../dulieu/insert.php",
						method:"POST",
						data:$('#from_suathongtin_can_bo').serialize(),
						success:function(kq_capnhat_thongtin_can_bo){
							if(kq_capnhat_thongtin_can_bo==1){
								alert('Mã Chức vụ hoặc tên Chức vụ đã tồn tại');
								document.getElementById(ma_can_bo_sua123).focus();
							}else {
								if (kq_capnhat_thongtin_can_bo==99) {
									alert('Cập nhật thông tin Chức vụ thành công');
									$('#from_suathongtin_can_bo')[0].reset();
	                                $('#modal_sua_can_bo').modal('hide');
	                                $('#dulieucan_bo').load("./../dulieu/dulieucan_bo.php")
								}else {
									alert('Lỗi cập nhật');
								}
							}
	                    }
					});
				}else {
					alert('Độ dài Mã can_bo không đúng');
					document.getElementById("ma_can_bo_sua123").focus();
				}
         	}   
      	});
      // hiện thông tin xóa can_bo
	$(document).on('click', '.xoa_can_bo', function(){
           var id_can_bo_sua = $(this).attr("id");
           // alert(id_can_bo_sua);
           $.ajax({
                url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_can_bo_sua:id_can_bo_sua},
                dataType:"json",
                success:function(data_xoacan_bo){
                	$ten = data_xoacan_bo.ho_can_bo+' '+data_xoacan_bo.ten_can_bo;
                    $('#ma_can_bo_xoa123').val(data_xoacan_bo.ma_can_bo);
                    $('#ten_can_boxoa_12').val($ten);
                    $('#gioitinh_can_boxoa_12').val(data_xoacan_bo.gioitinh);
                    $('#ngaysinh_can_boxoa_12').val(data_xoacan_bo.ngay_sinh);
                    $('#id_can_bo_xoa_12').val(data_xoacan_bo.id_canbo);
                    $('#insert_xoa').val("Xóa");
                    $('#modal_xoa_can_bo').modal('show');
                }
           });
      });
	// xử lý xoa can_bo 
	$('#From_xoa_can_bo').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
	        	var id_xoa_can_bo123=($('#id_can_bo_xoa_12').val());
				$.ajax({
					url:"./../dulieu/insert.php",
					method:"POST",
					data:{id_xoa_can_bo123:id_xoa_can_bo123},
					success:function(kq_xoa_can_bo){
						if (kq_xoa_can_bo==99) {
							alert('Xóa Chức vụ công');
							$('#From_xoa_can_bo')[0].reset();
							$('#modal_xoa_can_bo').modal('hide');
							$('#dulieucan_bo').load("./../dulieu/dulieucan_bo.php")
						}else {
							alert('Lỗi xóa Chức vụ');
						}
	                    }
					});
         	}   
      	});
	// xuwrt lý nút thêm can_bo mới
	$('#form_themcan_bomoi').on('submit', function(event){
		event.preventDefault();
		var ma_can_bo_them=$('#ma_can_bo_them').val();
		var ten_can_bo_them=$('#ten_can_bo_them').val();
		if(ma_can_bo_them.length==3){
			$.ajax({
				url: './../dulieu/add_can_bomoi.php',
				type: 'POST',
				data: {ma_can_bo_them12:ma_can_bo_them,ten_can_bo_them12:ten_can_bo_them},
				success:function (kql_add_can_bo) {
					if (kql_add_can_bo==1) {
						alert('Mã Chức vụ hoặc tên chức vụ đã tồn tạo');
						document.getElementById("ma_can_bo_them").focus();
	          		}else {
						if (kql_add_can_bo==99) {
							alert('Thêm Chức vụ mới thành công');
							$('#ma_can_bo_them').html();
							$('#ten_can_bo_them').html();
							$('#form_themcan_bomoi')[0].reset();
							$('#dulieucan_bo').load("./../dulieu/dulieucan_bo.php");
						}else {
							alert('Lỗi Thêm');
						}
	          		}
				}
			});
     	}else {
			alert("Độ dài mã Chức vụ không đúng");
			document.getElementById("ma_can_bo_them").focus();
		}
	});
});
