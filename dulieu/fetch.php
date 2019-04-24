<?php include 'kiemtradangnhap.php'; 
// xuwr lý xuất thông tin khoa
if (isset($_POST["id_khoa_sua"])) {
	$query = "SELECT * FROM khoa WHERE khoa.id_khoa = '" . $_POST["id_khoa_sua"] . "'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}//end xử lý thông tin khoa
// xử lý thông tin lớp
if (isset($_POST["id_lop_sua"])) {
	$query = "SELECT * FROM lop INNER JOIN khoa on lop.id_khoa = khoa.id_khoa WHERE lop.id_lop = '" . $_POST["id_lop_sua"] . "'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}//end xử lý thông tin lớp
// xử lý thông tin lớp
if (isset($_POST["id_thietbi_sua"])) {
	$query = "SELECT * FROM thietbi  WHERE thietbi.idtb = '" . $_POST["id_thietbi_sua"] . "'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}//end xử lý thông tin lớp
// xử lý thông tin có thiết bị
if (isset($_POST["id_thietbitrongloaiphong_sua"])) {
	$query = "SELECT ctb.idcothietbi,ctb.soluong, lp.id_loaiphong,lp.ten_loai_phong,thietbi.idtb, thietbi.tenthietbi, ctb.id_canbothem, can_bo.ho_can_bo, can_bo.ten_can_bo, ctb.ngaythem FROM loaiphongcothietbi ctb INNER JOIN loai_phong lp ON ctb.id_loaiphong = lp.id_loaiphong INNER JOIN thietbi ON thietbi.idtb = ctb.idtb INNER JOIN can_bo ON ctb.id_canbothem=can_bo.id_canbo WHERE thietbi.xoa=0 AND ctb.xoa=0 AND lp.xoa=0 AND ctb.idcothietbi='$_POST[id_thietbitrongloaiphong_sua]'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}//end xử lý thông tin có thiết bị
// xử lý xuất thông tin Chức vụ
if (isset($_POST["id_chucvu_sua"])) {
	$query = "SELECT * FROM chucvu WHERE chucvu.idchucvu = '" . $_POST["id_chucvu_sua"] . "'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}//end xử lý thông tin Chức vụ
// xử lý xuất thông tin Cán bộ
if (isset($_POST["id_can_bo_sua"])) {
	$query = "SELECT * FROM can_bo WHERE can_bo.id_canbo = '" . $_POST["id_can_bo_sua"] . "'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}//end xử lý thông tin Cán bộ
// xử lý xuất thông tin Cán bộ
if (isset($_POST["id_sua_toa_nha"])) {
	$query = "SELECT toa_nha.id_toanha, toa_nha.ma_toa_nha, toa_nha.ten_toa_nha, toa_nha.loai_toa_nha FROM toa_nha WHERE toa_nha.id_toanha = '" . $_POST["id_sua_toa_nha"] . "'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}//end xử lý thông tin Cán bộ
// xử lý xuất thông tin Loại phòng
if (isset($_POST["id_sua_loai_phong"])) {
	$query = "SELECT loai_phong.id_loaiphong, loai_phong.ma_loai_phong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o, loai_phong.gia_loai_phong FROM loai_phong WHERE loai_phong.id_loaiphong = '" . $_POST["id_sua_loai_phong"] . "'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}//end xử lý thông tin Loại phòng

	mysqli_close($con);

?>