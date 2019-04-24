$(document).ready(function() {
	// xử lý thêm tòa nhà mới
	$('#form_them_toa_nha_moi').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			if ($('#ma_toa_nha_themmoi123').val().length!=3) {
				alert('Độ dài mã tòa nhà không đúng');
			}else {
				$.ajax({
					url:"./../dulieu/add_toanhamoi.php",
					type:'POST',
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function(kq_add_toa_nha){
						if (kq_add_toa_nha==1) {
							alert('Mã tòa nhà hoặc tên tòa nhà đã tồn tại');
							document.getElementById('ma_toa_nha_themmoi123').focus();
						}else if (kq_add_toa_nha==99) {
							alert('Thêm tòa nhà thành công');
							$('#form_them_toa_nha_moi')[0].reset();
							$('#dulieu_toa_nha_').load('./../dulieu/dulieu_toa_nha.php');
						}else {
							alert('Lỗi thêm');
						}
					}
				});
			}   
		}
	});
	// end xử lý thêm tòa nhà mới
	//xử lý xem chi tiết tòa nhà
	$(document).on('click', '.view_chitiettoa_nha', function(event) {
		event.preventDefault();
		 var id_chitiettoa_nha = $(this).attr("id");
			$.ajax({
				url:"./../dulieu/select.php",
				method:"POST",
				data:{id_chitiettoa_nha:id_chitiettoa_nha},
				success:function(data){
					$('#thongtin_chitiettoa_nha').html(data);
					$('#dataModal').modal('show');
				}
			});
		/* Act on the event */
	});//end xử lý xem chi tiết tòa nhà
	
	//xử lý xem hiện thông tin tòa nhà xóa
	$(document).on('click', '.xoa_toa_nha', function(event) {
		event.preventDefault();
		var id_chitiettoa_nha = $(this).attr("id");
			$.ajax({
				url:"./../dulieu/select.php",
				method:"POST",
				data:{id_chitiettoa_nha:id_chitiettoa_nha},
				success:function(data){
					$('#thongtinsv_xoa12').html(data);
					$('#modal_xoa_toa_nha_').modal('show');
					$('#id_toa_nha_xoa_12').val(id_chitiettoa_nha);
				}
			});
		/* Act on the event */
	});//xử lý xem hiện thông tin tòa nhà xóa
	//xử lý bấm submit xóa tòa nhà 
	$('#From_xoa_toa_nha_').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			var id_xoa_toa_nha = $('#id_toa_nha_xoa_12').val();
			$.ajax({
					url:"./../dulieu/insert.php",
					method:"POST",
					data:{id_xoa_toa_nha:id_xoa_toa_nha},
					success:function(kq_xoa_toa_nha){
						if (kq_xoa_toa_nha==99) {
							alert('Xóa Tòa nhà thành công');
							$('#From_xoa_toa_nha_')[0].reset();
							$('#modal_xoa_toa_nha_').modal('hide');
							$('#dulieu_toa_nha_').load('./../dulieu/dulieu_toa_nha.php');
						}else if (kq_xoa_toa_nha==101) {
							alert('Còn sinh viên đang ở trong phòng của tòa nhà này! bạn phải chuyển sinh viên hết qua tòa nhà khác trước khi xóa tòa nhà!');
						}else{
							alert('Lỗi xóa Tòa nhà');
						}
					}
				});
		}
		/* Act on the event */
	});//xử lý bấm submit xóa tòa nhà
	//xử lý xem hiện thông tin tòa nhà Cập nhật
	$(document).on('click', '.id_sua_toa_nha', function(event) {
		event.preventDefault();
		var id_sua_toa_nha = $(this).attr("id");
			$.ajax({
				url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_sua_toa_nha:id_sua_toa_nha},
                dataType:"json",
				success:function(data_suatoa_nha){
                    $('#ma_toa_nha_update_124').val(data_suatoa_nha.ma_toa_nha);
                    $('#ten_toa_nha_update_124').val(data_suatoa_nha.ten_toa_nha);
                    $('#value_loaitnhasua').val(data_suatoa_nha.loai_toa_nha);
                    $('#value_loaitnhasua').html(data_suatoa_nha.loai_toa_nha);
                    $('#id_toa_nha_update_124').val(data_suatoa_nha.id_toanha);

					$('#modal_sua_toa_nha_').modal('show');
				}
			});
		/* Act on the event */
	});//xử lý xem hiện thông tin tòa nhà Cập nhật
	//xử lý bấm submit xóa tòa nhà 
	$('#from_suathongtin_toa_nha_').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			
			$.ajax({
				url:"./../dulieu/insert.php",
				type:'POST',
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function(kq_update_toa_nha){
					if (kq_update_toa_nha==1) {
						alert('Mã tòa nhà đã tồn tại');
						document.getElementById('ma_toa_nha_update_124').focus();
					}else if (kq_update_toa_nha==2) {
						alert('Tên tòa nhà đã tồn tại');
						document.getElementById('ten_toa_nha_update_124').focus();
					}else if (kq_update_toa_nha==101) {
						alert('Còn sinh viên đang ở trong phòng của tòa nhà này! bạn phải chuyển sinh viên hết qua tòa nhà khác trước khi xóa tòa nhà!');
					} else if (kq_update_toa_nha==99) {
						alert('Cập nhật thông tin Tòa nhà thành công');
						$('#from_suathongtin_toa_nha_')[0].reset();
						$('#modal_sua_toa_nha_').modal('hide');
						$('#dulieu_toa_nha_').load('./../dulieu/dulieu_toa_nha.php');
					}else{
						alert('Lỗi Cập nhật Tòa nhà');
					}
				}
			});
		}
		/* Act on the event */
	});//xử lý bấm submit xóa tòa nhà
});