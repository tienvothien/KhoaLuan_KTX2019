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
									<h2>Quản lý Cán bộ</h2>
								</div>
							</div>
						<hr class="ngay_ad"></div>
						<div class="container-fluid">
							<div class="row"><!-- nho doi ten class -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div id="dulieucanbo"><?php include './../dulieu/dulieucanbo.php';?></div>
							</div>
							<div class="col-xs-11 col-sm-12 col-md-2 col-lg-2">
								<div class="nuthemmoi"><input type="button" class="btn btn-primary btn-block" name="themcan_bo" value="Thêm mới" data-toggle="modal" data-target="#themcan_bo1"></div>
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
				<!-- thêm can_bo mới -->
				<div class="modal" id="themcan_bo1">
					<div class="modal-dialog themcan_bo2 can_bo_themmoi width_350px">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<div class="row">
									<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
										<h4 class="modal-title">Thêm Cán bộ</h4>
									</div>
									<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
										<button type="button" class="fa fa-times-circle-o btn btn-danger" data-dismiss="modal"></button>
									</div>
								</div>
							</div>
							<!-- Modal body -->
							<div class="modal-body _1themtoanha">
								<form action="" id="form_themcan_bomoi" name="form_themcan_bomoi" 	method="POST" role="form" class="_1themphong1 " enctype="multipart/form-data">
									<label>Ảnh</label>
									
									<br>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
										<div id="message"></div>
										 <div id="image_preview"><img id="previewing" class="img-responsive" src="" /></div>
									</div>
									<input id="file_anh" type="file" accept="image/*" name="image12" required="" />

									<br>
									<label>Mã cán bộ</label>
									<?php $mscatim = mysqli_query($con, "SELECT can_bo.ma_can_bo FROM can_bo ORDER BY ma_can_bo DESC LIMIT 1"); 
										$macatiem1 =1000000000;
										if (mysqli_num_rows($mscatim)) {
											$ms1 = mysqli_fetch_array($mscatim);
											$macatiem1=$ms1["ma_can_bo"] +1;
										}
									?>
									<input  type="text" name="ma_can_bo_themmoi123" id="ma_can_bo_themmoi123" class="form-control "  value="<?php echo $macatiem1 ?>"  readonly />
									<br />
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Họ cán bộ</label>
										<input  name="ho_can_bothemmoi_12" id="ho_can_bothemmoi_12" class="form-control chuinthuong" rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Tên cán bộ</label>
										<input  name="ten_can_bothemmoi_12" id="ten_can_bothemmoi_12" class="form-control chuinthuong" rows="1" required="">
									</div>
									<br />
									<label>Ngày sinh</label>
									<input  type="date" name="ngaysinh_can_bothemmoi_12" id="ngaysinh_can_bothemmoi_12" class="form-control " rows="1" required="">
									<br />
									<label>Giới tính</label>
									<select  name="gioitinh_can_bothemmoi_12" id="gioitinh_can_bothemmoi_12" class="form-control chuinthuong" required="required">
										<option value="" >Chọn giới tính</option>
										<option value="Nam">Nam</option>
										<option value="Nữ">Nữ</option>
									</select>
									<br>
									<label>Điện thoại</label>
									<input  type="number" name="sdt_can_bothemmoi_12" id="sdt_can_bothemmoi_12" class="form-control"  required="">
									<br />
									<label>Email</label>
									<input  type="email" name="email_can_bothemmoi_12" id="email_can_bothemmoi_12" class="form-control" rows="1" required="">
									<br />
								</div>
								<!-- Modal footer -->
									<div class="modal-footer">
										<button type="submit" class="btn btn-danger">Thêm mới</button>
									</div>
							</form>
						</div>
					</div>
				</div>
				</div><!-- end model -->
				<!-- xem thông tin can_bo -->
				<div id="dataModal" class="modal fade">
					<div class="modal-dialog width_350px">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Thông tin Cán bộ</h4>
							</div>
							<div class="modal-body" id="thongtin_chitietcan_bo">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Cập nhật lại thông tin phòng -->
				<div id="modal_sua_can_bo" class="modal fade">
					<div class="modal-dialog width_350px">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Cập nhật thông tin Cán bộ</h4>
							</div>
							<div class="modal-body">
								<form method="post" id="from_suathongtin_can_bo" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
									<label>Mã cán bộ</label>
									<input type="text" name="ma_can_bo_sua123" id="ma_can_bo_sua123" class="form-control "  required="" />
									<br />
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Họ cán bộ</label>
										<input  name="ho_can_bosua_12" id="ho_can_bosua_12" class="form-control chuinthuong" rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Tên cán bộ</label>
										<input  name="ten_can_bosua_12" id="ten_can_bosua_12" class="form-control chuinthuong" rows="1" required="">
									</div>
									<br />
									<label>Ngày sinh</label>
									<input  type="date" name="ngaysinh_can_bosua_12" id="ngaysinh_can_bosua_12" class="form-control " rows="1" required="">
									<br />
									<label>Giới tính</label>
									<select  name="gioitinh_can_bosua_12" id="gioitinh_can_bosua_12" class="form-control chuinthuong" required="required">
										<option value="" id="dlgioitinhsua"></option>
										<option value="Nam">Nam</option>
										<option value="Nữ">Nữ</option>
									</select>
									<br>
									<label>Điện thoại</label>
									<input  type="number" name="sdt_can_bosua_12" id="sdt_can_bosua_12" class="form-control" rows="1" required="">
									<br />
									<label>Email</label>
									<input  type="email" name="email_can_bosua_12" id="email_can_bosua_12" class="form-control" rows="1" required="">
									<br />
									
									<input type="hidden" name="id_can_bo_sua_12" id="id_can_bo_sua_12" />
									<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-danger capnhattb" />
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Xoa Cán bộ -->
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<div id="modal_xoa_can_bo" class="modal fade">
						<div class="modal-dialog width_350px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title canhgiua">Xóa Cán bộ</h4>
								</div>
								<div class="modal-body">
									<form method="post" id="From_xoa_can_bo" data-confirm="Bạn có chắn muốn xóa thông tin này?">
										<label>Mã Cán bộ</label>
										<input type="text" disabled="" name="ma_can_bo_xoa123" id="ma_can_bo_xoa123" class="form-control chuinhoa"  required="" />
										<br />
										<label>Tên Cán bộ</label>
										<textarea  name="ten_can_boxoa_12" disabled="" id="ten_can_boxoa_12" class="form-control chuinthuong" rows="1" required=""></textarea>
										<br />
										<label>Ngày sinh</label>
										<textarea  name="ngaysinh_can_boxoa_12" disabled="" id="ngaysinh_can_boxoa_12" class="form-control chuinthuong" rows="1" required=""></textarea>
										<br />
										<label>Giới tính</label>
										<textarea  name="gioitinh_can_boxoa_12" disabled="" id="gioitinh_can_boxoa_12" class="form-control chuinthuong" rows="1" required=""></textarea>
										<br />
										<input type="hidden" name="id_can_bo_xoa_12" id="id_can_bo_xoa_12" />
										<div class="modal-footer">
											<input type="submit" name="insert_xoa" id="insert_xoa" value="Xóa" class="btn btn-danger canhgiua" />
											<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
										</div>
									</form>
								</div>
								
							</div>
						</div>
					</div>
				</div>