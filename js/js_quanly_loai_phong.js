$(document).ready(function() {

	// xử lý thêm Loại phòng mới
	$('#form_them_loai_phong_moi').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			if ($('#ma_loai_phong_themmoi123').val().length!=3) {
				alert('Độ dài mã Loại phòng không đúng');
				document.getElementById('ma_loai_phong_themmoi123').focus();
			}else {
				var giatri_phong=($('#gia_loai_phong_themmoi123').val());
				if (giatri_phong.replace(/[,]/g, '')<50000) {
					alert('Giá phòng phải ít nhất 50,000');
					document.getElementById('gia_loai_phong_themmoi123').focus();
				}else {
					$.ajax({
						url:"./../dulieu/add_loai_phong_moi.php",
						type:'POST',
						data:new FormData(this),
						contentType: false,
						cache: false,
						processData:false,
						success:function(kq_add_loai_phong){
							// alert(kq_add_loai_phong);
							if (kq_add_loai_phong==1) {
								alert('Mã Loại phòng hoặc tên Loại phòng đã tồn tại');
								document.getElementById('ma_loai_phong_themmoi123').focus();
							}else if (kq_add_loai_phong==99) {
								alert('Thêm Loại phòng thành công');
								$('#form_them_loai_phong_moi')[0].reset();
								$('#dulieu_loai_phong').load('./../dulieu/dulieu_loai_phong.php');
							}else {
								alert('Lỗi thêm');
							}
						}
					});
				}
			}   
		}
	});
	// end xử lý thêm Loại phòng mới
	//xử lý xem chi tiết Loại phòng
	$(document).on('click', '.view_chitietloai_phong', function(event) {
		event.preventDefault();
		 var id_chitietloai_phong = $(this).attr("id");
			$.ajax({
				url:"./../dulieu/select.php",
				method:"POST",
				data:{id_chitietloai_phong:id_chitietloai_phong},
				success:function(data){
					$('#thongtin_chitietloai_phong').html(data);
					$('#dataModal').modal('show');
				}
			});
		/* Act on the event */
	});//end xử lý xem chi tiết Loại phòng
	//xử lý xem hiện thông tin Loại phòng xóa
	$(document).on('click', '.xoa_loai_phong', function(event) {
		event.preventDefault();
		 var id_chitietloai_phong = $(this).attr("id");
			$.ajax({
				url:"./../dulieu/select.php",
				method:"POST",
				data:{id_chitietloai_phong:id_chitietloai_phong},
				success:function(data){
					$('#thongtinsv_xoa12').html(data);
					$('#modal_xoa_loai_phong_').modal('show');
					$('#id_loai_phong_xoa_12').val(id_chitietloai_phong);
				}
			});
		/* Act on the event */
	});
	//xử lý bấm submit xóa Loại phòng 
	$('#From_xoa_loai_phong_').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			var id_xoa_loai_phong = $('#id_loai_phong_xoa_12').val();
			$.ajax({
					url:"./../dulieu/insert.php",
					method:"POST",
					data:{id_xoa_loai_phong:id_xoa_loai_phong},
					success:function(kq_xoa_loai_phong){
						if (kq_xoa_loai_phong==99) {
							alert('Xóa Loại phòng thành công');
							$('#From_xoa_loai_phong_')[0].reset();
							$('#modal_xoa_loai_phong_').modal('hide');
							$('#dulieu_loai_phong').load('./../dulieu/dulieu_loai_phong.php');
						}else if (kq_xoa_loai_phong==101) {
							alert('Còn sinh viên đang ở trong phòng của Loại phòng này! bạn phải chuyển sinh viên hết qua Loại phòng khác trước khi xóa Loại phòng!');
						}else{
							alert('Lỗi xóa Loại phòng');
						}
					}
				});
		}
		/* Act on the event */
	});//xử lý bấm submit xóa Loại phòng
	//xử lý xem hiện thông tin Loại phòng Cập nhật
	$(document).on('click', '.id_sua_loai_phong', function(event) {
		event.preventDefault();
		var id_sua_loai_phong = $(this).attr("id");
			$.ajax({
				url:"../dulieu/fetch.php",
                method:"POST",
                data:{id_sua_loai_phong:id_sua_loai_phong},
                dataType:"json",
				success:function(data_sualoai_phong){
                    $('#ma_loai_phong_update_124').val(data_sualoai_phong.ma_loai_phong);
                    $('#ten_loai_phong_update_124').val(data_sualoai_phong.ten_loai_phong);
                    $('#gia_loai_phong_update_124').val(FormatNumber(data_sualoai_phong.gia_loai_phong));
                    $('#giatri_slnguoio_loai_phong_update_124').val(data_sualoai_phong.sl_nguoi_o);
                    $('#giatri_slnguoio_loai_phong_update_124').html(data_sualoai_phong.sl_nguoi_o);
                    $('#id_loai_phong_update_124').val(data_sualoai_phong.id_loaiphong);

					$('#modal_sua_loai_phong_').modal('show');
				}
			});
		/* Act on the event */
	});//xử lý xem hiện thông tin Loại phòng Cập nhật
	//xử lý bấm submit sửa Loại phòng 
	$('#from_suathongtin_loai_phong_').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			if ($('#ma_loai_phong_update_124').val().length!=3) {
				alert('Độ dài mã Loại phòng không đúng');
				document.getElementById('ma_loai_phong_update_124').focus();
			}else {
				var giatri_phong=($('#gia_loai_phong_update_124').val());
				if (giatri_phong.replace(/[,]/g, '')<50000) {
					alert('Giá phòng phải ít nhất 50,000');
					document.getElementById('gia_loai_phong_update_124').focus();
				}else {
					$.ajax({
						url:"./../dulieu/update_loai_phong.php",
						type:'POST',
						data:new FormData(this),
						contentType: false,
						cache: false,
						processData:false,
						success:function(kq_update_loai_phong){
							// alert(kq_update_loai_phong);
							if (kq_update_loai_phong==1) {
								alert('Mã Loại phòng đã tồn tại');
								document.getElementById('ma_loai_phong_update_124').focus();
							}else if (kq_update_loai_phong==2) {
								alert('Tên Loại phòng đã tồn tại');
								document.getElementById('ten_loai_phong_update_124').focus();
							}else if (kq_update_loai_phong==99) {
								alert('Cập nhật thông tin Loại phòng thành công');
								$('#from_suathongtin_loai_phong_')[0].reset();
								$('#modal_sua_loai_phong_').modal('hide');
								$('#dulieu_loai_phong').load('./../dulieu/dulieu_loai_phong.php');
							}else{
								alert('Lỗi Cập nhật Loại phòng');
							}
						}
					});
				}
			}
		}
		/* Act on the event */
	});//xử lý bấm submit sửa Loại phòng
});
// hiện thị số tiền có dạng 100,005

var inputnumber = 'Giá trị nhập vào không phải là số';
	function FormatNumber(str) {
		var strTemp = GetNumber(str);
		if (strTemp.length <= 3)
			return strTemp;
		strResult = "";
		for (var i = 0; i < strTemp.length; i++)
			strTemp = strTemp.replace(",", "");
		var m = strTemp.lastIndexOf(".");
		if (m == -1) {
			for (var i = strTemp.length; i >= 0; i--) {
				if (strResult.length > 0 && (strTemp.length - i - 1) % 3 == 0)
					strResult = "," + strResult;
				strResult = strTemp.substring(i, i + 1) + strResult;
			}
		} else {
			var strphannguyen = strTemp.substring(0, strTemp.lastIndexOf("."));
			var strphanthapphan = strTemp.substring(strTemp.lastIndexOf("."),
					strTemp.length);
			var tam = 0;
			for (var i = strphannguyen.length; i >= 0; i--) {

				if (strResult.length > 0 && tam == 4) {
					strResult = "," + strResult;
					tam = 1;
				}

				strResult = strphannguyen.substring(i, i + 1) + strResult;
				tam = tam + 1;
			}
			strResult = strResult + strphanthapphan;
		}
		return strResult;
	}

	function GetNumber(str) {
		var count = 0;
		for (var i = 0; i < str.length; i++) {
			var temp = str.substring(i, i + 1);
			if (!(temp == "," || temp == "." || (temp >= 0 && temp <= 9))) {
				alert(inputnumber);
				return str.substring(0, i);
			}
			if (temp == " ")
				return str.substring(0, i);
			if (temp == ".") {
				if (count > 0)
					return str.substring(0, ipubl_date);
				count++;
			}
		}
		return str;
	}

	function IsNumberInt(str) {
		for (var i = 0; i < str.length; i++) {
			var temp = str.substring(i, i + 1);
			if (!(temp == "." || (temp >= 0 && temp <= 9))) {
				alert(inputnumber);
				return str.substring(0, i);
			}
			if (temp == ",") {
				return str.substring(0, i);
			}
		}
		return str;
	}
//end xử lý tiền