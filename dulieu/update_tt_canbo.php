<?php
	include 'kiemtradangnhap.php';
	// kiểm tra và cap nbhat lại thông tin Cán bộ
	if (isset($_POST['id_can_bo_sua_12'])) {
		$duongdananhcanbo = "./../images/";
		$hinhanhthem1=$_FILES['image12_sua123']['name'];// tên ảnh
		
		$id_can_bo_sua= $_POST['id_can_bo_sua_12'];// láy id mã cán bộ đã chọ
		$ma_can_bo_sua123 = $_POST['ma_can_bo_sua123'];// lây mã cán bộ
		$ho_can_bosua_12 = $_POST['ho_can_bosua_12'];// lấy họ cán bộ
		$ten_can_bosua_12 = $_POST['ten_can_bosua_12'];// lấy tên cán bộ
		$ngaysinh_can_bosua_12 = $_POST['ngaysinh_can_bosua_12'];// lấy ngày sinh
		$gioitinh_can_bosua_12 = $_POST['gioitinh_can_bosua_12'];// lấy gới tính
		$sdt_can_bosua_12 = $_POST['sdt_can_bosua_12'];// lấy sdt
		$email_can_bosua_12 = $_POST['email_can_bosua_12'];// lấy email
		// kiểm tra ma khoa  và tên khoa da tôn tại chưa
	
		$kiemtra_ma_can_bo = mysqli_query($con,"SELECT * FROM can_bo WHERE can_bo.id_canbo <> '$id_can_bo_sua' and can_bo.xoa=0 AND can_bo.ma_can_bo='$ma_can_bo_sua123'");
		if(mysqli_num_rows($kiemtra_ma_can_bo)){
			echo "1";
		}else{
			//kiem tra số điện thoại 
			$kiemtra_ma_can_bo = mysqli_query($con,"SELECT * FROM can_bo WHERE can_bo.id_canbo <> '$id_can_bo_sua' and can_bo.xoa=0 AND can_bo.sdt='$sdt_can_bosua_12'");
			if(mysqli_num_rows($kiemtra_ma_can_bo)){
				echo "2"; // tồn tại số điện thoại
			}else{
				// kiem tra eamil có tòn tại không
				$kiemtra_ma_can_bo = mysqli_query($con,"SELECT * FROM can_bo WHERE can_bo.id_canbo <> '$id_can_bo_sua' and can_bo.xoa=0 AND can_bo.email='$email_can_bosua_12'");
				if(mysqli_num_rows($kiemtra_ma_can_bo)){
					echo "3";// eamil dton tại
				}else{
					$kiemtracapnhatccan_bo=99;
					// ghi log qua trinh cap nhật dữ liệu cán bộ
					$logdl_can_bocu_row = mysqli_fetch_array(mysqli_query($con,"SELECT can_bo.hinhanh, can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo,can_bo.gioitinh, can_bo.ngay_sinh, can_bo.sdt, can_bo.email FROM can_bo WHERE can_bo.id_canbo ='$id_can_bo_sua' and can_bo.xoa=0"));
					if ($ma_can_bo_sua123!=$logdl_can_bocu_row["ma_can_bo"] ) { // kiểm mã có thay đổi  Mã cán bộ
						$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('can_bo','Cán bộ','$id_can_bo_sua','ma_can_bo','Mã cán bộ', '$logdl_can_bocu_row[ma_can_bo]','$ma_can_bo_sua123','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
						mysqli_query($con, $log1); // ghi log edit
						//cập nhật dữ liệu thay đổi
						$Update_can_bo1 ="UPDATE can_bo  SET can_bo.ma_can_bo = '$ma_can_bo_sua123' WHERE can_bo.id_canbo ='$id_can_bo_sua'";
						if(mysqli_query($con, $Update_can_bo1)){
							$kiemtracapnhatccan_bo=99;
							mysqli_query($con,"UPDATE taikhoan SET idms ='$ma_can_bo_sua123' WHERE idms='$logdl_can_bocu_row[ma_can_bo]'");

						}else{
							$kiemtracapnhatccan_bo=100;
						}
					}//end kiểm mã có thay đổi  Mã cán bộ
					if ($ho_can_bosua_12!=$logdl_can_bocu_row["ho_can_bo"] ) { // kiểm mã có thay đổi  Họ Cán bộ
						$log_hocb = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('can_bo','Cán bộ','$id_can_bo_sua','ho_can_bo','Họ Cán bộ', '$logdl_can_bocu_row[ho_can_bo]','$ho_can_bosua_12','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
						mysqli_query($con, $log_hocb);
						//cập nhật dữ liệu thay đổi
						$Update_can_bo2 ="UPDATE can_bo  SET can_bo.ho_can_bo = '$ho_can_bosua_12' WHERE can_bo.id_canbo ='$id_can_bo_sua'";
						if(mysqli_query($con, $Update_can_bo2)){
							$kiemtracapnhatccan_bo=99;
						}else{
							$kiemtracapnhatccan_bo=100;
						}
					}//end kiểm mã có thay đổi  Họ Cán bộ
					if ($ten_can_bosua_12!=$logdl_can_bocu_row["ten_can_bo"] ) { // kiểm mã có thay đổi  Tên Cán bộ
						$log_tenb = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('can_bo','Cán bộ','$id_can_bo_sua','ten_can_bo','Tên Cán bộ', '$logdl_can_bocu_row[ten_can_bo]','$ten_can_bosua_12','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
						mysqli_query($con, $log_tenb);
						//cập nhật dữ liệu thay đổi
						$Update_can_bo3 ="UPDATE can_bo  SET can_bo.ten_can_bo = '$ten_can_bosua_12' WHERE can_bo.id_canbo ='$id_can_bo_sua'";
						if(mysqli_query($con, $Update_can_bo3)){
							$kiemtracapnhatccan_bo=99;
						}else{
							$kiemtracapnhatccan_bo=100;
						}
					}//end kiểm mã có thay đổi  Tên Cán bộ
					if ($ngaysinh_can_bosua_12!=$logdl_can_bocu_row["ngay_sinh"] ) { // kiểm mã có thay đổi  Ngày Sinh
						$log_ngays = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('can_bo','Cán bộ','$id_can_bo_sua','ngay_sinh','Ngày Sinh', '$logdl_can_bocu_row[ngay_sinh]','$ngaysinh_can_bosua_12','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
						mysqli_query($con, $log_ngays);
						//cập nhật dữ liệu thay đổi
						$Update_can_bo4 ="UPDATE can_bo  SET can_bo.ngay_sinh = '$ngaysinh_can_bosua_12' WHERE can_bo.id_canbo ='$id_can_bo_sua'";
						if(mysqli_query($con, $Update_can_bo4)){
							$kiemtracapnhatccan_bo=99;
						}else{
							$kiemtracapnhatccan_bo=100;
						}
					}//end kiểm mã có thay đổi  Ngày Sinh
					if ($gioitinh_can_bosua_12!=$logdl_can_bocu_row["gioitinh"] ) { // kiểm mã có thay đổi  Giới tính
						$log_gt1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('can_bo','Cán bộ','$id_can_bo_sua','gioitinh','Giới tính', '$logdl_can_bocu_row[gioitinh]','$gioitinh_can_bosua_12','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
						mysqli_query($con, $log_gt1);
						//cập nhật dữ liệu thay đổi
						$Update_can_bo5 ="UPDATE can_bo  SET can_bo.gioitinh = '$gioitinh_can_bosua_12' WHERE can_bo.id_canbo ='$id_can_bo_sua'";
						if(mysqli_query($con, $Update_can_bo5)){
							$kiemtracapnhatccan_bo=99;
						}else{
							$kiemtracapnhatccan_bo=100;
						}
					}//end kiểm mã có thay đổi  Giới tính
					if ($sdt_can_bosua_12!=$logdl_can_bocu_row["sdt"] ) { // kiểm mã có thay đổi  Số điện thoại
						$log_sdt1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('can_bo','Cán bộ','$id_can_bo_sua','sdt','Số điện thoại', '$logdl_can_bocu_row[sdt]','$sdt_can_bosua_12','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
						mysqli_query($con, $log_sdt1);
						//cập nhật dữ liệu thay đổi
						$Update_can_bo6 ="UPDATE can_bo  SET can_bo.sdt = '$sdt_can_bosua_12' WHERE can_bo.id_canbo ='$id_can_bo_sua'";
						if(mysqli_query($con, $Update_can_bo6)){
							$kiemtracapnhatccan_bo=99;
						}else{
							$kiemtracapnhatccan_bo=100;
						}
					}//end kiểm mã có thay đổi  Số điện thoại
					if ($email_can_bosua_12!=$logdl_can_bocu_row["email"] ) { // kiểm mã có thay đổi  Email
						$log_email1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('can_bo','Cán bộ','$id_can_bo_sua','email','Email', '$logdl_can_bocu_row[email]','$email_can_bosua_12','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
						mysqli_query($con, $log_email1);
						//cập nhật dữ liệu thay đổi
						$Update_can_bo7 ="UPDATE can_bo  SET can_bo.email = '$email_can_bosua_12' WHERE can_bo.id_canbo ='$id_can_bo_sua'";
						if(mysqli_query($con, $Update_can_bo7)){
							$kiemtracapnhatccan_bo=99;
						}else{
							$kiemtracapnhatccan_bo=100;
						}
					}//end kiểm mã có thay đổi  Email
					//kiểm tra ảnh cá nhân có thay đổi không
					if ($hinhanhthem1!='') {
						$target_file = $duongdananhcanbo . basename($_FILES["image12_sua123"]["name"]); //loại của ảnh
						$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
						if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
							echo "4";
						}else{
							if ($hinhanhthem1!=$logdl_can_bocu_row["hinhanh"] ) { // kiểm mã có thay đổi  Ảnh cá nhân
								$log_hinhanh1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('can_bo','Cán bộ','$id_can_bo_sua','hinhanh','Ảnh cá nhân', '$logdl_can_bocu_row[hinhanh]','$hinhanhthem1','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
								mysqli_query($con, $log_hinhanh1);
								//cập nhật dữ liệu thay đổi
								$Update_can_bo6 ="UPDATE can_bo  SET can_bo.hinhanh = '$hinhanhthem1' WHERE can_bo.id_canbo ='$id_can_bo_sua'";
								if(mysqli_query($con, $Update_can_bo6)){
									move_uploaded_file($_FILES["image12_sua123"]["tmp_name"], $target_file);
									$kiemtracapnhatccan_bo=99;
								}else{
									$kiemtracapnhatccan_bo=100;
								}
							}//end kiểm mã có thay đổi  Ảnh cá nhân						
						}
						
					}
					echo $kiemtracapnhatccan_bo;
				}
			}
		}
	} //ket thuc cap nhat thhông tin Cán bộ
 ?>