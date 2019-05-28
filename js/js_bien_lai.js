$(document).ready(function () {
	// nhap mã số sinh viên hiện thông tin sinh viên
	$('#mssv_o_phong_them').change(function() {
		if ($('#mssv_o_phong_them').val().length!=10) {
			alert('Mã sinh viên phải 10 chữ số');
			document.getElementById('mssv_o_phong_them').focus();
		}else {
			var mssv_o_phong_them = $('#mssv_o_phong_them').val();
			 $.ajax({
                     url:"./../dulieu/chitetsinhvien.php",
                     method:"POST",
                     data:{mssv_o_phong_them:mssv_o_phong_them},
                     success:function(data){
                          $('#tt_sinhvie').html(data);
                     }
                });
			 $.ajax({
				url:"../dulieu/fetch.php",
				type: "post",
				data: {mssv_o_phong_them_toanha1:mssv_o_phong_them},
				async:true,
				success:function(kq){
					$("#id_toa_nha_them_ophong").html(kq);
				}
			});
		}
	});
	// Nếu thông tin tòa nhà thay đồi sẽ hiện ds phòng khác
	$('#id_toa_nha_them_ophong').change(function() {
		var id_toa_nha_them_ophong=$('#id_toa_nha_them_ophong').val();
			$.ajax({
				url:"../dulieu/fetch.php",
				type: "post",
				data: {id_toa_nha_them_ophong:id_toa_nha_them_ophong},
				async:true,
				success:function(kq){
					$("#id_phong_them_ophong").html(kq);
				}
			});
	});
	    $('#from_them_bien_lai').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
		          	$.ajax({
						url:"./../dulieu/add_bien_lai_moi.php",
						type:'POST',
						data:new FormData(this),
						contentType: false,
						cache: false,
						processData:false,
						success:function(kq_add_bien_lai){
							// alert(kq_add_bien_lai);
							if(kq_add_bien_lai==1){
								alert('Số biên lai đã tồn tại');
								document.getElementById('so_bien_lai').focus();
							}else {
								if (kq_add_bien_lai==99) {
									alert('Thêm công thành công');
									$('#from_them_bien_lai')[0].reset();
									$('#tt_sinhvie').html("");
	                                $('#modal_sua__o_phong').modal('hide');
	                                $('#dulieu_o_phong').load("./../dulieu/dulieu_bien_lai.php")
								}else {
									alert('Lỗi cập nhật');
								}
							}
	                    }
					});
			
         	}   
      	});
      	// xử lý tìm kiếm đã ở phòng
	$('#tim_kiem_bien_lai').on('click', function(event){
		event.preventDefault();
			var timkiem_bien_lai_ngay_batdau=$('#timkiem_bien_lai_ngay_batdau').val();
			var timkiem_bien_laigngay_kethuc=$('#timkiem_bien_laigngay_kethuc').val();
			var timkiem_bien_lai_id_toanha=$('#timkiem_bien_lai_id_toanha').val();
			var timkiem_bien_lai_loai_tien=$('#timkiem_bien_lai_loai_tien').val();

			if (timkiem_bien_lai_ngay_batdau=='' && timkiem_bien_laigngay_kethuc==''
				&& timkiem_bien_lai_id_toanha==''&& timkiem_bien_lai_loai_tien=='') {
			}else{
				$.ajax({
					url:"./../dulieu/dulieu_bien_lai.php",
                     method:"POST",
                     data:{timkiem_bien_lai_ngay_batdau:timkiem_bien_lai_ngay_batdau,
                     	timkiem_bien_laigngay_kethuc:timkiem_bien_laigngay_kethuc,
                     	timkiem_bien_lai_id_toanha:timkiem_bien_lai_id_toanha,
                     	timkiem_bien_lai_loai_tien:timkiem_bien_lai_loai_tien},
					success:function (kql_tim_Da_o_phong) {
						// alert(kql_tim_Da_o_phong);
						$('#dulieu_o_phong').html(kql_tim_Da_o_phong);
						// $('#dulieu_o_phong').load('./../dulieu/timkiemda_o_phong.php');
					}
				});
			}
	});// end xử lý tìm kiếm đã ở phòng
});