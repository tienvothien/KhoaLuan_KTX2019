$(document).ready(function () {
	// Xem chi tiet thoong tin thietbi
	$(document).on('click', '.view_chitietthietbi', function(){
           var id_chitietthietbi = $(this).attr("id");
           if(id_chitietthietbi != '')
           {
                $.ajax({
                     url:"./../dulieu/select.php",
                     method:"POST",
                     data:{id_chitietthietbi:id_chitietthietbi},
                     success:function(data){
                          $('#thongtin_chitietthietbi').html(data);
                          $('#dataModal_thietbichitiet').modal('show');
                     }
                });
           }
      });
	// sửa thông tin thietbi
	$(document).on('click', '.id_sua_thietbi', function(){
           var id_thietbi_sua = $(this).attr("id");
           // alert(id_thietbi_sua);
           $.ajax({
                url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_thietbi_sua:id_thietbi_sua},
                dataType:"json",
                success:function(data_suathietbi){
                    $('#ma_thietbi_sua123').val(data_suathietbi.mathietbi);
                    $('#ten_thietbisua_12').val(data_suathietbi.tenthietbi);
                    $('#id_thietbi_sua_12').val(data_suathietbi.idtb);
                    $('#insert').val("Cập nhật");
                    $('#modal_sua_thietbi').modal('show');
                }
           });
      });
	// xử lý khi bấn nút cập nhật lại thông tin thietbi
	// cap nhat tt thiết bi
      	$('#from_suathongtin_thietbi').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
	        	if($('#ma_thietbi_sua123').val().length==5){
		          	$.ajax({
						url:"./../dulieu/insert.php",
						method:"POST",
						data:$('#from_suathongtin_thietbi').serialize(),
						success:function(kq_capnhat_thongtin_thietbi){
							// alert(kq_capnhat_thongtin_thietbi);
							if(kq_capnhat_thongtin_thietbi==1){
								alert('Mã Thiết bị hoặc tên Thiết bị đã tồn tại');
								document.getElementById(ma_thietbi_them).focus();
							}else {
								if (kq_capnhat_thongtin_thietbi==99) {
									alert('Cập nhật thông tin Thiết bị thành công');
									$('#from_suathongtin_thietbi')[0].reset();
	                                $('#modal_sua_thietbi').modal('hide');
	                                $('#dulieu_add_thietbi').load("./../dulieu/dulieuthietbi.php")
								}else {
									alert('Lỗi cập nhật');
								}
							}
	                    }
					});
				}else {
					alert('Độ dài Mã Thiết bị không đúng');
					document.getElementById("ma_thietbi_sua123").focus();
				}
         	}   
      	});
      // hiện thông tin xóa thietbi
	$(document).on('click', '.xoa_thietbi', function(){
           var id_thietbi_sua = $(this).attr("id");
           // alert(id_thietbi_sua);
           $.ajax({
                url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_thietbi_sua:id_thietbi_sua},
                dataType:"json",
                success:function(data_xoathietbi){
                    $('#ma_thietbi_xoa123').val(data_xoathietbi.mathietbi);
                    $('#ten_thietbixoa_12').val(data_xoathietbi.tenthietbi);
                    $('#id_thietbi_xoa_12').val(data_xoathietbi.idtb);
                    $('#insert_xoa').val("Xóa");
                    $('#modal_xoa_thietbi').modal('show');
                }
           });
      });
	// xử lý xoa thietbi 
	$('#From_xoa_thietbi').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
	        	var id_xoa_thietbi123=($('#id_thietbi_xoa_12').val());
				$.ajax({
					url:"./../dulieu/insert.php",
					method:"POST",
					data:{id_xoa_thietbi123:id_xoa_thietbi123},
					success:function(kq_xoa_thietbi){
						if (kq_xoa_thietbi==99) {
							alert('Xóa Thiết bị thành công');
							$('#From_xoa_thietbi')[0].reset();
							$('#modal_xoa_thietbi').modal('hide');
							document.location.reload(true);
						}
	                    }
					});
         	}   
      	});
	// xuwrt lý nút thêm thietbi mới
	$('#form_themthietbimoi').on('submit', function(event){
          event.preventDefault();
          var ma_thietbi_them = $('#ma_thietbi_them').val();
          var ten_thietbi_them = $('#ten_thietbi_them').val();
          if(ma_thietbi_them.length==5){
	        $.ajax({
	          	url: './../dulieu/add_thietbimoi.php',
	          	type: 'POST',
	          	data: {ma_thietbi_them:ma_thietbi_them,
	          		ten_thietbi_them:ten_thietbi_them
	          	},
	          	success:function (kql_add_thietbi) {
	          		if (kql_add_thietbi==1) {
	          			alert('Mã Thiết bị hoặc Tên thiết bị đã tồn tạo');
						document.getElementById("ma_thietbi_them").focus();
	          		}else {
	          				if (kql_add_thietbi==99) {
	          					alert('Thêm Thiết bị mới thành công');
	          					$('#ma_thietbi_them').html();
	          					$('#ten_thietbi_them').html();
	          					// $('#dulieu_add_lop').load("./../dulieu/dulieuthietbi.php");
								document.location.reload(true);

	          				}else {
	          					alert('Lỗi Thêm');
	          				}
	          			}
	         	}
	         });
      	}else {
      	alert("Độ dài mã thiết bị không đúng");
		document.getElementById("ma_thietbi_them").focus();

      	}
    });
});
