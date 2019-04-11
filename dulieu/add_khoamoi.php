<?php include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm khoa thì thêm không thì thoát
if (isset($_POST['ma_khoa_them']) && isset($_POST['ten_khoa_them'])) {
	// kiểm tra ma	 khoa có trrung không
	$kiemtramakhoa = mysqli_query($con, "SELECT * FROM khoa WHERE khoa.ma_khoa='$_POST[ma_khoa_them]'");
	if (mysqli_num_rows($kiemtramakhoa)) {
		// neu ma khoa da tonn tai
		echo "1";
	} else {
		// kiểm tra ten khoa  co trung không
		$kiemtratenkhoa = mysqli_query($con, "SELECT * FROM khoa WHERE khoa.ten_khoa='$_POST[ten_khoa_them]'");
		if (mysqli_num_rows($kiemtratenkhoa)) {
			echo "2";
		}else{
			$ngay = date('Y/m/d H:i:s');
			$insert_khoa_moi="INSERT INTO khoa( ma_khoa, ten_khoa, id_canbothem, ngay) VALUES ('$_POST[ma_khoa_them]','$_POST[ten_khoa_them]','$_SESSION[id_canbo]','$ngay')";
			if (mysqli_query($con, $insert_khoa_moi)) {
				echo "99";
			}
			else {echo "100";}
		}
	}
} else {
	header("location:./../admin/login");
}

?>