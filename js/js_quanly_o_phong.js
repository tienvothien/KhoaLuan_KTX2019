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
	$('#id_dltoanha_moi').change(function() {
		var id_dltoanha_moi=$('#id_dltoanha_moi').val();
			$.ajax({
				url:"../dulieu/fetch.php",
				type: "post",
				data: {id_toa_nha_them_ophong:id_dltoanha_moi},
				async:true,
				success:function(kq){
					$("#id_dphong_moi").html(kq);
				}
			});
	});
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
	$(document).on('click', '.view_chitietsinh_vien_o_phong', function(){
           var id_sinhvien_o_phong = $(this).attr("id");
           // alert(mssv_o_phong_them);
                $.ajax({
                     url:"./../dulieu/chitetsinhvien.php",
                     method:"POST",
                     data:{id_sinhvien_o_phong:id_sinhvien_o_phong},
                     success:function(data){
                          $('#thongtin_chitiet_o_phong').html(data);
                          $('#dataModal').modal('show');
                     }
                });
      });
	// sửa thông tin o_phong
	$(document).on('click', '.id_sua_sinh_vien_o_phong', function(){
           var id_o_phong_sua = $(this).attr("id");
           // alert(id_o_phong_sua);
           $.ajax({
                url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_o_phong_sua:id_o_phong_sua},
                dataType:"json",
                success:function(data_suao_phong){
                    $('#idsv_o_phong_sua').val(data_suao_phong.id_sinhvien);
                    $('#mssv_o_phong_sua').val(data_suao_phong.mssv);
                    $('#id_dltoanha_cu').val(data_suao_phong.ten_toa_nha);
                    $('#id_dphong_cu').val(data_suao_phong.ma_phong);
                    
                    $('#id__o_phong_sua_12').val(id_o_phong_sua);
                    $('#modal_sua__o_phong').modal('show');
                }
           });
           $.ajax({
				url:"../dulieu/fetch.php",
				type: "post",
				data: {id_o_phong_sua1:id_o_phong_sua},
				async:true,
				success:function(kq){
					$("#id_dltoanha_moi").html(kq);
				}
			});
      });
	// xử lý khi bấn nút cập nhật lại thông tin o_phong
	// cap nhat tt thiết bi
    $('#from_suathongtin__o_phong').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
		          	$.ajax({
						url:"./../dulieu/update_sinhvien_o_p.php",
						type:'POST',
						data:new FormData(this),
						contentType: false,
						cache: false,
						processData:false,
						success:function(kq_capnhat_thongtin_o_phong){
							// alert(kq_capnhat_thongtin_o_phong);
							if(kq_capnhat_thongtin_o_phong==2){
								alert('Phòng này đã hết chỗ');
							}else {
								if (kq_capnhat_thongtin_o_phong==99) {
									alert('Chuyển phòng thành công thành công');
									$('#from_suathongtin__o_phong')[0].reset();
	                                $('#modal_sua__o_phong').modal('hide');
	                                $('#dulieu_o_phong').load("./../dulieu/dulieu_o_phong.php")
								}else {
									alert('Lỗi cập nhật');
								}
							}
	                    }
					});
			
         	}   
      	});
      // hiện thông tin xóa o_phong
	$(document).on('click', '.xoa_sinh_vien_o_phong', function(){
           var id_sinhvien_o_phong = $(this).attr("id");
           // alert(mssv_o_phong_them);
                $.ajax({
                     url:"./../dulieu/chitetsinhvien.php",
                     method:"POST",
                     data:{id_sinhvien_o_phong:id_sinhvien_o_phong},
                     success:function(data){
                          $('#dulieu_cab__o_phong').html(data);
                          $('#id__o_phong_xoa_12').val(id_sinhvien_o_phong);
                          $('#modal_xoa__o_phong').modal('show');
                     }
                });
      });
	// xử lý xoa o_phong 
	$('#From_xoa__o_phong').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          event.stopImmediatePropagation();
	          event.preventDefault();
	        }else{
	        	var id_o_phong_xoa_12=($('#id__o_phong_xoa_12').val());
	        	// alert(id_o_phong_xoa_12);
				$.ajax({
					url:"./../dulieu/insert.php",
					method:"POST",
					data:{id_o_phong_xoa_12:id_o_phong_xoa_12},
					success:function(kq_xoa_o_phong){
						// alert(kql_add_o_phong);
							if (kq_xoa_o_phong==99) {
								alert('Kết thúc ở phòng của sinh viên thành công');
								$('#From_xoa__o_phong')[0].reset();
								$('#modal_xoa__o_phong').modal('hide');
								location.reload();
							}else {
								alert('Lỗi Kết thúc ở phòng của sinh viên');
							}
	                    }
					});
         	}   
      	});
	// xuwrt lý nút thêm o_phong mới
	$('#form_them_o_phongmoi').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			var mssv_o_phong_them=$('#mssv_o_phong_them').val();
			var id_chucvuthem_o_phong=$('#id_chucvuthem_o_phong').val();
			if ($('#mssv_o_phong_them').val().length!=10) {
				alert('Mã sinh viên phải 10 chữ số');
				document.getElementById('mssv_o_phong_them').focus();
			}else {
				$.ajax({
					url:"./../dulieu/add_sinhvien_o_p.php",
						type:'POST',
						data:new FormData(this),
						contentType: false,
						cache: false,
						processData:false,
					success:function (kql_add_o_phong) {
						if (kql_add_o_phong==1) {
							alert('sinh viên này đang ở trong phòng KTX');
							document.getElementById("mssv_o_phong_them").focus();
		          		}else if (kql_add_o_phong==2) {
		          			alert('Phòng này đã hết chỗ');
		          		}else {
							if (kql_add_o_phong==99) {
								alert('Thêm sinh viên vào phòng thành công');
								$('#tt_canbo').html('');
								$('#mssv_o_phong_them').html();
								$('#id_chucvuthem_o_phong').html();
								$('#form_them_o_phongmoi')[0].reset();
								$('#tt_sinhvie').html();
								// $('#dulieu_o_phong').load("./../dulieu/dulieu_o_phong.php");
								location.reload();
							}else {
								alert('Lỗi Thêm');
							}
		          		}
					}
				});
			}
		}
	});
	// xử lý tìm kiếm đã ở phòng
	$('#timkiem_da_o_phong_sv').on('click', function(event){
		event.preventDefault();
			var timkiem_daophongngay_batdau=$('#timkiem_daophongngay_batdau').val();
			var timkiem_daophongngay_kethuc=$('#timkiem_daophongngay_kethuc').val();
			var timkiem_dang_ophong_id_toanha=$('#timkiem_dang_ophong_id_toanha').val();
			var timkiem_dang_ophong_idphong=$('#timkiem_dang_ophong_idphong').val();

			
				$.ajax({
					url:"./../dulieu/timkiemda_o_phong.php",
                     method:"POST",
                     data:{timkiem_daophongngay_batdau:timkiem_daophongngay_batdau,
                     	timkiem_daophongngay_kethuc:timkiem_daophongngay_kethuc,
                     	timkiem_dang_ophong_idphong:timkiem_dang_ophong_idphong,
                     	timkiem_dang_ophong_id_toanha:timkiem_dang_ophong_id_toanha},
					success:function (kql_tim_Da_o_phong) {
						// alert(kql_tim_Da_o_phong);
						$('#dulieu_o_phong').html(kql_tim_Da_o_phong);
						// $('#dulieu_o_phong').load('./../dulieu/timkiemda_o_phong.php');
					}
				});
	});// end xử lý tìm kiếm đã ở phòng
		// xử lý tìm kiếm đang ở phòng
	$('#tim_kiem_dang_o_phong').on('click', function(event){
		event.preventDefault();
			var timkiem_dang_ophongngay_batdau=$('#timkiem_dang_ophongngay_batdau').val();
			var timkiem_dang_ophongngay_kethuc=$('#timkiem_dang_ophongngay_kethuc').val();
			var timkiem_dang_ophong_id_toanha=$('#timkiem_dang_ophong_id_toanha').val();
			var timkiem_dang_ophong_idphong=$('#timkiem_dang_ophong_idphong').val();
			
				$.ajax({
					url:"./../dulieu/timkiem_dang_o_phong.php",
                     method:"POST",
                     data:{timkiem_dang_ophongngay_batdau:timkiem_dang_ophongngay_batdau,
                     	timkiem_dang_ophongngay_kethuc:timkiem_dang_ophongngay_kethuc,
                     	timkiem_dang_ophong_idphong:timkiem_dang_ophong_idphong,
                     	timkiem_dang_ophong_id_toanha:timkiem_dang_ophong_id_toanha},
					success:function (kql_tim_Dang_o_phong) {
						// alert(kql_tim_Da_o_phong);
						$('#dulieu_o_phong').html(kql_tim_Dang_o_phong);
						// $('#dulieu_o_phong').load('./../dulieu/timkiemda_o_phong.php');
					}
				});
	});// end xử lý tìm kiếm đang ở phòng
});
