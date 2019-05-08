<?php
include './../dulieu/kiemtradangnhap.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Hệ thông KTX ĐH Kiên Giang </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/jpg" href="./../images/vnkgu.png"/>
		<script type="text/javascript" src="../vendor/bootstrap.js"></script>
		<script type="text/javascript" src="../js/js_quanly_o_phong.js"></script>
		<link rel="stylesheet" href="../vendor/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/ad_css.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
		<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	</head>
	<body >
		<div class="container-fluid">
			<a href="index.php" title="">
				<div class="container-fluid">
					<div class="row anhbia  text-center">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<img class="img-responsive" src="../images/anhbia.PNG" alt="">
						</div>
					</div>
				</div>
			</a>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 chutieude">
								<h2>Quản lý ở phòng quá hạn</h2>
							</div>
						</div>
						<hr class="ngay_ad">
						<br>
					</div>
					<div class="row"><!-- nho doi ten class -->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div id="dulieu_o_phong"><?php include './../dulieu/dulieu_o_phong_qua_han.php';?></div>
					</div>

					<div class="col-xs-11 col-sm-12 col-md-2 col-lg-2">
						<div class="nuthemmoi">
							<form action="./../dulieu/xuat_excel_o_quan_han.php" method="POST" role="form">
								<input type="submit" class="btn btn-primary btn-block" name="xuat_excel_o_quan_han1" value="Xuất Excel" >
							</form>
							
						</div>
					</div>
					</div><!-- end thaydoi1 -->
					</div><!-- end noidungthaydoi -->
					</div> <!-- end col-9 -->

					</div> <!-- end row noi dung -->
					<br>
					<?php include 'food.php';?>
					</div> <!-- end trang admin -->
				</body>
			</html>
			<script>
			$(document).ready( function () {
			$('#myTable').DataTable();
			} );
			</script>
			<!-- thêm _o_phong mới -->
			