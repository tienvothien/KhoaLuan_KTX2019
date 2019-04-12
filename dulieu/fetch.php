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
?>