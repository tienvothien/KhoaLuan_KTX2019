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
			if ($_POST['ma_khoa_sua123']!=$logdl_row["ma_khoa"]) {
				$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('khoa','Khoa','$_POST[id_khoa_sua_12]','ma_khoa','Mã Khoa', '$logdl_row[ma_khoa]','$_POST[ma_khoa_sua123]','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')";
				mysqli_query($con, $log1);
			}
			if ($_POST['ten_khoasua_12']!=$logdl_row['ten_khoa']) {
				$log2 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('khoa','Khoa','$_POST[id_khoa_sua_12]','ten_khoa','tên Khoa', '$logdl_row[ten_khoa]','$_POST[ten_khoasua_12]','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')";
				mysqli_query($con, $log2);
			}
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
		$delete_xoa_khoa = "UPDATE khoa SET khoa.xoa=1, khoa.id_canboxoa='$_SESSION[id_canbo]', khoa.ngay_xoa='".date('Y/m/d H:i:s')."' WHERE khoa.id_khoa = '$_POST[id_xoa_khoa123]'";
		if (mysqli_query($con,$delete_xoa_khoa)) {
			echo "99";
		}else{
			echo "100";
		}
	}
	// end xử lý xóa khoa
	//xủ lý xoa khoa
	if (isset($_POST['id_xoa_lop123'])) {
		$delete_xoa_lop = "UPDATE lop SET lop.xoa=1, lop.id_canboxoa='$_SESSION[id_canbo]', lop.ngay_xoa='".date('Y/m/d H:i:s')."' WHERE lop.id_lop = '$_POST[id_xoa_lop123]'";
		if (mysqli_query($con,$delete_xoa_lop)) {
			echo "99";
		}else{
			echo "100";
		}
	}
	// kiểm tra và cap nbhat lại thông tin lop
	if (isset($_POST['id_lop_sua_12']) && isset($_POST['ten_lopsua_12']) && isset($_POST['ma_lop_sua123']) ) {
		// kiểm tra ma lop  và tên lop da tôn tại chưa
		// gan biến
		$id_lop_sua = $_POST['id_lop_sua_12'];
		$ma_lop_sua = $_POST['ma_lop_sua123'];
		$ten_lop_sua = $_POST['ten_lopsua_12'];
		$id_khoa_lop_sua = $_POST['id_khoa_sua_lopt'];
		$nam_BD_sua = $_POST['nam_BD_sualopm'];
		$stt_khoa_lopsua = $_POST['stt_khoa_lopsua'];
		$kiemtramalop = mysqli_query($con,"SELECT * FROM lop WHERE lop.id_lop <> '$id_lop_sua' AND (lop.ma_lop='$ma_lop_sua' OR lop.ten_lop ='$ten_lop_sua')");
		// dlloc
		//end
		if(mysqli_num_rows($kiemtramalop)){
			echo "1";
		}else{
			$kiemtracapnhatlop=99;
			// ghi log
			$logdl_lop_row = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM lop WHERE lop.id_lop ='$id_lop_sua'"));
			if ($ma_lop_sua!=$logdl_lop_row["ma_lop"]) { // kiểm mã có thay đổi không
				$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('lop','Lớp','$id_lop_sua','ma_lop','Mã Lớp', '$logdl_lop_row[ma_lop]','$ma_lop_sua','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
				mysqli_query($con, $log1);
				//cập nhật dữ liệu thay đổi
				$Update_lop ="UPDATE lop SET lop.ma_lop = '$ma_lop_sua' WHERE lop.id_lop ='$id_lop_sua]'";
				if(mysqli_query($con, $Update_lop)){
					$kiemtracapnhatlop=99;
				}else{
					$kiemtracapnhatlop=100;
				}
			}// end kiểm mã có thay đổi không và cap nhat thông tin lop
			if ($ten_lop_sua!=$logdl_lop_row["ten_lop"]) { // kiểm tên lớp có thay đổi không
				$log2 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('lop','Lớp','$id_lop_sua','ten_lop','Tên Lớp', '$logdl_lop_row[ten_lop]','$ten_lop_sua','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
				mysqli_query($con, $log2);
				//cập nhật dữ liệu thay đổi
				$Update_lop ="UPDATE lop SET lop.ten_lop = '$ten_lop_sua' WHERE lop.id_lop ='$id_lop_sua]'";
				if(mysqli_query($con, $Update_lop)){
					$kiemtracapnhatlop=99;
				}else{
					$kiemtracapnhatlop=100;
				}
			}// end kiểm tên lớp có thay đổi không và cap nhat thông tin lop
			if ($id_khoa_lop_sua!=$logdl_lop_row["id_khoa"]) { // kiểm id khoa của lớp có thay đổi không
				$log2 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('lop','Lớp','$id_lop_sua','id_khoa','Tên Khoa', '$logdl_lop_row[id_khoa]','$id_khoa_lop_sua','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
				mysqli_query($con, $log2);
				//cập nhật dữ liệu thay đổi
				$Update_lop ="UPDATE lop SET lop.id_khoa = '$id_khoa_lop_sua' WHERE lop.id_lop ='$id_lop_sua]'";
				if(mysqli_query($con, $Update_lop)){
					$kiemtracapnhatlop=99;
				}else{
					$kiemtracapnhatlop=100;
				}
			}// end kiểm id_khoa của lớp có thay đổi không và cap nhat thông tin lop
			if ($stt_khoa_lopsua!=$logdl_lop_row["khoa"]) { // kiểm Khóa của lớp có thay đổi không
				$log2 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('lop','Lớp','$id_lop_sua','khoa','Khóa', '$logdl_lop_row[khoa]','$stt_khoa_lopsua','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
				mysqli_query($con, $log2);
				//cập nhật dữ liệu thay đổi
				$Update_lop ="UPDATE lop SET lop.khoa = '$stt_khoa_lopsua' WHERE lop.id_lop ='$id_lop_sua]'";
				if(mysqli_query($con, $Update_lop)){
					$kiemtracapnhatlop=99;
				}else{
					$kiemtracapnhatlop=100;
				}
			}// end kiểm khóa của lớp có thay đổi không và cap nhat thông tin lop
			if ($nam_BD_sua!=$logdl_lop_row["nam_BD"]) { // kiểm Khóa của lớp có thay đổi không
				$log2 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('lop','Lớp','$id_lop_sua','nam_BD','Năm bắt đầu', '$logdl_lop_row[nam_BD]','$nam_BD_sua','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
				mysqli_query($con, $log2);
				//cập nhật dữ liệu thay đổi
				$Update_lop ="UPDATE lop SET lop.nam_BD = '$nam_BD_sua' WHERE lop.id_lop ='$id_lop_sua]'";
				if(mysqli_query($con, $Update_lop)){
					$kiemtracapnhatlop=99;
				}else{
					$kiemtracapnhatlop=100;
				}
			}// end kiểm khóa của lớp có thay đổi không và cap nhat thông tin lop
			echo $kiemtracapnhatlop;
		}
	} //ket thuc cap nhat thong tin khoa
	// end xử lý xóa khoa
	mysqli_close($con);
?>