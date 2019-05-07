<?php

	include 'kiemtradangnhap.php';
	// kiểm tra và Cập nhật lại thông tin khoa
	if (isset($_POST['id_khoa_sua_12']) && isset($_POST['ten_khoasua_12']) && isset($_POST['ma_khoa_sua123']) ) {
		// kiểm tra ma khoa  và tên khoa da tôn tại chưa
		$kiemtramakhoa = mysqli_query($con,"SELECT * FROM khoa WHERE khoa.id_khoa <> '$_POST[id_khoa_sua_12]' AND (khoa.ma_khoa='$_POST[ma_khoa_sua123]' OR khoa.ten_khoa ='$_POST[ten_khoasua_12]') ");
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
	//xủ lý xoa lớp
	if (isset($_POST['id_xoa_lop123'])) {
		$delete_xoa_lop = "UPDATE lop SET lop.xoa=1, lop.id_canboxoa='$_SESSION[id_canbo]', lop.ngay_xoa='".date('Y/m/d H:i:s')."' WHERE lop.id_lop = '$_POST[id_xoa_lop123]'";
		if (mysqli_query($con,$delete_xoa_lop)) {
			echo "99";
		}else{
			echo "100";
		}
	}
	// kiểm tra và Cập nhật lại thông tin lop
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
	//xủ lý xóa thiết bị
	if (isset($_POST['id_xoa_thietbi123'])) {
		$delete_xoa_thietbi = "UPDATE thietbi SET thietbi.xoa=1, thietbi.id_canboxoa='$_SESSION[id_canbo]', thietbi.ngay_xoa='".date('Y/m/d H:i:s')."' WHERE thietbi.idtb = '$_POST[id_xoa_thietbi123]'";
		if (mysqli_query($con,$delete_xoa_thietbi)) {
			echo "99";
		}else{
			echo "100";
		}
	}//end xóa thiết bị
	// kiểm tra và Cập nhật lại thông tin thiết bị
	if (isset($_POST['id_thietbi_sua_12']) && isset($_POST['ten_thietbisua_12']) && isset($_POST['ma_thietbi_sua123']) ) {
		$id_tb_sua = $_POST['id_thietbi_sua_12'];// id loại phòng sửa
		$tentb_sua = $_POST['ten_thietbisua_12'];// id thiết bị sửa
		$ma_tbsua = $_POST['ma_thietbi_sua123'];// số lượng sửa
		// kiểm tra ma khoa  và tên khoa da tôn tại chưa
		$kiemtrathietbi = mysqli_query($con,"SELECT * FROM thietbi WHERE thietbi.idtb <> '$id_tb_sua'and (thietbi.mathietbi='$ma_tbsua' OR thietbi.tenthietbi ='$tentb_sua') ");
		// dlloc
		//end
		if(mysqli_num_rows($kiemtrathietbi)){
			echo "1";
		}else{
			$kiemtracapnhatctb=99;
			// ghi log
			$logdl_tbcu_row = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM thietbi WHERE thietbi.idtb ='$id_tb_sua'"));
			if ($ma_tbsua!=$logdl_tbcu_row["mathietbi"]) { // kiểm mã có thay đổi  mã Thiết bị
				$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('thietbi','Thiết bị','$id_tb_sua','mathietbi','Mã Thiết bị', '$logdl_tbcu_row[mathietbi]','$ma_tbsua','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
				mysqli_query($con, $log1);
				//cập nhật dữ liệu thay đổi
				$Update_tb1 ="UPDATE thietbi  SET thietbi.mathietbi = '$ma_tbsua' WHERE thietbi.idtb ='$id_tb_sua'";
				if(mysqli_query($con, $Update_tb1)){
					$kiemtracapnhatctb=99;
				}else{
					$kiemtracapnhatctb=100;
				}
			}//end kiểm mã có thay đổi  mã Thiết bị
			if ($tentb_sua!=$logdl_tbcu_row["tenthietbi"]) { // kiểm mã có thay đổi  Tên  Thiết bị
				$log2 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('thietbi','Thiết bị','$id_tb_sua','tenthietbi','Tên Thiết bị', '$logdl_tbcu_row[tenthietbi]','$tentb_sua','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
				mysqli_query($con, $log2);
				//cập nhật dữ liệu thay đổi
				$Update_tb23 ="UPDATE thietbi  SET thietbi.tenthietbi = '$tentb_sua' WHERE thietbi.idtb ='$id_tb_sua'";
				if(mysqli_query($con, $Update_tb23)){
					$kiemtracapnhatctb=99;
				}else{
					$kiemtracapnhatctb=100;
				}
			}//end kiểm Tên  có thay đổi  mã Thiết bị
			
			echo $kiemtracapnhatctb;
		}
	} //ket thuc cap nhat thhông tin thiết bị
	//xủ lý xóa thiết bị trong loại phòng
	if (isset($_POST['id_ctb_xoa_trongloaip'])) {
		$delete_xoa_ctb_loaip = "UPDATE loaiphongcothietbi ctb SET ctb.xoa = 1, ctb.id_canboxoa ='$_SESSION[id_canbo]', ctb.ngay_xoa='".date('Y/m/d H:i:s')."' WHERE ctb.idcothietbi='$_POST[id_ctb_xoa_trongloaip]'";
		if (mysqli_query($con,$delete_xoa_ctb_loaip)) {
			echo "99";
		}else{
			echo "100";
		}
	}//end xóa thiết bị
	// kiểm tra và Cập nhật lại thông tin thiết bị trong loại phòng
	if (isset($_POST['id_loaiphong_sua_ctb']) && isset($_POST['id_tb_ctb_sua']) && isset($_POST['soluong_ctb_sua']) &&  isset($_POST['id_ctbtrongloaip_sua'])) {
		// kiểm tra ma lop  và tên lop da tôn tại chưa
		// gan biến
		$id_loaiphong_sua_ctb = $_POST['id_loaiphong_sua_ctb'];// id loại phòng sửa
		$id_tb_ctb_sua = $_POST['id_tb_ctb_sua'];// id thiết bị sửa
		$soluong_ctb_sua = $_POST['soluong_ctb_sua'];// số lượng sửa
		$id_ctbtrongloaip_sua = $_POST['id_ctbtrongloaip_sua'];// id của  có thiết bị trong loại phòng
		// kiêm tra loại phòng đã có thiết bị chưa
		
		$kiemtramactb = mysqli_query($con, "SELECT * FROM loaiphongcothietbi ctb WHERE ctb.idcothietbi<>'$id_ctbtrongloaip_sua' AND ctb.id_loaiphong = '$id_loaiphong_sua_ctb' AND ctb.idtb ='$id_tb_ctb_sua' and ctb.xoa=0");
		if(mysqli_num_rows($kiemtramactb)){// kiểm tra tồn tại loại phòng đã có thiết bị
			echo "1";
		}else{
			$kiemtracapnhatctb=99;
			// ghi log
			$logdl_ctbcu_row = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM loaiphongcothietbi ctb WHERE ctb.idcothietbi ='$id_ctbtrongloaip_sua'"));
			if ($id_loaiphong_sua_ctb!=$logdl_ctbcu_row["id_loaiphong"]) { // kiểm mã có thay đổi  mã loại phòng
				$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('loaiphongcothietbi','Có thiết bị trong loại phòng','$id_ctbtrongloaip_sua','id_loaiphong','Loại phòng', '$logdl_ctbcu_row[id_loaiphong]','$id_loaiphong_sua_ctb','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
				mysqli_query($con, $log1);
				//cập nhật dữ liệu thay đổi
				$Update_ctb1 ="UPDATE loaiphongcothietbi ctb SET ctb.id_loaiphong = '$id_loaiphong_sua_ctb' WHERE ctb.idcothietbi ='$id_ctbtrongloaip_sua'";
				if(mysqli_query($con, $Update_ctb1)){
					$kiemtracapnhatctb=99;
				}else{
					$kiemtracapnhatctb=100;
				}
			}//end kiểm mã có thay đổi  mã loại phòng
			if ($id_tb_ctb_sua!=$logdl_ctbcu_row["idtb"]) { // kiểm mã có thay đổi  mã thiết bị của có thiết bị
				$log2 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('loaiphongcothietbi','Có thiết bị trong loại phòng','$id_ctbtrongloaip_sua','idtb','Thiết bị', '$logdl_ctbcu_row[idtb]','$id_tb_ctb_sua','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
				mysqli_query($con, $log2);
				//cập nhật dữ liệu thay đổi
				$Update_ctb1 ="UPDATE loaiphongcothietbi ctb SET ctb.idtb = '$id_tb_ctb_sua' WHERE ctb.idcothietbi ='$id_ctbtrongloaip_sua'";
				if(mysqli_query($con, $Update_ctb1)){
					$kiemtracapnhatlop=99;
				}else{
					$kiemtracapnhatlop=100;
				}
			}//end kiểm mã có thay đổi  mã thiết bị của có thiết bị
			if ($soluong_ctb_sua!=$logdl_ctbcu_row["soluong"]) { // kiểm mã có thay đổi  số lượng thiết bị của có thiết bị
				$log3 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('loaiphongcothietbi','Có thiết bị trong loại phòng','$id_ctbtrongloaip_sua','soluong','Số Lượng', '$logdl_ctbcu_row[soluong]','$soluong_ctb_sua','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
				mysqli_query($con, $log3);
				//cập nhật dữ liệu thay đổi
				$Update_ctb1 ="UPDATE loaiphongcothietbi ctb SET ctb.soluong = '$soluong_ctb_sua' WHERE ctb.idcothietbi ='$id_ctbtrongloaip_sua'";
				if(mysqli_query($con, $Update_ctb1)){
					$kiemtracapnhatlop=99;
				}else{
					$kiemtracapnhatlop=100;
				}
			}//end kiểm mã có thay đổi  số lượng thiết bị của có thiết bị
			echo $kiemtracapnhatctb;
		}// end kiểm mã có thay đổi không và cap nhat thông tin lop
	} //ket thuc kiểm tra và cap nhat thông tin Chức vụ 
	if (isset($_POST['id_xoa_chucvu123'])) { // xoa chức vụ
		$delete_xoa_chucvu = "UPDATE chucvu SET chucvu.xoa=1, chucvu.id_canboxoa='$_SESSION[id_canbo]', chucvu.ngay_xoa='".date('Y/m/d H:i:s')."' WHERE chucvu.idchucvu = '$_POST[id_xoa_chucvu123]'";
		if (mysqli_query($con,$delete_xoa_chucvu)) {
			echo "99";
		}else{
			echo "100";
		}
	}//end xóa Chức vụ
	// kiểm tra và Cập nhật lại thông tin thiết bị
	if (isset($_POST['id_chucvu_sua_12']) && isset($_POST['ten_chucvusua_12']) && isset($_POST['ma_chucvu_sua123']) ) {
		$id_chucvu_sua = $_POST['id_chucvu_sua_12'];// id loại phòng sửa
		$tenchucvu_sua = $_POST['ten_chucvusua_12'];// id thiết bị sửa
		$ma_chucvusua = $_POST['ma_chucvu_sua123'];// số lượng sửa
		// kiểm tra ma khoa  và tên khoa da tôn tại chưa
		$kiemtrachucvu = mysqli_query($con,"SELECT * FROM chucvu WHERE chucvu.idchucvu <> '$id_chucvu_sua' AND (chucvu.machucvu='$ma_chucvusua' OR chucvu.tenchucvu ='$tenchucvu_sua') ");
		// dlloc
		//end
		if(mysqli_num_rows($kiemtrachucvu)){
			echo "1";
		}else{
			$kiemtracapnhatcchucvu=99;
			// ghi log
			$logdl_chucvucu_row = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM chucvu WHERE chucvu.idchucvu ='$id_chucvu_sua'"));
			if ($ma_chucvusua!=$logdl_chucvucu_row["machucvu"]) { // kiểm mã có thay đổi  mã Chức vụ
				$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('chucvu','Chức vụ','$id_chucvu_sua','machucvu','Mã Chức vụ', '$logdl_chucvucu_row[machucvu]','$ma_chucvusua','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
				mysqli_query($con, $log1);
				//cập nhật dữ liệu thay đổi
				$Update_chucvu1 ="UPDATE chucvu  SET chucvu.machucvu = '$ma_chucvusua' WHERE chucvu.idchucvu ='$id_chucvu_sua'";
				if(mysqli_query($con, $Update_chucvu1)){
					$kiemtracapnhatcchucvu=99;
				}else{
					$kiemtracapnhatcchucvu=100;
				}
			}//end kiểm mã có thay đổi  mã Chức vụ
			if ($tenchucvu_sua!=$logdl_chucvucu_row["tenchucvu"]) { // kiểm mã có thay đổi  Tên  Chức vụ
				$log2 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('chucvu','Chức vụ','$id_chucvu_sua','tenchucvu','Tên Chức vụ', '$logdl_chucvucu_row[tenchucvu]','$tenchucvu_sua','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
				mysqli_query($con, $log2);
				//cập nhật dữ liệu thay đổi
				$Update_chucvu23 ="UPDATE chucvu  SET chucvu.tenchucvu = '$tenchucvu_sua' WHERE chucvu.idchucvu ='$id_chucvu_sua'";
				if(mysqli_query($con, $Update_chucvu23)){
					$kiemtracapnhatcchucvu=99;
				}else{
					$kiemtracapnhatcchucvu=100;
				}
			}//end kiểm Tên  có thay đổi  mã Chức vụ
			
			echo $kiemtracapnhatcchucvu;
		}
	} //ket thuc cap nhat thhông tin thiết bị
	if (isset($_POST['id_xoa_can_bo123'])) { // xoa Cán bộ

		$delete_xoa_can_bo = "UPDATE can_bo SET can_bo.xoa=1, can_bo.id_canboxoa='$_SESSION[id_canbo]', can_bo.ngay_xoa='".date('Y/m/d H:i:s')."' WHERE can_bo.id_canbo = '$_POST[id_xoa_can_bo123]'";
		if (mysqli_query($con,$delete_xoa_can_bo)) {
			echo "99";
		}else{
			echo "100";
		}
	}//end xóa Cán bộ

	if (isset($_POST['id_xoa_sinh_vien123'])) { // xoa sinh vien
		$delete_xoa_can_bo = "UPDATE sinh_vien SET sinh_vien.xoa=1, sinh_vien.id_canboxoa='$_SESSION[id_canbo]', sinh_vien.ngay_xoa='".date('Y/m/d H:i:s')."' WHERE sinh_vien.id_sinhvien = '$_POST[id_xoa_sinh_vien123]'";
		if (mysqli_query($con,$delete_xoa_can_bo)) {
			echo "99";
		}else{
			echo "100";
		}
	}//end xóa sinh vien
	// xoas Tòa nhà
	if (isset($_POST['id_xoa_toa_nha'])) { 
		// kiểm tra có sinh vien ở tòa nhà đó không
		$kiemtraophong = mysqli_query($con, "SELECT o_phong.id_ophong FROM phong, o_phong WHERE phong.xoa=0 AND phong.id_toanha ='$_POST[id_xoa_toa_nha]' AND phong.idphong=o_phong.id_phong AND o_phong.ngay_ket_thuc='0'");
		if (mysqli_num_rows($kiemtraophong)) {
			echo "101";
		}else{
			$delete_xoa_toa_nha = "UPDATE toa_nha SET toa_nha.xoa=1, toa_nha.id_canboxoa='$_SESSION[id_canbo]', toa_nha.ngay_xoa='".date('Y/m/d H:i:s')."' WHERE toa_nha.id_toanha = '$_POST[id_xoa_toa_nha]'";
			if (mysqli_query($con,$delete_xoa_toa_nha)) {
				echo "99";
			}else{
				echo "100";
			}
		}
	}//end xóa Tòa nhà
	// kiểm tra và Cập nhật lại thông tin Tòa nhà
	if (isset($_POST['ma_toa_nha_update_124']) && isset($_POST['ten_toa_nha_update_124']) && isset($_POST['loai_toa_nha_update_124'])&& isset($_POST['id_toa_nha_update_124']) ) {
		$id_toa_nha_update = $_POST['id_toa_nha_update_124'];
		$ma_toa_nha_update = $_POST['ma_toa_nha_update_124'];
		$ten_toa_nha_update = $_POST['ten_toa_nha_update_124'];
		$loai_toa_nha_update = $_POST['loai_toa_nha_update_124'];
		// kiểm tra mã tòa nhà tồn tại chưa
		$kiemtramatoa_nha = mysqli_query($con,"SELECT * FROM toa_nha WHERE toa_nha.id_toanha <> '$id_toa_nha_update' and  toa_nha.ma_toa_nha='$ma_toa_nha_update'");
		// dlog
		//end
		if(mysqli_num_rows($kiemtramatoa_nha)){
			echo "1";// mã đã tồn tại
		}else{
			// kiểm tra mã tòa nhà tồn tại chưa
			$kiemtra_ten_toa_nha = mysqli_query($con,"SELECT * FROM toa_nha WHERE toa_nha.id_toanha <> '$id_toa_nha_update' and  toa_nha.ten_toa_nha='$ten_toa_nha_update'");
			if(mysqli_num_rows($kiemtra_ten_toa_nha)){
				echo "2";// mã đã tồn tại
			}else{
				$kiemtra_update_toa_nha=99;
				// ghi log
				$logdl_toa_nha_row = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM toa_nha WHERE toa_nha.xoa=0 and toa_nha.id_toanha ='$id_toa_nha_update'"));
				if ($ma_toa_nha_update!=$logdl_toa_nha_row["ma_toa_nha"]) { // kiểm mã có thay đổi  mã Tòa nhà
					$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('toa_nha','Tòa nhà','$id_toa_nha_update','ma_toa_nha','Mã Tòa nhà', '$logdl_toa_nha_row[ma_toa_nha]','$ma_toa_nha_update','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
					mysqli_query($con, $log1);
					//cập nhật dữ liệu thay đổi
					$Update_toa_nha1 ="UPDATE toa_nha  SET toa_nha.ma_toa_nha = '$ma_toa_nha_update' WHERE toa_nha.id_toanha ='$id_toa_nha_update'";
					if(mysqli_query($con, $Update_toa_nha1)){
						$kiemtra_update_toa_nha=99;
					}else{
						$kiemtra_update_toa_nha=100;
					}
				}//end  kiểm mã có thay đổi  mã Tòa nhà
				if ($ten_toa_nha_update!=$logdl_toa_nha_row["ten_toa_nha"]) { // kiểm mã có thay đổi  Tên Tòa nhà
					$log2 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('toa_nha','Tòa nhà','$id_toa_nha_update','ten_toa_nha','Tên Tòa nhà', '$logdl_toa_nha_row[ten_toa_nha]','$ten_toa_nha_update','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
					mysqli_query($con, $log2);
					//cập nhật dữ liệu thay đổi
					$Update_toa_nha2 ="UPDATE toa_nha  SET toa_nha.ten_toa_nha = '$ten_toa_nha_update' WHERE toa_nha.id_toanha ='$id_toa_nha_update'";
					if(mysqli_query($con, $Update_toa_nha2)){
						$kiemtra_update_toa_nha=99;
					}else{
						$kiemtra_update_toa_nha=100;
					}
				}//end  kiểm mã có thay đổi  Tên Tòa nhà
				if ($loai_toa_nha_update!=$logdl_toa_nha_row["loai_toa_nha"]) { // kiểm mã có thay đổi  Loại Tòa nhà
					$kiemtraophong = mysqli_query($con, "SELECT o_phong.id_ophong FROM phong, o_phong WHERE phong.xoa=0 AND phong.id_toanha ='$id_toa_nha_update' AND phong.idphong=o_phong.id_phong AND o_phong.ngay_ket_thuc='0'");
					if (mysqli_num_rows($kiemtraophong)) {
						$kiemtra_update_toa_nha=101;
					}else{
						$log3 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('toa_nha','Tòa nhà','$id_toa_nha_update','loai_toa_nha','Loại Tòa nhà', '$logdl_toa_nha_row[loai_toa_nha]','$loai_toa_nha_update','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
						mysqli_query($con, $log3);
						//cập nhật dữ liệu thay đổi
						$Update_toa_nha3 ="UPDATE toa_nha  SET toa_nha.loai_toa_nha = '$loai_toa_nha_update' WHERE toa_nha.id_toanha ='$id_toa_nha_update'";
						if(mysqli_query($con, $Update_toa_nha3)){
							$kiemtra_update_toa_nha=99;
						}else{
							$kiemtra_update_toa_nha=100;
						}
					}
				}//end  kiểm mã có thay đổi  Loại Tòa nhà
				echo $kiemtra_update_toa_nha;
			}
		}
	} //ket thuc cap nhat thong tin Tòa nhà
	// xoas Loại phòng
	if (isset($_POST['id_xoa_loai_phong'])) { 
		// kiểm tra có sinh vien ở Loại phòng đó không
		$kiemtraophong = mysqli_query($con, "SELECT o_phong.id_ophong FROM phong, o_phong WHERE phong.xoa=0 AND phong.id_loaiphong ='$_POST[id_xoa_loai_phong]' AND phong.idphong=o_phong.id_phong AND o_phong.ngay_ket_thuc='0'");
		if (mysqli_num_rows($kiemtraophong)) {
			echo "101";
		}else{
			$delete_xoa_loai_phong = "UPDATE loai_phong SET loai_phong.xoa=1, loai_phong.id_canboxoa='$_SESSION[id_canbo]', loai_phong.ngay_xoa='".date('Y/m/d H:i:s')."' WHERE loai_phong.id_loaiphong = '$_POST[id_xoa_loai_phong]'";
			if (mysqli_query($con,$delete_xoa_loai_phong)) {
				echo "99";
			}else{
				echo "100";
			}
		}
	}//end xóa Loại phòng
	// xoas Có chức vụ
	if (isset($_POST['id_xoa_cochucvu123'])) { 
		// kiểm tra có sinh vien ở Có chức vụ đó không
			$delete_xoa_cochucvu = "UPDATE cochucvu SET cochucvu.xoa=1, cochucvu.id_canboxoa='$_SESSION[id_canbo]', cochucvu.ngay_xoa='".date('Y/m/d H:i:s')."' WHERE cochucvu.id_cochucvu = '$_POST[id_xoa_cochucvu123]'";
			if (mysqli_query($con,$delete_xoa_cochucvu)) {
				echo "99";
			}else{
				echo "100";
			}
	}//end xóa Có chức vụ
	// xoas Có Phòng
	if (isset($_POST['id_phong_xoa_12'])) { 
		// kiểm tra có sinh vien ở Có Phòng đó không
		$slsinhvien = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(o_phong.id_sinhvien) AS slsinhvien FROM o_phong WHERE o_phong.ngay_ket_thuc is NULL AND o_phong.id_phong ='$_POST[id_phong_xoa_12]'"));

		if ($slsinhvien['slsinhvien']==0) {
			$delete_xoa_phong = "UPDATE phong SET phong.xoa=1, phong.id_canboxoa='$_SESSION[id_canbo]', phong.ngay_xoa='".date('Y/m/d H:i:s')."' WHERE phong.idphong = '$_POST[id_phong_xoa_12]'";
			if (mysqli_query($con,$delete_xoa_phong)) {
				echo "99";
			}else{
				echo "100";
			}
		}else{
			echo "101";
		}
	}//end xóa Có Phòng
	//  Xóa ở phòng ký túc xá
	if (isset($_POST['id_o_phong_xoa_12'])) { 
		// kiểm tra có sinh vien ở Có Phòng đó không
			$delete_xoa_phong = "UPDATE o_phong SET o_phong.ngay_ket_thuc='".date('Y/m/d')."', o_phong.id_canboxoa='$_SESSION[id_canbo]', o_phong.ngay_xoa='".date('Y/m/d H:i:s')."' WHERE o_phong.id_ophong = '$_POST[id_o_phong_xoa_12]'";
			if (mysqli_query($con,$delete_xoa_phong)) {
				echo "99";
			}else{
				echo "100";
			}
	}//end Xóa ở phòng ký túc xá
	// kiểm tra và Cập nhật lạimật khẩu cán bộ
	if (isset($_POST['mat_khau_cu_can_bo12']) && isset($_POST['mat_khau_moi_can_bo12']) && isset($_POST['nhapkai_mat_khau_moi_can_bo12']) ) {
		$mat_khau_cu_can_bo12 = $_POST['mat_khau_cu_can_bo12'];// id loại phòng sửa
		$mat_khau_moi_can_bo12 = $_POST['mat_khau_moi_can_bo12'];// id thiết bị sửa
		$nhapkai_mat_khau_moi_can_bo12 = $_POST['nhapkai_mat_khau_moi_can_bo12'];// số lượng sửa
		// kiểm tra mật khẩu có đúng không
		$ktra_mkcu = mysqli_query($con,"SELECT * FROM taikhoan WHERE taikhoan.idtk='$_SESSION[idtk]' AND taikhoan.matkhau='$mat_khau_cu_can_bo12'");
		// dlloc
		//end
		if(!mysqli_num_rows($ktra_mkcu)){
			echo "1";
		}else{
			$kiemtracapnhatctb=99;
			// // ghi log
			$logdl_tbcu_row = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM taikhoan WHERE taikhoan.idtk='$_SESSION[idtk]'"));
			if ($mat_khau_moi_can_bo12!=$logdl_tbcu_row["matkhau"]) { // kiểm mã có thay đổi  Mật khẩu
				$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('taikhoan','Tài khoản','$_SESSION[idtk]','matkhau','Mật khẩu', '$logdl_tbcu_row[matkhau]','$mat_khau_moi_can_bo12','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
				mysqli_query($con, $log1);
				//cập nhật dữ liệu thay đổi
				$update_matkhau = "UPDATE taikhoan SET matkhau='$mat_khau_moi_can_bo12' WHERE taikhoan.idtk='$_SESSION[idtk]'";
				if(mysqli_query($con, $update_matkhau)){
					$kiemtracapnhatctb=99;
				}else{
					$kiemtracapnhatctb=100;
				}
			}//end kiểm mã có thay đổi  Mật khẩu
			
			
			echo $kiemtracapnhatctb;
		}
	} //ket thuc cap nhat mật khẩu cán bộ
	//  Xử lý cập nhật tình trạng thiết bị trong phòng
	if (isset($_POST['idcothietbi_tinhtrang']) && isset($_POST['idphong_tinhtrang']) && isset($_POST['dulieusua_tinhtrang'])) { 
		// kiểm tra có sinh vien ở Có Phòng đó không
		$idcothietbi_tinhtrang=$_POST['idcothietbi_tinhtrang'];
		$idphong_tinhtrang=$_POST['idphong_tinhtrang'];
		$dulieusua_tinhtrang=$_POST['dulieusua_tinhtrang'];
		// tìm só lượng và so sánh số lượng 
		$kiemtra_sl = mysqli_fetch_array(mysqli_query($con,"SELECT ctb.idcothietbi, ctb.id_loaiphong, ctb.idtb, ctb.soluong FROM loaiphongcothietbi ctb WHERE ctb.idcothietbi ='$idcothietbi_tinhtrang' AND ctb.xoa =0"));
		$kiemtra_sl_co=$kiemtra_sl['soluong'];
		if ($dulieusua_tinhtrang>$kiemtra_sl_co) {
			echo "1";
		}else{
			// kiểm tra xem dữ liệu kiểm tra đã tồn tại chưa
			$ktr_cochua = mysqli_query($con,"SELECT tr.id_tinhtrang, tr.idphong, tr.idcothietbi FROM tinhtrang_thietbi_phong tr WHERE tr.xoa=0 AND tr.idphong ='$idphong_tinhtrang' AND tr.idcothietbi ='$idcothietbi_tinhtrang'");
			if (mysqli_num_rows($ktr_cochua)) {
				$r1242= mysqli_fetch_array($ktr_cochua);
				mysqli_query($con,"UPDATE tinhtrang_thietbi_phong tr SET tr.xoa=1 where tr.id_tinhtrang='$r1242[id_tinhtrang]'");
			}
			$insert_tinhtrang = "INSERT INTO tinhtrang_thietbi_phong(idphong, idcothietbi, slhong, can_bo_kt, ngay_kt) VALUES ('$idphong_tinhtrang','$idcothietbi_tinhtrang','$dulieusua_tinhtrang','$_SESSION[id_canbo]','".date('Y/m/d H:i:s')."')";
			if (mysqli_query($con,$insert_tinhtrang)) {
				echo "99";
			}else{
				echo var_dump(mysqli_query($con,$insert_tinhtrang)) ;
			}
		}
	}//end Xử lý cập nhật tình trạng thiết bị trong phòng
	mysqli_close($con);

?>