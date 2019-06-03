<?php include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm Loại phòng thì thêm không thì thoát
if (isset($_POST['id_sinhvien_sua_12'])) {
	// xuwr lý hình ảnh
	$duongdan = "./../images/"; // đường dẫn ảnh
	$hinhanhthem=$_FILES['image_123']['name'];// lấy tên ảnh sinh viên thêm
	$target_file = $duongdan . basename($_FILES["image_123"]["name"]);// lấy loại file
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));// kiểm tra file anh
	// end xử lý đường dẫn ảnh
	$id_sinhvien_sua_12=$_POST['id_sinhvien_sua_12'];// lấy id sịnh viên
	$ma_sinhvien_sua123=$_POST['ma_sinhvien_sua123'];// lấy mssv
	$ho_sinhviensua_12=$_POST['ho_sinhviensua_12'];// lấy họ  sinh viên
	$ten_sinhviensua_12=$_POST['ten_sinhviensua_12'];// lấy tên sinh viên
	$ngaysinh_sinhviensua_12=$_POST['ngaysinh_sinhviensua_12']; // lấy ngày sinh sinh viên
	$gioitinh_sinhviensua_12=$_POST['gioitinh_sinhviensua_12']; // lấy ngày giới tính sinh viên
	$tinh_sua_sinh_vien=$_POST['tinh_sua_sinh_vien']; // lấy  mã tỉnh sinh viên
	$huyen_sua_sinh_vien=$_POST['huyen_sua_sinh_vien']; // lấy  mã huyện sinh viên
	$xa_sua_sinh_vien=$_POST['xa_sua_sinh_vien']; // lấy  mã xã sinh viên
	$sonha_sua_sinh_vien=$_POST['sonha_sua_sinh_vien']; // lấy số nhà sinh viên
	$quequan_sua_sinh_vien=$_POST['quequan_sua_sinh_vien']; // lấy id quên quán nhà sinh viên
	$cmnd_sua_sinh_vien=$_POST['cmnd_sua_sinh_vien']; // lấy số cmnd sinh viên
	$ngay_capcnnd_sua_sinh_vien=$_POST['ngay_capcnnd_sua_sinh_vien']; // lấy ngày cấp số cmnd sinh viên
	$noicap_sua_sinh_vien=$_POST['noicap_sua_sinh_vien']; // lấy nơi cấp số cmnd sinh viên
	$so_dt_sua_sinh_vien=$_POST['so_dt_sua_sinh_vien']; // lấy sdt sinh viên
	$email_sua_sinh_vien=$_POST['email_sua_sinh_vien']; // lấy email sinh viên
	$lop_sua_sinh_vien=$_POST['lop_sua_sinh_vien']; // lấy mã lớp sinh viên
	$hotencha_sua_sinh_vien=$_POST['hotencha_sua_sinh_vien']; // lấy họ và tên cha sinh viên
	$sdtcha_sua_sinh_vien=$_POST['sdtcha_sua_sinh_vien']; // lấy sđt cha sinh viên
	$hotenme_sua_sinh_vien=$_POST['hotenme_sua_sinh_vien']; // lấy họ tên mẹ sinh viên
	$sdtme_sua_sinh_vien=$_POST['sdtme_sua_sinh_vien']; // lấy họ tên mẹ sinh viên
	$ngay = date('Y/m/d H:i:s');
	if ($hinhanhthem!='' && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
		echo "88";// kiểm tra không phải file ảnh
	}else{
		// //kiểm tra mã số sinh viên có trùng không
		$kiemtra_mssv = (mysqli_query($con,"SELECT sinh_vien.id_sinhvien FROM sinh_vien WHERE sinh_vien.id_sinhvien !='$id_sinhvien_sua_12' AND sinh_vien.mssv='$ma_sinhvien_sua123'"));
		if (mysqli_num_rows($kiemtra_mssv)) {
			echo "1";// mssv đã tồn tại
		}else{
			$kiemtra_so_cmnd = (mysqli_query($con,"SELECT sinh_vien.id_sinhvien FROM sinh_vien WHERE sinh_vien.id_sinhvien !='$id_sinhvien_sua_12' AND sinh_vien.so_cmnd='$cmnd_sua_sinh_vien'"));
			if (mysqli_num_rows($kiemtra_so_cmnd)) {
				echo "6";// mssv đã tồn tại
			}else{
				$kiemtra_sdt_sv = (mysqli_query($con,"SELECT sinh_vien.id_sinhvien FROM sinh_vien WHERE sinh_vien.id_sinhvien !='$id_sinhvien_sua_12' AND (sinh_vien.so_dt='$so_dt_sua_sinh_vien'  OR sinh_vien.sdtcha='$so_dt_sua_sinh_vien' OR sinh_vien.sdtme='$so_dt_sua_sinh_vien')" ));
				if (mysqli_num_rows($kiemtra_sdt_sv) &&$so_dt_sua_sinh_vien!='') {
					echo "2";// sđt đã tồn tại
				}else{
					$kiemtra_email_sv = (mysqli_query($con,"SELECT sinh_vien.id_sinhvien FROM sinh_vien WHERE sinh_vien.id_sinhvien !='$id_sinhvien_sua_12' AND sinh_vien.email='$email_sua_sinh_vien'"));
					if (mysqli_num_rows($kiemtra_email_sv) && $email_sua_sinh_vien!='') {
						echo "3";// email đã tồn tại
					}else{
								$logdl_sinh_vien_cu_row = mysqli_fetch_array(mysqli_query($con,"SELECT sinh_vien.mssv, sinh_vien.anh_ca_nhan, sinh_vien.ho_sv, sinh_vien.ten_sv, sinh_vien.ngay_sinh, sinh_vien.gioi_tinh, sinh_vien.que_quan, sinh_vien.so_cmnd, sinh_vien.ngay_cap, sinh_vien.noi_cap, sinh_vien.matinh, sinh_vien.mahuyen, sinh_vien.maxa, sinh_vien.so_nha, sinh_vien.so_dt, sinh_vien.email, sinh_vien.hotencha, sinh_vien.sdtcha, sinh_vien.hotenme, sinh_vien.sdtme,sinh_vien.id_lop FROM sinh_vien WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'"));// lấy tất cả giá trị củ của sih vien
								$kiemtracapnhatcsinh_vien=99;
								if ($ma_sinhvien_sua123!=$logdl_sinh_vien_cu_row["mssv"] ) { // kiểm mã có thay đổi  Mã số Sih viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','mssv','MSSV', '$logdl_sinh_vien_cu_row[mssv]','$ma_sinhvien_sua123','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.mssv = '$ma_sinhvien_sua123' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										mysqli_query($con,"UPDATE taikhoan SET idms ='$ma_sinhvien_sua123' WHERE idms='$logdl_sinh_vien_cu_row[mssv]'");
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  Mã số Sih viên
								if ($hinhanhthem!=$logdl_sinh_vien_cu_row["anh_ca_nhan"] && $hinhanhthem!='' ) { // kiểm mã có thay đổi  Ảnh cá nhân
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','anh_ca_nhan','Ảnh cá nhân', '$logdl_sinh_vien_cu_row[anh_ca_nhan]','$hinhanhthem','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.anh_ca_nhan = '$hinhanhthem' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										move_uploaded_file($_FILES["image_123"]["tmp_name"], $target_file);

										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  Họ sinh viên
								if ($ho_sinhviensua_12!=$logdl_sinh_vien_cu_row["ho_sv"] ) { // kiểm mã có thay đổi  Họ sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','ho_sv','Họ sinh viên', '$logdl_sinh_vien_cu_row[ho_sv]','$ho_sinhviensua_12','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.ho_sv = '$ho_sinhviensua_12' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  Họ sinh viên
								if ($ten_sinhviensua_12!=$logdl_sinh_vien_cu_row["ten_sv"] ) { // kiểm mã có thay đổi  Tên sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','ten_sv','Tên sinh viên', '$logdl_sinh_vien_cu_row[ten_sv]','$ten_sinhviensua_12','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.ten_sv = '$ten_sinhviensua_12' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  Tên sinh viên
								if ($ngaysinh_sinhviensua_12!=$logdl_sinh_vien_cu_row["ngay_sinh"] ) { // kiểm mã có thay đổi  Ngày sinh sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','ngay_sinh','Ngày sinh sinh viên', '$logdl_sinh_vien_cu_row[ngay_sinh]','$ngaysinh_sinhviensua_12','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.ngay_sinh = '$ngaysinh_sinhviensua_12' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  Ngày sinh sinh viên
								if ($gioitinh_sinhviensua_12!=$logdl_sinh_vien_cu_row["gioi_tinh"] ) { // kiểm mã có thay đổi  Giới tính sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','gioi_tinh','Giới tính sinh viên', '$logdl_sinh_vien_cu_row[gioi_tinh]','$gioitinh_sinhviensua_12','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.gioi_tinh = '$gioitinh_sinhviensua_12' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  Giới tính sinh viên
								if ($quequan_sua_sinh_vien!=$logdl_sinh_vien_cu_row["que_quan"] ) { // kiểm mã có thay đổi  Quê quán sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','que_quan','Quê quán sinh viên', '$logdl_sinh_vien_cu_row[que_quan]','$quequan_sua_sinh_vien','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.que_quan = '$quequan_sua_sinh_vien' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  Quê quán sinh viên
								if ($cmnd_sua_sinh_vien!=$logdl_sinh_vien_cu_row["so_cmnd"] ) { // kiểm mã có thay đổi  Số CMND sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','so_cmnd','Số CMND sinh viên', '$logdl_sinh_vien_cu_row[so_cmnd]','$cmnd_sua_sinh_vien','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.so_cmnd = '$cmnd_sua_sinh_vien' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  Số CMND sinh viên
								if ($ngay_capcnnd_sua_sinh_vien!=$logdl_sinh_vien_cu_row["ngay_cap"] ) { // kiểm mã có thay đổi  Ngày cấp CMND sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','ngay_cap','Ngày cấp CMND sinh viên', '$logdl_sinh_vien_cu_row[ngay_cap]','$ngay_capcnnd_sua_sinh_vien','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.ngay_cap = '$ngay_capcnnd_sua_sinh_vien' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  Ngày cấp CMND sinh viên
								if ($noicap_sua_sinh_vien!=$logdl_sinh_vien_cu_row["noi_cap"] ) { // kiểm mã có thay đổi  Nơi CMND sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','noi_cap','Nơi CMND sinh viên', '$logdl_sinh_vien_cu_row[noi_cap]','$noicap_sua_sinh_vien','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.noi_cap = '$noicap_sua_sinh_vien' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  Nơi CMND sinh viên
								if ($tinh_sua_sinh_vien!=$logdl_sinh_vien_cu_row["matinh"] ) { // kiểm mã có thay đổi  HKTT tỉnh sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','matinh','HKTT tỉnh sinh viên', '$logdl_sinh_vien_cu_row[matinh]','$tinh_sua_sinh_vien','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.matinh = '$tinh_sua_sinh_vien' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  HKTT tỉnh sinh viên
								if ($huyen_sua_sinh_vien!=$logdl_sinh_vien_cu_row["mahuyen"] ) { // kiểm mã có thay đổi  HKTT huyện sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','mahuyen','HKTT huyện sinh viên', '$logdl_sinh_vien_cu_row[mahuyen]','$huyen_sua_sinh_vien','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.mahuyen = '$huyen_sua_sinh_vien' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  HKTT huyện sinh viên
								if ($xa_sua_sinh_vien!=$logdl_sinh_vien_cu_row["maxa"] ) { // kiểm mã có thay đổi  HKTT Xã sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','maxa','HKTT Xã sinh viên', '$logdl_sinh_vien_cu_row[maxa]','$xa_sua_sinh_vien','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.maxa = '$xa_sua_sinh_vien' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  HKTT Xã sinh viên
								if ($sonha_sua_sinh_vien!=$logdl_sinh_vien_cu_row["so_nha"] ) { // kiểm mã có thay đổi  HKTT Số nhà sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','so_nha','HKTT Số nhà sinh viên', '$logdl_sinh_vien_cu_row[so_nha]','$sonha_sua_sinh_vien','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.so_nha = '$sonha_sua_sinh_vien' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  HKTT Số nhà sinh viên
								if ($so_dt_sua_sinh_vien!=$logdl_sinh_vien_cu_row["so_dt"] ) { // kiểm mã có thay đổi  SĐT sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','so_dt','SĐT sinh viên', '$logdl_sinh_vien_cu_row[so_dt]','$so_dt_sua_sinh_vien','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.so_dt = '$so_dt_sua_sinh_vien' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  SĐT sinh viên
								if ($email_sua_sinh_vien!=$logdl_sinh_vien_cu_row["email"] ) { // kiểm mã có thay đổi  Email sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','email','Email sinh viên', '$logdl_sinh_vien_cu_row[email]','$email_sua_sinh_vien','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.email = '$email_sua_sinh_vien' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  Email sinh viên
								if ($hotencha_sua_sinh_vien!=$logdl_sinh_vien_cu_row["hotencha"] ) { // kiểm mã có thay đổi  Họ tên cha sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','hotencha','Họ tên cha sinh viên', '$logdl_sinh_vien_cu_row[hotencha]','$hotencha_sua_sinh_vien','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.hotencha = '$hotencha_sua_sinh_vien' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  Họ tên cha sinh viên
								if ($sdtcha_sua_sinh_vien!=$logdl_sinh_vien_cu_row["sdtcha"] && $sdtcha_sua_sinh_vien!='' ) { // kiểm mã có thay đổi  SĐT cha sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','sdtcha','SĐT cha sinh viên', '$logdl_sinh_vien_cu_row[sdtcha]','$sdtcha_sua_sinh_vien','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.sdtcha = '$sdtcha_sua_sinh_vien' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  SĐT cha sinh viên
								if ($hotenme_sua_sinh_vien!=$logdl_sinh_vien_cu_row["hotenme"] ) { // kiểm mã có thay đổi  Họ tên Mẹ sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','hotenme','Họ tên Mẹ sinh viên', '$logdl_sinh_vien_cu_row[hotenme]','$hotenme_sua_sinh_vien','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.hotenme = '$hotenme_sua_sinh_vien' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  Họ tên Mẹ sinh viên
								if ($sdtme_sua_sinh_vien!=$logdl_sinh_vien_cu_row["sdtme"] && $sdtme_sua_sinh_vien!='' ) { // kiểm mã có thay đổi  SĐT Mẹ sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','sdtme','SĐT Mẹ sinh viên', '$logdl_sinh_vien_cu_row[sdtme]','$sdtme_sua_sinh_vien','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log edit
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.sdtme = '$sdtme_sua_sinh_vien' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1)){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi  SĐT Mẹ sinh viên
								if ($lop_sua_sinh_vien!=$logdl_sinh_vien_cu_row["id_lop"] ) { // kiểm mã có thay đổi Lớp  sinh viên
									$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('sinh_vien','Sinh viên','$id_sinhvien_sua_12','id_lop','Lớp', '$logdl_sinh_vien_cu_row[id_lop]','$lop_sua_sinh_vien','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
									mysqli_query($con, $log1); // ghi log
									//cập nhật dữ liệu thay đổi
									$Update_sinh_vien1 ="UPDATE sinh_vien  SET sinh_vien.id_lop = '$lop_sua_sinh_vien' WHERE sinh_vien.id_sinhvien ='$id_sinhvien_sua_12'";
									if(mysqli_query($con, $Update_sinh_vien1) ){
										$kiemtracapnhatcsinh_vien=99;
									}else{
										$kiemtracapnhatcsinh_vien=100;
									}
								}//end kiểm mã có thay đổi Lớp  sinh viên


								echo $kiemtracapnhatcsinh_vien;
							}
						}
			}
		}
	}
} else {
	header("location:./../admin/login");
}
mysqli_close($con);
?>