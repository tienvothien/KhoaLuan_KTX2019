<?php include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm Tòa nhà thì thêm không thì thoát
if (isset($_POST['ma_toa_nha_themmoi123']) && isset($_POST['ten_toa_nha_themmoi123']) && isset($_POST['loai_toa_nha_themmoi123'])) {
	 $ma_toa_nha_themmoi123=$_POST['ma_toa_nha_themmoi123'];
	 $ten_toa_nha_themmoi123=$_POST['ten_toa_nha_themmoi123'];
	 $loai_toa_nha_themmoi123=$_POST['loai_toa_nha_themmoi123'];
	// kiểm tra Tòa nhà có trrung không
	$kiemtratoa_nha = mysqli_query($con, "SELECT * FROM toa_nha WHERE ( toa_nha.ma_toa_nha = '$ma_toa_nha_themmoi123' OR toa_nha.ten_toa_nha ='$ten_toa_nha_themmoi123')");
	if (mysqli_num_rows($kiemtratoa_nha)) {
		// neu ma  Tòa nhà da tonn tai
		echo "1";
	} else {
			$ngay = date('Y/m/d H:i:s');
			$insert_toa_nha_moi="INSERT INTO toa_nha( ma_toa_nha, ten_toa_nha, loai_toa_nha, id_canbothem, ngaythem) VALUES ('$ma_toa_nha_themmoi123','$ten_toa_nha_themmoi123','$loai_toa_nha_themmoi123','$_SESSION[id_canbo]','$ngay')";
			if (mysqli_query($con, $insert_toa_nha_moi)) {
				echo "99";
			}
			else {
				echo "100";
			}
	}
} else {
	header("location:./../admin/login");
}
mysqli_close($con);
?>