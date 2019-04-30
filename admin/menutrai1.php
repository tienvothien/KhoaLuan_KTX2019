<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 menutrai ">
	<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid " style="padding-left: 0px; padding-right: 0px;">
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
				<a href="quanlythongtintaikhoandangnhap.php" class="list-group-item">Quản lý tài khoản</a>
				<a href="../dulieu/dangxuat.php"><span class="glyphicon glyphicon-log-in"></span> Đăng xuất</a>
			</div>
			<!-- <a href="timkiem.php" class="list-group-item">Tìm kiếm</a> -->
			<!-- <a href="thongke.php" class="list-group-item">Thống kê</a> -->
			<!-- <button class="dropdown-btn">Quản lý Đăng ký
			<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a href="dangkyad.php" class="list-group-item">Đăng ký ở ktx SV </a>
				<a href="qldondangky.php" class="list-group-item">Quản lý Đơn đăng ký</a>
			</div> -->
			<button class="dropdown-btn">Quản lý sinh viên
			<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a href="quanlysinhvien.php" class="list-group-item">Thông tin Sinh viên</a>
				<a href="quanlylop.php" class="list-group-item">Quản lý Lớp</a>
				<a href="quanlykhoa.php" class="list-group-item">Quản lý Khoa</a>
			</div>
			<button class="dropdown-btn">Quản lý Phòng Ở
			<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a href="quanlytoanha.php" class="list-group-item">Quản lý Tòa nhà</a>
				<a href="quanlyphong.php" class="list-group-item">Quản lý Phòng</a>
				<a href="quanlyloaiphong.php" class="list-group-item">Quản lý Loại Phòng</a>
				<a href="themsinhvienvaophong.php" class="list-group-item">Quản lý ở</a>
			</div>
			<?php 
				if ($qr_ktra_chucvu['idchucvu']==0){ ?>
					<button class="dropdown-btn">Quản lý Cán bộ
					<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="quanlycanbo.php" class="list-group-item">Cán bộ</a>
						<a href="quanlychucvu.php" class="list-group-item">Chức vụ</a>
						
								<a href="quanlycochucvu.php" class="list-group-item">Có Chức vụ</a>
							
					</div>
				<?php } ?>
			<button class="dropdown-btn">Quản lý Thiết bị
			<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a href="quanlythietbi.php" class="list-group-item">Danh sách Thiết bị</a>
				<a href="quanlythietbitrongloaiphong.php" class="list-group-item">Thiết bị trong Loại phòng</a>
				<a href="kiemtrathietbi.php" class="list-group-item">Kiêm tra Thiết bị</a>
			</div>
			<?php 
				if ($qr_ktra_chucvu['idchucvu']==0){ ?>
			<button class="dropdown-btn">Quản lý Log Edit
			<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a href="quanlyloglop.php" class="list-group-item">Log Edit Lớp</a>
				<a href="quanlylog_edit_khoa.php" class="list-group-item">Log Edit Khoa</a>
				<a href="quanlylog_edit_thietbi1.php" class="list-group-item">Log Edit Thiết bị</a>
				<a href="quanlylog_edit_cothietbi.php" class="list-group-item">Log Edit Thiết bị Loại phòng</a>
			</div>
			<button class="dropdown-btn">Quản lý Log Delete
			<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a href="quanlylogDeleteThietbi.php" class="list-group-item">Log Delete Thiết bị</a>
				<a href="quanlylogDeletelctb.php" class="list-group-item">Log Delete Có thiết bị</a>
				<a href="quanlylogDeletelop.php" class="list-group-item">Log Delete Lớp</a>
				<a href="quanlylogDeletekhoa.php" class="list-group-item">Log Delete Thiết Khoa</a>
			</div>
			<?php } ?>
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