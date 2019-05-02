<?php include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm chucvu thì thêm không thì thoát
if (isset($_POST['mssv_o_phong_them']) && isset($_POST['id_phong_them_ophong'])) {
	$mssv_o_phong_them=$_POST['mssv_o_phong_them'];
	$id_phong_them_ophong=$_POST['id_phong_them_ophong'];
	$hocky_them_ophong=$_POST['hocky_them_ophong'];
	$namhoc_them_ophong=$_POST['namhoc_them_ophong'];
	// kiểm tra sinh viên có  đang ở phòng đó không
	$kiemtra_cochucvu_chua = mysqli_query($con, "SELECT sinh_vien.id_sinhvien FROM sinh_vien, o_phong WHERE sinh_vien.mssv = '$mssv_o_phong_them' AND o_phong.ngay_ket_thuc is null  AND sinh_vien.id_sinhvien = o_phong.id_sinhvien");
	//lấy id  sinh viên có  đang ở phòng đó không
	$id_sinhvien_op = mysqli_fetch_array(mysqli_query($con, "SELECT sinh_vien.id_sinhvien FROM sinh_vien WHERE sinh_vien.mssv = '$mssv_o_phong_them'"));
	// kiểm tra số lượng sinh viên ở phòng đó
	$slsvop=mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(o_phong.id_ophong) as slsvop FROM o_phong WHERE o_phong.ngay_ket_thuc IS NULL and o_phong.id_phong = '$id_phong_them_ophong'"));
	// lấy số lượng lloaij phòng đó
	$sl_ngoclp=mysqli_fetch_array(mysqli_query($con, "SELECT loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM loai_phong, phong WHERE phong.xoa =0 AND phong.idphong='$id_phong_them_ophong' AND loai_phong.xoa=0"));
	$id_sinhvien_op1= $id_sinhvien_op['id_sinhvien'];
	if (mysqli_num_rows($kiemtra_cochucvu_chua)) {
		// neu ma chucvu da tonn tai
		echo "1";
	}elseif ($slsvop["slsvop"]==$sl_ngoclp['sl_nguoi_o']) {
		echo "2";// đã hế chỗ chuyển
	}else {
		$ngay = date('Y/m/d H:i:s');
		$insert_o_phong ="INSERT INTO o_phong(id_sinhvien, id_phong, hoc_ky, nam_hoc, ngay_bat_dau,id_canbothem, ngaythem) VALUES ('$id_sinhvien_op1','$id_phong_them_ophong','$hocky_them_ophong','$namhoc_them_ophong','".date('Y/m/d')."','$_SESSION[id_canbo]','$ngay')";
		if (mysqli_query($con,$insert_o_phong)) {
			echo "99";
		}else{
			echo "100";
		}
	}
} else {
	header("location:./../admin/login");
}
mysqli_close($con);
?>