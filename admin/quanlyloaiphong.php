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
		<script type="text/javascript" src="../js/js_quanly_loai_phong.js"></script>
		
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
									<h2>Quản lý Loại phòng</h2>
								</div>
							</div>
						<hr class="ngay_ad"></div>
						<div class="container-fluid">
							<div class="row"><!-- nho doi ten class -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div id="dulieu_loai_phong"><?php include './../dulieu/dulieu_loai_phong.php';?></div>
							</div>
							<div class="col-xs-11 col-sm-12 col-md-2 col-lg-2">
								<div class="nuthemmoi"><input type="button" class="btn btn-primary btn-block" name="them_loai_phong_" value="Thêm mới" data-toggle="modal" data-target="#them_loai_phong_1"></div>
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
				<!-- thêm Loại phòng mới -->
				<div class="modal" id="them_loai_phong_1">
					<div class="modal-dialog them_loai_phong_2 width_350px">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<div class="row">
									<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
										<h4 class="modal-title">Thêm Loại phòng</h4>
									</div>
									<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
										<button type="button" class="fa fa-times-circle-o btn btn-danger" data-dismiss="modal"></button>
									</div>
								</div>
							</div>

							<!-- Modal body -->
							<div class="modal-body _1themtoanha">
								<form action="" id="form_them_loai_phong_moi" name="form_them_loai_phong_moi" 	method="POST" role="form" class="_1themphong1 " enctype="multipart/form-data" data-confirm="Bạn có chắn muốn thêm thông tin này?">
									
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
										<label>Mã Loại phòng</label>
										<input type="text" name="ma_loai_phong_themmoi123" id="ma_loai_phong_themmoi123" class="form-control chuinhoa"  value=""  required="" placeholder="Nhập mã Loại phòng"/>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
										<label>Tên Loại phòng</label>
										<input type="text" name="ten_loai_phong_themmoi123" id="ten_loai_phong_themmoi123" class="form-control chuinthuong"  value=""  required="" placeholder="Nhập tên Loại phòng"/>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
										<label>Số người</label>
										<select name="slnguoio_loai_phong_themmoi123" id="slnguoio_loai_phong_themmoi123" class="form-control" required="required">
											<option value="">Chọn số người</option>
											<?php for ($i=1; $i <15 ; $i++) { 
												echo "<option value='$i'>$i</option>";
											} ?>
										</select>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
										<label>Giá Loại phòng</label>
										<div class="form-group">
											<input type="number" name="gia_loai_phong_themmoi123" id="gia_loai_phong_themmoi123" class="form-control" value="" min="50000" max="1000000" required="required" placeholder="Nhập giá Loại phòng" title="">
										</div>
									</div>
									
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  text-center">
									<button  type="submit" class="btn btn-danger" name="ktra_them_loai_phong_moi">Thêm mới</button>
								</div>
							</form>
							<!-- Modal footer -->
							<div class="modal-footer " style="border: none">
								
							</div>
							   
						</div>
					</div>
				</div>
				</div><!-- end model -->
				<!-- xem thông tin _loai_phong_ -->
				<div id="dataModal" class="modal fade">
					<div class="modal-dialog width_350px">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Thông tin Loại phòng</h4>
							</div>
							<div class="modal-body" id="thongtin_chitietloai_phong">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Cập nhật lại thông tin phòng -->
				<div id="modal_sua_loai_phong_" class="modal fade">
					<div class="modal-dialog width_350px">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Cập nhật thông tin Loại phòng</h4>
							</div>
							<div class="modal-body">
								<form action="" id="from_suathongtin_loai_phong_" name="from_suathongtin_loai_phong_" 	method="POST" role="form" class="_1themphong1 " enctype="multipart/form-data" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
										<label>Mã Loại phòng</label>
										<input type="text" name="ma_loai_phong_update_124" id="ma_loai_phong_update_124" class="form-control chuinhoa"  value=""  required="" placeholder="Nhập mã Loại phòng"/>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
										<label>Tên Loại phòng</label>
										<input type="text" name="ten_loai_phong_update_124" id="ten_loai_phong_update_124" class="form-control chuinthuong"  value=""  required="" placeholder="Nhập tên Loại phòng"/>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
										<label>Số người</label>
										<select name="slnguoio_loai_phong_update_124" id="slnguoio_loai_phong_update_124" class="form-control" required="required">
											<option value="" id="giatri_slnguoio_loai_phong_update_124"></option>
											<?php for ($i=1; $i <15 ; $i++) { 
												echo "<option value='$i'>$i</option>";
											} ?>
										</select>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
										<label>Giá Loại phòng</label>
										<div class="form-group">
											<input type="number" name="gia_loai_phong_update_124" id="gia_loai_phong_update_124" class="form-control" value="" min="50000" max="1000000" required="required" placeholder="Nhập giá Loại phòng" title="">
										</div>
									</div>
									<input type="hidden" name="id_loai_phong_update_124" id="id_loai_phong_update_124" />
								</div>
									<div class="modal-footer">
										<input type="submit" name="insert" id="insert" value="Cập nhật" class="btn btn-danger capnhattb" />
										<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
								</form>
									</div>
						</div>
					</div>
				</div>
				<!-- Xoa Loại phòng -->
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<div id="modal_xoa_loai_phong_" class="modal fade">
						<div class="modal-dialog width_350px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title canhgiua">Xóa Loại phòng</h4>
								</div>
								<div class="modal-body" id="thongtinsv_xoa12">
								</div>
								<form method="post" id="From_xoa_loai_phong_" data-confirm="Bạn có chắn muốn xóa thông tin này?">
									<input type="hidden" name="id_loai_phong_xoa_12" id="id_loai_phong_xoa_12" />
									<div class="modal-footer">
										<input type="submit" name="insert_xoa" id="insert_xoa" value="Xóa" class="btn btn-danger canhgiua" />
										<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>