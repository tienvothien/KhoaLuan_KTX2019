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
		// nêu Số cmnd thay đổi sẽ 
		$('#ma_sinhvien_themmoi123').change(function() {
			var ma_sinhvien_themmoi123=$('#ma_sinhvien_themmoi123').val();
			if (ma_sinhvien_themmoi123.length!=10) {
				alert('MSSV phải 10 chữ số');
				document.getElementById('ma_sinhvien_themmoi123').focus();
			}else {
				$.ajax({
					url:"../dulieu/xuly_chon_hktt.php",
					type: "post",
					data: {ma_sinhvien_themmoi123:ma_sinhvien_themmoi123},
					async:true,
					success:function(kq){
						if (kq==1) {
							alert('MSSV đã tồn tại');
							document.getElementById('ma_sinhvien_themmoi123').focus();
						}
						
					}
				});
			}
		}); // end nêu Số cmnd thay đổi sẽ 
		// nêu Số cmnd thay đổi sẽ 
		$('#cmnd_them_sinh_vien').change(function() {
			var cmnd_them_sinh_vien=$('#cmnd_them_sinh_vien').val();
			if (cmnd_them_sinh_vien.length!=9) {
				alert('Chứ minh nhân dân phải 9 chữ số');
				document.getElementById('cmnd_them_sinh_vien').focus();
			}
		}); // end nêu Số cmnd thay đổi sẽ 
		// nêu Số điện thoại thay đổi sẽ 
		$('#so_dt_them_sinh_vien').change(function() {
			var so_dt_them_sinh_vien=$('#so_dt_them_sinh_vien').val();
			if (so_dt_them_sinh_vien.length!=10) {
				alert('Số điện thoại phải 10 chữ số');
				document.getElementById('so_dt_them_sinh_vien').focus();
			}
		}); // end nêu Số điện thoại thay đổi sẽ 
		// nêu Số điện thoại cha thay đổi sẽ 
		$('#sdtcha_them_sinh_vien').change(function() {
			var sdtcha_them_sinh_vien=$('#sdtcha_them_sinh_vien').val();
			if (sdtcha_them_sinh_vien.length!=10 && sdtcha_them_sinh_vien!='') {
				alert('Số điện thoại phải 10 chữ số');
				document.getElementById('sdtcha_them_sinh_vien').focus();
			}
		}); // end nêu Số điện thoại cha thay đổi sẽ 
		// nêu Số điện thoại mẹ thay đổi sẽ 
		$('#sdtme_them_sinh_vien').change(function() {
			var sdtme_them_sinh_vien=$('#sdtme_them_sinh_vien').val();
			if (sdtme_them_sinh_vien.length!=10 && sdtme_them_sinh_vien!='') {
				alert('Số điện thoại phải 10 chữ số');
				document.getElementById('sdtme_them_sinh_vien').focus();
			}
		}); // end nêu Số điện thoại mẹ thay đổi sẽ 
		// nêu tỉnh thay đổi sẽ  chọn huyện thay đổi
		$('#tinh_them_sinh_vien').change(function() {
			var tinh_them_sinh_vien=$('#tinh_them_sinh_vien').val();
			$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {tinh_them_sinh_vien:tinh_them_sinh_vien},
				async:true,
				success:function(kq){
					$("#huyen_them_sinh_vien").html(kq);
					$("#xa_them_sinh_vien").html('<option value="">Chọn xã</option>');
				}
			});
		}); // end nêu tỉnh thay đổi sẽ  chọn huyện thay đổi
		// nêu tỉnh , huyện thay đổi sẽ  chọn xã thay đổi
		$('#huyen_them_sinh_vien').change(function() {
			var huyen_them_sinh_vien=$('#huyen_them_sinh_vien').val();
			$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {huyen_them_sinh_vien:huyen_them_sinh_vien},
				async:true,
				success:function(kq){
					$("#xa_them_sinh_vien").html(kq);
				}
			});
		});// nêu tỉnh , huyện thay đổi sẽ  chọn xã thay đổi
		// nêu khóa thay đổi sẽ  chọn xã thay đổi
		$('#khoa_them_sinh_vien').change(function() {
			var khoa_them_sinh_vien=$('#khoa_them_sinh_vien').val();
			$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {khoa_them_sinh_vien1:khoa_them_sinh_vien},
				async:true,
				success:function(kq){
					$("#id_khoa_them_sinh_vien").html(kq);
					$("#lop_them_sinh_vien").html('<option value="">Chọn lớp</option>');
				}
			});
		});// nêu khóa thay đổi sẽ  chọn xã thay đổi
		// nêu khoa thay đổi sẽ  chọn lớp thay đổi
		$('#id_khoa_them_sinh_vien').change(function() {
			var khoa_them_sinh_vien=$('#khoa_them_sinh_vien').val();
			var id_khoa_them_sinh_vien=$('#id_khoa_them_sinh_vien').val();
			alert(khoa_them_sinh_vien+'--'+id_khoa_them_sinh_vien);
			if (khoa_them_sinh_vien=='') {
				alert('Bạn phải chọn khóa học trước');
				document.getElementById('khoa_them_sinh_vien').focus();
			}else {
				$.ajax({
					url:"../dulieu/xuly_chon_hktt.php",
					type: "post",
					data: {id_khoa_them_sinh_vien:id_khoa_them_sinh_vien,
						khoa_them_sinh_vien:khoa_them_sinh_vien},
					async:true,
					success:function(kq){
						$("#lop_them_sinh_vien").html(kq);
					}
				});
			}
		});	// nêu khoa thay đổi sẽ  chọn lớp thay đổi
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
							alert('Mã sinh viên hoặc tên sinh viên đã tồn tại');
							document.getElementById(ma_sinh_vien_sua123).focus();
						}else {
							if (kq_capnhat_thongtin_sinh_vien==99) {
								alert('Cập nhật thông tin sinh viên thành công');
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
	$('#form_themsinhvienmoi').on('submit', function(event){
		event.preventDefault();
		var anh1 = document.getElementById('file_anh_sv');
		var loaianh = anh1.files[0].type;
		var match= ["image/jpeg","image/png","image/jpg"];
		if(!((loaianh==match[0]) || (loaianh==match[1]) || (loaianh==match[2]))){
				alert("Bạn phải chọn file ảnh có đuôi là (jpeg, jpg and png)");
		}else{
			var ma_sinhvien_themmoi123=$('#ma_sinhvien_themmoi123').val();
			if (ma_sinhvien_themmoi123.length!=10) {
				alert('MSSV phải 10 chữ số');
				document.getElementById('ma_sinhvien_themmoi123').focus();
			}else {
				$.ajax({
					url:"./../dulieu/add_sinh_vien_moi.php",
					type:'POST',
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function (kql_add_sinh_vien) {
						if (kql_add_sinh_vien==1) {
							alert('Mã sinh viên đã tồn tạo');
							document.getElementById("ma_sinhvien_themmoi123").focus();
		          		}else if (kql_add_sinh_vien==6) {
		          			alert('Số CMND viên đã tồn tạo');
							document.getElementById("cmnd_them_sinh_vien").focus();
		          		}else if (kql_add_sinh_vien==2) {
		          			alert('Số điện thoại sinh viên đã tồn tạo');
							document.getElementById("so_dt_them_sinh_vien").focus();
		          		}else if (kql_add_sinh_vien==3) {
		          			alert('Email sinh viên đã tồn tạo');
							document.getElementById("email_them_sinh_vien").focus();
		          		}else if (kql_add_sinh_vien==4) {
		          			alert('Số điện thoại Cha sinh viên đã tồn tạo');
							document.getElementById("sdtcha_them_sinh_vien").focus();
		          		}else if (kql_add_sinh_vien==5) {
		          			alert('Số điện thoại Mẹ sinh viên đã tồn tạo');
							document.getElementById("sdtme_them_sinh_vien").focus();
		          		}else if (kql_add_sinh_vien==99) {
								alert('Thêm sinh viên mới thành công');
								$('#ma_sinh_vien_them').html();
								$('#ten_sinh_vien_them').html();
								$('#form_themsinh_vienmoi')[0].reset();
								$('#dulieusinhvien').load("./../dulieu/dulieusinhvien.php");
						}else {
								alert('Lỗi Thêm');
						}
		          		
					}
				});
	     	}
		}
	});
});
