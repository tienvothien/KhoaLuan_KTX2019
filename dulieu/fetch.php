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
?>