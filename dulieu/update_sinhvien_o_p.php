<?php include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm chucvu thì thêm không thì thoát
if (isset($_POST['id__o_phong_sua_12']) && isset($_POST['id_dphong_moi'])) {
	 $id__o_echophong_sua_12=$_POST['id__o_phong_sua_12'];//  id ở phòng
	$id_dphong_moi=$_POST['id_dphong_moi'];
	// lấy thông tin sv ở phòng củ
	$id_sinhvien_op = mysqli_fetch_array(mysqli_query($con, "SELECT o_phong.id_ophong, o_phong.id_sinhvien, o_phong.id_phong, o_phong.hoc_ky, o_phong.nam_hoc FROM o_phong WHERE o_phong.ngay_ket_thuc IS NULL AND o_phong.id_ophong='$id__o_echophong_sua_12'"));
	// kiểm tra số lượng sinh viên ở phòng đó
	$id_sinhvien=$id_sinhvien_op['id_sinhvien'];
	$hoc_ky=$id_sinhvien_op['hoc_ky'];
	$nam_hoc=$id_sinhvien_op['nam_hoc'];


	$slsvop=mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(o_phong.id_ophong) as slsvop FROM o_phong WHERE o_phong.ngay_ket_thuc IS NULL and o_phong.id_phong = '$id_dphong_moi'"));
	// lấy số lượng lloaij phòng đó
	$sl_ngoclp=mysqli_fetch_array(mysqli_query($con, "SELECT loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM loai_phong, phong WHERE phong.xoa =0 AND phong.idphong='$id_dphong_moi' AND loai_phong.xoa=0"));
	
	if ($slsvop["slsvop"]==$sl_ngoclp['sl_nguoi_o']) {
		echo "2";// đã hếtchỗ chuyển
	}else {
		$ngay = date('Y/m/d H:i:s');
		$ngay_kt =date('Y/m/d');
		$update_o_phong= "UPDATE o_phong SET ngay_ket_thuc='$ngay_kt', o_phong.id_canboxoa='$_SESSION[id_canbo]', o_phong.ngay_xoa='$ngay', chuyenphong=1 WHERE o_phong.id_ophong='$id__o_echophong_sua_12'";
		$insert_o_phong ="INSERT INTO o_phong(id_sinhvien, id_phong, hoc_ky, nam_hoc, ngay_bat_dau,id_canbothem, ngaythem) VALUES ('$id_sinhvien','$id_dphong_moi','$hoc_ky','$nam_hoc','$ngay_kt','$_SESSION[id_canbo]','$ngay')";
		if (mysqli_query($con,$update_o_phong)&& mysqli_query($con,$insert_o_phong)) {
			echo "99";//ng)
			$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('o_phong','Ở phòng','$id_sinhvien_op[id_ophong]','id_phong','Phòng', '$id_sinhvien_op[id_phong]','$id_dphong_moi','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
			mysqli_query($con, $log1); // ghi log edit

		}else{
			echo "100";
		}
	}
} else {
	header("location:./../admin/login");
}
mysqli_close($con);
?>