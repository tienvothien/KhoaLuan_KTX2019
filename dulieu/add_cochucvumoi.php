<?php include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm chucvu thì thêm không thì thoát
if (isset($_POST['macanbo_cochucvu_them12']) && isset($_POST['id_chucvuthem_cochucvu12'])) {
	$macanbo_cochucvu_them12=$_POST['macanbo_cochucvu_them12'];
	$id_chucvuthem_cochucvu12=$_POST['id_chucvuthem_cochucvu12'];
	// kiểm tra ma Cán bộ đã có chức vụ này
	$kiemtra_cochucvu_chua = mysqli_query($con, "SELECT can_bo.id_canbo FROM cochucvu, can_bo WHERE can_bo.xoa=0 AND can_bo.ma_can_bo='$macanbo_cochucvu_them12' AND cochucvu.idchucvu='$id_chucvuthem_cochucvu12' AND can_bo.id_canbo=cochucvu.id_canbo and cochucvu.xoa=0");
	$kiemtra_id_canbo = mysqli_query($con, "SELECT can_bo.id_canbo FROM  can_bo WHERE can_bo.xoa=0 AND can_bo.ma_can_bo='$macanbo_cochucvu_them12' ");
	$kiemtra_co_id_canbo = mysqli_query($con, "SELECT can_bo.id_canbo FROM can_bo WHERE can_bo.ma_can_bo ='$macanbo_cochucvu_them12' ");
	if (!mysqli_num_rows($kiemtra_co_id_canbo)) {
		echo "2";
	}else if (mysqli_num_rows($kiemtra_cochucvu_chua)) {
		// neu ma chucvu da tonn tai
		echo "1";
	} else {
		$id_canbo=mysqli_fetch_array($kiemtra_id_canbo);
		$ngay = date('Y/m/d H:i:s');
		$insert_cochucvu_moi="INSERT INTO cochucvu(id_canbo, idchucvu, id_canbothem, ngaythem) VALUES ('$id_canbo[id_canbo]','$id_chucvuthem_cochucvu12', '$_SESSION[id_canbo]', '".$ngay."')";
		if (mysqli_query($con, $insert_cochucvu_moi)) {
			echo "99";
		}else {
			echo "100";}
	}
} elseif (isset($_POST['id_cochucvu_sua123'])) {
	$id_cochucvu_sua123=$_POST['id_cochucvu_sua123'];
	$id_chucvusua_cochuc_moi=$_POST['id_chucvusua_cochuc_moi'];
	//tìm thông tin cả có chức vụ
	$tim_r = mysqli_fetch_array(mysqli_query($con,"SELECT cochucvu.id_canbo, cochucvu.idchucvu FROM cochucvu WHERE cochucvu.id_cochucvu ='$id_cochucvu_sua123' AND cochucvu.xoa=0"));
	// gán dữ liệu
	$id_canbo1=$tim_r['id_canbo'];
	//kiem tra dã có chưc vụ chưa
	$kiemtra_cochucvu_chua = mysqli_query($con, "SELECT cochucvu.id_canbo FROM cochucvu WHERE cochucvu.id_canbo='$id_canbo1' AND cochucvu.idchucvu='$id_chucvusua_cochuc_moi' and cochucvu.xoa=0");
	// xóa có chức vụ củ và thêm chức vụ mới
	$ngay = date('Y/m/d H:i:s');
	$update_cocchuvu = "UPDATE cochucvu SET xoa=1,id_canboxoa='$_SESSION[id_canbo]',ngay_xoa='$ngay' WHERE cochucvu.id_cochucvu='$id_cochucvu_sua123'";
	if (mysqli_num_rows($kiemtra_cochucvu_chua)) {
		echo "1";
	}else if (mysqli_query($con,$update_cocchuvu)) {
		$insert_cochucvu_moi12="INSERT INTO cochucvu(id_canbo, idchucvu, id_canbothem, ngaythem) VALUES ('$id_canbo1','$id_chucvusua_cochuc_moi', '$_SESSION[id_canbo]', '$ngay')";
		if (mysqli_query($con, $insert_cochucvu_moi12)) {
			echo "99";
		}else{
			echo "1001";
		}
	}else {
		echo "100";
	}
}else {
	header("location:./../admin/login");
}
mysqli_close($con);
?>