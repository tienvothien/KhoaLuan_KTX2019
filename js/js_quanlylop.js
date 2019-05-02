$(document).ready(function () {
	// Xem chi tiet thoong tin lop
	$(document).on('click', '.view_chitietlop', function(){
           var id_chitietlop = $(this).attr("id");
           if(id_chitietlop != '')
           {
                $.ajax({
                     url:"./../dulieu/select.php",
                     method:"POST",
                     data:{id_chitietlop:id_chitietlop},
                     success:function(data){
                          $('#thongtin_chitietlop').html(data);
                          $('#dataModal').modal('show');
                     }
                });
           }
      });
	// sửa thông tin lop
	$(document).on('click', '.id_sua_lop', function(){
           var id_lop_sua = $(this).attr("id");
           // alert(id_lop_sua);
           $.ajax({
                url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_lop_sua:id_lop_sua},
                dataType:"json",
                success:function(data_sualop){
                    $('#ma_lop_sua123').val(data_sualop.ma_lop);
                    $('#ten_lopsua_12').val(data_sualop.ten_lop);
                    // $('#khoahienra').html(data_sualop.ten_khoa);?\
                    $('#id_khoa_sua_lopt').val(data_sualop.id_khoa);
                    $('#dl_nambdat_sua_lop').html(data_sualop.nam_BD);
                    $('#dl_nambdat_sua_lop').val(data_sualop.nam_BD);
                    $('#dl_khoa_sua_lop').html(data_sualop.khoa);
                    $('#dl_khoa_sua_lop').val(data_sualop.khoa);
                    $('#id_lop_sua_12').val(data_sualop.id_lop);
                    $('#insert').val("Cập nhật");
                    $('#modal_sua_lop').modal('show');
                }
           });
      });
	// xử lý khi bấn nút cập nhật lại thông tin lop
	// cap nhat tt lopws
      	$('#from_suathongtin_lop').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
	        	if($('#ma_lop_sua123').val().length==6){
		          	$.ajax({
						url:"./../dulieu/insert.php",
						method:"POST",
						data:$('#from_suathongtin_lop').serialize(),
						success:function(kq_capnhat_thongtin_lop){
							if(kq_capnhat_thongtin_lop==1){
								alert('Mã Lớp hoặc tên Lớp đã tồn tại');
								document.getElementById(ma_lop_them).focus();
							}else {
								if (kq_capnhat_thongtin_lop==99) {
									alert('Cập nhật thông tin lớp thành công');
									$('#from_suathongtin_lop')[0].reset();
	                                $('#modal_sua_lop').modal('hide');
	                                location.reload();
								}else {
									alert('Lỗi cập nhật');
								}
							}
	                    }
					});

				}else {
					alert('Độ dài Mã Lớp không đúng');
					document.getElementById("ma_lop_sua123").focus();
				}
         	}   
      	});
      // hiện thông tin xóa lop
	$(document).on('click', '.xoa_lop', function(){
           var id_lop_sua = $(this).attr("id");
           // alert(id_lop_sua);
           $.ajax({
                url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_lop_sua:id_lop_sua},
                dataType:"json",
                success:function(data_xoalop){
                    $('#ma_lop_xoa123').val(data_xoalop.ma_lop);
                    $('#ten_lopxoa_12').val(data_xoalop.ten_lop);
                    $('#khoa_lopxoa_12').val(data_xoalop.ten_khoa);
                    $('#id_lop_xoa_12').val(data_xoalop.id_lop);
                    $('#insert_xoa').val("Xóa");
                    $('#modal_xoa_lop').modal('show');
                }
           });
      });
	// xử lý xoa lop 
	$('#From_xoa_lop').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
	        	var id_xoa_lop123=($('#id_lop_xoa_12').val());
				$.ajax({
					url:"./../dulieu/insert.php",
					method:"POST",
					data:{id_xoa_lop123:id_xoa_lop123},
					success:function(kq_xoa_lop){
						if (kq_xoa_lop==99) {
							alert('Xóa lớp công');
							$('#From_xoa_lop')[0].reset();
							$('#modal_xoa_lop').modal('hide');
							location.reload();
						}
	                }
				});
         	}   
      	});
	// xuwrt lý nút thêm lop mới
	$('#form_themlopmoi').on('submit', function(event){
          event.preventDefault();
          if($('#ma_lop_them').val().length==6){
	        $.ajax({
	          	url: './../dulieu/add_lopmoi.php',
	          	type: 'POST',
	          	data:$('#form_themlopmoi').serialize(),
	          	success:function (kql_add_lop12) {
	          		if(kql_add_lop12==1){
	          			alert('Mã Lớp hoặc Tên lớp đã tồn tại');
	          			document.getElementById("ma_lop_them").focus();
	          		}else {
	          			if (kql_add_lop12==99) {
	          				alert('Thêm Lớp thành công');
							$('#form_themlopmoi')[0].reset();
	          				$('#modal_xoa_lop').modal('hide');
	          				location.reload();
	          			}else {
	          				alert('lỗi thêm Lớp');
	          			}
	          		} 
	         	}
	         });
      	}else {
	      	alert("Độ dài mã lớp không đúng");
			document.getElementById("ma_lop_them").focus();
      	}
    });
});
