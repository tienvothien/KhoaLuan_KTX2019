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
		<script type="text/javascript" src="../js/js_quanlylop.js"></script>
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
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 chutieude">
									<h2>Quản lý thống kê sinh viên ở theo tỉnh</h2>
								</div>
							</div>
						<hr class="ngay_ad"></div>
						<div class="container-fluid">
							<div class="row"><!-- nho doi ten class -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div id="dulieulop"><?php include './../dulieu/dulieu_thongke_huyen.php';?></div>
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
				<!-- thêm lop mới -->
				<div class="modal" id="themlop1">
					<div class="modal-dialog themlop2 lop_themmoi">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Thêm Lớp</h4>
							</div>
							<!-- Modal body -->
							<div class="modal-body _1themtoanha">
								<form action="" id="form_themlopmoi" name="form_themlopmoi" 	method="POST" role="form" class="_1themphong1 ">
									<div class="form-group">
										<label for="">Mã Lớp</label>
										<input type="text" name="ma_lop_them" id="ma_lop_them" class="form-control chuinhoa" value="" required="" placeholder="Nhập mã lop" >
									</div>
									<div class="form-group">
										<label for="">Tên Lớp</label>
										<input type="text" name="ten_lop_them" id="ten_lop_them" class="form-control chuinthuong" value="" required=""  placeholder="Nhập tên lop" >
									</div>
									<div class="form-group">
										<label for="">Khoa</label>
										<select  id="id_khoa_them_lopt12"  name="id_khoa_them_lopt12" class="form-control chuinthuong" required="required">
											<option value="">Chọn Khoa</option>
											<?php
												
												$ssql_ds_khoa=(mysqli_query($con, "SELECT * FROM khoa WHERE khoa.xoa =0 ORDER BY khoa.ten_khoa"));
												if (mysqli_num_rows($ssql_ds_khoa)) {
													while ($row_dskhoa= mysqli_fetch_array($ssql_ds_khoa)) {
														echo "<option value='".$row_dskhoa['id_khoa']."'>$row_dskhoa[ten_khoa]</option>";
													}
												}else{
													echo "<option value=''>Chưa có dữ liệu khoa</option>";
												}
											?>
										</select>
									</div>
									<div class="form-group">
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 canh15px">
											<label for="">Khóa</label>
											<select id="stt_khoa_lopthem" name="stt_khoa_lopthem" class="form-control" required="required">
												<option value="">Chọn khóa</option>
												<?php for ($i=1; $i <=70 ; $i++) {
													echo "<option value='$i'>$i</option>";
												} ?>
											</select>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 canh15px">
											<label for="">Năm bắt đầu</label>
											<select name="nam_BD_themlopm" id="nam_BD_themlopm" class="form-control" required="required">
												<option value="">Chọn năm</option>
												<?php for ($i=2015; $i <=2070 ; $i++) {
													echo "<option value='$i'>$i</option>";
												} ?>
											</select>
										</div>
									</div>
									<button type="submit" class="btn btn-danger">Thêm Lớp mới</button>
								</form>
							</div>
						</div>
					</div>
					</div><!-- end model -->
					<!-- xem thông tin lop -->
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div id="dataModal" class="modal fade">
							<div class="modal-dialog width_350px">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Thông tin Lớp</h4>
									</div>
									<div class="modal-body" id="thongtin_chitietlop">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Cập nhật lại thông tin lop -->
					<div id="modal_sua_lop" class="modal fade">
						<div class="modal-dialog lop_themmoi">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Cập nhật thông tin Lớp</h4>
								</div>
								<div class="modal-body">
									<form method="post" id="from_suathongtin_lop" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
										<label>Mã Lớp</label>
										<input type="text" name="ma_lop_sua123" id="ma_lop_sua123" class="form-control chuinhoa"  required="" />
										<br />
										<label>Tên Lớp</label>
										<textarea  name="ten_lopsua_12" id="ten_lopsua_12" class="form-control chuinthuong" rows="1" required=""></textarea>
										<br />
										<label>Khoa</label>
										<select  id="id_khoa_sua_lopt"  name="id_khoa_sua_lopt" class="form-control" required="required">
											<option value="" id="khoahienra"></option>
											<?php
												
												$ssql_ds_khoa=(mysqli_query($con, "SELECT * FROM khoa WHERE khoa.xoa =0 ORDER BY khoa.ten_khoa"));
												if (mysqli_num_rows($ssql_ds_khoa)) {
													while ($row_dskhoa= mysqli_fetch_array($ssql_ds_khoa)) {
														echo "<option value='$row_dskhoa[id_khoa]'>$row_dskhoa[ten_khoa]</option>";
													}
												}else{
													echo "<option value=''>Chưa có dữ liệu khoa</option>";
												}
											?>
										</select>
										<br />
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 canh15px">
											<label for="">Khóa</label>
											<select id="stt_khoa_lopsua" name="stt_khoa_lopsua" class="form-control" required="required">
												<option value="" id="dl_khoa_sua_lop"></option>
												<?php for ($i=1; $i <=70 ; $i++) {
													echo "<option value='$i'>$i</option>";
												} ?>
											</select>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 canh15px">
											<label for="">Năm bắt đầu</label>
											<select name="nam_BD_sualopm" id="nam_BD_sualopm" class="form-control" required="required">
												<option value="" id="dl_nambdat_sua_lop"></option>
												<?php for ($i=2015; $i <=2070 ; $i++) {
													echo "<option value='$i'>$i</option>";
												} ?>
											</select>
										</div>
										<input type="hidden" name="id_lop_sua_12" id="id_lop_sua_12" />
										<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-danger capnhattb" />
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
								</div>
							</div>
						</div>
					</div>
					<!-- Xoa thiêt bị -->
					<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
						<div id="modal_xoa_lop" class="modal fade">
							<div class="modal-dialog width_350px">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
										<h4 class="modal-title canhgiua">Xóa Lớp</h4>
									</div>
									<div class="modal-body">
										<form method="post" id="From_xoa_lop" data-confirm="Bạn có chắn muốn xóa thông tin này?">
											<label>Mã Lớp</label>
											<input type="text" disabled="" name="ma_lop_xoa123" id="ma_lop_xoa123" class="form-control chuinhoa"  required="" />
											<br />
											<label>Tên Lớp</label>
											<input type="text" name="ten_lopxoa_12" disabled="" id="ten_lopxoa_12" class="form-control chuinthuong" required=""></input>
											<br />
											<label>Khoa</label>
											<input type="text" name="khoa_lopxoa_12" disabled="" id="khoa_lopxoa_12" class="form-control chuinthuong" required=""></input>
											<br />
											<input type="hidden" name="id_lop_xoa_12" id="id_lop_xoa_12" />
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