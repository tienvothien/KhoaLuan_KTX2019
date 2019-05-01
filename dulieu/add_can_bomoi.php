<?php include 'kiemtradangnhap.php';
	//neut tôn tại mãi thêm Cán bộ thì thêm không thì thoát
	if (isset($_POST['ma_can_bo_themmoi123'])) {
		$duongdananhcanbo = "./../images/";
		$hinhanhthem=$_FILES['image12']['name'];
		$target_file = $duongdananhcanbo . basename($_FILES["image12"]["name"]);
		$ma_can_bo_themmoi123 = $_POST['ma_can_bo_themmoi123'];
		$ho_can_bothemmoi_12 = $_POST['ho_can_bothemmoi_12'];
		$ten_can_bothemmoi_12 = $_POST['ten_can_bothemmoi_12'];
		$ngaysinh_can_bothemmoi_12 = $_POST['ngaysinh_can_bothemmoi_12'];
		$gioitinh_can_bothemmoi_12 = $_POST['gioitinh_can_bothemmoi_12'];
		$sdt_can_bothemmoi_12 = $_POST['sdt_can_bothemmoi_12'];
		$email_can_bothemmoi_12 = $_POST['email_can_bothemmoi_12'];

		// kiểm tra Số điện thoại Cán bộ trùng không
		$kiemtra_sdt = mysqli_query($con, "SELECT * FROM can_bo WHERE can_bo.sdt='$sdt_can_bothemmoi_12'");
		if (mysqli_num_rows($kiemtra_sdt)) {// neu Số điện thoại Cán bộ da tonn tai
			echo "1";
		} else {
			// kiểm tra Email thoại Cán bộ trùng không
			$kiemtra_email1 = mysqli_query($con, "SELECT * FROM can_bo WHERE can_bo.email='$email_can_bothemmoi_12'");
			if (mysqli_num_rows($kiemtra_email1)) {// neu Số điện thoại Cán bộ da tonn tai
				echo "2";
			}else{
				$ngay = date('Y/m/d H:i:s');
				$insert_canbo_moi="INSERT INTO can_bo(hinhanh,ma_can_bo, ho_can_bo, ten_can_bo, gioitinh, ngay_sinh, sdt, email, id_canbothem, ngaythem) VALUES ('$hinhanhthem','$ma_can_bo_themmoi123', '$ho_can_bothemmoi_12', '$ten_can_bothemmoi_12', '$gioitinh_can_bothemmoi_12','$ngaysinh_can_bothemmoi_12','$sdt_can_bothemmoi_12', '$email_can_bothemmoi_12','$_SESSION[id_canbo]', '$ngay')";
				if (mysqli_query($con, $insert_canbo_moi)) {
					move_uploaded_file($_FILES["image12"]["tmp_name"], $target_file);

					mysqli_query($con,"INSERT INTO taikhoan(idms, matkhau, ngaythem, idtktao) VALUES ('$ma_can_bo_themmoi123','".md5(md5(md5($ma_can_bo_themmoi123)))."','$ngay','$_SESSION[id_canbo]')");
					echo "99";
				}else {
					echo "100";;
				}
			}	
		}//end kiem tra số điện thoại
	} else {
		header("location:./../admin/login");
	}
	mysqli_close($con);
?>