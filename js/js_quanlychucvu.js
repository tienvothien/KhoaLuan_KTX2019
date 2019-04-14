$(document).ready(function () {
	// Xem chi tiet thoong tin chucvu
	$(document).on('click', '.view_chitietchucvu', function(){
           var id_chitietchucvu = $(this).attr("id");
           if(id_chitietchucvu != '')
           {
                $.ajax({
                     url:"./../dulieu/select.php",
                     method:"POST",
                     data:{id_chitietchucvu:id_chitietchucvu},
                     success:function(data){
                          $('#thongtin_chitietchucvu').html(data);
                          $('#dataModal').modal('show');
                     }
                });
           }
      });
	// sửa thông tin chucvu
	$(document).on('click', '.id_sua_chucvu', function(){
           var id_chucvu_sua = $(this).attr("id");
           // alert(id_chucvu_sua);
           $.ajax({
                url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_chucvu_sua:id_chucvu_sua},
                dataType:"json",
                success:function(data_suachucvu){
                    $('#ma_chucvu_sua123').val(data_suachucvu.machucvu);
                    $('#ten_chucvusua_12').val(data_suachucvu.tenchucvu);
                    $('#id_chucvu_sua_12').val(data_suachucvu.idchucvu);
                    $('#insert').val("Cập nhật");
                    $('#modal_sua_chucvu').modal('show');
                }
           });
      });
	// xử lý khi bấn nút cập nhật lại thông tin chucvu
	// cap nhat tt thiết bi
    $('#from_suathongtin_chucvu').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
	        	if($('#ma_chucvu_sua123').val().length==3){
		          	$.ajax({
						url:"./../dulieu/insert.php",
						method:"POST",
						data:$('#from_suathongtin_chucvu').serialize(),
						success:function(kq_capnhat_thongtin_chucvu){
							if(kq_capnhat_thongtin_chucvu==1){
								alert('Mã Chức vụ hoặc tên Chức vụ đã tồn tại');
								document.getElementById(ma_chucvu_sua123).focus();
							}else {
								if (kq_capnhat_thongtin_chucvu==99) {
									alert('Cập nhật thông tin Chức vụ thành công');
									$('#from_suathongtin_chucvu')[0].reset();
	                                $('#modal_sua_chucvu').modal('hide');
	                                $('#dulieuchucvu').load("./../dulieu/dulieuchucvu.php")
								}else {
									alert('Lỗi cập nhật');
								}
							}
	                    }
					});
				}else {
					alert('Độ dài Mã chucvu không đúng');
					document.getElementById("ma_chucvu_sua123").focus();
				}
         	}   
      	});
      // hiện thông tin xóa chucvu
	$(document).on('click', '.xoa_chucvu', function(){
           var id_chucvu_sua = $(this).attr("id");
           // alert(id_chucvu_sua);
           $.ajax({
                url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_chucvu_sua:id_chucvu_sua},
                dataType:"json",
                success:function(data_xoachucvu){
                    $('#ma_chucvu_xoa123').val(data_xoachucvu.machucvu);
                    $('#ten_chucvuxoa_12').val(data_xoachucvu.tenchucvu);
                    $('#id_chucvu_xoa_12').val(data_xoachucvu.idchucvu);
                    $('#insert_xoa').val("Xóa");
                    $('#modal_xoa_chucvu').modal('show');
                }
           });
      });
	// xử lý xoa chucvu 
	$('#From_xoa_chucvu').on('submit', function(event){
          event.preventDefault();
          if(!confirm($(this).data('confirm'))){
	          e.stopImmediatePropagation();
	          e.preventDefault();
	        }else{
	        	var id_xoa_chucvu123=($('#id_chucvu_xoa_12').val());
				$.ajax({
					url:"./../dulieu/insert.php",
					method:"POST",
					data:{id_xoa_chucvu123:id_xoa_chucvu123},
					success:function(kq_xoa_chucvu){
						if (kq_xoa_chucvu==99) {
							alert('Xóa Chức vụ công');
							$('#From_xoa_chucvu')[0].reset();
							$('#modal_xoa_chucvu').modal('hide');
							$('#dulieuchucvu').load("./../dulieu/dulieuchucvu.php")
						}else {
							alert('Lỗi xóa Chức vụ');
						}
	                    }
					});
         	}   
      	});
	// xuwrt lý nút thêm chucvu mới
	$('#form_themchucvumoi').on('submit', function(event){
		event.preventDefault();
		var ma_chucvu_them=$('#ma_chucvu_them').val();
		var ten_chucvu_them=$('#ten_chucvu_them').val();
		if(ma_chucvu_them.length==3){
			$.ajax({
				url: './../dulieu/add_chucvumoi.php',
				type: 'POST',
				data: {ma_chucvu_them12:ma_chucvu_them,ten_chucvu_them12:ten_chucvu_them},
				success:function (kql_add_chucvu) {
					if (kql_add_chucvu==1) {
						alert('Mã Chức vụ hoặc tên chức vụ đã tồn tạo');
						document.getElementById("ma_chucvu_them").focus();
	          		}else {
						if (kql_add_chucvu==99) {
							alert('Thêm Chức vụ mới thành công');
							$('#ma_chucvu_them').html();
							$('#ten_chucvu_them').html();
							$('#form_themchucvumoi')[0].reset();
							$('#dulieuchucvu').load("./../dulieu/dulieuchucvu.php");
						}else {
							alert('Lỗi Thêm');
						}
	          		}
				}
			});
     	}else {
			alert("Độ dài mã Chức vụ không đúng");
			document.getElementById("ma_chucvu_them").focus();
		}
	});
});
