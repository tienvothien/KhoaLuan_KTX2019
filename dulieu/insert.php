<?php
	include 'kiemtradangnhap.php';
	// kiểm tra và cap nbhat lại thông tin khoa
	if (isset($_POST['id_khoa_sua_12']) && isset($_POST['ten_khoasua_12']) && isset($_POST['ma_khoa_sua123']) ) {
		// kiểm tra ma khoa  và tên khoa da tôn tại chưa
		$kiemtramakhoa = mysqli_query($con,"SELECT * FROM khoa WHERE khoa.id_khoa <> '$_POST[id_khoa_sua_12]'and khoa.xoa=0 AND (khoa.ma_khoa='$_POST[ma_khoa_sua123]' OR khoa.ten_khoa ='$_POST[ten_khoasua_12]') ");
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
	//xủ lý xóa thiết bị
	if (isset($_POST['id_xoa_thietbi123'])) {
		$delete_xoa_thietbi = "UPDATE thietbi SET thietbi.xoa=1, thietbi.id_canboxoa='$_SESSION[id_canbo]', thietbi.ngay_xoa='".date('Y/m/d H:i:s')."' WHERE thietbi.idtb = '$_POST[id_xoa_thietbi123]'";
		if (mysqli_query($con,$delete_xoa_thietbi)) {
			echo "99";
		}else{
			echo "100";
		}
	}//end xóa thiết bị
	// kiểm tra và cap nbhat lại thông tin thiết bị
	if (isset($_POST['id_thietbi_sua_12']) && isset($_POST['ten_thietbisua_12']) && isset($_POST['ma_thietbi_sua123']) ) {
		$id_tb_sua = $_POST['id_thietbi_sua_12'];// id loại phòng sửa
		$tentb_sua = $_POST['ten_thietbisua_12'];// id thiết bị sửa
		$ma_tbsua = $_POST['ma_thietbi_sua123'];// số lượng sửa
		// kiểm tra ma khoa  và tên khoa da tôn tại chưa
		$kiemtrathietbi = mysqli_query($con,"SELECT * FROM thietbi WHERE thietbi.idtb <> '$id_tb_sua'and thietbi.xoa=0 AND (thietbi.mathietbi='$ma_tbsua' OR thietbi.tenthietbi ='$tentb_sua') ");
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
	// kiểm tra và cap nbhat lại thông tin thiết bị trong loại phòng
	if (isset($_POST['id_loaiphong_sua_ctb']) && isset($_POST['id_tb_ctb_sua']) && isset($_POST['soluong_ctb_sua']) &&  isset($_POST['id_ctbtrongloaip_sua'])) {
		// kiểm tra ma lop  và tên lop da tôn tại chưa
		// gan biến
		$id_loaiphong_sua_ctb = $_POST['id_loaiphong_sua_ctb'];// id loại phòng sửa
		$id_tb_ctb_sua = $_POST['id_tb_ctb_sua'];// id thiết bị sửa
		$soluong_ctb_sua = $_POST['soluong_ctb_sua'];// số lượng sửa
		$id_ctbtrongloaip_sua = $_POST['id_ctbtrongloaip_sua'];// id của  có thiết bị trong loại phòng
		// kiêm tra loại phòng đã có thiết bị chưa
		
		$kiemtramactb = mysqli_query($con, "SELECT * FROM loaiphongcothietbi ctb WHERE ctb.idcothietbi<>'$id_ctbtrongloaip_sua' AND ctb.id_loaiphong = '$id_loaiphong_sua_ctb' AND ctb.idtb ='$id_tb_ctb_sua' AND ctb.xoa=0");
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
	// kiểm tra và cap nbhat lại thông tin thiết bị
	if (isset($_POST['id_chucvu_sua_12']) && isset($_POST['ten_chucvusua_12']) && isset($_POST['ma_chucvu_sua123']) ) {
		$id_chucvu_sua = $_POST['id_chucvu_sua_12'];// id loại phòng sửa
		$tenchucvu_sua = $_POST['ten_chucvusua_12'];// id thiết bị sửa
		$ma_chucvusua = $_POST['ma_chucvu_sua123'];// số lượng sửa
		// kiểm tra ma khoa  và tên khoa da tôn tại chưa
		$kiemtrachucvu = mysqli_query($con,"SELECT * FROM chucvu WHERE chucvu.idchucvu <> '$id_chucvu_sua'and chucvu.xoa=0 AND (chucvu.machucvu='$ma_chucvusua' OR chucvu.tenchucvu ='$tenchucvu_sua') ");
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
	mysqli_close($con);

?>