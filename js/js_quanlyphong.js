$(document).ready(function () {
	// ltt loại phong đẫ chon
	$('#loai_phong_phong_themmoi').change(function() {
		var loai_phong_phong_themmoi = $('#loai_phong_phong_themmoi').val();
		 $.ajax({
			url:"./../dulieu/select.php",
			method:"POST",
			data:{loai_phong_phong_themmoi:loai_phong_phong_themmoi},
			success:function(data){
				$('#tt_loaiphongthem').html(data);
			}
		});

	});//ltt loại phong đẫ chon
	// xử lý thêm Phòng mới
		// ltt loại phong đẫ chon suawr
	$('#loai_phong_phong_sua_15').change(function() {
		var loai_phong_phong_sua_15 = $('#loai_phong_phong_sua_15').val();
		 $.ajax({
			url:"./../dulieu/select.php",
			method:"POST",
			data:{loai_phong_phong_themmoi:loai_phong_phong_sua_15},
			success:function(data){
				$('#tt_loaiphongthemsua_15').html(data);
			}
		});

	});//ltt loại phong đẫ chon
	// xử lý thêm Phòng mới
	$('#form_themphongmoi').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			$.ajax({
				url:"./../dulieu/add_phong_moi.php",
				type:'POST',
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function (kql_add_phong) {
					if (kql_add_phong==1) {
						alert('Số phòng đã tồn tại');
						document.getElementById('sophong_themmoi').focus();
					}else if (kql_add_phong==99) {
						alert('Thêm Phòng mới thành công');
						$('#form_themphongmoi')[0].reset();
						$('#tt_loaiphongthem').html('');
						// $('#dulieuphong').load("./../dulieu/dulieuphong.php");
						location.reload();
					}
				}
			});
		}
	});
	//End  xử lý thêm Phòng mới
	// hiện thông tinphòng
	$(document).on('click', '.view_chitietphong', function(event) {
		event.preventDefault();
		 var id_chitiet_phong = $(this).attr("id");
			$.ajax({
				url:"./../dulieu/select.php",
				method:"POST",
				data:{id_chitiet_phong:id_chitiet_phong},
				success:function(data){
					$('#thongtin_chitietphong').html(data);
					$('#dataModal').modal('show');
				}
			});
		/* Act on the event */
	});	//end  xử lý hiện thông tin xóa phòng 
	// Xử lý xóa phòng
	$('#From_xoa_phong').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			var id_phong_xoa_12=($('#id_phong_xoa_12').val());
			$.ajax({
				url:"./../dulieu/insert.php",
				method:"POST",
				data:{id_phong_xoa_12:id_phong_xoa_12},
				success:function (kql_xoa_phong) {
					if (kql_xoa_phong==99) {
						$('#modal_xoa_phong').modal('hide');
						alert('Xóa Phòng mới thành công');
						$('#From_xoa_phong')[0].reset();
						$('#id_phong_xoa_12').html('');
						// $('#dulieuphong').load("./../dulieu/dulieuphong.php");
						location.reload();
					}else if (kql_xoa_phong==101) {
						alert('lỗi xóa Phòng vì còn sinh viên ở phòng');
					}else  {
						alert('Lỗi xóa phòng')
					}
				}
			});
		}
	});// en xử lý submit xóa phòng
	// hiện thông tin xóa phòng
	$(document).on('click', '.xoa_phong', function(event) {
		event.preventDefault();
		 var id_chitiet_phong = $(this).attr("id");
			$.ajax({
				url:"./../dulieu/select.php",
				method:"POST",
				data:{id_chitiet_phong:id_chitiet_phong},
				success:function(data){
					$('#dulieu_xoa_phong').html(data);
					$('#modal_xoa_phong').modal('show');
					$('#id_phong_xoa_12').val(id_chitiet_phong);
				}
			});

		/* Act on the event */
	});
	//end  xử lýb hiện thông tin xóa phòng 
		// hiện thông tin Cập nhật phòng
	$(document).on('click', '.id_sua_phong', function(event) {
		event.preventDefault();
		 	var id_phong_sua_12 = $(this).attr("id");
			$.ajax({
				url:"../dulieu/fetch.php",
				 method:"POST",
                data:{id_phong_sua_12:id_phong_sua_12},
                dataType:"json",
				success:function(data){
					$('#id_toa_nha_sua_15').val(data.id_toanha);
					$('#sophong_sua_15').val(data.ma_phong);
					$('#tang_phong_sua_15').val(data.stt_tang);
					// $('#dul_id_toanha_sai').html(data.ten_toa_nha);
					$('#loai_phong_phong_sua_15').val(data.id_loaiphong);
					$('#dul_id_toanha_sai').html(data.ten_toa_nha);

					$('#modal_sua_phong').modal('show');
					$('#id_phong_sua_12').val(id_phong_sua_12);
				}
			});
			$.ajax({
				url:"./../dulieu/select.php",
				method:"POST",
				data:{id_phong_sua_12:id_phong_sua_12},
				success:function(data){
					$('#tt_loaiphongthemsua_15').html(data);
				}
			});

		/* Act on the event */
	});
	//end  xử lýb hiện thông tin Cập nhật phòng 
	// xử lý Cập nhật Phòng
	$('#from_suathongtin_phong').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			$.ajax({
				url:"./../dulieu/add_phong_moi.php",
				type:'POST',
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function (kql_update_phong) {
					if (kql_update_phong==1) {
						alert('Số phòng đã tồn tại');
						document.getElementById('sophong_themmoi').focus();
					}else if (kql_update_phong==99) {
						alert('Cập nhật Phòng thành công');
						$('#modal_sua_phong').modal('hide');
						$('#from_suathongtin_phong')[0].reset();
						// $('#dulieuphong').load("./../dulieu/dulieuphong.php");
						location.reload();
						
					}
				}
			});
		}
	});
	//End  xử lý Cập nhật Phòng
});