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
// xử lý xuất thông tin  phòng
if (isset($_POST["id_phong_sua_12"])) {
	$query = "SELECT phong.idphong, phong.ma_phong, phong.stt_tang, phong.id_canbothem, phong.thoigianthem, toa_nha.ten_toa_nha, toa_nha.id_toanha, loai_phong.id_loaiphong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o, loai_phong.gia_loai_phong , can_bo.ma_can_bo, can_bo.ten_can_bo, can_bo.ho_can_bo FROM phong, toa_nha, loai_phong, can_bo WHERE phong.xoa=0 AND phong.idphong='$_POST[id_phong_sua_12]' AND phong.id_toanha= toa_nha.id_toanha AND phong.id_loaiphong= loai_phong.id_loaiphong AND can_bo.id_canbo= phong.id_canbothem";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}//end xử lý thông tin  phòng
// xử lý xuất thông tin  phòng
if (isset($_POST["id_o_phong_sua"])) {
	$query = "SELECT o_phong.id_ophong, sinh_vien.id_sinhvien, sinh_vien.mssv, phong.ma_phong, phong.idphong, toa_nha.id_toanha, toa_nha.ten_toa_nha FROM o_phong, phong, sinh_vien, toa_nha WHERE o_phong.id_ophong='$_POST[id_o_phong_sua]' AND o_phong.id_phong= phong.idphong AND o_phong.id_sinhvien=sinh_vien.id_sinhvien AND phong.id_toanha=toa_nha.id_toanha";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}//end xử lý thông tin  Tòa nhà ở
if (isset($_POST['id_toa_nha_them_ophong'])) {
		$id_toa_nha_them_ophong = $_POST['id_toa_nha_them_ophong'];
		include 'conn.php';
		$sqlphong = "SELECT phong.idphong, phong.ma_phong FROM phong WHERE phong.xoa=0 AND phong.id_toanha='$id_toa_nha_them_ophong' ORDER by ma_phong ASC";
		$queryphong = mysqli_query($con, $sqlphong);
		echo " <option value=''>Chọn Phòng</option>";
		while ($rowphong = mysqli_fetch_array($queryphong)) {
			$ma_phong = $rowphong['ma_phong'];
			$idphong = $rowphong['idphong'];
			echo "<option value='$idphong'> $ma_phong</option>";}
}//end tỉnh thay đổi sẽ chọn huyện thay đổi
if (isset($_POST['id_o_phong_sua1'])) {
		$id_o_phong_sua1 = $_POST['id_o_phong_sua1'];
		include 'conn.php';
		$sqlphong = "SELECT toa_nha.id_toanha, toa_nha.ten_toa_nha, toa_nha.loai_toa_nha FROM toa_nha, sinh_vien, o_phong WHERE o_phong.id_ophong ='$id_o_phong_sua1' AND sinh_vien.id_sinhvien= o_phong.id_sinhvien AND sinh_vien.gioi_tinh=toa_nha.loai_toa_nha AND toa_nha.xoa=0 ORDER BY toa_nha.ten_toa_nha";
		$queryphong = mysqli_query($con, $sqlphong);
		echo " <option value=''>Chọn tòa nhà</option>";
		while ($rowphong = mysqli_fetch_array($queryphong)) {
			$ten_toa_nha = $rowphong['ten_toa_nha'];
			$id_toanha = $rowphong['id_toanha'];
			echo "<option value='$id_toanha'> $ten_toa_nha</option>";}
}//end tỉnh thay đổi sẽ chọn huyện thay đổi
if (isset($_POST['khoa_them_sinh_vien1'])) {
		include 'conn.php';
		$sqlphong = "SELECT khoa.id_khoa, khoa.ten_khoa FROM khoa WHERE khoa.xoa=0 ORDER BY khoa.ten_khoa";
		$queryphong = mysqli_query($con, $sqlphong);
		echo " <option value=''>Chọn khoa</option>";
		while ($rowphong = mysqli_fetch_array($queryphong)) {
			$ten_khoa = $rowphong['ten_khoa'];
			$id_khoa = $rowphong['id_khoa'];
			echo "<option value='$id_khoa'> $ten_khoa</option>";}
}//end tỉnh thay đổi sẽ chọn huyện thay đổi
if (isset($_POST['mssv_o_phong_them_toanha1'])) {
		$mssv_o_phong_them_toanha1 = $_POST['mssv_o_phong_them_toanha1'];
		include 'conn.php';
		$sqlphong = "SELECT toa_nha.id_toanha, toa_nha.ten_toa_nha, toa_nha.loai_toa_nha FROM toa_nha, sinh_vien WHERE sinh_vien.mssv='$mssv_o_phong_them_toanha1' AND sinh_vien.gioi_tinh=toa_nha.loai_toa_nha AND toa_nha.xoa=0 ORDER BY toa_nha.ten_toa_nha";
		$queryphong = mysqli_query($con, $sqlphong);
		echo " <option value=''>Chọn tòa nhà</option>";
		while ($rowphong = mysqli_fetch_array($queryphong)) {
			$ten_toa_nha = $rowphong['ten_toa_nha'];
			$id_toanha = $rowphong['id_toanha'];
			echo "<option value='$id_toanha'> $ten_toa_nha</option>";
		}

}//end tỉnh thay đổi sẽ chọn huyện thay đổi
// xử lý xuất thông tin có chức vụ của cán bộ
if (isset($_POST["id_cochucvu_sua"])) {
	$query = "SELECT cochucvu.id_cochucvu, can_bo.id_canbo, can_bo.ma_can_bo, chucvu.idchucvu, chucvu.tenchucvu FROM cochucvu, can_bo, chucvu WHERE cochucvu.xoa=0 AND cochucvu.id_cochucvu='$_POST[id_cochucvu_sua]' AND cochucvu.id_canbo= can_bo.id_canbo AND cochucvu.idchucvu = chucvu.idchucvu";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}//end xử lý thông tin có chức vụ của cán bộ
	mysqli_close($con);

?>