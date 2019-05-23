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
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 chutieude">
									<h2>Quản lý thân nhân sinh viên</h2>
								</div>
							</div>
							<hr class="ngay_ad">
						</div>
						<div class="container-fluid">
							<div class="row"><!-- nho doi ten class -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div id="dulieusinhvien"><?php include './../dulieu/dulieu_nguoithan_sinhvien.php';?></div>
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
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<div class="row">
									<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
										<h4 class="modal-title">Thêm Sinh viên</h4>
									</div>
									
								</div>
							</div>
							<!-- Modal body -->
							<div class="modal-body _1themtoanha">
								<form action="" id="form_themsinhvienmoi" name="form_themsinhvienmoi" 	method="POST" role="form" class="_1themphong1 " enctype="multipart/form-data">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>1./ Ảnh (*)</label>
										<input id="file_anh_sv" type="file" accept="image/*" name="image12" required="" />
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua text-center">
										<div id="message"></div>
										<div id="image_preview_themssv">
											<img id="previewing_themsvload" class="img-responsive"  src="" />
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
										<label>2./ Mã Sinh viên (*)</label>
										
										<input style="width:50%" type="number" name="ma_sinhvien_themmoi123" id="ma_sinhvien_themmoi123" class="form-control " value=""  required="" placeholder="Nhập mã sinh viên"/>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>3./ Họ Sinh viên (*)</label>
										<input  name="ho_sinhvienthemmoi_12" id="ho_sinhvienthemmoi_12" class="form-control chuinthuong" rows="1" required="" placeholder="Nhập họ sinh viên">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>4./ Tên Sinh viên (*)</label>
										<input  name="ten_sinhvienthemmoi_12" id="ten_sinhvienthemmoi_12" class="form-control chuinthuong" rows="1" required="" placeholder="Nhập tên sinh viên">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>5./ Ngày sinh (*)</label>
										<input  type="date" name="ngaysinh_sinhvienthemmoi_12" id="ngaysinh_sinhvienthemmoi_12" class="form-control " rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>6./ Giới tính (*)</label>
										<select  name="gioitinh_sinhvienthemmoi_12" id="gioitinh_sinhvienthemmoi_12" class="form-control chuinthuong" required="required">
											<option value="" >Chọn giới tính</option>
											<option value="Nam">Nam</option>
											<option value="Nữ">Nữ</option>
										</select>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua">
										<label for="">7./ Hộ khẩu thường trú (*)</label>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Tỉnh</label>
										<select name="tinh_them_sinh_vien" id="tinh_them_sinh_vien" class="form-control" required="required">
											<option value="">Chọn tỉnh</option>
											
											<?php
												$tinh = mysqli_query($con, 'SELECT * FROM tinh ORDER BY tinh.tentinh ASC');
												while ($row_tinh= mysqli_fetch_array($tinh)) {
													echo "<option value='$row_tinh[matinh]'>$row_tinh[tentinh]</option>";
												}
											?>
										</select>
									</div>
									<div class="col-xs-12 col-sm-6col-md-6 col-lg-6 hoten_cb_sua">
										<label> Quận/Huyện</label>
										<select name="huyen_them_sinh_vien" id="huyen_them_sinh_vien" class="form-control" required="required">
											<option value="">Chọn huyện</option>
										</select>
									</div>
									<div class="col-xs-12 col-sm-6col-md-6 col-lg-6 hoten_cb_sua">
										<label>Xã/Phường</label>
										<select name="xa_them_sinh_vien" id="xa_them_sinh_vien" class="form-control" required="required">
											<option value="">Chọn Xã</option>
										</select>
									</div>
									<div class="col-xs-12 col-sm-6col-md-6 col-lg-6 hoten_cb_sua">
										<label>Số nhà-Tổ-Ấp </label>
										<input type="text" name="sonha_them_sinh_vien" id="sonha_them_sinh_vien" class="form-control chuinthuong" rows="1" required="" placeholder="Nhập số nhà">
									</div>
									
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>8./ Quê quán (*)</label>
										<select name="quequan_them_sinh_vien" id="quequan_them_sinh_vien" class="form-control" required="required">
											<option value="">Chọn quê quán</option>
											
											<?php
												$tinh = mysqli_query($con, 'SELECT * FROM tinh ORDER BY tinh.tentinh ASC');
												while ($row_tinh= mysqli_fetch_array($tinh)) {
													echo "<option value='$row_tinh[matinh]'>$row_tinh[tentinh]</option>";
												}
											?>
										</select>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>9./ Số CMND (*)</label>
										<input  type="number" name="cmnd_them_sinh_vien" id="cmnd_them_sinh_vien" class="form-control" rows="1" required="" placeholder="Nhập số CMND" >
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>10./ Ngày cấp CMND (*)</label>
										<input  type="date" name="ngay_capcnnd_them_sinh_vien" id="ngay_capcnnd_them_sinh_vien" class="form-control" rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>11./ Nơi cấp (*)</label>
										<select name="noicap_them_sinh_vien" id="noicap_them_sinh_vien" class="form-control" required="required">
											<option value="">Chọn quê quán</option>
											<?php
												$tinh = mysqli_query($con, 'SELECT * FROM tinh ORDER BY tinh.tentinh ASC');
												while ($row_tinh= mysqli_fetch_array($tinh)) {
													echo "<option value='$row_tinh[matinh]'>$row_tinh[tentinh]</option>";
												}
											?>
										</select>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>12./ Điện thoại</label>
										<input  type="number" name="so_dt_them_sinh_vien" id="so_dt_them_sinh_vien" class="form-control" rows="1" placeholder="Nhập nhập số điện thoại">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>13./ Email</label>
										<input  type="email" name="email_them_sinh_vien" id="email_them_sinh_vien" class="form-control" rows="1"  placeholder="Nhập Email">
									</div>
									<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 hoten_cb_sua">
										<label>14./ Khóa(*)</label>
										<input  type="number" name="khoa_them_sinh_vien" id="khoa_them_sinh_vien" class="form-control" rows="1" min="1" required="" step="0" placeholder="khóa">
									</div>
									<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 hoten_cb_sua">
										<label>14./ Khoa (*)</label>
										<select name="id_khoa_them_sinh_vien" id="id_khoa_them_sinh_vien" class="form-control chuinthuong" required="required">
											<option value="">Chọn Khoa</option>
											<?php
												$khoa = mysqli_query($con, 'SELECT * FROM khoa where khoa.xoa =0');
												while ($row_khoa= mysqli_fetch_array($khoa)) {
													echo "<option value='$row_khoa[id_khoa]'>$row_khoa[ten_khoa]</option>";
												}
											?>
										</select>
									</div>
									<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 hoten_cb_sua">
										<label>16./ Lớp (*)</label>
										<select name="lop_them_sinh_vien" id="lop_them_sinh_vien" class="form-control chuinthuong" required="required">
											<option value="">Chọn Lớp</option>
										</select>
									</div>
									
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>17./ Họ tên Cha</label>
										<input  type="text" name="hotencha_them_sinh_vien" id="hotencha_them_sinh_vien" class="form-control chuinthuong" rows="1" placeholder="Nhập họ tên cha">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>18./ SĐT Cha</label>
										<input  type="number" name="sdtcha_them_sinh_vien" id="sdtcha_them_sinh_vien" class="form-control" rows="1" placeholder="Nhập SĐT của cha">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>19./ Họ tên Mẹ</label>
										<input  type="text" name="hotenme_them_sinh_vien" id="hotenme_them_sinh_vien" class="form-control chuinthuong" rows="1" placeholder="Nhập họ tên Mẹ">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>20./ SĐT Mẹ</label>
										<input  type="number" name="sdtme_them_sinh_vien" id="sdtme_them_sinh_vien" class="form-control" rows="1" placeholder="Nhập SĐT Mẹ">
									</div>
								</div>
								
								<!-- Modal footer -->
								<div class="modal-footer " style="border: none">
									<button  type="submit" class="btn btn-danger">Thêm mới</button>
								</div>
							</form>
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
					<div class="modal-dialog ">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Cập nhật thông tin Sinh viên</h4>
							</div>
							<div class="modal-body">
								<form action="" id="from_suathongtin_sinhvien" name="from_suathongtin_sinhvien" 	method="POST" role="form" class="_1themphong1 " enctype="multipart/form-data" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Ảnh</label>
										<input id="file_anh_sv_sua" type="file" accept="image/*" name="image_123" />
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua text-center">
										<div id="message"></div>
										<div id="image_preview_sinhvien_sua123">
											<img id="previewing_sinhvien_sua123_load" class="img-responsive" style="width:100px;" rc="" />
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
										<label>Mã Sinh viên</label>
										
										<input style="width:50%" type="number" name="ma_sinhvien_sua123" id="ma_sinhvien_sua123" class="form-control " value=""  required="" placeholder="Nhập mã sinh viên"/>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Họ Sinh viên</label>
										<input  name="ho_sinhviensua_12" id="ho_sinhviensua_12" class="form-control chuinthuong" rows="1" required="" placeholder="Nhập họ sinh viên">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Tên Sinh viên</label>
										<input  name="ten_sinhviensua_12" id="ten_sinhviensua_12" class="form-control chuinthuong" rows="1" required="" placeholder="Nhập tên sinh viên">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Ngày sinh</label>
										<input  type="date" name="ngaysinh_sinhviensua_12" id="ngaysinh_sinhviensua_12" class="form-control " rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Giới tính</label>
										<select  name="gioitinh_sinhviensua_12" id="gioitinh_sinhviensua_12" class="form-control chuinthuong" required="required">
											<option value="" id="id_gioitinhsua">Chọn giới tính</option>
											<option value="Nam">Nam</option>
											<option value="Nữ">Nữ</option>
										</select>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua">
										<label for="">Hộ khẩu thường trú </label>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Tỉnh</label>
										<select name="tinh_sua_sinh_vien" id="tinh_sua_sinh_vien" class="form-control" required="required">
											<option value="" id="id_tinhsua">Chọn tỉnh</option>
											
											<?php
												$tinh = mysqli_query($con, 'SELECT * FROM tinh ORDER BY tinh.tentinh ASC');
												while ($row_tinh= mysqli_fetch_array($tinh)) {
													echo "<option value='$row_tinh[matinh]'>$row_tinh[tentinh]</option>";
												}
											?>
										</select>
									</div>
									<div class="col-xs-12 col-sm-6col-md-6 col-lg-6 hoten_cb_sua">
										<label> Quận/Huyện/TP</label>
										<select name="huyen_sua_sinh_vien" id="huyen_sua_sinh_vien" class="form-control" required="required">
											<option value="" id="id_huyensua">Chọn huyện</option>
										</select>
									</div>
									<div class="col-xs-12 col-sm-6col-md-6 col-lg-6 hoten_cb_sua">
										<label>Xã/Phường/Thị trấn</label>
										<select name="xa_sua_sinh_vien" id="xa_sua_sinh_vien" class="form-control" required="required">
											<option value="" >Chọn Xã</option>
										</select>
									</div>
									<div class="col-xs-12 col-sm-6col-md-6 col-lg-6 hoten_cb_sua">
										<label>Số nhà-Tổ-Ấp </label>
										<input type="text" name="sonha_sua_sinh_vien" id="sonha_sua_sinh_vien" class="form-control chuinthuong" rows="1" required="" placeholder="Nhập số nhà">
									</div>
									
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Quê quán</label>
										<select name="quequan_sua_sinh_vien" id="quequan_sua_sinh_vien" class="form-control" required="required">
											<option value="">Chọn quê quán</option>
											
											<?php
												$tinh = mysqli_query($con, 'SELECT * FROM tinh ORDER BY tinh.tentinh ASC');
												while ($row_tinh= mysqli_fetch_array($tinh)) {
													echo "<option value='$row_tinh[matinh]'>$row_tinh[tentinh]</option>";
												}
											?>
										</select>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Số CMND</label>
										<input  type="number" name="cmnd_sua_sinh_vien" id="cmnd_sua_sinh_vien" class="form-control" rows="1" required="" placeholder="Nhập số CMND" >
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Ngày cấp CMND</label>
										<input  type="date" name="ngay_capcnnd_sua_sinh_vien" id="ngay_capcnnd_sua_sinh_vien" class="form-control" rows="1" required="">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Nơi cấp</label>
										<select name="noicap_sua_sinh_vien" id="noicap_sua_sinh_vien" class="form-control" required="required">
											<option value="">Chọn quê quán</option>
											<?php
												$tinh = mysqli_query($con, 'SELECT * FROM tinh ORDER BY tinh.tentinh ASC');
												while ($row_tinh= mysqli_fetch_array($tinh)) {
													echo "<option value='$row_tinh[matinh]'>$row_tinh[tentinh]</option>";
												}
											?>
										</select>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Điện thoại</label>
										<input  type="number" name="so_dt_sua_sinh_vien" id="so_dt_sua_sinh_vien" class="form-control" rows="1" placeholder="Nhập nhập số điện thoại">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Email</label>
										<input  type="email" name="email_sua_sinh_vien" id="email_sua_sinh_vien" class="form-control" rows="1" placeholder="Nhập Email">
									</div>
									<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 hoten_cb_sua">
										<label>Khóa</label>
										<input  type="number" name="khoa_sua_sinh_vien" id="khoa_sua_sinh_vien" class="form-control" rows="1" required="" min="1" step="0" placeholder="khóa">
									</div>
									<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 hoten_cb_sua">
										<label>Khoa</label>
										<select name="id_khoa_sua_sinh_vien" id="id_khoa_sua_sinh_vien" class="form-control chuinthuong" required="required">
											<option value="" id="id_khoa_dl_khoa_sua_sv"></option>
											<?php
												$khoa = mysqli_query($con, 'SELECT * FROM khoa where khoa.xoa =0');
												while ($row_khoa= mysqli_fetch_array($khoa)) {
													echo "<option value='$row_khoa[id_khoa]'>$row_khoa[ten_khoa]</option>";
												}
											?>
										</select>
									</div>
									<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 hoten_cb_sua">
										<label>Lớp</label>
										<select name="lop_sua_sinh_vien" id="lop_sua_sinh_vien" class="form-control chuinthuong" required="required">
										</select>
									</div>
									
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Họ tên Cha</label>
										<input  type="text" name="hotencha_sua_sinh_vien" id="hotencha_sua_sinh_vien" class="form-control" rows="1"  placeholder="Nhập họ tên cha">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>SĐT Cha</label>
										<input  type="number" name="sdtcha_sua_sinh_vien" id="sdtcha_sua_sinh_vien" class="form-control" rows="1" placeholder="Nhập SĐT của cha">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>Họ tên Mẹ</label>
										<input  type="text" name="hotenme_sua_sinh_vien" id="hotenme_sua_sinh_vien" class="form-control chuinthuong" rows="1" placeholder="Nhập họ tên Mẹ">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
										<label>SĐT Mẹ</label>
										<input  type="number" name="sdtme_sua_sinh_vien" id="sdtme_sua_sinh_vien" class="form-control" rows="1" placeholder="Nhập SĐT Mẹ">
									</div>
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