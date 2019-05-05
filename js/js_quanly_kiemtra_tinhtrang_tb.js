$(document).ready(function () {
	// cạp nhật số thiết bị hỏng của phòng
	  function edit_data(idcothietbi, idphong, dulieusua){
           $.ajax({
                url:"../dulieu/insert.php",
                method:"POST",
                data:{idcothietbi_tinhtrang:idcothietbi,
                	idphong_tinhtrang:idphong,
                	dulieusua_tinhtrang:dulieusua},
                success:function(data){
                     if(data==1){
                     		alert(' Phải nhập số nhỏ hơn hoặc bằng số thiết bị đang có');
                     }else if (data==99) {
                     	alert('Cập nhật kiểm tra thành công');
                     	location.reload();
                     }else{
                     	alert('Lỗi kiểm tra thiết bị');
                     }
                }
           });
      }
// cập nhật lại số lượng thiết bị hỏng
   $(document).on('blur', '._1231', function(){
           var chuoi_id = $(this).data("id1");
           var dulieusua = $(this).val();
           // cắt chuỗi 
            var idcothietbi12 = chuoi_id.slice(0,chuoi_id.indexOf('-'));
            var idphong12 = chuoi_id.slice(chuoi_id.indexOf('-')+1,chuoi_id.length);
            var result = confirm('Có chắc muốn cập nhật thông tin này?');

              if(result)  {
              	if (dulieusua<0 && Number.isInteger(dulieusua)==false) {
              		alert('Phải nhập số lơn hơn hoặc bằng 0 và là số nguyên');
              	}else {
                  	edit_data(idcothietbi12, idphong12, dulieusua);
              	}
              } 
           // 
      });
	// hiện thông tinphòng
	$(document).on('click', '.view_chitietphong', function(event) {
		event.preventDefault();
		 var id_chitiet_phong_tinhtrangthietbi = $(this).attr("id");
			$.ajax({
				url:"./../dulieu/select.php",
				method:"POST",
				data:{id_chitiet_phong_tinhtrangthietbi:id_chitiet_phong_tinhtrangthietbi},
				success:function(data){
					$('#thongtin_chitietphong').html(data);
					$('#dataModal').modal('show');
				}
			});
			
		/* Act on the event */
	});	//end  xử lý hiện thông tin xóa phòng 
	$(document).on('click', '.id_sua_phong', function(event) {
		event.preventDefault();
		 	var id_phong_sua_12 = $(this).attr("id");
			$.ajax({
				url:"../dulieu/fetch.php",
				 method:"POST",
                data:{id_phong_sua_12_thietbi_tinhtrang:id_phong_sua_12},
                dataType:"json",
				success:function(data){
					$('#id_toa_nha_sua_15').val(data.id_toanha);
					$('#sophong_sua_15').val(data.ma_phong);
					$('#tang_phong_sua_15').val(data.stt_tang);
					// $('#dul_id_toanha_sai').html(data.ten_toa_nha);
					$('#loai_phong_phong_sua_15').val(data.id_loaiphong);
					$('#dul_id_toanha_sai').html(data.ten_toa_nha);

					$('#modal_sua_phong').modal('show');
					$('#id_phong_sua_12').val(id_phong_sua_12);
				}
			});
			$.ajax({
				url:"./../dulieu/select.php",
				method:"POST",
				data:{id_phong_sua_12_thietbi_tinhtrang:id_phong_sua_12},
				success:function(data){
					$('#dulieu_kiemtra').html(data);
				}
			});

		/* Act on the event */
	});
	//end  xử lýb hiện thông tin Cập nhật phòng 
	// xử lý Cập nhật Phòng
	$('#from_suathongtin_phong').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			$.ajax({
				url:"./../dulieu/add_phong_moi.php",
				type:'POST',
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function (kql_update_phong) {
					if (kql_update_phong==1) {
						alert('Số phòng đã tồn tại');
						document.getElementById('sophong_themmoi').focus();
					}else if (kql_update_phong==99) {
						alert('Cập nhật Phòng thành công');
						$('#modal_sua_phong').modal('hide');
						$('#from_suathongtin_phong')[0].reset();
						$('#dulieuphong').load("./../dulieu/dulieuphong.php");
					}
				}
			});
		}
	});
	//End  xử lý Cập nhật Phòng
});