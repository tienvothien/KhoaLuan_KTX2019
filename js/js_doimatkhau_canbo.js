$(document).ready(function () {
	
	$('#doi_matkhau_tk_can_b').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			if ($('#mat_khau_moi_can_bo12').val().length<8) {
				alert('Mật khẩu phải nhiều hơn 7 ký tự');
				document.getElementById('mat_khau_moi_can_bo12').focus();

			}else if ($('#mat_khau_moi_can_bo12').val()!=$('#nhapkai_mat_khau_moi_can_bo12').val()) {
				alert('Nhập lại mật khẩu không giống mật khẩu mới');
				document.getElementById('nhapkai_mat_khau_moi_can_bo12').focus();
			}else {
				var mat_khau_cu_can_bo12= MD5(MD5(MD5($('#mat_khau_cu_can_bo12').val())));
				var mat_khau_moi_can_bo12= MD5(MD5(MD5($('#mat_khau_moi_can_bo12').val())));
				var nhapkai_mat_khau_moi_can_bo12= MD5(MD5(MD5($('#nhapkai_mat_khau_moi_can_bo12').val())));
				$.ajax({
					url:"./../dulieu/insert.php",
					method:"POST",
					data:{mat_khau_cu_can_bo12:mat_khau_cu_can_bo12,
						mat_khau_moi_can_bo12:mat_khau_moi_can_bo12,
						nhapkai_mat_khau_moi_can_bo12:nhapkai_mat_khau_moi_can_bo12},
					success:function(data_doi_matkhau){
						// alert(data_doi_matkhau);
						if(data_doi_matkhau==1){
							alert('Mật khẩu củ không đúng');
							document.getElementById('mat_khau_cu_can_bo12').focus();
						}else if (data_doi_matkhau==99) {
							alert('Đổi mật khẩu thành công');
							window.location='./../admin/login/';
							$('#doi_matkhau_tk_can_b')[0].reset();
							
						}else {
							alert('Lỗi  cập nhật mậth khẩu');
						}
						
					}
				});
			}
		}

	});
});