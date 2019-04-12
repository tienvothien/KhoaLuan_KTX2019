<?php 
	include 'kiemtradangnhap.php'; 
	// kiểm tra và cap nbhat lại thông tin khoa
	if (isset($_POST['id_khoa_sua_12']) && isset($_POST['ten_khoasua_12']) && isset($_POST['ma_khoa_sua123']) ) {
		// kiểm tra ma khoa  và tên khoa da tôn tại chưa
		$kiemtramakhoa = mysqli_query($con,"SELECT * FROM khoa WHERE khoa.id_khoa <> '$_POST[id_khoa_sua_12]' AND (khoa.ma_khoa='$_POST[ma_khoa_sua123]' OR khoa.ten_khoa ='$_POST[ten_khoasua_12]')");
		// dlloc

		//end
		if(mysqli_num_rows($kiemtramakhoa)){
			echo "1";
		}else{

			// ghi log
			$logdl_row = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM khoa WHERE khoa.id_khoa ='$_POST[id_khoa_sua_12]'"));
			$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('khoa','Khoa','$_POST[id_khoa_sua_12]','ma_khoa','Mã Khoa', '$logdl_row[ma_khoa]','$_POST[ma_khoa_sua123]','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')";
			$log2 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('khoa','Khoa','$_POST[id_khoa_sua_12]','ten_khoa','tên Khoa', '$logdl_row[ten_khoa]','$_POST[ten_khoasua_12]','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')";
			
			mysqli_query($con, $log1);
			mysqli_query($con, $log2);
			// cap nhat thông tin khoa\
			$Update_khoa ="UPDATE khoa SET khoa.ma_khoa = '$_POST[ma_khoa_sua123]', khoa.ten_khoa='$_POST[ten_khoasua_12]' WHERE khoa.id_khoa ='$_POST[id_khoa_sua_12]'";
			if(mysqli_query($con, $Update_khoa)){

				echo "99";
			}else{
				echo "100";
			}
		}
	} //ket thuc cap nhat thong tin khoa
	//xủ lý xoa khoa
	if (isset($_POST['id_xoa_khoa123'])) {
		$delete_xoa_khoa = "UPDATE khoa SET khoa.xoa=1 WHERE khoa.id_khoa = '$_POST[id_xoa_khoa123]'";
		if (mysqli_query($con,$delete_xoa_khoa)) {
			echo "99";
		}else{
			echo "100";
		}
	}
	// end xử lý xóa khoa
	mysqli_close($con);
?>