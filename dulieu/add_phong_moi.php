<?php 
	include 'kiemtradangnhap.php';
	if (isset($_POST['sophong_themmoi'])) {
		
		$id_toa_nha_themmoi = $_POST['id_toa_nha_themmoi'];
		$sophong_themmoi = $_POST['sophong_themmoi'];
		$tang_phong_themmoi = $_POST['tang_phong_themmoi'];
		$loai_phong_phong_themmoi = $_POST['loai_phong_phong_themmoi'];
		// kiểm tra số phòng tồn tại chưa
		$kiemtra_sophong = mysqli_query($con, "SELECT phong.idphong FROM phong WHERE phong.ma_phong='$sophong_themmoi' AND phong.id_toanha='$id_toa_nha_themmoi'");
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
		

	}else {
		header("location:./../admin/login");
	}
 ?>