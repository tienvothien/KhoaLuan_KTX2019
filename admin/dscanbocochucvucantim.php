<?php
	include './../dulieu/kiemtradangnhap.php';
	if (!isset($_GET['idchucvu'])) {
		header("location:./login");
	}else{
		$chucvutenn = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM chucvu WHERE chucvu.idchucvu='$_GET[idchucvu]'"));
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Hệ thông KTX ĐH Kiên Giang </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/jpg" href="./../images/vnkgu.png"/>
		<script type="text/javascript" src="../vendor/bootstrap.js"></script>
		<link rel="stylesheet" href="../vendor/bootstrap.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- #region datatables files -->
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
		<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/ad_css.css">
		<script type="text/javascript" src="../js/js_quanlycanbocochucvune.js"></script>
		<!-- #endregion -->
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
			<br>
			<div class="container-fluid">
				<div class="row">
					<?php include 'menutrai1.php';?>
					<div class="col-xs-12 col-sm-8 col-md-10 col-lg-10 benphai">
						<div class="container-fluid " style="padding: 0px;">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 chutieude">
									<h2>Quản Lý Cán bộ có Chức vụ: <?php echo $chucvutenn['tenchucvu']; ?></h2>
								</div>
							</div>
						<hr class="ngay_ad"></div>
						<div class="container-fluid  ">
							<div class="row"><!-- nho doi ten class -->
							<div class="dulieu_add_thietbi"  id="dulieu_add_thietbi" style="width: 100%; font-size: 14px;"><?php include './../dulieu/dulieudscanbocochucvunay.php'; ?></div>
							</div>
							</div><!-- end thaydoi1 -->
							</div><!-- end noidungthaydoi -->
							</div> <!-- end col-9 -->
							</div> <!-- end row noi dung -->
						</div>
						<?php include 'food.php';?>
						</div> <!-- end trang admin -->
					</body>
				</html>
				<script>
				$(document).ready( function () {
				$('#myTable').DataTable();
				} );
				</script>
				<!-- thêm khoa mới -->
				