<?php include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm lop thì thêm không thì thoát
if (isset($_POST['ma_lop_them'])) {
	// kiểm tra ma lop va ten lop có trrung không
	$kiemtramalop = mysqli_query($con, "SELECT * FROM lop WHERE lop.ma_lop='$_POST[ma_lop_them]' OR lop.ten_lop='$_POST[ten_lop_them]'");
	if (mysqli_num_rows($kiemtramalop)) {
		// neu ma lop da tonn tai
		echo "1";
	} else {
		$ngay = date('Y/m/d H:i:s');
		$insert_lop_moi="INSERT INTO lop( ma_lop, ten_lop, id_khoa, khoa, nam_BD, id_canbothem, ngay) VALUES ('$_POST[ma_lop_them]','$_POST[ten_lop_them]','$_POST[id_khoa_them_lopt12]', '$_POST[stt_khoa_lopthem]', '$_POST[nam_BD_themlopm]', '$_SESSION[id_canbo]', '".$ngay."')";
		if (mysqli_query($con, $insert_lop_moi)) {
			echo "99";
		}else {echo "100";}
	}
} else {
	header("location:./../admin/login");
}
mysqli_close($con);
?>