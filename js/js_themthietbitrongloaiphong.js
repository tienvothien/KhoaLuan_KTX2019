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
                success:function(data_ctb_sua){
                    // $('#dulieu_cu_lp').html 
                    $('#id_loaiphong_sua_ctb').val(data_ctb_sua.id_loaiphong);
                    $('#dulieu_cu_tb').html(data_ctb_sua.tenthietbi);
                    $('#dulieu_cu_tb').val(data_ctb_sua.idtb);
                    $('#dulieu_cu').html(data_ctb_sua.soluong);
                    $('#dulieu_cu').val(data_ctb_sua.soluong);
                    $('#id_ctbtrongloaip_sua').val(data_ctb_sua.idcothietbi);
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
		          	$.ajax({
						url:"./../dulieu/insert.php",
						method:"POST",
						data:$('#from_suathongtin_thietbitrongloaiphong').serialize(),
						success:function(kq_capnhat_thongtin_thietbitrongloaiphong){
							// alert(kq_capnhat_thongtin_thietbitrongloaiphong);
							if(kq_capnhat_thongtin_thietbitrongloaiphong==1){
								alert('Thiết bị này đã có trong Loại phòng này rồi..!');
							}else {
								if (kq_capnhat_thongtin_thietbitrongloaiphong==99) {
									alert('Cập nhật thông tin trong loại phòng  thành công');
									$('#from_suathongtin_thietbitrongloaiphong')[0].reset();
	                                $('#modal_sua_thietbitrongloaiphong').modal('hide');
									$('#dulieuthietbitrongloaiphong').load("./../dulieu/dulieuthietbitrongloaiphong.php");
								}else {
									alert('Lỗi cập nhật');
								}
							}
	                    }
					});
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
                    $('#id_loaiphong_xoa').val(data_xoathietbitrongloaiphong.ten_loai_phong);
                    $('#id_tb_xoaloaiphomg').val(data_xoathietbitrongloaiphong.tenthietbi);
                    $('#soluong_thietbitrongloaiphong_xoa123').val(data_xoathietbitrongloaiphong.soluong);
                    $('#id_thietbitrongloaiphong_xoa_12').val(data_xoathietbitrongloaiphong.idcothietbi);
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
					data:{id_ctb_xoa_trongloaip:id_xoa_thietbitrongloaiphong123},
					success:function(kq_xoa_thietbitrongloaiphong){
						if (kq_xoa_thietbitrongloaiphong==99) {
							alert('Xóa Thiết bị trong Loại phòng thành công');
							$('#From_xoa_thietbitrongloaiphong')[0].reset();
							$('#modal_xoa_thietbitrongloaiphong').modal('hide');
							$('#dulieuthietbitrongloaiphong').load("./../dulieu/dulieuthietbitrongloaiphong.php");
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
