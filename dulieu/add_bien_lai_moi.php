<?php include 'kiemtradangnhap_login.php';
	//neut tôn tại mãi thêm Cán bộ thì thêm không thì thoát
	if (isset($_POST['mssv_o_phong_them']) && isset($_POST['id_phong_them_ophong']) &&  isset($_POST['loai_tien'])&&  isset($_POST['so_bien_lai'])) {
		$mssv_o_phong_them = $_POST['mssv_o_phong_them'];
		$id_phong_them_ophong = $_POST['id_phong_them_ophong'];
		$loai_tien = $_POST['loai_tien'];
		$so_bien_lai = $_POST['so_bien_lai'];
		$so_tien_don = $_POST['so_tien_don'];

		 $so_tien_don1_2=preg_replace('/(,)/u', '', strip_tags($_POST['so_tien_don']));
		$kiemtra_so_bien_lai = mysqli_query($con, "SELECT * FROM bien_lai WHERE bien_lai.so_bien_lai='$so_bien_lai'");
		if (mysqli_num_rows($kiemtra_so_bien_lai)) {// neu Số điện thoại Cán bộ da tonn tai
			echo "1"; // tồn tại số biên lai
		} else {
			// kiểm tra Email thoại Cán bộ trùng không
			$id_sinhvien_t = mysqli_fetch_array(mysqli_query($con,"SELECT sinh_vien.id_sinhvien FROm sinh_vien WHERE sinh_vien.mssv='$mssv_o_phong_them'"));
				$ngay = date('Y/m/d H:i:s');
				$insert_bien_lai_moi="INSERT INTO bien_lai(so_bien_lai, so_tien, id_loai_bien_lai, id_sinhvien, ngay_them, id_canbo, id_phong) VALUES ('$so_bien_lai','$so_tien_don1_2','$loai_tien','$id_sinhvien_t[id_sinhvien]','$ngay','$_SESSION[id_canbo]','$id_phong_them_ophong')";
				if (mysqli_query($con, $insert_bien_lai_moi)) {
					
					echo "99";
				}else {
					echo var_dump(mysqli_query($con, $insert_bien_lai_moi));;
				}
		}//end kiem tra số điện thoại
	}
	mysqli_close($con);
?>