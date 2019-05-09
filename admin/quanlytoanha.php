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
		<script type="text/javascript" src="../js/js_quanly_toa_nha.js"></script>
		
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
			<br>
			<div class="container-fluid">
				<div class="row">
					<?php include 'menutrai1.php';?>
					<div class="col-xs-12 col-sm-8 col-md-10 col-lg-10 benphai">
						<div class="container-fluid" style="padding: 0px;">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 chutieude">
									<h2>Quản lý Tòa Nhà</h2>
								</div>
							</div>
						<hr class="ngay_ad"></div>
						<div class="container-fluid">
							<div class="row"><!-- nho doi ten class -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div id="dulieu_toa_nha_"><?php include './../dulieu/dulieu_toa_nha.php';?></div>
							</div>
							<div class="col-xs-11 col-sm-12 col-md-2 col-lg-2">
								<div class="nuthemmoi"><input type="button" class="btn btn-primary btn-block" name="them_toa_nha_" value="Thêm mới" data-toggle="modal" data-target="#them_toa_nha_1"></div>
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
				<!-- thêm Tòa nhà mới -->
				<div class="modal" id="them_toa_nha_1">
					<div class="modal-dialog them_toa_nha_2 width_350px">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								
								<h4 class="modal-title">Thêm Tòa Nhà</h4>
							</div>
							<!-- Modal body -->
							<div class="modal-body _1themtoanha">
								<form action="" id="form_them_toa_nha_moi" name="form_them_toa_nha_moi" 	method="POST" role="form" class="_1themphong1 " enctype="multipart/form-data" data-confirm="Bạn có chắn muốn thêm thông tin này?">
									
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
										<label>Mã Tòa Nhà</label>
										<input type="text" name="ma_toa_nha_themmoi123" id="ma_toa_nha_themmoi123" class="form-control chuinhoa"  value=""  required="" placeholder="Nhập mã Tòa Nhà"/>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
										<label>Tên Tòa Nhà</label>
										<input type="text" name="ten_toa_nha_themmoi123" id="ten_toa_nha_themmoi123" class="form-control chuinthuong"  value=""  required="" placeholder="Nhập tên Tòa Nhà"/>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
										<label>Loại Tòa Nhà</label>
										<select name="loai_toa_nha_themmoi123" id="loai_toa_nha_themmoi123" class="form-control" required="required">
											<option value="">Chọn loại tòa nhà</option>
											<option value="Nam">Nam</option>
											<option value="Nữ">Nữ</option>
										</select>
									</div>
									
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  text-center" style="padding-top: 10px">
										<button  type="submit" class="btn btn-danger" name="ktra_them_toa_nha_moi">Thêm mới</button>
									</div>
								</form>
								<!-- Modal footer -->
								<div class="modal-footer " style="border: none">
									
								</div>
								
							</div>
						</div>
					</div>
					</div><!-- end model -->
					<!-- xem thông tin _toa_nha_ -->
					<div id="dataModal" class="modal fade">
						<div class="modal-dialog width_350px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Thông tin Tòa Nhà</h4>
								</div>
								<div class="modal-body" id="thongtin_chitiettoa_nha">
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					<!-- Cập nhật lại thông tin phòng -->
					<div id="modal_sua_toa_nha_" class="modal fade">
						<div class="modal-dialog width_350px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Cập nhật thông tin Tòa Nhà</h4>
								</div>
								<div class="modal-body">
									<form action="" id="from_suathongtin_toa_nha_" name="from_suathongtin_toa_nha_" 	method="POST" role="form" class="_1themphong1 " enctype="multipart/form-data" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
											<label>Mã Tòa Nhà</label>
											<input type="text" name="ma_toa_nha_update_124" id="ma_toa_nha_update_124" class="form-control chuinhoa"  value=""  required="" placeholder="Nhập mã Tòa Nhà"/>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
											<label>Tên Tòa Nhà</label>
											<input type="text" name="ten_toa_nha_update_124" id="ten_toa_nha_update_124" class="form-control chuinthuong"  value=""  required="" placeholder="Nhập tên Tòa Nhà"/>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
											<label>Loại Tòa Nhà</label>
											<select name="loai_toa_nha_update_124" id="loai_toa_nha_update_124" class="form-control" required="required">
												<option value="" id="value_loaitnhasua"></option>
												<option value="Nam">Nam</option>
												<option value="Nữ">Nữ</option>
											</select>
										</div>
										<input type="hidden" name="id_toa_nha_update_124" id="id_toa_nha_update_124" />
									</div>
									<br>
									<div class="modal-footer">
										<input type="submit" name="insert" id="insert" value="Cập nhật" class="btn btn-danger capnhattb" />
										<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- Xoa Tòa Nhà -->
					<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
						<div id="modal_xoa_toa_nha_" class="modal fade">
							<div class="modal-dialog width_350px">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title canhgiua">Xóa Tòa Nhà</h4>
									</div>
									<div class="modal-body" id="thongtinsv_xoa12">
									</div>
									<form method="post" id="From_xoa_toa_nha_" data-confirm="Bạn có chắn muốn xóa thông tin này?">
										<input type="hidden" name="id_toa_nha_xoa_12" id="id_toa_nha_xoa_12" />
										<div class="modal-footer">
											<input type="submit" name="insert_xoa" id="insert_xoa" value="Xóa" class="btn btn-danger canhgiua" />
											<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>