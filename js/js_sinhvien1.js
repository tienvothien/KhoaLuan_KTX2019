$(document).ready(function () {
	// nếu tòa nhà của tình trang phòng thay đổi 
	$('#id_toanha_tinhtrang').change(function () {
		var id_toanha_tinhtrang= $('#id_toanha_tinhtrang').val();
		if (id_toanha_tinhtrang!='') {
			
		$.ajax({
			url: './../dulieu/fetch_sv.php',
			type: 'POST',
			data: {id_toanha_tinhtrang:id_toanha_tinhtrang},
			success:function (data_tang) {
				// alert(data_tang);
				$('#tang_p_tinhtrang').html(data_tang);
				$('#chon_phong_tinhtrang').html(" <option value=''>Chọn Phòng</option>");
			}
		});
		$.ajax({
			url: './../dulieu/dulieuphong_tinhtrang_tim1.php',
			type: 'POST',
			data: {id_toanha_tinhtrang:id_toanha_tinhtrang},
			success:function (data_phonga1) {
				$('#dl_tinhtrangphong').html(data_phonga1);
			}
		});
	}
		
	});// end nếu tòa nhà của tình trang phòng thay đổi 
	// nếu tòa nhà của tình trang phòng thay đổi 
	$('#tang_p_tinhtrang').change(function () {
		var tang_p_tinhtrang= $('#tang_p_tinhtrang').val();
		var id_toanha_tinhtrang= $('#id_toanha_tinhtrang').val();
		$.ajax({
			url: './../dulieu/fetch_sv.php',
			type: 'POST',
			data: {tang_p_tinhtrang12:tang_p_tinhtrang,id_toanha_tinhtrang12:id_toanha_tinhtrang},
			success:function (data_tang_phong) {
				$('#chon_phong_tinhtrang').html(data_tang_phong);
			}
		});
		$.ajax({
			url: './../dulieu/dulieuphong_tinhtrang_tim1.php',
			type: 'POST',
			data: {tang_p_tinhtrang12:tang_p_tinhtrang,id_toanha_tinhtrang12:id_toanha_tinhtrang},
			success:function (data_tang_phong12) {
				$('#dl_tinhtrangphong').html(data_tang_phong12);
			}
		});
	});// end nếu tòa nhà của tình trang phòng thay đổi 
	// nếu tòa nhà của tình trang phòng thay đổi 
	$('#chon_phong_tinhtrang').change(function () {
		var chon_phong_tinhtrang= $('#chon_phong_tinhtrang').val();
		$.ajax({
			url: './../dulieu/dulieuphong_tinhtrang_tim1.php',
			type: 'POST',
			data: {chon_phong_tinhtrang12:chon_phong_tinhtrang},
			success:function (data_tang_phong12) {
				$('#dl_tinhtrangphong').html(data_tang_phong12);
			}
		});
	});// end nếu tòa nhà của tình trang phòng thay đổi 
	// Xem chi tiet thoong tin sinh_vien
	$(document).on('click', '.xemchitiettaikhoansv', function(){
		var id_chitietsinh_vien = $(this).attr("id");
			$.ajax({
				url:"./../dulieu/chitetsinhvien.php",
				method:"POST",
				data:{id_chitietsinh_vien:id_chitietsinh_vien},
				success:function(data){
					$('#thongtin_chitietsinh_vien123').html(data);
					$('#dataModal').modal('show');
				}
			});
	});

	$('#doi_matkhau_tk_sv').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			if ($('#mat_khau_moi_sv').val().length<8) {
				alert('Mật khẩu phải nhiều hơn 7 ký tự');
				document.getElementById('mat_khau_moi_sv').focus();

			}else if ($('#mat_khau_moi_sv').val()!=$('#nhapkai_mat_khau_moi_sv').val()) {
				alert('Nhập lại mật khẩu không giống mật khẩu mới');
				document.getElementById('nhapkai_mat_khau_moi_sv').focus();
			}else {
				var mat_khau_cu_sv= MD5(MD5(MD5($('#mat_khau_cu_sv').val())));
				var mat_khau_moi_sv= MD5(MD5(MD5($('#mat_khau_moi_sv').val())));
				var nhapkai_mat_khau_moi_sv= MD5(MD5(MD5($('#nhapkai_mat_khau_moi_sv').val())));
				$.ajax({
					url:"./../dulieu/chitetsinhvien.php",
					method:"POST",
					data:{mat_khau_cu_sv:mat_khau_cu_sv,
						mat_khau_moi_sv:mat_khau_moi_sv,
						nhapkai_mat_khau_moi_sv:nhapkai_mat_khau_moi_sv},
					success:function(data_doi_matkhau){
						if(data_doi_matkhau==1){
							alert('Mật khẩu củ không đúng');
							document.getElementById('mat_khau_cu_sv').focus();
						}else if (data_doi_matkhau==99) {
							alert('Đổi mật khẩu thành công');
							window.location='./../admin/login/';
							$('#doi_matkhau_tk_sv')[0].reset();
							
						}else {
							alert('Lỗi  cập nhật mậth khẩu');
						}
						
					}
				});
			}
		}

	});
});