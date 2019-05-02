$(document).ready(function () {
	// nhap mã số cán bộ hiện thông tin cán bộ
	$('#macanbo_cochucvu_them').change(function() {
		if ($('#macanbo_cochucvu_them').val().length!=10) {
			alert('Mã cán bộ phải 10 chữ số');
			document.getElementById('macanbo_cochucvu_them').focus();
		}else {
			var id_mscsb = $('#macanbo_cochucvu_them').val();
			 $.ajax({
                     url:"./../dulieu/select.php",
                     method:"POST",
                     data:{id_mscsb:id_mscsb},
                     success:function(data){
                          $('#tt_canbo').html(data);
                     }
                });
		}
		
	});
	// Xem chi tiet thoong tin cochucvu
	$(document).on('click', '.view_chitietcochucvu', function(){
           var id_chitietcochucvu = $(this).attr("id");
           if(id_chitietcochucvu != '')
           {
                $.ajax({
                     url:"./../dulieu/select.php",
                     method:"POST",
                     data:{id_chitietcan_bo:id_chitietcochucvu},
                     success:function(data){
                          $('#thongtin_chitietcochucvu').html(data);
                          $('#dataModal').modal('show');
                     }
                });
           }
      });
	// sửa thông tin cochucvu
	$(document).on('click', '.id_sua_cochucvu', function(){
           var id_cochucvu_sua = $(this).attr("id");
           alert(id_cochucvu_sua);
           $.ajax({
                url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_cochucvu_sua:id_cochucvu_sua},
                dataType:"json",
                success:function(data_suacochucvu){
                    $('#ma_cochucvu_sua123').val(data_suacochucvu.macochucvu);
                    $('#ten_cochucvusua_12').val(data_suacochucvu.tencochucvu);
                    $('#id_cochucvu_sua_12').val(data_suacochucvu.idcochucvu);
                    $('#insert').val("Cập nhật");
                    $('#modal_sua_cochucvu').modal('show');
                }
           });
      });
	// xử lý khi bấn nút cập nhật lại thông tin cochucvu
	// cap nhat tt thiết bi
    $('#from_suathongtin_cochucvu').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
	        	if($('#ma_cochucvu_sua123').val().length==3){
		          	$.ajax({
						url:"./../dulieu/insert.php",
						method:"POST",
						data:$('#from_suathongtin_cochucvu').serialize(),
						success:function(kq_capnhat_thongtin_cochucvu){
							if(kq_capnhat_thongtin_cochucvu==1){
								alert('Mã Chức vụ hoặc tên Chức vụ đã tồn tại');
								document.getElementById(ma_cochucvu_sua123).focus();
							}else {
								if (kq_capnhat_thongtin_cochucvu==99) {
									alert('Cập nhật thông tin Chức vụ thành công');
									$('#from_suathongtin_cochucvu')[0].reset();
	                                $('#modal_sua_cochucvu').modal('hide');
	                                $('#dulieucochucvu').load("./../dulieu/dulieucochucvu.php")
								}else {
									alert('Lỗi cập nhật');
								}
							}
	                    }
					});
				}else {
					alert('Độ dài Mã cochucvu không đúng');
					document.getElementById("ma_cochucvu_sua123").focus();
				}
         	}   
      	});
      // hiện thông tin xóa cochucvu
	$(document).on('click', '.xoa_cochucvu', function(){
           var id_cochucvu_xoa = $(this).attr("id");
           // alert(id_cochucvu_xoa);
           $.ajax({
                     url:"./../dulieu/select.php",
                     method:"POST",
                     data:{id_cochucvu_sua:id_cochucvu_xoa},
                     success:function(data){
                          $('#dulieu_cab_cochucvu').html(data);
                          $('#id_cochucvu_xoa_12').val(id_cochucvu_xoa);
                          $('#modal_xoa_cochucvu').modal('show');
                     }
                });
      });
	// xử lý xoa cochucvu 
	$('#From_xoa_cochucvu').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          event.stopImmediatePropagation();
	          event.preventDefault();
	        }else{
	        	var id_xoa_cochucvu123=($('#id_cochucvu_xoa_12').val());
				$.ajax({
					url:"./../dulieu/insert.php",
					method:"POST",
					data:{id_xoa_cochucvu123:id_xoa_cochucvu123},
					success:function(kq_xoa_cochucvu){
						if (kq_xoa_cochucvu==99) {
							alert('Xóa Có Chức vụ thành công');
							$('#From_xoa_cochucvu')[0].reset();
							$('#modal_xoa_cochucvu').modal('hide');
							location.reload();
						}else {
							alert('Lỗi xóa Có Chức vụ thành');
						}
	                    }
					});
         	}   
      	});
	// xuwrt lý nút thêm cochucvu mới
	$('#form_themcochucvumoi').on('submit', function(event){
		event.preventDefault();
		var macanbo_cochucvu_them=$('#macanbo_cochucvu_them').val();
		var id_chucvuthem_cochucvu=$('#id_chucvuthem_cochucvu').val();
		if ($('#macanbo_cochucvu_them').val().length!=10) {
			alert('Mã cán bộ phải 10 chữ số');
			document.getElementById('macanbo_cochucvu_them').focus();
		}else {
			$.ajax({
				url: './../dulieu/add_cochucvumoi.php',
				type: 'POST',
				data: {macanbo_cochucvu_them12:macanbo_cochucvu_them,
					id_chucvuthem_cochucvu12:id_chucvuthem_cochucvu},
				success:function (kql_add_cochucvu) {
					if (kql_add_cochucvu==1) {
						alert('Cán bộ đã có chức vụ này');
						document.getElementById("macanbo_cochucvu_them").focus();
	          		}else {
						if (kql_add_cochucvu==99) {
							alert('Thêm Chức vụ mới thành công');
							$('#tt_canbo').html('');
							$('#macanbo_cochucvu_them').html();
							$('#id_chucvuthem_cochucvu').html();
							$('#form_themcochucvumoi')[0].reset();
							$('#dulieucochucvu').load("./../dulieu/dulieucochucvu.php");
						}else {
							alert('Lỗi Thêm');
						}
	          		}
				}
			});
		}
	});
});
