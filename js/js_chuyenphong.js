$(document).ready(function () {
	$('#timkiem_dang_ophong_id_toanha').change(function() {
		var id_dltoanha_moi=$('#timkiem_dang_ophong_id_toanha').val();
			$.ajax({
				url:"../dulieu/fetch.php",
				type: "post",
				data: {id_toa_nha_them_ophong:id_dltoanha_moi},
				async:true,
				success:function(kq){
					$("#timkiem_dang_ophong_idphong").html(kq);
				}
			});
	});
	// Xem chi tiet thoong tin o_phong
		// xử lý tìm kiếm đang ở phòng
	$('#tim_kiem_dang_o_phong').on('click', function(event){
		event.preventDefault();
			var timkiem_dang_ophongngay_batdau=$('#timkiem_dang_ophongngay_batdau').val();
			var timkiem_dang_ophongngay_kethuc=$('#timkiem_dang_ophongngay_kethuc').val();
			var timkiem_dang_ophong_id_toanha=$('#timkiem_dang_ophong_id_toanha').val();
			var timkiem_dang_ophong_idphong=$('#timkiem_dang_ophong_idphong').val();
				$.ajax({
					url:"./../dulieu/dulieu_log_edit_chuyen_phong.php",
                     method:"POST",
                     data:{timkiem_dang_ophongngay_batdau:timkiem_dang_ophongngay_batdau,
                     	timkiem_dang_ophongngay_kethuc:timkiem_dang_ophongngay_kethuc,
                     	timkiem_dang_ophong_idphong:timkiem_dang_ophong_idphong,
                     	timkiem_dang_ophong_id_toanha:timkiem_dang_ophong_id_toanha},
					success:function (kql_tim_chuyenp_o_phong) {
						// alert(kql_tim_Da_o_phong);
						$('#dlchuyenphong').html(kql_tim_chuyenp_o_phong);
						// $('#dulieu_o_phong').load('./../dulieu/timkiemda_o_phong.php');
					}
				});
	});// end xử lý tìm kiếm đang ở phòng
});
