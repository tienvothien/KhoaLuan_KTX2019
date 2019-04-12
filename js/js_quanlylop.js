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
                    $('#khoahienra').html(data_sualop.ten_khoa);
                    $('#khoahienra').val(data_sualop.id_khoa);
                    $('#id_lop_sua_12').val(data_sualop.id_lop);
                    $('#insert').val("Cập nhật");
                    $('#modal_sua_lop').modal('show');
                }
           });
      });
	// xử lý khi bấn nút cập nhật lại thông tin lop
	// cap nhat tt thiết bi
      	$('#from_suathongtin_lop').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
	        	if($('#ma_lop_sua123').val().length==5){
		          	$.ajax({
						url:"./../dulieu/insert.php",
						method:"POST",
						data:$('#from_suathongtin_lop').serialize(),
						success:function(kq_capnhat_thongtin_lop){
							if(kq_capnhat_thongtin_lop==1){
								alert('Mã lop hoặc tên lop đã tồn tại');
								document.getElementById(ma_lop_them).focus();
							}else {
								if (kq_capnhat_thongtin_lop==99) {
									alert('Cập nhật thông tin lop thành công');
									$('#from_suathongtin_lop')[0].reset();
	                                $('#modal_sua_lop').modal('hide');
	                                $('#dulieulop').load("./../dulieu/dulieulopsv.php")
								}else {
									alert('Lỗi cập nhật');
								}
							}
	                    }
					});
				}else {
					alert('Độ dài Mã lop không đúng');
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
							alert('Xóa lop công');
							$('#From_xoa_lop')[0].reset();
							$('#modal_xoa_lop').modal('hide');
							$('#dulieulop').load("./../dulieu/dulieulopsv.php")
						}
	                    }
					});
         	}   
      	});
	// xuwrt lý nút thêm lop mới
	$('#form_themlopmoi').on('submit', function(event){
          event.preventDefault();
          var ma_lop_them = $('#ma_lop_them').val();
          var ten_lop_them = $('#ten_lop_them').val();
          if(ma_lop_them.length==4){
	        $.ajax({
	          	url: './../dulieu/add_lopmoi.php',
	          	type: 'POST',
	          	data: {ma_lop_them:ma_lop_them,
	          		ten_lop_them:ten_lop_them
	          	},
	          	success:function (kql_add_lop) {
	          		if (kql_add_lop==1) {
	          			alert('Mã lop đã tồn tạo');
						document.getElementById("ma_lop_them").focus();
	          		}else {
	          			if (kql_add_lop==2) {
	          				alert('Tên lop đã tồn tại');
	          				document.getElementById("ten_lop_them").focus();
	          			}else {
	          				if (kql_add_lop==99) {
	          					alert('Thêm lop mới thành công');
	          					$('#ma_lop_them').html();
	          					$('#ten_lop_them').html();
	          					$('#dulieulop').load("./../dulieu/dulieulopsv.php");
	          				}else {
	          					alert('Lỗi Thêm');
	          				}
	          			}
	          		}
	         	}
	          
	         });
      	}else {
      	alert("Độ dài mã lop không đúng");
		document.getElementById("ma_lop_them").focus();

      	}
    });
});
