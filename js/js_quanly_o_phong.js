$(document).ready(function () {
	// nhap mã số cán bộ hiện thông tin cán bộ
	$('#mssv_o_phong_them').change(function() {
		if ($('#mssv_o_phong_them').val().length!=10) {
			alert('Mã cán bộ phải 10 chữ số');
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
		}
		
	});
	// Xem chi tiet thoong tin o_phong
	$(document).on('click', '.view_chitieto_phong', function(){
           var id_chitieto_phong = $(this).attr("id");
           if(id_chitieto_phong != '')
           {
                $.ajax({
                     url:"./../dulieu/select.php",
                     method:"POST",
                     data:{id_chitietcan_bo:id_chitieto_phong},
                     success:function(data){
                          $('#thongtin_chitieto_phong').html(data);
                          $('#dataModal').modal('show');
                     }
                });
           }
      });
	// sửa thông tin o_phong
	$(document).on('click', '.id_sua_o_phong', function(){
           var id_o_phong_sua = $(this).attr("id");
           // alert(id_o_phong_sua);
           $.ajax({
                url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_o_phong_sua:id_o_phong_sua},
                dataType:"json",
                success:function(data_suao_phong){
                    $('#ma_o_phong_sua123').val(data_suao_phong.mao_phong);
                    $('#ten_o_phongsua_12').val(data_suao_phong.teno_phong);
                    $('#id_o_phong_sua_12').val(data_suao_phong.ido_phong);
                    $('#insert').val("Cập nhật");
                    $('#modal_sua_o_phong').modal('show');
                }
           });
      });
	// xử lý khi bấn nút cập nhật lại thông tin o_phong
	// cap nhat tt thiết bi
    $('#from_suathongtin_o_phong').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
	        	if($('#ma_o_phong_sua123').val().length==3){
		          	$.ajax({
						url:"./../dulieu/insert.php",
						method:"POST",
						data:$('#from_suathongtin_o_phong').serialize(),
						success:function(kq_capnhat_thongtin_o_phong){
							if(kq_capnhat_thongtin_o_phong==1){
								alert('Mã Chức vụ hoặc tên Chức vụ đã tồn tại');
								document.getElementById(ma_o_phong_sua123).focus();
							}else {
								if (kq_capnhat_thongtin_o_phong==99) {
									alert('Cập nhật thông tin Chức vụ thành công');
									$('#from_suathongtin_o_phong')[0].reset();
	                                $('#modal_sua_o_phong').modal('hide');
	                                $('#dulieuo_phong').load("./../dulieu/dulieuo_phong.php")
								}else {
									alert('Lỗi cập nhật');
								}
							}
	                    }
					});
				}else {
					alert('Độ dài Mã o_phong không đúng');
					document.getElementById("ma_o_phong_sua123").focus();
				}
         	}   
      	});
      // hiện thông tin xóa o_phong
	$(document).on('click', '.xoa_o_phong', function(){
           var id_o_phong_xoa = $(this).attr("id");
           // alert(id_o_phong_xoa);
           $.ajax({
                     url:"./../dulieu/select.php",
                     method:"POST",
                     data:{id_o_phong_sua:id_o_phong_xoa},
                     success:function(data){
                          $('#dulieu_cab_o_phong').html(data);
                          $('#id_o_phong_xoa_12').val(id_o_phong_sua);
                          $('#modal_xoa_o_phong').modal('show');
                     }
                });
      });
	// xử lý xoa o_phong 
	$('#From_xoa_o_phong').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          event.stopImmediatePropagation();
	          event.preventDefault();
	        }else{
	        	var id_xoa_o_phong123=($('#id_o_phong_xoa_12').val());
				$.ajax({
					url:"./../dulieu/insert.php",
					method:"POST",
					data:{id_xoa_o_phong123:id_xoa_o_phong123},
					success:function(kq_xoa_o_phong){
						if (kq_xoa_o_phong==99) {
							alert('Xóa Có Chức vụ thành công');
							$('#From_xoa_o_phong')[0].reset();
							$('#modal_xoa_o_phong').modal('hide');
							location.reload();
						}else {
							alert('Lỗi xóa Có Chức vụ thành');
						}
	                    }
					});
         	}   
      	});
	// xuwrt lý nút thêm o_phong mới
	$('#form_themo_phongmoi').on('submit', function(event){
		event.preventDefault();
		var macanbo_o_phong_them=$('#macanbo_o_phong_them').val();
		var id_chucvuthem_o_phong=$('#id_chucvuthem_o_phong').val();
		if ($('#macanbo_o_phong_them').val().length!=10) {
			alert('Mã cán bộ phải 10 chữ số');
			document.getElementById('macanbo_o_phong_them').focus();
		}else {
			$.ajax({
				url: './../dulieu/add_o_phongmoi.php',
				type: 'POST',
				data: {macanbo_o_phong_them12:macanbo_o_phong_them,
					id_chucvuthem_o_phong12:id_chucvuthem_o_phong},
				success:function (kql_add_o_phong) {
					if (kql_add_o_phong==1) {
						alert('Cán bộ đã có chức vụ này');
						document.getElementById("macanbo_o_phong_them").focus();
	          		}else {
						if (kql_add_o_phong==99) {
							alert('Thêm Chức vụ mới thành công');
							$('#tt_canbo').html('');
							$('#macanbo_o_phong_them').html();
							$('#id_chucvuthem_o_phong').html();
							$('#form_themo_phongmoi')[0].reset();
							$('#dulieuo_phong').load("./../dulieu/dulieuo_phong.php");
						}else {
							alert('Lỗi Thêm');
						}
	          		}
				}
			});
		}
	});
});
