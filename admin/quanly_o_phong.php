<?php
include './../dulieu/kiemtradangnhap.php';
include './../dulieu/kirmtra_quantrivien.php';
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
								<h2>Quản lý Ở phòng</h2>
							</div>
						</div>
						<hr class="ngay_ad">
					</div>
					<div class="row"><!-- nho doi ten class -->
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div id="dulieu_o_phong"><?php include './../dulieu/dulieu_o_phong.php';?></div>
					</div>
					<div class="col-xs-11 col-sm-12 col-md-2 col-lg-2">
						<div class="nuthemmoi">
							<input type="button" class="btn btn-primary btn-block" name="them_o_phong" value="Thêm mới" data-toggle="modal" data-target="#them_o_phong1">
						</div>
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
			<div class="modal" id="them_o_phong1">
				<div class="modal-dialog them_o_phong2 _o_phong_themmoi ">
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Thêm sinh viên vào phòng </h4>
						</div>
						<!-- Modal body -->
						<div class="modal-body _1themtoanha">
							<form action="" id="form_them_o_phongmoi" name="form_them_o_phongmoi" 	method="POST" role="form" class="_1themphong1 ">
								<div class="form-group">
									<label for="">Mã Sinh viên</label>
									<input type="number" name="mssv_o_phong_them" id="mssv_o_phong_them" class="form-control " value="" required="" placeholder="Nhập mã sinh viên" >
								</div>
								
								<div class="form-group">
									<label for="">Tòa nhà</label>
									<select name="id_toa_nha_them_ophong" id="id_toa_nha_them_ophong" class="form-control chuinthuong" required="required">
										<option value="">Chọn Tòa nhà</option>
										<?php
											$q_toa_nha= mysqli_query($con,"SELECT toa_nha.id_toanha, toa_nha.ten_toa_nha FROM toa_nha WHERE toa_nha.xoa=0 ORDER BY toa_nha.ten_toa_nha");
											while ($ds_toa_nha = mysqli_fetch_array($q_toa_nha)){
												echo "<option value='".$ds_toa_nha['id_toanha']."'>".$ds_toa_nha['ten_toa_nha']."</option>";
											}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="">Số phòng</label>
									<select name="id_phong_them_ophong" id="id_phong_them_ophong" class="form-control chuinthuong" required="required">
										<option value="" id="id_phongchonjtoanha">Chọn Tòa nhà</option>
										
									</select>
								</div>
								<div class="form-group" id="tt_sinhvie">
								</div>
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
			<!-- xem thông tin _o_phong -->
			<div id="dataModal" class="modal fade">
				<div class="modal-dialog width_350px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Thông tin Cán bộ Ở phòng</h4>
						</div>
						<div class="modal-body" id="thongtin_chitiet_o_phong">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Cập nhật lại thông tin phòng -->
			<div id="modal_sua__o_phong" class="modal fade">
				<div class="modal-dialog width_350px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Cập nhật thông tin Chức vụ</h4>
						</div>
						<div class="modal-body">
							<form method="post" id="from_suathongtin__o_phong" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
								<label>Mã _o_phong</label>
								<input type="text" name="ma__o_phong_sua123" id="ma__o_phong_sua123" class="form-control chuinhoa"  required="" />
								<br />
								<label>Tên _o_phong</label>
								<textarea  name="ten__o_phongsua_12" id="ten__o_phongsua_12" class="form-control chuinthuong" rows="1" required=""></textarea>
								<br />
								<input type="hidden" name="id__o_phong_sua_12" id="id__o_phong_sua_12" />
								<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-danger capnhattb" />
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Xoa Chức vụ -->
			<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
				<div id="modal_xoa__o_phong" class="modal fade">
					<div class="modal-dialog width_350px">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title canhgiua">Xóa Cán bộ Ở phòng</h4>
							</div>
							<div class="modal-body" id="dulieu_cab__o_phong"></div>
							<form method="post" id="From_xoa__o_phong" data-confirm="Bạn có chắn muốn xóa thông tin này?">
								<input type="hidden" name="id__o_phong_xoa_12" id="id__o_phong_xoa_12" />
								<div class="modal-footer">
									<input type="submit" name="insert_xoa" id="insert_xoa" value="Xóa" class="btn btn-danger canhgiua" />
								</div>
							</form>
							
							
						</div>
					</div>
				</div>
			</div>