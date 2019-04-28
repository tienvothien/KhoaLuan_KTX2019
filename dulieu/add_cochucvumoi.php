<?php include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm chucvu thì thêm không thì thoát
if (isset($_POST['macanbo_cochucvu_them12']) && isset($_POST['id_chucvuthem_cochucvu12'])) {
	$macanbo_cochucvu_them12=$_POST['macanbo_cochucvu_them12'];
	$id_chucvuthem_cochucvu12=$_POST['id_chucvuthem_cochucvu12'];
	// kiểm tra ma Cán bộ đã có chức vụ này
	$kiemtra_cochucvu_chua = mysqli_query($con, "SELECT can_bo.id_canbo FROM cochucvu, can_bo WHERE can_bo.xoa=0 AND can_bo.ma_can_bo='$macanbo_cochucvu_them12' AND cochucvu.idchucvu='$id_chucvuthem_cochucvu12' AND can_bo.id_canbo=cochucvu.id_canbo");
	$kiemtra_id_canbo = mysqli_query($con, "SELECT can_bo.id_canbo FROM  can_bo WHERE can_bo.xoa=0 AND can_bo.ma_can_bo='$macanbo_cochucvu_them12' ");
	if (mysqli_num_rows($kiemtra_cochucvu_chua)) {
		// neu ma chucvu da tonn tai
		echo "1";
	} else {
		$id_canbo=mysqli_fetch_array($kiemtra_id_canbo);
		$ngay = date('Y/m/d H:i:s');
		$insert_cochucvu_moi="INSERT INTO cochucvu(id_canbo, idchucvu, id_canbothem, ngaythem) VALUES ('$id_canbo[id_canbo]','$id_chucvuthem_cochucvu12', '$_SESSION[id_canbo]', '".$ngay."')";
		if (mysqli_query($con, $insert_cochucvu_moi)) {
			echo "99";
		}else {echo "100";}
	}
} else {
	header("location:./../admin/login");
}
mysqli_close($con);
?>