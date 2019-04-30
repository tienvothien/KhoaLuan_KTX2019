<?php include 'kiemtradangnhap.php'; 
// xuwr lý xuất thông tin khoa
if (isset($_POST["id_sinh_vien_sua"])) {
	$query = "SELECT sv.id_sinhvien, sv.mssv, sv.anh_ca_nhan, sv.ho_sv, sv.ten_sv, sv.ngay_sinh, sv.gioi_tinh, sv.que_quan, sv.so_cmnd, sv.ngay_cap, sv.noi_cap, sv.matinh, sv.mahuyen,h.caphuyen, h.tenhuyen, sv.maxa,x.capxa, x.tenxa, sv.so_nha, sv.so_dt, sv.email, sv.hotencha, sv.sdtcha, sv.hotenme,sv.sdtme,sv.id_lop, l.ten_lop, l.khoa, k.id_khoa, k.ten_khoa FROM sinh_vien sv, huyen h, xa x, lop l, khoa k WHERE sv.id_sinhvien='".$_POST["id_sinh_vien_sua"]."' AND h.mahuyen= x.mahuyen AND sv.maxa= x.maxa AND sv.id_lop=l.id_lop AND l.id_khoa=k.id_khoa
";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);
}//end xử lý thông tin khoa
?>