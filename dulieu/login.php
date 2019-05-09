<?php
//danhnhap can bo
if (isset($_POST['tendangnhap']) && isset($_POST['matkhaudangnhap'])) {
	include 'conn.php';
	$tendangnhap = $_POST['tendangnhap'];
	$matkhau = $_POST['matkhaudangnhap'];
	$ktrataikhoan = mysqli_query($con, "SELECT taikhoan.idtk FROM taikhoan WHERE taikhoan.idms ='$tendangnhap' and taikhoan.xoa=0");
	// kiểm tra nếu có tên đang nhập thì lamftieeps không thi trở lại
	// kiem tra tên đăng nhập
	if (mysqli_num_rows($ktrataikhoan)) {
		// nếu có tồn tài tên đang nhập thì kiểm tra mật khẩu
		$ktrataikhoan_MK = mysqli_query($con, "SELECT taikhoan.idtk,taikhoan.is_sinhvien FROM taikhoan WHERE taikhoan.idms ='$tendangnhap' and taikhoan.xoa=0  and taikhoan.matkhau='$matkhau'");
		if (mysqli_num_rows($ktrataikhoan_MK)) {
			//kiểm tra có phải là sinh viên không
			$ktram_is_sinhvien=mysqli_fetch_array($ktrataikhoan_MK);
			if ($ktram_is_sinhvien['is_sinhvien']==1) {
				$qr_quyen_sv = (mysqli_query($con, "SELECT sinh_vien.id_sinhvien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv FROM sinh_vien, taikhoan WHERE sinh_vien.xoa=0 AND taikhoan.xoa=0 AND sinh_vien.mssv= taikhoan.idms AND sinh_vien.mssv='$tendangnhap'"));
				if (mysqli_num_rows($qr_quyen_sv)) {
					$row1 = mysqli_fetch_array($qr_quyen_sv);
					session_start();
					$_SESSION['idtk'] = $ktram_is_sinhvien['idtk'];
					$_SESSION['id_sinhvien'] = $row1['id_sinhvien'];
					$_SESSION['mssv'] = $row1['mssv'];
					$_SESSION['ho_sv'] = $row1['ho_sv'];
					$_SESSION['ten_sv'] = $row1['ten_sv'];
					$_SESSION['id_sinhvien'] = $row1['id_sinhvien'];
					$_SESSION['kt_dangnhap_sv'] = 1;

					echo "9";
				} else {
					echo "3";
				}
			}else{
				$qrquyen = (mysqli_query($con, "SELECT * FROM can_bo, cochucvu WHERE can_bo.xoa=0 and can_bo.id_canbo = cochucvu.id_canbo AND  cochucvu.xoa=0 and can_bo.ma_can_bo ='$tendangnhap'"));
				if (mysqli_num_rows($qrquyen)) {
					$row = mysqli_fetch_array($qrquyen);
					session_start();
					$_SESSION['idtk'] = $ktram_is_sinhvien['idtk'];
					$_SESSION['macb_dangnhap'] = $row['ma_can_bo'];
					$_SESSION['id_cochucvulogin'] = $row['id_cochucvu'];
					$_SESSION['id_canbo'] = $row['id_canbo'];
					$_SESSION['kt_dangnhap_cb'] = 1;

					echo "0";
				} else {
					echo "3";
				}
			}
		} else {
			echo "1";
		}
	} else {
		echo "2";
	}
} else {
	header('location:../admin/dangnhap.php');
}
?>