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
		<script type="text/javascript" src="../js/js_themthietbitrongloaiphong.js"></script>
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
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 chutieude">
									<h2>Danh sách thiết bị có trong loại phòng</h2>
								</div>
							</div>
						<hr class="ngay_ad"></div>
						<div class="container-fluid">
							<div class="row"><!-- nho doi ten class -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div id="dulieuthietbitrongloaiphong"><?php include './../dulieu/dulieuthietbitrongloaiphong.php';?></div>
							</div>
							<div class="col-xs-11 col-sm-12 col-md-2 col-lg-2">
								<div class="nuthemmoi"><input type="button" class="btn btn-primary btn-block" name="themthietbitrongloaiphong" value="Thêm mới" data-toggle="modal" data-target="#themthietbitrongloaiphong1"></div>
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
				
				</script>
				<!-- thêm thietbitrongloaiphong mới -->
				<div class="modal" id="themthietbitrongloaiphong1">
					<div class="modal-dialog themthietbitrongloaiphong2 themthietbi_moi">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Thêm Thiết bị cho Loại Phòng</h4>
							</div>
							<!-- Modal body -->
							<div class="modal-body _1themtoanha">
								<form action="" id="form_themthietbitrongloaiphongmoi" name="form_themthietbitrongloaiphongmoi" 	method="POST" role="form" class="_1themphong1 ">
									<div class="form-group">
										<label for="">Loại Phòng</label>
										<select name="id_loaiphong_thietbitrongloaiphong_them" id="id_loaiphong_thietbitrongloaiphong_them" class="form-control" required="required">
											<option value="">Chọn Loại phòng</option>
											<?php
												$ds_lp = mysqli_query($con, "SELECT * FROM loai_phong WHERE loai_phong.xoa=0");
												if (mysqli_num_rows($ds_lp)) {
													while ($row1 =mysqli_fetch_array($ds_lp)) {
														echo "<option value='".$row1['id_loaiphong']."'>".$row1['ten_loai_phong']."</option>";
													}
												}else{
													echo "<option value=''>Chưa có loại phòng thích họp</option>";
												}
											?>
										</select>
										
									</div>
									<div class="form-group">
										<label for="">Thiết bị</label>
										<select  name="idtb_thietbitrongloaiphong_them" id="idtb_thietbitrongloaiphong_them" class="form-control" required="required">
											<option value="">Chọn Thiết bị</option>
											<?php
												$ds_thietbi = mysqli_query($con, "SELECT * FROM thietbi WHERE thietbi.xoa=0 ORDER BY thietbi.tenthietbi");
												if (mysqli_num_rows($ds_thietbi)) {
													while ($row22 =mysqli_fetch_array($ds_thietbi)) {
														echo "<option value='".$row22['idtb']."'>".$row22['tenthietbi']."</option>";
													}
												}else{
													echo "<option value=''>Chưa có Thiết bị thích họp</option>";
												}
											?>
										</select>
									</div>
									<div class="form-group">
										<label for="">Số lượng</label>
										<select  name="soluong_thietbitrongloaiphong_them" id="soluong_thietbitrongloaiphong_them" class="form-control" required="required">
											<option value="">Chọn Thiết bị</option>
											<?php
												for ($i=1; $i <50 ; $i++) {
													echo "<option value='".$i."'>".$i."</option>";
												}
											?>
										</select>
									</div>
								</div>
								<!-- Modal footer -->
								<div class="modal-footer">
									<button type="submit" class="btn btn-danger">Thêm</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				</div><!-- end model -->
				<!-- xem thông tin thietbitrongloaiphong -->
				<div id="dataModal" class="modal fade">
					<div class="modal-dialog width_350px">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Thông tin Thiết bị cho Loại Phòng</h4>
							</div>
							<div class="modal-body" id="thongtin_chitietthietbitrongloaiphong">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Cập nhật lại thông tin phòng -->
				<div id="modal_sua_thietbitrongloaiphong" class="modal fade">
					<div class="modal-dialog themthietbi_moi">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Cập nhật thông tin Thiết bị cho Loại Phòng</h4>
							</div>
							<div class="modal-body">
								<form method="post" id="from_suathongtin_thietbitrongloaiphong" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
									<label>Loại Phòng</label>
									<select name="id_loaiphong_sua_ctb" id="id_loaiphong_sua_ctb" class="form-control" required="required" >
										<option value="" id="dulieu_cu_lp"></option>
										<?php
												$ds_lp = mysqli_query($con, "SELECT * FROM loai_phong WHERE loai_phong.xoa=0");
												if (mysqli_num_rows($ds_lp)) {
													while ($row1 =mysqli_fetch_array($ds_lp)) {
														echo "<option value='".$row1['id_loaiphong']."'>".$row1['ten_loai_phong']."</option>";
													}
												}else{
													echo "<option value=''>Chưa có loại phòng thích họp</option>";
												}
										?>
									</select>
									<br />
									<label>Thiết bị</label>
									<select name="id_tb_ctb_sua" id="id_tb_ctb_sua" class="form-control" required="required">
										<option value="" id="dulieu_cu_tb"></option>
										<?php
												$ds_thietbi = mysqli_query($con, "SELECT * FROM thietbi WHERE thietbi.xoa=0 ORDER BY thietbi.tenthietbi");
												if (mysqli_num_rows($ds_thietbi)) {
													while ($row22 =mysqli_fetch_array($ds_thietbi)) {
														echo "<option value='".$row22['idtb']."'>".$row22['tenthietbi']."</option>";
													}
												}else{
													echo "<option value=''>Chưa có Thiết bị thích họp</option>";
												}
										?>
									</select>
									<br />
									<label>Số lượng</label>
									<select name="soluong_ctb_sua" id="soluong_ctb_sua" class="form-control" required="required">
										<option value="" id="dulieu_cu"></option>
										<?php
												for ($i=1; $i <50 ; $i++) {
													echo "<option value='".$i."'>".$i."</option>";
												}
										?>
									</select>
									<br />
									<input type="hidden" name="id_ctbtrongloaip_sua" id="id_ctbtrongloaip_sua" />
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
					<div id="modal_xoa_thietbitrongloaiphong" class="modal fade">
						<div class="modal-dialog themthietbi_moi">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title canhgiua">Xóa Thiết bị của Loại Phòng</h4>
								</div>
								<div class="modal-body">
									<form method="post" id="From_xoa_thietbitrongloaiphong" data-confirm="Bạn có chắn muốn xóa thông tin này?">
										<label>Loại Phòng</label>
										<input type="text" disabled="" name="id_loaiphong_xoa" id="id_loaiphong_xoa" class="form-control chuinthuong"  required="" />
										<br />
										<label>Thiết bị</label>
										<textarea  name="id_tb_xoaloaiphomg" disabled="" id="id_tb_xoaloaiphomg" class="form-control chuinthuong" rows="1" required=""></textarea>
										<br />
										<label>Số lượng</label>
										<input type="text" disabled="" name="soluong_thietbitrongloaiphong_xoa123" id="soluong_thietbitrongloaiphong_xoa123" class="form-control chuinhoa"  required="" />
										<br />
										<input type="hidden" name="id_thietbitrongloaiphong_xoa_12" id="id_thietbitrongloaiphong_xoa_12" />
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