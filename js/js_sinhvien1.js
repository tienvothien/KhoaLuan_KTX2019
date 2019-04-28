$(document).ready(function () {
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