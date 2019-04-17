$(document).ready(function () {
	$(function() {
		$("#file_anh_sv").change(function() {
			var file = this.files[0];
			var imagefile = file.type;
			var match= ["image/jpeg","image/png","image/jpg"];
			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
				$('#previewing_themsvload').attr('src','adasdas');
				alert("Bạn phải chọn file ảnh có đuôi là (jpeg, jpg and png)");
				// $("#message").html("<p id='error'>Bạn phải chọn pha</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only  Images type allowed</span>");
				return false;
			}else{
				var reader = new FileReader();
				reader.onload = imageIsLoaded;
				reader.readAsDataURL(this.files[0]);
			}
		});
	function imageIsLoaded(e) {
		$("#file_anh_sv").css("color","green");
		$('#image_preview_themssv').css("display", "block");
		$('#previewing_themsvload').attr('src', e.target.result);
		$('#previewing_themsvload').attr('width', '100px');
		$('#previewing_themsvload').attr('height', '130px');
	}; // en kiem tra truoc khi cap nhat
});
	// Xem chi tiet thoong tin sinh_vien
	$(document).on('click', '.view_chitietsinh_vien', function(){
		var id_chitietsinh_vien = $(this).attr("id");
		if(id_chitietsinh_vien != ''){
			$.ajax({
				url:"./../dulieu/chitetsinhvien.php",
				method:"POST",
				data:{id_chitietsinh_vien:id_chitietsinh_vien},
				success:function(data){
					$('#thongtin_chitietsinh_vien').html(data);
					$('#dataModal').modal('show');
				}
			});
		}
	});
	// sửa thông tin sinh_vien
	$(document).on('click', '.id_sua_sinh_vien', function(){
		var id_sinh_vien_sua = $(this).attr("id");
		// alert(id_sinh_vien_sua);
		$.ajax({
			url:"../dulieu/fetch.php",
			method:"POST",
			data:{id_sinh_vien_sua:id_sinh_vien_sua},
			dataType:"json",
			success:function(data_suasinh_vien){
				$('#ma_sinh_vien_sua123').val(data_suasinh_vien.masinh_vien);
				$('#ten_sinh_viensua_12').val(data_suasinh_vien.tensinh_vien);
				$('#id_sinh_vien_sua_12').val(data_suasinh_vien.idsinh_vien);
				$('#insert').val("Cập nhật");
				$('#modal_sua_sinh_vien').modal('show');
			}
		});
	});
	// xử lý khi bấn nút cập nhật lại thông tin sinh_vien
	// cap nhat tt thiết bi
    $('#from_suathongtin_sinh_vien').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			if($('#ma_sinh_vien_sua123').val().length==3){
				$.ajax({
					url:"./../dulieu/insert.php",
					method:"POST",
					data:$('#from_suathongtin_sinh_vien').serialize(),
					success:function(kq_capnhat_thongtin_sinh_vien){
						if(kq_capnhat_thongtin_sinh_vien==1){
							alert('Mã Chức vụ hoặc tên Chức vụ đã tồn tại');
							document.getElementById(ma_sinh_vien_sua123).focus();
						}else {
							if (kq_capnhat_thongtin_sinh_vien==99) {
								alert('Cập nhật thông tin Chức vụ thành công');
								$('#from_suathongtin_sinh_vien')[0].reset();
								$('#modal_sua_sinh_vien').modal('hide');
								$('#dulieusinh_vien').load("./../dulieu/dulieusinh_vien.php")
							}else {
								alert('Lỗi cập nhật');
							}
						}
					}
				});
			}else {
				alert('Độ dài Mã sinh_vien không đúng');
				document.getElementById("ma_sinh_vien_sua123").focus();
			}
		}   
	});
      // hiện thông tin xóa sinh_vien
	$(document).on('click', '.xoa_sinh_vien', function(){
		var id_sinh_vien_sua = $(this).attr("id");
		if(id_sinh_vien_sua != ''){
			$.ajax({
				url:"./../dulieu/chitetsinhvien.php",
				method:"POST",
				data:{id_chitietsinh_vien:id_sinh_vien_sua},
				success:function(data1){
					$('#id_sinhvien_xoa_12').val(id_sinh_vien_sua);
					$('#thongtinsv_xoa12').html(data1);
					$('#modal_xoa_sinhvien').modal('show');
				}
			});
		}
	});
	// xử lý xoa sinh_vien 
	$('#From_xoa_sinhvien').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			var id_xoa_sinh_vien123=($('#id_sinhvien_xoa_12').val());
			$.ajax({
				url:"./../dulieu/insert.php",
				method:"POST",
				data:{id_xoa_sinh_vien123:id_xoa_sinh_vien123},
				success:function(kq_xoa_sinh_vien){
					if (kq_xoa_sinh_vien==99) {
						alert('Xóa sinh viên thành công công');
						$('#From_xoa_sinhvien')[0].reset();
						$('#modal_xoa_sinhvien').modal('hide');
						$('#dulieusinhvien').load("./../dulieu/dulieusinhvien.php")
					}else {
						alert('Lỗi xóa sinh viên');
					}
				}
			});
		}   
	});
	// xuwrt lý nút thêm sinh_vien mới
	$('#form_themsinh_vienmoi').on('submit', function(event){
		event.preventDefault();
		var ma_sinh_vien_them=$('#ma_sinh_vien_them').val();
		var ten_sinh_vien_them=$('#ten_sinh_vien_them').val();
		if(ma_sinh_vien_them.length==3){
			$.ajax({
				url: './../dulieu/add_sinh_vienmoi.php',
				type: 'POST',
				data: {ma_sinh_vien_them12:ma_sinh_vien_them,ten_sinh_vien_them12:ten_sinh_vien_them},
				success:function (kql_add_sinh_vien) {
					if (kql_add_sinh_vien==1) {
						alert('Mã Chức vụ hoặc tên chức vụ đã tồn tạo');
						document.getElementById("ma_sinh_vien_them").focus();
	          		}else {
						if (kql_add_sinh_vien==99) {
							alert('Thêm Chức vụ mới thành công');
							$('#ma_sinh_vien_them').html();
							$('#ten_sinh_vien_them').html();
							$('#form_themsinh_vienmoi')[0].reset();
							$('#dulieusinh_vien').load("./../dulieu/dulieusinh_vien.php");
						}else {
							alert('Lỗi Thêm');
						}
	          		}
				}
			});
     	}else {
			alert("Độ dài mã Chức vụ không đúng");
			document.getElementById("ma_sinh_vien_them").focus();
		}
	});
});
