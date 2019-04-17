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
		<script type="text/javascript" src="../js/js_quanlysinhvien.js"></script>
		
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
									<h2>Quản lý Sinh viên</h2>
								</div>
							</div>
						<hr class="ngay_ad"></div>
						<div class="container-fluid">
							<div class="row"><!-- nho doi ten class -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div id="dulieusinhvien"><?php include './../dulieu/dulieusinhvien.php';?></div>
							</div>
							<div class="col-xs-11 col-sm-12 col-md-2 col-lg-2">
								<div class="nuthemmoi"><input type="button" class="btn btn-primary btn-block" name="themsinhvien" value="Thêm mới" data-toggle="modal" data-target="#themsinhvien1"></div>
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
				<!-- thêm sinhvien mới -->
				<div class="modal" id="themsinhvien1">
					<div class="modal-dialog themsinhvien2 sinhvien_themmoi ">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<div class="row">
									<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
										<h4 class="modal-title">Thêm Sinh viên</h4>
									</div>
									<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
										<button type="button" class="fa fa-times-circle-o btn btn-danger" data-dismiss="modal"></button>
									</div>
								</div>
							</div>
							<!-- Modal body -->
							<div class="modal-body _1themtoanha">
								<form action="" id="form_themsinhvienmoi" name="form_themsinhvienmoi" 	method="POST" role="form" class="_1themphong1 " enctype="multipart/form-data">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Ảnh</label>
										<input id="file_anh_sv" type="file" accept="image/*" name="image12" required="" />
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua text-center">
										<div id="message"></div>
										<div id="image_preview_themssv">
											<img id="previewing_themsvload" class="img-responsive"  src="" />
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
										<label>Mã Sinh viên</label>
										<?php $mscatim = mysqli_query($con, "SELECT sinh_vien.mssv FROM sinh_vien ORDER BY mssv DESC LIMIT 1");
											$macatiem1 =1000000000;
											if (mysqli_num_rows($mscatim)) {
												$ms1 = mysqli_fetch_array($mscatim);
												$macatiem1=$ms1["mssv"] +1;
											}
										?>
										<input style="width:50%"  name="ma_sinhvien_themmoi123" id="ma_sinhvien_themmoi123" class="form-control "  value="<?php echo $macatiem1 ?>"  readonly />
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Họ Sinh viên</label>
										<input  name="ho_sinhvienthemmoi_12" id="ho_sinhvienthemmoi_12" class="form-control chuinthuong" rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Tên Sinh viên</label>
										<input  name="ten_sinhvienthemmoi_12" id="ten_sinhvienthemmoi_12" class="form-control chuinthuong" rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Ngày sinh</label>
										<input  type="date" name="ngaysinh_sinhvienthemmoi_12" id="ngaysinh_sinhvienthemmoi_12" class="form-control " rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Giới tính</label>
										<select  name="gioitinh_sinhvienthemmoi_12" id="gioitinh_sinhvienthemmoi_12" class="form-control chuinthuong" required="required">
											<option value="" >Chọn giới tính</option>
											<option value="Nam">Nam</option>
											<option value="Nữ">Nữ</option>
										</select>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua">
										
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 hoten_cb_sua">
											<label for="">HKTT: Tỉnh</label>
											<select name="" id="input" class="form-control" required="required">
												<option value="">Chọn tỉnh</option>
												
												<?php
													$tinh = mysqli_query($con, 'SELECT * FROM tinh');
													while ($row_tinh= mysqli_fetch_array($tinh)) {
														echo "<option value='row_tinh[matinh]'>$row_tinh[tentinh]</option>";
													}
												?>
											</select>
										</div>
										<div class="col-xs-3 col-sm-3col-md-3 col-lg-3 hoten_cb_sua">
											<label>Huyện</label>
											<select name="" id="input" class="form-control" required="required">
												<option value="">Chọn huyện</option>
											</select>
										</div>
										<div class="col-xs-3 col-sm-3col-md-3 col-lg-3 hoten_cb_sua">
											<label>xã</label>
											<select name="" id="input" class="form-control" required="required">
												<option value="">Chọn xã</option>
											</select>
										</div>
										<div class="col-xs-3 col-sm-3col-md-3 col-lg-3 hoten_cb_sua">
											<label>Số nhà</label>
											<input type="text" name="ten_sinhvienthemmoi_12" id="ten_sinhvienthemmoi_12" class="form-control chuinthuong" rows="1" required="">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Quê quán</label>
										<select name="" id="input" class="form-control" required="required">
											<option value="">Chọn quê quán</option>
											
											<?php
												$tinh = mysqli_query($con, 'SELECT * FROM tinh');
												while ($row_tinh= mysqli_fetch_array($tinh)) {
													echo "<option value='row_tinh[matinh]'>$row_tinh[tentinh]</option>";
												}
											?>
										</select>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Số CMND</label>
										<input  type="number" name="email_sinhvienthemmoi_12" id="email_sinhvienthemmoi_12" class="form-control" rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Ngày cấp CMND</label>
										<input  type="date" name="email_sinhvienthemmoi_12" id="email_sinhvienthemmoi_12" class="form-control" rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Nơi cấp</label>
										<select name="" id="input" class="form-control" required="required">
											<option value="">Chọn quê quán</option>
											<?php
												$tinh = mysqli_query($con, 'SELECT * FROM tinh');
												while ($row_tinh= mysqli_fetch_array($tinh)) {
													echo "<option value='row_tinh[matinh]'>$row_tinh[tentinh]</option>";
												}
											?>
										</select>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Điện thoại</label>
										<input  type="number" name="email_sinhvienthemmoi_12" id="email_sinhvienthemmoi_12" class="form-control" rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Email</label>
										<input  type="email" name="email_sinhvienthemmoi_12" id="email_sinhvienthemmoi_12" class="form-control" rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 hoten_cb_sua">
										<label>Khoa</label>
										<select name="" id="input" class="form-control" required="required">
											<option value="">Chọn Khoa</option>
											<?php
												$tinh = mysqli_query($con, 'SELECT * FROM tinh');
												while ($row_tinh= mysqli_fetch_array($tinh)) {
													echo "<option value='row_tinh[matinh]'>$row_tinh[tentinh]</option>";
												}
											?>
										</select>
									</div>
									<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 hoten_cb_sua">
										<label>Lớp</label>
										<input  type="text" name="email_sinhvienthemmoi_12" id="email_sinhvienthemmoi_12" class="form-control" rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 hoten_cb_sua">
										<label>Khóa</label>
										<input  type="number" name="email_sinhvienthemmoi_12" id="email_sinhvienthemmoi_12" class="form-control" rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Họ tên Cha</label>
										<input  type="text" name="email_sinhvienthemmoi_12" id="email_sinhvienthemmoi_12" class="form-control" rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>SĐT Cha</label>
										<input  type="text" name="email_sinhvienthemmoi_12" id="email_sinhvienthemmoi_12" class="form-control" rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Họ tên Mẹ</label>
										<input  type="text" name="email_sinhvienthemmoi_12" id="email_sinhvienthemmoi_12" class="form-control" rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>SĐT Mẹ</label>
										<input  type="text" name="email_sinhvienthemmoi_12" id="email_sinhvienthemmoi_12" class="form-control" rows="1" required="">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua text-center">
									<button  type="submit" class="btn btn-danger">Thêm mới</button>
								</div>
							</form>
							<!-- Modal footer -->
							<div class="modal-footer " style="border: none">
								
							</div>
							
						</div>
					</div>
				</div>
				</div><!-- end model -->
				<!-- xem thông tin sinhvien -->
				<div id="dataModal" class="modal fade">
					<div class="modal-dialog ">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Thông tin Sinh viên</h4>
							</div>
							<div class="modal-body" id="thongtin_chitietsinh_vien">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Cập nhật lại thông tin phòng -->
				<div id="modal_sua_sinhvien" class="modal fade">
					<div class="modal-dialog width_350px">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Cập nhật thông tin Sinh viên</h4>
							</div>
							<div class="modal-body">
								<form action="" id="from_suathongtin_sinhvien" name="from_suathongtin_sinhvien" 	method="POST" role="form" class="_1themphong1 " enctype="multipart/form-data" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
									<label>Ảnh</label>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
										<div id="image_preview_sua" style="padding-left: 30%"><img id="previewing_sua" class="img-responsive" style="width:100px; height: 150px" rc="" /></div>
									</div>
									<input id="file_anh_sua" type="file" accept="image/*" name="image12_sua123" />
									<label>Mã Sinh viên</label>
									
									<input  type="text" name="ma_sinhvien_sua123" id="ma_sinhvien_sua123" class="form-control "  value=""   />
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Họ Sinh viên</label>
										<input  name="ho_sinhviensua_12" id="ho_sinhviensua_12" class="form-control chuinthuong" rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Tên Sinh viên</label>
										<input  name="ten_sinhviensua_12" id="ten_sinhviensua_12" class="form-control chuinthuong" rows="1" required="">
									</div>
									<label>Ngày sinh</label>
									<input  type="date" name="ngaysinh_sinhviensua_12" id="ngaysinh_sinhviensua_12" class="form-control " rows="1" required="">
									<label>Giới tính</label>
									<select  name="gioitinh_sinhviensua_12" id="gioitinh_sinhviensua_12" class="form-control chuinthuong" required="required">
										<option value="" id="dlgioitinhsua"></option>
										<option value="Nam">Nam</option>
										<option value="Nữ">Nữ</option>
									</select>
									<label>Điện thoại</label>
									<input  type="number" name="sdt_sinhviensua_12" id="sdt_sinhviensua_12" class="form-control"  required="">
									<label>Email</label>
									<input  type="email" name="email_sinhviensua_12" id="email_sinhviensua_12" class="form-control" rows="1" required="">
									<input type="hidden" name="id_sinhvien_sua_12" id="id_sinhvien_sua_12" />
								</div>
								<div class="modal-footer">
									<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-danger capnhattb" />
								<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button></form>
							</div>
						</div>
					</div>
				</div>
				<!-- Xoa Sinh viên -->
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<div id="modal_xoa_sinhvien" class="modal fade">
						<div class="modal-dialog ">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title canhgiua">Xóa Sinh viên</h4>
								</div>
								<div class="modal-body" id="thongtinsv_xoa12">
								</div>
								<form method="post" id="From_xoa_sinhvien" data-confirm="Bạn có chắn muốn xóa thông tin này?">
									<input type="hidden" name="id_sinhvien_xoa_12" id="id_sinhvien_xoa_12" />
									<div class="modal-footer">
										<input type="submit" name="insert_xoa" id="insert_xoa" value="Xóa" class="btn btn-danger canhgiua" />
										<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>