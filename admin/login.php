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
		$ktrataikhoan_MK = mysqli_query($con, "SELECT taikhoan.idtk FROM taikhoan WHERE taikhoan.idms ='$tendangnhap' and taikhoan.xoa=0  and taikhoan.matkhau='$matkhau'");
		if (mysqli_num_rows($ktrataikhoan_MK)) {
			$qrquyen = (mysqli_query($con, "SELECT * FROM can_bo, cochucvu WHERE can_bo.id_canbo = cochucvu.id_canbo AND can_bo.ma_can_bo ='$tendangnhap'"));
			if (mysqli_num_rows($qrquyen)) {
				$row = mysqli_fetch_array($qrquyen);
				session_start();
				$_SESSION['macb_dangnhap'] = $row['ma_can_bo'];
				$_SESSION['id_cochucvulogin'] = $row['id_cochucvu'];
				$_SESSION['kt_dangnhap_cb'] = 1;
				echo "0";
			} else {
				echo "3";
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