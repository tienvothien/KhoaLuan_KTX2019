$(document).ready(function () {
	// Xem chi tiet thoong tin sinh_vien
	$(document).on('click', '.xemchitiettaikhoansv', function(){
		var id_chitietsinh_vien = $(this).attr("id");
			$.ajax({
				url:"./../dulieu/chitetsinhvien.php",
				method:"POST",
				data:{id_chitietsinh_vien:id_chitietsinh_vien},
				success:function(data){
					$('#thongtin_chitietsinh_vien123').html(data);
					$('#dataModal').modal('show');
				}
			});
	});
	$('#doi_matkhau_tk_sv').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			alert("ok");
			var mat_khau_cu_sv= $('#mat_khau_cu_sv').val();
			alert(mat_khau_cu_sv);
			alert('md5'+MD5(mat_khau_cu_sv));
		}

	});
});