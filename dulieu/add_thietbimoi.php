<?php include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm thietbi thì thêm không thì thoát
if (isset($_POST['ma_thietbi_them']) && isset($_POST['ten_thietbi_them'])) {
	// kiểm tra ma	 thietbi có trrung không
	$kiemtramathietbi = mysqli_query($con, "SELECT * FROM thietbi WHERE ( thietbi.mathietbi = '$_POST[ma_thietbi_them]' OR thietbi.tenthietbi ='$_POST[ten_thietbi_them]') ");
	if (mysqli_num_rows($kiemtramathietbi)) {
		// neu ma thietbi da tonn tai
		echo "1";
	} else {
			$ngay = date('Y/m/d H:i:s');
			$insert_thietbi_moi="INSERT INTO thietbi( mathietbi, tenthietbi, id_canbothem, ngaythem) VALUES ('$_POST[ma_thietbi_them]','$_POST[ten_thietbi_them]','$_SESSION[id_canbo]','$ngay')";
			if (mysqli_query($con, $insert_thietbi_moi)) {
				echo "99";
			}
			else {echo var_dump(mysqli_query($con, $insert_thietbi_moi));
			}
	}
} else {
	header("location:./../admin/login");
}
mysqli_close($con);
?>