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
					<?php 
						include 'conn.php';
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
					<?php
					if ($qr_ktra_chucvu['idchucvu']==0 ||$qr_ktra_chucvu['idchucvu']==1){ ?>
					<button class="dropdown-btn">Quản lý sinh viên
					<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="quanlysinhvien.php" class="list-group-item">Thông tin sinh viên</a>
						<a href="quanlylop.php" class="list-group-item">Quản lý lớp</a>
						<a href="quanlykhoa.php" class="list-group-item">Quản lý khoa</a>
						<a href="quanly_nguoithan_sinhvien.php" class="list-group-item">Thông tin người thân</a>
					</div>
					<button class="dropdown-btn">Quản lý phòng ở
					<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="quanlytoanha.php" class="list-group-item">Quản lý tòa nhà</a>
						<a href="quanlyphong.php" class="list-group-item">Quản lý phòng</a>
						<a href="quanlyloaiphong.php" class="list-group-item">Quản lý loại phòng</a>
						<a href="quanly_o_phong.php" class="list-group-item">Quản lý đang ở</a>
						<a href="quanlyquatrinhophong_sinhvien.php" class="list-group-item">Quản lý đã ở</a>
						<a href="quanly_chuyen_phong.php" class="list-group-item">Quản lý chuyển phòng</a>
						<a href="quanly_quanhan_o_phong.php" class="list-group-item">Quản lý quá hạn</a>
					</div>
					<?php } ?>
					<?php
					if ($qr_ktra_chucvu['idchucvu']==0){ ?>
					<button class="dropdown-btn">Quản lý cán bộ
					<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="quanlycanbo.php" class="list-group-item">Cán bộ</a>
						<a href="quanlychucvu.php" class="list-group-item">Chức vụ</a>
						
						<a href="quanlycochucvu.php" class="list-group-item">Có chức vụ</a>
						
					</div>
					<?php } ?>
					<?php
					if ($qr_ktra_chucvu['idchucvu']==0 ||$qr_ktra_chucvu['idchucvu']==1){ ?>
					<button class="dropdown-btn">Quản lý thiết bị
					<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="quanlythietbi.php" class="list-group-item">Danh sách thiết bị</a>
						<a href="quanlythietbitrongloaiphong.php" class="list-group-item">Thiết bị trong Loại phòng</a>
						<a href="quanly_kiemtrathietbi.php" class="list-group-item">Kiêm tra thiết bị</a>
					</div>
					<button class="dropdown-btn">Quản lý thống kê
					<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="thongke_toanha.php" class="list-group-item">Tòa nhà</a>
						<a href="thongke_phong.php" class="list-group-item">Phòng</a>
						<a href="thongke_khoa.php" class="list-group-item">Khoa</a>
						<a href="thongke_lop.php" class="list-group-item">Lớp</a>
						<a href="thongke_tinh.php" class="list-group-item">Theo tỉnh</a>
						<a href="quanlythietbi_thongke.php" class="list-group-item">Thiết bị</a>
					</div>
					<?php } ?>
					<?php
					$qr_ktra_chucvu1 = mysqli_fetch_array(mysqli_query($con, "SELECT DISTINCT chucvu.idchucvu, chucvu.tenchucvu FROM chucvu, cochucvu WHERE cochucvu.id_canbo='$_SESSION[id_canbo]' AND chucvu.idchucvu=cochucvu.idchucvu and chucvu.idchucvu=2 and cochucvu.xoa=0 ORDER BY chucvu.idchucvu   LIMIT 1"));
					if ($qr_ktra_chucvu['idchucvu']==0 || $qr_ktra_chucvu1['idchucvu']==2){ ?>
					<button class="dropdown-btn">Quản lý Biên lai
					<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="quanly_bien_lai.php" class="list-group-item">Biên Lai</a>
						<a href="quanly_thongke_bien_lai.php" class="list-group-item">Thống kê</a>
					</div>
					<?php } ?>
					<?php
					if ($qr_ktra_chucvu['idchucvu']==0){ ?>
					<button class="dropdown-btn">Quản lý sửa
					<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="quanly_log_sinhvien.php" class="list-group-item">Sửa sinh viên</a>
						<a href="quanlyloglop.php" class="list-group-item">Sửa lớp</a>
						<a href="quanlylog_edit_khoa.php" class="list-group-item">Sửa khoa</a>
						<a href="quanly_log_toanha.php" class="list-group-item">Sửa tòa nhà</a>
						<a href="quanly_log_phong_1.php" class="list-group-item">Sửa phòng</a>
						<a href="quanly_log_loai_phong.php" class="list-group-item">Sửa loại phòng</a>
						<a href="quanly_log_chuyen_phong.php" class="list-group-item">Sửa chuyển phòng</a>
						<a href="quanly_log_can_bo.php" class="list-group-item">Sửa cán bộ</a>
						<a href="quanly_log_chuc_vu.php" class="list-group-item">Sửa Chúc vụ</a>
						<a href="quanlylog_edit_thietbi1.php" class="list-group-item">Sửa thiết bị</a>
						<a href="quanlylog_edit_cothietbi.php" class="list-group-item">Sửa thiết bị loại phòng</a>
						<a href="quanlylog_edit_tinhtranhtb.php" class="list-group-item">Sửa kiểm tra tình trạng</a>
					</div>
					<button class="dropdown-btn">Quản lý xóa
					<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="quanlylogDeleteThietbi.php" class="list-group-item">Xóa thiết bị</a>
						<a href="quanlylogDeletelctb.php" class="list-group-item">Xóa có thiết bị</a>
						<a href="quanlylogDeletelop.php" class="list-group-item">Xóa lớp</a>
						<a href="quanlylogDeletekhoa.php" class="list-group-item">Xóa khoa</a>
						<a href="quanly_delete_sinhvien.php" class="list-group-item">Xóa sinh viên</a>
						<a href="quanly_delete_toa_nha.php" class="list-group-item">Xóa tòa nhà</a>
						<a href="quanly_delete_phong.php" class="list-group-item">Xóa phòng</a>
						<a href="quanly_delete_loai_phong.php" class="list-group-item">Xóa loại phòng</a>
						<a href="quanly_delete_can_bo.php" class="list-group-item">Xóa cán bộ</a>
						<a href="quanly_delete_chucvu.php" class="list-group-item">Xóa chúc vụ</a>
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