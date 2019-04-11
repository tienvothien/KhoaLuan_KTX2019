<?php
session_start();
if (isset($_SESSION['macb_dangnhap']) && $_SESSION['kt_dangnhap_cb'] == 1 && isset($_SESSION['capdotruycap'])) {
	//kiem tra có được quyền đang nhâp hay không
	include 'conn.php';
	$qr1 = mysqli_query($con, "SELECT id_cochucvu FROm cochucvu  WHERE id_cochucvu='$_SESSION[capdotruycap])' ");
	if (!mysqli_num_rows($qr1)) {
		echo "
			<script>alert('Không đủ quyền truy cận')</script>";
		header("location:./admin/login/");
	}
} else {
	header("location:./admin/login/");
}
?>