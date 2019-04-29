<?php include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm Loại phòng thì thêm không thì thoát
if (isset($_POST['ma_loai_phong_themmoi123']) && isset($_POST['ten_loai_phong_themmoi123']) && isset($_POST['slnguoio_loai_phong_themmoi123']) && isset($_POST['gia_loai_phong_themmoi123'])) {
	 $ma_loai_phong_themmoi123=$_POST['ma_loai_phong_themmoi123'];
	 $ten_loai_phong_themmoi123=$_POST['ten_loai_phong_themmoi123'];
	 $slnguoio_loai_phong_themmoi123=$_POST['slnguoio_loai_phong_themmoi123'];
	 $gia_loai_phong_themmoi123=preg_replace('/(,)/u', '', strip_tags($_POST['gia_loai_phong_themmoi123']));
	// kiểm tra Loại phòng có trrung không
	$kiemtraloai_phong = mysqli_query($con, "SELECT * FROM loai_phong WHERE ( loai_phong.ma_loai_phong = '$ma_loai_phong_themmoi123' OR loai_phong.ten_loai_phong ='$ten_loai_phong_themmoi123')");
	if (mysqli_num_rows($kiemtraloai_phong)) {
		// neu ma  Loại phòng da tonn tai
		echo "1";
	} else {
			$ngay = date('Y/m/d H:i:s');
			$insert_loai_phong_moi="INSERT INTO loai_phong( ma_loai_phong, ten_loai_phong, sl_nguoi_o, gia_loai_phong, id_canbothem, ngay_them) VALUES ('$ma_loai_phong_themmoi123','$ten_loai_phong_themmoi123','$slnguoio_loai_phong_themmoi123','$gia_loai_phong_themmoi123','$_SESSION[id_canbo]','$ngay')";
			if (mysqli_query($con, $insert_loai_phong_moi)) {
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