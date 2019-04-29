<?php include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm chucvu thì thêm không thì thoát
if (isset($_POST['ma_chucvu_them12'])) {
	// kiểm tra ma chucvu va ten chucvu có trrung không
	$kiemtramachucvu = mysqli_query($con, "SELECT * FROM chucvu WHERE chucvu.machucvu='$_POST[ma_chucvu_them12]' OR chucvu.tenchucvu='$_POST[ten_chucvu_them12]'");
	if (mysqli_num_rows($kiemtramachucvu)) {
		// neu ma chucvu da tonn tai
		echo "1";
	} else {
		$ngay = date('Y/m/d H:i:s');
		$insert_chucvu_moi="INSERT INTO chucvu(machucvu, tenchucvu, id_canbothem, ngaythem ) VALUES ('$_POST[ma_chucvu_them12]','$_POST[ten_chucvu_them12]', '$_SESSION[id_canbo]', '".$ngay."')";
		if (mysqli_query($con, $insert_chucvu_moi)) {
			echo "99";
		}else {echo "100";}
	}
} else {
	header("location:./../admin/login");
}
mysqli_close($con);
?>