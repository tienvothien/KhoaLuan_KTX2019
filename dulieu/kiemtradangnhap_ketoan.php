<?php
session_start();
if (isset($_SESSION['macb_dangnhap']) && $_SESSION['kt_dangnhap_cb'] == 1 && isset($_SESSION['id_cochucvulogin'])) {
	// echo "kiem tra có được quyền đang nhâp hay không";
	include 'conn.php';
	$qr_ktra_chucvu = mysqli_fetch_array(mysqli_query($con, "SELECT DISTINCT chucvu.idchucvu, chucvu.tenchucvu FROM chucvu, cochucvu WHERE cochucvu.id_canbo='$_SESSION[id_canbo]' AND chucvu.idchucvu=cochucvu.idchucvu and chucvu.idchucvu=2 and cochucvu.xoa=0 ORDER BY chucvu.idchucvu   LIMIT 1"));
	if ($qr_ktra_chucvu['idchucvu']==2 || $qr_ktra_chucvu['idchucvu']==0) {
		
	}else{	
		echo "<script>alert('Bạn chưc có đủ quyền truy cập');</script>";
			header("location:./../admin/login");
	}
} else {
	header("location:./../admin/login");
}
?>
