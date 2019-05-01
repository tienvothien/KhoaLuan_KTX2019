<?php 
	include 'kiemtradangnhap.php';
	if (isset($_POST['sophong_themmoi'])) {
		
		$id_toa_nha_themmoi = $_POST['id_toa_nha_themmoi'];
		$sophong_themmoi = $_POST['sophong_themmoi'];
		$tang_phong_themmoi = $_POST['tang_phong_themmoi'];
		$loai_phong_phong_themmoi = $_POST['loai_phong_phong_themmoi'];
		// kiểm tra số phòng tồn tại chưa
		$kiemtra_sophong = mysqli_query($con, "SELECT phong.idphong FROM phong WHERE phong.xoa=0 and phong.ma_phong='$sophong_themmoi' AND phong.id_toanha='$id_toa_nha_themmoi'");
		if (mysqli_num_rows($kiemtra_sophong)) {// neu Số điện thoại Cán bộ da tonn tai
			echo "1";
		} else {
			$ngay = date('Y/m/d H:i:s');
			$insert_phong_moi="INSERT INTO phong(ma_phong, stt_tang, id_toanha, id_loaiphong, id_canbothem, thoigianthem) VALUES ('$sophong_themmoi','$tang_phong_themmoi','$id_toa_nha_themmoi','$loai_phong_phong_themmoi','$_SESSION[id_canbo]', '$ngay')";
			if (mysqli_query($con, $insert_phong_moi)) {
					echo "99";
			}else {
				echo "100";;
			}
		}
		

	}elseif (isset($_POST['id_phong_sua_12'])) {// update thong tin phong
		$id_phong_sua_12 = $_POST['id_phong_sua_12'];
		$id_toa_nha_sua_15 = $_POST['id_toa_nha_sua_15'];
		$sophong_sua_15 = $_POST['sophong_sua_15'];
		$tang_phong_sua_15 = $_POST['tang_phong_sua_15'];
		$loai_phong_phong_sua_15 = $_POST['loai_phong_phong_sua_15'];
		$ngay = date('Y/m/d H:i:s');
		// kiểm tra số phòng tồn tại chưa
		$kiemtra_sophong = mysqli_query($con, "SELECT phong.idphong FROM phong WHERE phong.xoa=0 and phong.idphong <> $id_phong_sua_12 and phong.ma_phong='$sophong_sua_15' AND phong.id_toanha='$id_toa_nha_sua_15'");
		if (mysqli_num_rows($kiemtra_sophong)) {// neu Số điện thoại Cán bộ da tonn tai
			echo "1";
		} else {
			$kiemtra_update_phong=99;
			// ghi log qua trinh cap nhật dữ liệu cán bộ
			$logdl_phong_r = mysqli_fetch_array(mysqli_query($con,"SELECT phong.idphong, phong.ma_phong, phong.stt_tang, phong.id_toanha, phong.id_loaiphong FROM phong WHERE phong.idphong='$id_phong_sua_12'"));
			if ($id_toa_nha_sua_15!=$logdl_phong_r["id_toanha"] ) { // kiểm mã có thay đổi  Tòa nhà
				$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('Phong','Phòng','$id_phong_sua_12','id_toanha','Tòa nhà', '$logdl_phong_r[id_toanha]','$id_toa_nha_sua_15','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
				mysqli_query($con, $log1); // ghi log edit
				//cập nhật dữ liệu thay đổi
				$Update_phong1 ="UPDATE phong  SET phong.id_toanha = '$id_toa_nha_sua_15' WHERE phong.idphong ='$id_phong_sua_12'";
				if(mysqli_query($con, $Update_phong1)){
					$kiemtra_update_phong=99;
				}else{
					$kiemtra_update_phong=100;
				}
			}//end kiểm mã có thay đổi  Tòa nhà	
			if ($sophong_sua_15!=$logdl_phong_r["ma_phong"] ) { // kiểm mã có thay đổi  Số phòng
				$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('Phong','Phòng','$id_phong_sua_12','ma_phong','Số phòng', '$logdl_phong_r[ma_phong]','$sophong_sua_15','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
				mysqli_query($con, $log1); // ghi log edit
				//cập nhật dữ liệu thay đổi
				$Update_phong1 ="UPDATE phong  SET phong.ma_phong = '$sophong_sua_15' WHERE phong.idphong ='$id_phong_sua_12'";
				if(mysqli_query($con, $Update_phong1)){
					$kiemtra_update_phong=99;
				}else{
					$kiemtra_update_phong=100;
				}
			}//end kiểm mã có thay đổi  Số phòng	
			if ($tang_phong_sua_15!=$logdl_phong_r["stt_tang"] ) { // kiểm mã có thay đổi  Số thứ tự Tầng
				$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('Phong','Phòng','$id_phong_sua_12','stt_tang','Số thứ tự Tầng', '$logdl_phong_r[stt_tang]','$tang_phong_sua_15','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
				mysqli_query($con, $log1); // ghi log edit
				//cập nhật dữ liệu thay đổi
				$Update_phong1 ="UPDATE phong  SET phong.stt_tang = '$tang_phong_sua_15' WHERE phong.idphong ='$id_phong_sua_12'";
				if(mysqli_query($con, $Update_phong1)){
					$kiemtra_update_phong=99;
				}else{
					$kiemtra_update_phong=100;
				}
			}//end kiểm mã có thay đổi  Số thứ tự Tầng		
			if ($loai_phong_phong_sua_15!=$logdl_phong_r["id_loaiphong"] ) { // kiểm mã có thay đổi  Loại phòng
				$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('Phong','Phòng','$id_phong_sua_12','id_loaiphong','Loại phòng', '$logdl_phong_r[id_loaiphong]','$loai_phong_phong_sua_15','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
				mysqli_query($con, $log1); // ghi log edit
				//cập nhật dữ liệu thay đổi
				$Update_phong1 ="UPDATE phong  SET phong.id_loaiphong = '$loai_phong_phong_sua_15' WHERE phong.idphong ='$id_phong_sua_12'";
				if(mysqli_query($con, $Update_phong1)){
					$kiemtra_update_phong=99;
				}else{
					$kiemtra_update_phong=100;
				}
			}//end kiểm mã có thay đổi  Loại phòng			
			
			echo $kiemtra_update_phong;
		}
	}else {
		header("location:./../admin/login");
	}
 ?>