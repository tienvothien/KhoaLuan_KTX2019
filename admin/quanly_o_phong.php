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
						<form action="./../dulieu/xuat_excel.php" id="" method="POST" role="form">
							<div class="row text-center">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  ">
									<div class=" khu12 col-xs-12 col-sm-2 col-md-2 col-lg-2 text-justify">
										<label for="" class="form-control boviennha text-right" >Tìm sinh viên ở từ ngày</label>
									</div>
									<div class=" khu12 col-xs-12 col-sm-4 col-md-4 col-lg-4">
										<input type="date" class="form-control" id="timkiem_dang_ophongngay_batdau"  name="timkiem_dang_ophongngay_batdau" placeholder="Input field" style="    width: 45%; float:left">
										<label class="form-control boviennha" style=" width:3%; float: left">-</label>
										<input class="form-control" type="date" class=form-control id="timkiem_dang_ophongngay_kethuc"  name="timkiem_dang_ophongngay_kethuc" placeholder="Input field" style="    width: 45%">
									</div>
									<div class=" khu12 col-xs-12 col-sm-2 col-md-2 col-lg-2">
										<select name="timkiem_dang_ophong_id_toanha" id="timkiem_dang_ophong_id_toanha" class="form-control" >
											<option value="">Chọn tòa nhà</option>
											<?php  $qr = mysqli_query($con, "SELECT toa_nha.id_toanha, toa_nha.ma_toa_nha, toa_nha.ten_toa_nha FROM toa_nha where toa_nha.xoa=0  order by toa_nha.ten_toa_nha");
												while ($r= mysqli_fetch_array($qr)) {
											
													echo " <option value='".$r['id_toanha']."'>".$r["ma_toa_nha"]."-".$r["ten_toa_nha"]."</option>";
												}

											?>
											
										</select>
									</div>
									<div class=" khu12 col-xs-12 col-sm-2 col-md-2 col-lg-2">
										<select name="timkiem_dang_ophong_idphong" id="timkiem_dang_ophong_idphong" class="form-control" >
											<option value="">Chọn phòng</option>
										</select>
									</div>
									<div class=" khu12 col-xs-12 col-sm-2 col-md-2 col-lg-2 text-left">
										<button type="button" id="tim_kiem_dang_o_phong" class="btn btn-primary">Tìm</button>
										<button type="submit" class="btn btn-info xuat_excel12" id="xuat_excel12">Xuất Excel</button>

									</div>
								</div>
								
							</div>
						</form>
						<br>
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
					<br>
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
							<form action="" id="form_them_o_phongmoi" name="form_them_o_phongmoi" 	method="POST" role="form" class="_1themphong1 " enctype="multipart/form-data" data-confirm="Bạn có chắn muốn thêm thông tin này?">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="">Mã Sinh viên</label>
											<input type="number" name="mssv_o_phong_them" id="mssv_o_phong_them" class="form-control " value="" required="" placeholder="Nhập mã sinh viên" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="">Tòa nhà</label>
											<select name="id_toa_nha_them_ophong" id="id_toa_nha_them_ophong" class="form-control chuinthuong" required="required">
												<option value="">Chọn Tòa nhà</option>
											</select>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="">Số phòng</label>
											<select name="id_phong_them_ophong" id="id_phong_them_ophong" class="form-control chuinthuong" required="required">
												<option value="">Chọn phòng</option>
												
											</select>
											
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="">Học Kỳ</label>
											<select name="hocky_them_ophong" id="hocky_them_ophong" class="form-control chuinthuong" required="required">
												<option value="">Chọn học Kỳ</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="Hè">Hè</option>
											</select>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="">Năm học</label>
											<select name="namhoc_them_ophong" id="namhoc_them_ophong" class="form-control chuinthuong" required="required">
												<option value="">Chọn năm học</option>
												<?php 
												for ($i=(date('Y')-1); $i < (date('Y')+1); $i++) { 
													$i2=$i+1;
												
												echo "<option value='".$i."-".$i2."'>".$i."-".$i2."";}?>
											</select>
											
										</div>
									</div>
								</div>
								
							</div>
							<!-- Modal footer -->
							<div class="modal-footer ">
								<button type="submit" class="btn btn-danger">Thêm mới</button>
								<h3 class="text-center">Thông tin sinh viên</h3>
								<div class="form-group text-center" id="tt_sinhvie"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
			</div><!-- end model -->
			<!-- xem thông tin _o_phong -->
			<div id="dataModal" class="modal fade">
				<div class="modal-dialog ">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Thông tin sinh viên Ở phòng</h4>
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
				<div class="modal-dialog ">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Chuyển phòng sinh viên</h4>
						</div>
						<div class="modal-body">
							<form method="post" id="from_suathongtin__o_phong" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
								<div class="row">
									
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										
										<div classid_dltoanha_moi="form-group">
											<label for="">Mã Sinh viên</label>
											<input type="number" name="mssv_o_phong_sua" id="mssv_o_phong_sua" class="form-control " value="" required="" placeholder="Nhập mã sinh viên" readonly="" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="">Tòa nhà củ</label>
											<input type="text" name="id_dltoanha_cu" id="id_dltoanha_cu" class="form-control " value="" required=""  readonly="" >
											
										</div>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="">Tòa nhà mới</label>
											<select name="" id="id_dltoanha_moi" class="form-control chuinthuong" required="required">
												
											</select>
											
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="">Số phòng củ</label>
											<input type="text" name="id_dphong_cu" id="id_dphong_cu" class="form-control " value="" required=""  readonly="" >
											
										</div>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="">Số phòng mới</label>
											<select name="id_dphong_moi" id="id_dphong_moi" class="form-control" required="required">
												<option value="">Chọn phòng</option>
											</select>
											
										</div>
										
									</div>
								</div>
								<div class="form-group" id="tt_sinhvie"></div>
								<input type="hidden" name="id__o_phong_sua_12" id="id__o_phong_sua_12" />
								
							</div>
							<div class="modal-footer">
								<input type="submit" name="insert" id="insert" value="Chuyển" class="btn btn-danger capnhattb" />
								
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Xoa Chức vụ -->
			<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
				<div id="modal_xoa__o_phong" class="modal fade">
					<div class="modal-dialog ">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title canhgiua">Kết thúc ở của  Sinh viên</h4>
							</div>
							<div class="modal-body" id="dulieu_cab__o_phong"></div>
							<form method="post" id="From_xoa__o_phong" data-confirm="Bạn có chắn muốn xóa thông tin này?">
								<input type="hidden" name="id__o_phong_xoa_12" id="id__o_phong_xoa_12" />
								<div class="modal-footer">
									<input type="submit" name="insert_xoa" id="insert_xoa" value="Kết thúc" class="btn btn-danger canhgiua" />
								</div>
							</form>
							
							
						</div>
					</div>
				</div>
			</div>