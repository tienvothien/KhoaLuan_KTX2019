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
		$("#file_anh_sv_sua").change(function() {
			var file = this.files[0];
			var imagefile = file.type;
			var match= ["image/jpeg","image/png","image/jpg"];
			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
				$('#previewing_sinhvien_sua123_load').attr('src','ấdasd');
				alert("Bạn phải chọn file ảnh có đuôi là (jpeg, jpg and png)");
				// $("#message").html("<p id='error'>Bạn phải chọn pha</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only  Images type allowed</span>");
				return false;
			}else{
				var reader = new FileReader();
				reader.onload = imageIsLoaded2;
				reader.readAsDataURL(this.files[0]);
			}
		});
		function imageIsLoaded2(e) {
			$("#file_anh_sv_sua").css("color","green");
			$('#image_preview_sinhvien_sua123').css("display", "block");
			$('#previewing_sinhvien_sua123_load').attr('src', e.target.result);
			$('#previewing_sinhvien_sua123_load').attr('width', '100px');
			$('#previewing_sinhvien_sua123_load').attr('height', '130px');
			$('#previewing_sinhvien_sua123_load').attr('border', '1px solid #d8d8d8');
		};
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
		});//end  nêu tỉnh , huyện thay đổi sẽ  chọn xã thay đổi
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
		});// end nêu khóa thay đổi sẽ  chọn xã thay đổi
		// nêu khoa thay đổi sẽ  chọn lớp thay đổi
		$('#id_khoa_them_sinh_vien').change(function() {
			var khoa_them_sinh_vien=$('#khoa_them_sinh_vien').val();
			var id_khoa_them_sinh_vien=$('#id_khoa_them_sinh_vien').val();
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
		});	//end  nêu khoa thay đổi sẽ  chọn lớp thay đổi
		$('#tinh_sua_sinh_vien').change(function() {
			var tinh_sua_sinh_vien=$('#tinh_sua_sinh_vien').val();
			$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {tinh_them_sinh_vien:tinh_sua_sinh_vien},
				async:true,
				success:function(kq){
					$("#huyen_sua_sinh_vien").html(kq);
					$("#xa_sua_sinh_vien").html('<option value="">Chọn xã</option>');
				}
			});
		}); // end nêu tỉnh phần cập nhật sinh viên thay đổi sẽ  chọn huyện thay đổi
		// nêu tỉnh , huyện phần cập nhật sinh viên thay đổi sẽ  chọn xã thay đổi
		$('#huyen_sua_sinh_vien').change(function() {
			var huyen_sua_sinh_vien=$('#huyen_sua_sinh_vien').val();
			$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {huyen_them_sinh_vien:huyen_sua_sinh_vien},
				async:true,
				success:function(kq){
					$("#xa_sua_sinh_vien").html(kq);
				}
			});
		});//end nêu tỉnh , huyện thay phần cập nhật sinh viên đổi sẽ  chọn xã thay đổi
		// nêu id khoa của phần sửa sinh viên thay đổi sẽ  chọn lớp thay đổi
		// nêu khóa của phần sửa sinh viên thay đổi sẽ  chọn xã thay đổi
		$('#khoa_sua_sinh_vien').change(function() {
			var khoa_sua_sinh_vien=$('#khoa_sua_sinh_vien').val();
			$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {khoa_them_sinh_vien1:khoa_sua_sinh_vien},
				async:true,
				success:function(kq){
					$("#id_khoa_sua_sinh_vien").html(kq);
					$("#lop_sua_sinh_vien").html('<option value="">Chọn lớp</option>');
				}
			});
		});// end nêu khóa thay đổi sẽ  chọn xã thay đổi
		$('#id_khoa_sua_sinh_vien').change(function() {
			var khoa_sua_sinh_vien=$('#khoa_sua_sinh_vien').val();
			var id_khoa_sua_sinh_vien=$('#id_khoa_sua_sinh_vien').val();
			if (khoa_sua_sinh_vien=='') {
				alert('Bạn phải chọn khóa học trước');
				document.getElementById('khoa_sua_sinh_vien').focus();
			}else {
				$.ajax({
					url:"../dulieu/xuly_chon_hktt.php",
					type: "post",
					data: {id_khoa_them_sinh_vien:id_khoa_sua_sinh_vien,
						khoa_them_sinh_vien:khoa_sua_sinh_vien},
					async:true,
					success:function(kq){
						$("#lop_sua_sinh_vien").html(kq);
					}
				});
			}
		});	// end nêu id khoa của phần sửa sinh viênthay đổi sẽ  chọn lớp thay đổi
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
		// hiện thông tin xã
		$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {id_sinh_vien_sua:id_sinh_vien_sua},
				async:true,
				success:function(kq){
					$("#xa_sua_sinh_vien").html(kq);
				}
			});
		// end hiện thông tin xã
		// hiện thông tin huyện
		$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {id_sinh_vien_sua_huyen:id_sinh_vien_sua},
				async:true,
				success:function(kq){
					$("#huyen_sua_sinh_vien").html(kq);
				}
			});
		// end hiện thông tin huyện
		// hiện thông tin lớp
		$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {id_sinh_vien_sua_id_lop:id_sinh_vien_sua},
				async:true,
				success:function(kq){
					$("#lop_sua_sinh_vien").html(kq);
				}
			});
		// end hiện thông tin id Khoa
		$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {id_sinh_vien_sua_id_lop:id_sinh_vien_sua},
				async:true,
				success:function(kq){
					$("#lop_sua_sinh_vien").html(kq);
				}
			});
		// end hiện thông tin id Khoa
		$.ajax({
			url:"../dulieu/fetch_tt_sinh_vien.php",
			method:"POST",
			data:{id_sinh_vien_sua:id_sinh_vien_sua},
			dataType:"json",
			success:function(data_suasinh_vien){
				$('#file_anh_sv_sua').attr("value",data_suasinh_vien.anh_ca_nhan);// tt hinh ảnh
				$('#previewing_sinhvien_sua123_load').attr('src','./../images/'+data_suasinh_vien.anh_ca_nhan);
				$('#ma_sinhvien_sua123').val(data_suasinh_vien.mssv);// tt mssv
				$('#ho_sinhviensua_12').val(data_suasinh_vien.ho_sv);// tt ho sv
				$('#ten_sinhviensua_12').val(data_suasinh_vien.ten_sv);// tt tên sinh viên
				$('#ngaysinh_sinhviensua_12').val(data_suasinh_vien.ngay_sinh);// tt ngày sinh
				$('#id_gioitinhsua').val(data_suasinh_vien.gioi_tinh);// thông tinh giới tính
				$('#id_gioitinhsua').html(data_suasinh_vien.gioi_tinh);// thông tinh giới tính
				$('#quequan_sua_sinh_vien').val(data_suasinh_vien.que_quan);// tt quê quán
				$('#cmnd_sua_sinh_vien').val(data_suasinh_vien.so_cmnd);// tt số cmnd
				$('#ngay_capcnnd_sua_sinh_vien').val(data_suasinh_vien.ngay_cap); // tt ngay cấp cmnd
				$('#noicap_sua_sinh_vien').val(data_suasinh_vien.noi_cap);// tt nơi cấp cmnd
				// tt hộ khẩu thường trú
				$('#tinh_sua_sinh_vien').val(data_suasinh_vien.matinh);// tt tỉnh
				// $('#id_huyensua').val(data_suasinh_vien.mahuyen);// tt huyện
				// $('#id_huyensua').html(data_suasinh_vien.caphuyen+data_suasinh_vien.tenhuyen);// tt huyện
				// $('#xa_sua_sinh_vien').val(data_suasinh_vien.maxa);// tt xã
				// $('#id_xa_sua').val(data_suasinh_vien.maxa);// tt xã
				// $('#id_xa_sua').html(data_suasinh_vien.capxa+data_suasinh_vien.tenxa);// tt xã
				$('#sonha_sua_sinh_vien').val(data_suasinh_vien.so_nha);// tt số nhà
				//end tt hộ khẩu thường trú
				$('#so_dt_sua_sinh_vien').val(data_suasinh_vien.so_dt);// tt sdt
				$('#email_sua_sinh_vien').val(data_suasinh_vien.email); // tt email
				$('#hotencha_sua_sinh_vien').val(data_suasinh_vien.hotencha);// tt họ tên cha sinh viên
				$('#sdtcha_sua_sinh_vien').val(data_suasinh_vien.sdtcha);// tt sdt cha sinh viên
				$('#hotenme_sua_sinh_vien').val(data_suasinh_vien.hotenme);// tt họ tên mẹ sinh viên
				$('#sdtme_sua_sinh_vien').val(data_suasinh_vien.sdtme);// tt sđt mẹ sinh viên
				$('#khoa_sua_sinh_vien').val(data_suasinh_vien.khoa);// thông tin khóa sinh viên
				$('#id_khoa_dl_khoa_sua_sv').val(data_suasinh_vien.id_khoa);// thông tin khoa sinh viên
				$('#id_khoa_dl_khoa_sua_sv').html(data_suasinh_vien.ten_khoa);// thông tin khoa sinh viên

				// $('#id_lop_sua_sv').val(data_suasinh_vien.id_lop);// thông tin lớp sinh viên
				// $('#lop_sua_sinh_vien').val(data_suasinh_vien.ten_lop);// thông tin lớp sinh viên

				$('#id_sinhvien_sua_12').val(data_suasinh_vien.id_sinhvien);// id sửa tt sinnh vien
				$('#insert').val("Cập nhật");
				$('#modal_sua_sinhvien').modal('show');
			}
		});
	});
	// cap nhat tt sinh viên
	$('#from_suathongtin_sinhvien').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			var ma_sinhvien_sua123=$('#ma_sinhvien_sua123').val();
			if (ma_sinhvien_sua123.length!=10) {
				alert('MSSV phải 10 chữ số');
				document.getElementById('ma_sinhvien_sua123').focus();
			}else if ($('#cmnd_sua_sinh_vien').val().length!=9) {
				alert('Chứ minh nhân dân phải 9 chữ số');
				document.getElementById('cmnd_sua_sinh_vien').focus();
			}else if ($('#so_dt_sua_sinh_vien').val().length!=10 || document.getElementById('so_dt_sua_sinh_vien').value.slice(0, 1)!=0) {
				alert('Số điện thoại sinh viên phải 10 số và bất đầu là số "0"');
				document.getElementById('so_dt_sua_sinh_vien').focus();
			}else if ($('#sdtme_sua_sinh_vien').val().length!=10 && $('#sdtme_sua_sinh_vien').val()!='' || document.getElementById('sdtme_sua_sinh_vien').value.slice(0, 1)!=0) {
				alert('Số điện thoại Mẹ phải 10 số và bất đầu là số "0"');
				document.getElementById('sdtme_sua_sinh_vien').focus();
			}else if ($('#sdtcha_sua_sinh_vien').val().length!=10 && $('#sdtcha_sua_sinh_vien').val()!='' || document.getElementById('sdtcha_sua_sinh_vien').value.slice(0, 1)!=0) {
				alert('Số điện thoại phải Cha 10 số và bất đầu là số "0"');
				document.getElementById('sdtcha_sua_sinh_vien').focus();
			}else if (($('#sdtcha_sua_sinh_vien').val()==$('#so_dt_sua_sinh_vien').val() || $('#sdtcha_sua_sinh_vien').val()==$('#sdtme_sua_sinh_vien').val() )&& $('#sdtcha_sua_sinh_vien').val()!='') {
				alert('Số điện thoại Cha sinh viên đã tồn tại');
				document.getElementById('sdtcha_sua_sinh_vien').focus();
			}else if (($('#sdtme_sua_sinh_vien').val()==$('#so_dt_sua_sinh_vien').val() || $('#sdtme_sua_sinh_vien').val()==$('#sdtcha_sua_sinh_vien').val())&& $('#sdtcha_sua_sinh_vien').val()!='' ) {
				alert('Số điện thoại Mẹ sinh viên đã tồn tại');
				document.getElementById('sdtme_sua_sinh_vien').focus();
			}else {
				$.ajax({
					url:"./../dulieu/update_sinh_vien_moi.php",
					type:'POST',
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function (kql_update_sinh_vien) {
						// alert(kql_update_sinh_vien);
						if (kql_update_sinh_vien==1) {
							alert('Mã sinh viên đã tồn tạo');
							document.getElementById("ma_sinhvien_sua123").focus();
			       		}else if (kql_update_sinh_vien==6) {
			       			alert('Số CMND viên đã tồn tạo');
							document.getElementById("cmnd_sua_sinh_vien").focus();
			       		}else if (kql_update_sinh_vien==2) {
			       			alert('Số điện thoại sinh viên đã tồn tạo');
							document.getElementById("so_dt_sua_sinh_vien").focus();
			       		}else if (kql_update_sinh_vien==3) {
			       			alert('Email sinh viên đã tồn tạo');
							document.getElementById("email_sua_sinh_vien").focus();
			        	}else if (kql_update_sinh_vien==4) {
			        		alert('Số điện thoại Cha sinh viên đã tồn tạo');
							document.getElementById("sdtcha_sua_sinh_vien").focus();
			          	}else if (kql_update_sinh_vien==5) {
			          		alert('Số điện thoại Mẹ sinh viên đã tồn tạo');
							document.getElementById("sdtme_sua_sinh_vien").focus();
			          	}else if (kql_update_sinh_vien==99) {
							alert('Cập nhật thông tin sinh viên mới thành công');
							$('#modal_sua_sinhvien').modal('hide');
							$('#from_suathongtin_sinhvien')[0].reset();
							location.reload();
						}else if (kql_update_sinh_vien==88) {
							alert('Bạn phải chọn file ảnh');
						}else{
							alert('Lỗi Cập nhật thông tin');
						}
			          		
						}
					});
		     	}
		     
		}
	});
	// end cập nhật thông tin sinh viên
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
						location.reload();					}else {
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
			}else if ($('#cmnd_them_sinh_vien').val().length!=9) {
				alert('Chứ minh nhân dân phải 9 chữ số');
				document.getElementById('cmnd_them_sinh_vien').focus();
			}else if ($('#so_dt_them_sinh_vien').val().length!=10 || $('#so_dt_them_sinh_vien').val().slice(0, 1)!=0) {
				alert('Số điện thoại phải 10 số và bất đầu là số "0" và bất đầu là số "0"');
				document.getElementById('so_dt_them_sinh_vien').focus();
			}else if ($('#sdtcha_them_sinh_vien').val().length!=10 && $('#sdtcha_them_sinh_vien').val()!='' || document.getElementById('sdtcha_them_sinh_vien').value.slice(0, 1)!=0 ) {
				alert('Số điện thoại Cha phải 10 số và bất đầu là số "0"');
				document.getElementById('sdtcha_them_sinh_vien').focus();
			}else if ($('#sdtme_them_sinh_vien').val().length!=10 && $('#sdtme_them_sinh_vien').val()!='' || document.getElementById('sdtme_them_sinh_vien').value.slice(0, 1)!=0) {
				alert('Số điện thoại Mẹ phải 10 số và bất đầu là số "0"');
				document.getElementById('sdtme_them_sinh_vien').focus();
			}else if (($('#sdtcha_them_sinh_vien').val()==$('#so_dt_them_sinh_vien').val() || $('#sdtcha_them_sinh_vien').val()==$('#sdtme_them_sinh_vien').val() )&& $('#sdtcha_them_sinh_vien').val()!='' ) {
				alert('Số điện thoại Cha sinh viên đã tồn tại');
				document.getElementById('sdtcha_them_sinh_vien').focus();
			}else if (($('#sdtme_them_sinh_vien').val()==$('#so_dt_them_sinh_vien').val() || $('#sdtme_them_sinh_vien').val()==$('#sdtcha_them_sinh_vien').val() )&& $('#sdtme_them_sinh_vien').val()!='') {
				alert('Số điện thoại Mẹ sinh viên đã tồn tại');
				document.getElementById('sdtme_them_sinh_vien').focus();
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
								$('#form_themsinhvienmoi')[0].reset();
								location.reload();
						}else {
								alert('Lỗi Thêm');
						}
		          		
					}
				});
	     	}
		}
	});// end xử lý thêm sinh viên
});
