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
		<script type="text/javascript" src="../js/js_quanlyphong.js"></script>
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
									<h2>Quản lý Phòng</h2>
								</div>
							</div>
						<hr class="ngay_ad"></div>
						<div class="container-fluid">
							<div class="row"><!-- nho doi ten class -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div id="dulieuphong"><?php include './../dulieu/dulieuphong.php';?></div>
							</div>
							<div class="col-xs-11 col-sm-12 col-md-2 col-lg-2">
								<div class="nuthemmoi"><input type="button" class="btn btn-primary btn-block" name="themphong" value="Thêm mới" data-toggle="modal" data-target="#themphong1"></div>
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
				<!-- thêm phong mới -->
				<div class="modal" id="themphong1">
					<div class="modal-dialog themphong2 phong_themmoi width_350px">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Thêm Phòng Chức vụ</h4>
							</div>
							<!-- Modal body -->
							<div class="modal-body _1themtoanha">
								<form action="" id="form_themphongmoi" name="form_themphongmoi" 	method="POST" role="form" class="_1themphong1 ">
									<div class="form-group">
										<label for="">Mã mã Cán bộ</label>
										<input type="number" name="macanbo_phong_them" id="macanbo_phong_them" class="form-control chuinhoa" value="" required="" placeholder="Nhập mã Chức vụ" >
									</div>
									<div class="form-group" id="tt_canbo">
									</div>
									<div class="form-group">
										<label for="">Chức vụ</label>
										<select name="id_chucvuthem_phong" id="id_chucvuthem_phong" class="form-control chuinthuong" required="required">
											<option value="">Chọn Chức vụ</option>
											<?php 
												$q_ds_cv= mysqli_query($con,"SELECT chucvu.idchucvu, chucvu.tenchucvu FROM chucvu WHERE chucvu.idchucvu!=0 AND chucvu.xoa=0 AND chucvu.idchucvu!=19 ORDER BY chucvu.tenchucvu");
												while ($ds_cv = mysqli_fetch_array($q_ds_cv)){
													echo "<option value='".$ds_cv['idchucvu']."'>".$ds_cv['tenchucvu']."</option>";
												}

											 ?>
										</select>
									</div>
									<p id="thongbao_themphong"></p>
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
				<!-- xem thông tin phong -->
				<div id="dataModal" class="modal fade">
					<div class="modal-dialog width_350px">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Thông tin Cán bộ Phòng</h4>
							</div>
							<div class="modal-body" id="thongtin_chitietphong">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Cập nhật lại thông tin phòng -->
				<div id="modal_sua_phong" class="modal fade">
					<div class="modal-dialog width_350px">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Cập nhật thông tin Chức vụ</h4>
							</div>
							<div class="modal-body">
								<form method="post" id="from_suathongtin_phong" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
									<label>Mã phong</label>
									<input type="text" name="ma_phong_sua123" id="ma_phong_sua123" class="form-control chuinhoa"  required="" />
									<br />
									<label>Tên phong</label>
									<textarea  name="ten_phongsua_12" id="ten_phongsua_12" class="form-control chuinthuong" rows="1" required=""></textarea>
									<br />
									<input type="hidden" name="id_phong_sua_12" id="id_phong_sua_12" />
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
					<div id="modal_xoa_phong" class="modal fade">
						<div class="modal-dialog width_350px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title canhgiua">Xóa Phòng</h4>
								</div>
								<div class="modal-body" id="dulieu_cab_phong"></div>
										<form method="post" id="From_xoa_phong" data-confirm="Bạn có chắn muốn xóa thông tin này?">
										<input type="hidden" name="id_phong_xoa_12" id="id_phong_xoa_12" />
										<div class="modal-footer">
											<input type="submit" name="insert_xoa" id="insert_xoa" value="Xóa" class="btn btn-danger canhgiua" />
										</div>
									</form>
								
								
							</div>
						</div>
					</div>
				</div>