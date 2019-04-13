$(document).ready(function () {
	// Xem chi tiet thoong tin thietbitrongloaiphong
	$(document).on('click', '.view_chitietthietbitrongloaiphong', function(){
           var id_chitietthietbitrongloaiphong = $(this).attr("id");
           if(id_chitietthietbitrongloaiphong != '')
           {
                $.ajax({
                     url:"./../dulieu/select.php",
                     method:"POST",
                     data:{id_chitietthietbitrongloaiphong:id_chitietthietbitrongloaiphong},
                     success:function(data){
                          $('#thongtin_chitietthietbitrongloaiphong').html(data);
                          $('#dataModal').modal('show');
                     }
                });
           }
      });
	// sửa thông tin thietbitrongloaiphong
	$(document).on('click', '.id_sua_thietbitrongloaiphong', function(){
           var id_thietbitrongloaiphong_sua = $(this).attr("id");
           // alert(id_thietbitrongloaiphong_sua);
           $.ajax({
                url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_thietbitrongloaiphong_sua:id_thietbitrongloaiphong_sua},
                dataType:"json",
                success:function(data_suathietbitrongloaiphong){
                    $('#ma_thietbitrongloaiphong_sua123').val(data_suathietbitrongloaiphong.ma_thietbitrongloaiphong);
                    $('#ten_thietbitrongloaiphongsua_12').val(data_suathietbitrongloaiphong.ten_thietbitrongloaiphong);
                    $('#khoahienra').html(data_suathietbitrongloaiphong.ten_khoa);
                    $('#khoahienra').val(data_suathietbitrongloaiphong.id_khoa);
                    $('#dl_nambdat_sua_thietbitrongloaiphong').html(data_suathietbitrongloaiphong.nam_BD);
                    $('#dl_nambdat_sua_thietbitrongloaiphong').val(data_suathietbitrongloaiphong.nam_BD);
                    $('#dl_khoa_sua_thietbitrongloaiphong').html(data_suathietbitrongloaiphong.khoa);
                    $('#dl_khoa_sua_thietbitrongloaiphong').val(data_suathietbitrongloaiphong.khoa);
                    $('#id_thietbitrongloaiphong_sua_12').val(data_suathietbitrongloaiphong.id_thietbitrongloaiphong);
                    $('#insert').val("Cập nhật");
                    $('#modal_sua_thietbitrongloaiphong').modal('show');
                }
           });
      });
	// xử lý khi bấn nút cập nhật lại thông tin thietbitrongloaiphong
	// cap nhat tt thietbitrongloaiphongws
      	$('#from_suathongtin_thietbitrongloaiphong').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
	        	if($('#ma_thietbitrongloaiphong_sua123').val().length==6){
		          	$.ajax({
						url:"./../dulieu/insert.php",
						method:"POST",
						data:$('#from_suathongtin_thietbitrongloaiphong').serialize(),
						success:function(kq_capnhat_thongtin_thietbitrongloaiphong){
							alert(kq_capnhat_thongtin_thietbitrongloaiphong);
							if(kq_capnhat_thongtin_thietbitrongloaiphong==1){
								alert('Mã Lớp hoặc tên Lớp đã tồn tại');
								document.getElementById(ma_thietbitrongloaiphong_them).focus();
							}else {
								if (kq_capnhat_thongtin_thietbitrongloaiphong==99) {
									alert('Cập nhật thông tin thietbitrongloaiphong thành công');
									$('#from_suathongtin_thietbitrongloaiphong')[0].reset();
	                                $('#modal_sua_thietbitrongloaiphong').modal('hide');
	                                $('#dulieuthietbitrongloaiphong').load("./../dulieu/dulieuthietbitrongloaiphongsv.php")
								}else {
									alert('Lỗi cập nhật');
								}
							}
	                    }
					});

				}else {
					alert('Độ dài Mã Lớp không đúng');
					document.getElementById("ma_thietbitrongloaiphong_sua123").focus();
				}
         	}   
      	});
      // hiện thông tin xóa thietbitrongloaiphong
	$(document).on('click', '.xoa_thietbitrongloaiphong', function(){
           var id_thietbitrongloaiphong_sua = $(this).attr("id");
           // alert(id_thietbitrongloaiphong_sua);
           $.ajax({
                url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_thietbitrongloaiphong_sua:id_thietbitrongloaiphong_sua},
                dataType:"json",
                success:function(data_xoathietbitrongloaiphong){
                    $('#ma_thietbitrongloaiphong_xoa123').val(data_xoathietbitrongloaiphong.ma_thietbitrongloaiphong);
                    $('#ten_thietbitrongloaiphongxoa_12').val(data_xoathietbitrongloaiphong.ten_thietbitrongloaiphong);
                    $('#khoa_thietbitrongloaiphongxoa_12').val(data_xoathietbitrongloaiphong.ten_khoa);
                    $('#id_thietbitrongloaiphong_xoa_12').val(data_xoathietbitrongloaiphong.id_thietbitrongloaiphong);
                    $('#insert_xoa').val("Xóa");
                    $('#modal_xoa_thietbitrongloaiphong').modal('show');
                }
           });
      });
	// xử lý xoa thietbitrongloaiphong 
	$('#From_xoa_thietbitrongloaiphong').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
	        	var id_xoa_thietbitrongloaiphong123=($('#id_thietbitrongloaiphong_xoa_12').val());
				$.ajax({
					url:"./../dulieu/insert.php",
					method:"POST",
					data:{id_xoa_thietbitrongloaiphong123:id_xoa_thietbitrongloaiphong123},
					success:function(kq_xoa_thietbitrongloaiphong){
						if (kq_xoa_thietbitrongloaiphong==99) {
							alert('Xóa lớp công');
							$('#From_xoa_thietbitrongloaiphong')[0].reset();
							$('#modal_xoa_thietbitrongloaiphong').modal('hide');
							$('#dulieuthietbitrongloaiphong').load("./../dulieu/dulieuthietbitrongloaiphongsv.php")
						}
	                    }
					});
         	}   
      	});
	// xuwrt lý nút thêm thietbitrongloaiphong mới
	$('#form_themthietbitrongloaiphongmoi').on('submit', function(event){
          event.preventDefault();
	        $.ajax({
	          	url: './../dulieu/add_thietbitrongloaiphongmoi.php',
	          	type: 'POST',
	          	data:$('#form_themthietbitrongloaiphongmoi').serialize(),
	          	success:function (kql_add_thietbitrongloaiphong12) {
	          		if(kql_add_thietbitrongloaiphong12==1){
	          			alert('Loại phòng đã có thiết bị này rồi');
	          			document.getElementById("idtb_thietbitrongloaiphong_them").focus();
	          		}else {
	          			if (kql_add_thietbitrongloaiphong12==99) {
	          				alert('Thêm thiết bị vào loại phòng thành công');
							$('#form_themthietbitrongloaiphongmoi')[0].reset();
	          				$('#themthietbitrongloaiphong1').modal('hide');
							$('#dulieuthietbitrongloaiphong').load("./../dulieu/dulieuthietbitrongloaiphong.php")
	          			}
	          		}
	         	}
	         });

      	
    });
});
