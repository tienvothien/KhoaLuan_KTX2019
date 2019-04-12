<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 menutrai ">
	<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand"><span class="fa fa-home"></span> Trang chủ</a>

		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
		<div class="sidenav">
			<button class="dropdown-btn">
				<span class="glyphicon glyphicon-user"></span>

				<?php include 'conn.php';
$t = $_SESSION['macb_dangnhap'];
$sqlho_ten_cb = "SELECT ho_can_bo, ten_can_bo FROM can_bo where ma_can_bo = '$t' ";
$queryho_ten_cb = mysqli_query($con, $sqlho_ten_cb);
$rowho_ten_cb = mysqli_fetch_array($queryho_ten_cb);
$ho_can_bo = $rowho_ten_cb['ho_can_bo'];
$ten_can_bo = $rowho_ten_cb['ten_can_bo'];
echo $ho_can_bo . "&nbsp" . $ten_can_bo;
?>
			<i class=" fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a href="qltaikhoan.php" class="list-group-item">Quản lý tài khoản</a>
				<a href="../dulieu/dangxuat.php"><span class="glyphicon glyphicon-log-in"></span> Đăng xuất</a>
			</div>
			<a href="timkiem.php" class="list-group-item">Tìm kiếm</a>
			<a href="thongke.php" class="list-group-item">Thống kê</a>
			<button class="dropdown-btn">Quản lý Đăng ký
			<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<!-- <a href="dangkyad.php" class="list-group-item">Đăng ký ở ktx SV </a> -->
				<a href="qldondangky.php" class="list-group-item">Quản lý Đơn đăng ký</a>
			</div>
			<button class="dropdown-btn">Quản lý sinh viên
			<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a href="qlsinhvien.php" class="list-group-item">Thông tin Sinh viên</a>
				<a href="qllop.php" class="list-group-item">Quản lý Lớp</a>
				<a href="quanlykhoa.php" class="list-group-item">Quản lý Khoa</a>
			</div>
			<button class="dropdown-btn">Quản lý Phòng Ở
			<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a href="qltoanha.php" class="list-group-item">Quản lý Tòa nhà</a>
				<a href="qlphong.php" class="list-group-item">Quản lý Phòng</a>
				<a href="qlloaiphong.php" class="list-group-item">Quản lý Loại Phòng</a>
				<a href="themsinhvienvaophong.php" class="list-group-item">Thêm Sinh viên vào phòng</a>
			</div>
			<button class="dropdown-btn">Quản lý Cán bộ
			<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a href="qlcanbo.php" class="list-group-item">Cán bộ</a>
				<a href="qlchucvu.php" class="list-group-item">Chức vụ</a>
			</div>
			<button class="dropdown-btn">Quản lý Tài sản
			<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a href="quanlythietbi.php" class="list-group-item">Quản lý thiết bị</a>
				<a href="themtb_vao_lp.php" class="list-group-item">Thiết bị trong loại phòng</a>
				<a href="kiemtrathietbi.php" class="list-group-item">Kiêm tra thiết bị</a>
			</div>
		</div>
	</div>

</div>
</nav>
</div>
	<script>
		var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;
	for (i = 0; i < dropdown.length; i++) {
	dropdown[i].addEventListener("click", function() {
	this.classList.toggle("active");
	var dropdownContent = this.nextElementSibling;
	if (dropdownContent.style.display === "block") {
	dropdownContent.style.display = "none";
	} else {
	dropdownContent.style.display = "block";
	}
	});
	}
	</script>