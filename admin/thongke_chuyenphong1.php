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
								<h2>Quản lý quán trình ở của sinh viên</h2>
							</div>
						</div>
						<hr class="ngay_ad">
						<!-- <form action="" id="timkiem_da_o_phong_ssdv" method="POST" role="form">
							<div class="row text-center">
								<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8  col-sm-push-2 col-md-push-2 col-lg-push-2">
									<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-justify">
										<label for="" class="form-control boviennha" >Tìm sinh viên ở từ ngày</label>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<input type="date" class="form-control" id="timkiem_daophongngay_batdau" placeholder="Input field" style="    width: 45%; float:left">
										<label class="form-control boviennha" style=" width:3%; float: left">-</label>
										<input class="form-control" type="date" class=form-control id="timkiem_daophongngay_kethuc" placeholder="Input field" style="    width: 45%">
									</div>
									<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 text-left">
										<button type="submit" class="btn btn-primary">Tìm</button>
									</div>
								</div>
								
							</div>
						</form> -->
					</div>
					<br>
					<div class="row"><!-- nho doi ten class -->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div id="dulieu_o_phong"><?php include './../dulieu/dulieu_quatrinh_o_phong_sinhvien.php';?></div>
					</div>
					
					</div><!-- end thaydoi1 -->
					</div><!-- end noidungthaydoi -->
					</div> <!-- end col-9 -->
					</div> <!-- end row noi dung -->
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