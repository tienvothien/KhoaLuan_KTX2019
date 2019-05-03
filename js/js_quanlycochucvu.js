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
           $.ajax({
                url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_cochucvu_sua:id_cochucvu_sua},
                dataType:"json",
                success:function(data_suacochucvu){
                    $('#id_cochucvu_sua123').val(data_suacochucvu.id_cochucvu);
                    $('#macanbo_cochucvu_sua').val(data_suacochucvu.ma_can_bo);
                    $('#id_chucvusua_cochucvu_cu').val(data_suacochucvu.tenchucvu);
                    $('#insert').val("Cập nhật");
                    $('#from_suathongtin_cochucvu').modal('show');
                }
           });
      });
	// xử lý khi bấn nút cập nhật lại thông tin cochucvu
	// cap nhat tt thiết bi
    $('#form_themcochucvu_sua').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
		          	$.ajax({
						url:"./../dulieu/add_cochucvumoi.php",
						type:'POST',
						data:new FormData(this),
						contentType: false,
						cache: false,
						processData:false,
						success:function(kq_capnhat_thongtin_cochucvu){
							// alert(kq_capnhat_thongtin_cochucvu);
							if(kq_capnhat_thongtin_cochucvu==1){
								alert('Cán bộ đã có chức vụ này rồi');
								document.getElementById(ma_cochucvu_sua123).focus();
							}else {
								if (kq_capnhat_thongtin_cochucvu==99) {
									alert('Cập nhật thông tin Chức vụ thành công');
									$('#form_themcochucvu_sua')[0].reset();
	                                $('#from_suathongtin_cochucvu').modal('hide');
	                                $('#dulieucochucvu').load("./../dulieu/dulieucochucvu.php")
								}else {
									alert('Lỗi cập nhật');
								}
							}
	                    }
					});
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
	          		}else if (kql_add_cochucvu==2) {
	          			alert('Mã cán bộ không tồn tại');
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
							alert('Lỗi Thêm 34243' );
						}
	          		}
				}
			});
		}
	});
});

