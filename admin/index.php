<?php
include './../dulieu/kiemtradangnhap.php';
?>
<!DOCTYPE html>
<html lang="en"><head>
	<title> Hệ thông KTX ĐH Kiên Giang </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="./../images/vnkgu.png"/>
	<script type="text/javascript" src="../vendor/bootstrap.js"></script>
	<link rel="stylesheet" href="../vendor/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/ad_css.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
					<div class="container-fluid" style="padding: 0px;">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 chutieude">
								<h2>Hệ Thống quản lý</h2>
							</div>
						</div>
					<hr class="ngay_ad"></div>
					<div class="container-fluid">
						<div class="row"><!-- nho doi ten class -->
						<a href="quanlykhoa.php" title=""><!--  hien thoong trinh chi tiet khoa -->
						<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
							<div class="thumbnail mua_nen_1">
								<div class="captionb align-middler">
									<h3 class="canhgiua"  >Khoa</h3>
									<p  >
										<h3 class="canhgiua ">
										<?php include './conn.php';
										$soluongkhoa = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(khoa.id_khoa) AS slkhoa FROM khoa WHERE khoa.xoa =0"));
										echo $soluongkhoa['slkhoa'];
										?></h3>
									</p>
								</div>
							</div>
						</div>
						</a> <!-- end het hien thong tin khoa -->
						<a href="quanlylop.php" title=""><!--  hien thoong trinh chi tiet khoa -->
						<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
							<div class="thumbnail mua_nen_2">
								<div class="captionb align-middler">
									<h3 class="canhgiua"  >Lớp</h3>
									<p  >
										<h3 class="canhgiua ">
										<?php include './conn.php';
										$soluonglop = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(lop.id_lop) AS sllop FROM lop WHERE lop.xoa =0"));
										echo $soluonglop['sllop'];
										?></h3>
									</p>
								</div>
							</div>
						</div>
						</a> <!-- end het hien thong tin khoa -->
						<a href="quanlythietbi.php" title=""><!--  hien thoong trinh chi tiet thietbi-->
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<div class="thumbnail mua_nen_3">
									<div class="captionb align-middler">
										<h3 class="canhgiua"  >Thiết bị</h3>
										<p  >
											<h3 class="canhgiua ">
											<?php include './conn.php';
											$soluongthietbi = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(thietbi.idtb) AS slthietbi FROM thietbi WHERE thietbi.xoa =0"));
											echo $soluongthietbi['slthietbi'];
											?></h3>
										</p>
									</div>
								</div>
							</div>
						</a> <!-- end het hien thong tin thietbi-->
						<a href="quanlycanbo.php" title=""><!--  hien thoong trinh chi tiet Cán bộ-->
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<div class="thumbnail mua_nen_4">
									<div class="captionb align-middler">
										<h3 class="canhgiua"  >Cán bộ</h3>
										<p  >
											<h3 class="canhgiua ">
											<?php include './conn.php';
											$soluongcanbo = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(can_bo.id_canbo) AS slcanbo FROM can_bo WHERE can_bo.xoa =0"));
											echo $soluongcanbo['slcanbo'];
											?></h3>
										</p>
									</div>
								</div>
							</div>
						</a> <!-- end het hien thong tin Cán bộ-->
					</div>
					</div><!-- end thaydoi1 -->
					</div><!-- end noidungthaydoi -->
					</div> <!-- end col-9 -->
					</div> <!-- end row noi dung -->
					
					<?php include 'food.php'; ?>
				</div>
			</body>
		</html>