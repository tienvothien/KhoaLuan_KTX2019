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
		<script type="text/javascript" src="../js/js_md5.js"></script>
		<script type="text/javascript" src="../js/js_doimatkhau_canbo.js"></script>
		
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
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Đổi mật khẩu</h4>
							</div>
							<!-- Modal body -->
							<div class="modal-body _1themtoanha">
								<form action="" method="POST" role="form" id="doi_matkhau_tk_can_b" enctype="multipart/form-data" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
									<div class="form-group">
										<label for="">Mật khẩu củ</label>
										<input type="password" class="form-control" id="mat_khau_cu_can_bo12" name="mat_khau_cu_can_bo12" placeholder="Nhập mật khẩu củ" required="">
									</div>
									<div class="form-group">
										<label for="">Mật khẩu mới</label>
										<input type="password" class="form-control" id="mat_khau_moi_can_bo12" name="mat_khau_moi_can_bo12" placeholder="Nhập mật khẩu mới" required="">
									</div>
									<div class="form-group">
										<label for="">Nhập lại mật khẩu</label>
										<input type="password" class="form-control" id="nhapkai_mat_khau_moi_can_bo12" name="mat_khau_moi_can_bo12" placeholder="Nhập lại mật khẩu mới" required="">
									</div>
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