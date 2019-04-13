<?php include 'kiemtradangnhap.php';
//neut tôn tại loại phong dã có thiết bị rồi thì không thêmthì thoát
if (isset($_POST['id_loaiphong_thietbitrongloaiphong_them']) && isset($_POST['idtb_thietbitrongloaiphong_them'])) {
	// kiểm tra ma	 khoa có trrung không
	$id_loaiphong_them=$_POST['id_loaiphong_thietbitrongloaiphong_them'];
	$idtb_them=$_POST['idtb_thietbitrongloaiphong_them'];
	$soluong_them=$_POST['soluong_thietbitrongloaiphong_them'];
	$kiemtracotb = mysqli_query($con, "SELECT * FROM loaiphongcothietbi ctb WHERE ctb.id_loaiphong = '$id_loaiphong_them' AND ctb.idtb='$idtb_them' AND ctb.xoa=0");
	if (mysqli_num_rows($kiemtracotb)) {
		// neu ma khoa da tonn tai
		echo "1";
	}else{
			$ngay = date('Y/m/d H:i:s');
			$insert_khoa_moi="INSERT INTO loaiphongcothietbi(id_loaiphong, idtb, soluong, ngaythem, id_canbothem) VALUES ('$id_loaiphong_them','$idtb_them','$soluong_them', '$ngay' ,'$_SESSION[id_canbo]')";
			if (mysqli_query($con, $insert_khoa_moi)) {
				echo "99";
			}
			else {echo "100";}
		}
} else {
	header("location:./../admin/login");
}

?>