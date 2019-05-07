$(document).ready(function () {
	// load anh trước khi cap nhat
	$(function() {
		$("#file_anh").change(function() {
			$("#message").empty(); // To remove the previous error message
			var file = this.files[0];
			var imagefile = file.type;
			var match= ["image/jpeg","image/png","image/jpg"];
			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
				$('#previewing').attr('src','');
				alert("Bạn phải chọn file ảnh có đuôi là (jpeg, jpg and png)");
				// $("#message").html("<p id='error'>Bạn phải chọn pha</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only  Images type allowed</span>");
				return false;
			}else{
				var reader = new FileReader();
				reader.onload = imageIsLoaded;
				reader.readAsDataURL(this.files[0]);
			}
		});
		$("#file_anh_sua").change(function() {
			var file = this.files[0];
			var imagefile = file.type;
			var match= ["image/jpeg","image/png","image/jpg"];
			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
				$('#previewing_sua').attr('src','ấdasd');
				alert("Bạn phải chọn file ảnh có đuôi là (jpeg, jpg and png)");
				// $("#message").html("<p id='error'>Bạn phải chọn pha</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only  Images type allowed</span>");
				return false;
			}else{
				var reader = new FileReader();
				reader.onload = imageIsLoaded2;
				reader.readAsDataURL(this.files[0]);
			}
		});
	});
	
	function imageIsLoaded2(e) {
		$("#file_anh").css("color","green");
		$('#image_preview').css("display", "block");
		$('#previewing_sua').attr('src', e.target.result);
		$('#previewing_sua').attr('width', '100px');
		$('#previewing_sua').attr('height', '130px');
	};
	function imageIsLoaded(e) {
		$("#file_anh").css("color","green");
		$('#image_preview').css("display", "block");
		$('#previewing').attr('src', e.target.result);
		$('#previewing').attr('width', '100px');
		$('#previewing').attr('height', '130px');
	}; // en kiem tra truoc khi cap nhat
	// Xem chi tiet thoong tin can_bo
	$(document).on('click', '.view_chitietcan_bo', function(){
           var id_chitietcan_bo = $(this).attr("id");
           if(id_chitietcan_bo != '')
           {
                $.ajax({
                     url:"./../dulieu/select.php",
                     method:"POST",
                     data:{id_chitietcan_bo:id_chitietcan_bo},
                     success:function(data){
                          $('#thongtin_chitietcan_bo').html(data);
                          $('#dataModal').modal('show');
                     }
                });
           }
      });
	// sửa thông tin can_bo
	$(document).on('click', '.id_sua_can_bo', function(){
           var id_can_bo_sua = $(this).attr("id");
           // alert(id_can_bo_sua);
           $.ajax({
                url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_can_bo_sua:id_can_bo_sua},
                dataType:"json",
                success:function(data_suacan_bo){
                    $('#id_can_bo_sua_12').val(data_suacan_bo.id_canbo);
                    $('#file_anh_sua').attr("value",data_suacan_bo.hinhanh);
                    $('#ma_can_bo_sua123').val(data_suacan_bo.ma_can_bo);
                    $('#ho_can_bosua_12').val(data_suacan_bo.ho_can_bo);
                    $('#ten_can_bosua_12').val(data_suacan_bo.ten_can_bo);
                    $('#dlgioitinhsua').val(data_suacan_bo.gioitinh);
                    $('#dlgioitinhsua').html(data_suacan_bo.gioitinh);
                	$('#previewing_sua').attr('src','./../images/'+data_suacan_bo.hinhanh);

                    $('#ngaysinh_can_bosua_12').val(data_suacan_bo.ngay_sinh);
                    $('#sdt_can_bosua_12').val(data_suacan_bo.sdt);
                    $('#email_can_bosua_12').val(data_suacan_bo.email);
                    $('#insert').val("Cập nhật");
                    $('#modal_sua_can_bo').modal('show');
                }
           });
      });
	// xử lý khi bấn nút cập nhật lại thông tin can_bo
	// cap nhat tt thiết bi
    $('#from_suathongtin_can_bo').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
		        	var sdt_so_0dau_sua =document.getElementById('sdt_can_bosua_12').value.slice(0, 1);
					var sdt_dodai_sua = document.getElementById('sdt_can_bosua_12').value.length;
					if (sdt_so_0dau_sua!=0 || sdt_dodai_sua!=10 ) {
						alert("Số điện thoại phải bắt đầu bằng số không và phải là 10 số");
						document.getElementById('sdt_can_bothemmoi_12').focus();
					}else {
			          	$.ajax({
							url:"./../dulieu/update_tt_canbo.php",
							type:'POST',
							data:new FormData(this),
							contentType: false,
			                cache: false,
			                processData:false,
							success:function(kq_capnhat_thongtin_can_bo){
								// alert(kq_capnhat_thongtin_can_bo);
								if(kq_capnhat_thongtin_can_bo==1){
									alert('Mã Cán bộ đã tồn tại');
									document.getElementById(ma_can_bo_sua123).focus();
								}else {
									if (kq_capnhat_thongtin_can_bo==2) {
										alert('Số điện thoại đã tồn tại');
										document.getElementById(sdt_can_bosua_12).focus();
									}else {
										if (kq_capnhat_thongtin_can_bo==3) {
											alert('Eamil đã tồn tại');
											document.getElementById(email_can_bosua_12).focus();
										}else {
											if (kq_capnhat_thongtin_can_bo==4) {
												alert('Bạn phải chọn file ảnh');
											}else {
												if (kq_capnhat_thongtin_can_bo==99) {
													alert('Cập nhật thông tin Cán bộ thành công');
													$('#from_suathongtin_can_bo')[0].reset();
					                                $('#modal_sua_can_bo').modal('hide');
					                               	location.reload();
												}else {
													alert('Lỗi cập nhật');
												}

											}
										}
									}
									
								}
		                    }
						});
					}	
         	}   
      	});
      // hiện thông tin xóa can_bo
	$(document).on('click', '.xoa_can_bo', function(){
           var id_can_bo_sua = $(this).attr("id");
           // alert(id_can_bo_sua);
           $.ajax({
                url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_can_bo_sua:id_can_bo_sua},
                dataType:"json",
                success:function(data_xoacan_bo){
                	$ten = data_xoacan_bo.ho_can_bo+' '+data_xoacan_bo.ten_can_bo;
                	$('#anh_can_bo_xoa123').attr('src','./../images/'+data_xoacan_bo.hinhanh);
                    $('#ma_can_bo_xoa123').val(data_xoacan_bo.ma_can_bo);
                    $('#ten_can_boxoa_12').val($ten);
                    $('#gioitinh_can_boxoa_12').val(data_xoacan_bo.gioitinh);
                    $('#ngaysinh_can_boxoa_12').val(data_xoacan_bo.ngay_sinh);
                    $('#id_can_bo_xoa_12').val(data_xoacan_bo.id_canbo);
                    $('#insert_xoa').val("Xóa");
                    $('#modal_xoa_can_bo').modal('show');
                }
           });
      });
	// xử lý xoa Cán bộ 
	$('#From_xoa_can_bo').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
	        	var id_xoa_can_bo123=($('#id_can_bo_xoa_12').val());
				$.ajax({
					url:"./../dulieu/insert.php",
					method:"POST",
					data:{id_xoa_can_bo123:id_xoa_can_bo123},
					success:function(kq_xoa_can_bo){
						if (kq_xoa_can_bo==99) {
							alert('Xóa Cán bộ thành công');
							$('#From_xoa_can_bo')[0].reset();
							$('#modal_xoa_can_bo').modal('hide');
							location.reload();
						}else {
							alert('Lỗi xóa Cán bộ');
						}
					}
				});
         	}   
      	});
	// xuwrt lý nút thêm Cán bộ mới
	$('#form_themcan_bomoi').on('submit', function(event){
		event.preventDefault();
			var sdt_so_0dau =document.getElementById('sdt_can_bothemmoi_12').value.slice(0, 1);
			var sdt_dodai = document.getElementById('sdt_can_bothemmoi_12').value.length;
			var anh1 = document.getElementById('file_anh');
			var loaianh = anh1.files[0].type;
			var match= ["image/jpeg","image/png","image/jpg"];
			if(!((loaianh==match[0]) || (loaianh==match[1]) || (loaianh==match[2]))){
				alert("Bạn phải chọn file ảnh có đuôi là (jpeg, jpg and png)");
			}else{
				if (sdt_so_0dau!=0 || sdt_dodai!=10 ) {
					alert("Số điện thoại phải bắt đầu bằng số không và phải là 10 số");
					document.getElementById('sdt_can_bothemmoi_12').focus();
				}else {
					$.ajax({
						url: './../dulieu/add_can_bomoi.php',
						type:'POST',
						data:new FormData(this),
						contentType: false,
		                cache: false,
		                processData:false,
						success:function (kql_add_can_bo) {
							if (kql_add_can_bo==99) {
								alert('Thêm Cán bộ mới thành công');
								$('#form_themcan_bomoi')[0].reset();
								$('#dulieucanbo').load("./../dulieu/dulieucanbo.php");
								location.reload()
							}else {
								if (kql_add_can_bo==1) {
									alert('Số điện thoại đã tồn tại..!');
									document.getElementById('sdt_can_bothemmoi_12').focus();
								}else{
									if (kql_add_can_bo==2) {
										alert('Email đã tồn tại..!');
										document.getElementById('email_can_bothemmoi_12').focus();
									}else{
										alert('Lỗi Thêm');
									}
								}
							}

						}
					});
				}
			}
		});
	});
