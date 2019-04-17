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
		<script type="text/javascript" src="../js/js_quanlycanbo.js"></script>
		
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
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 chutieude">
									<h2>Quản lý tài khoản cá nhân : <?php echo $ho_can_bo . "&nbsp" . $ten_can_bo; ?></h2>
								</div>
							</div>
						<hr class="ngay_ad"></div>
						<div class="container-fluid">
							<div class="row"><!-- nho doi ten class -->
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-push-3 col-lg-push-3 ">
								<div id="dulieu_taikhoancanhan"><?php include './../dulieu/dulieu_taikhoancanhan.php';?></div>
							</div>
							<div class="col-xs-11 col-sm-12 col-md-4 col-lg-4">
								<div class="nuthemmoi"><input type="button" class="btn btn-primary btn-block" name="themcan_bo" value="Đổi mật khẩu" data-toggle="modal" data-target="#themcan_bo1"></div>
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
				
				<!-- thêm can_bo mới -->
				<div class="modal" id="themcan_bo1">
					<div class="modal-dialog themcan_bo2 can_bo_themmoi width_350px">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<div class="row">
									<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
										<h4 class="modal-title">Đổi mật khẩu</h4>
									</div>
									<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
										<button type="button" class="fa fa-times-circle-o btn btn-danger" data-dismiss="modal"></button>
									</div>
								</div>
							</div>
							<!-- Modal body -->
							<div class="modal-body _1themtoanha">
								<form action="" id="form_themcan_bomoi" name="form_themcan_bomoi" 	method="POST" role="form" class="_1themphong1 " enctype="multipart/form-data">
									<label for="">Mật khẩu cũ</label>
									<input type="password" name="" id="input" class="form-control" required="required" title="">
									<label for="">Mật khẩu mới</label>
									<input type="password" name="" id="input" class="form-control" required="required" title="">
									<label for="">Nhập lại mật khẩu</label>
									<input type="password" name="" id="input" class="form-control" required="required" title="">
								</div>
								<!-- Modal footer -->
									<div class="modal-footer">
										<button type="submit" class="btn btn-danger">Đổi mật khẩu</button>
									</div>
							</form>
						</div>
					</div>
				</div>
				</div><!-- end model -->
				