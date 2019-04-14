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
		<script type="text/javascript" src="../js/js_quanlychucvu.js"></script>
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
									<h2>Quản lý Chức vụ</h2>
								</div>
							</div>
						<hr class="ngay_ad"></div>
						<div class="container-fluid">
							<div class="row"><!-- nho doi ten class -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div id="dulieuchucvu"><?php include './../dulieu/dulieuchucvu.php';?></div>
							</div>
							<div class="col-xs-11 col-sm-12 col-md-2 col-lg-2">
								<div class="nuthemmoi"><input type="button" class="btn btn-primary btn-block" name="themchucvu" value="Thêm mới" data-toggle="modal" data-target="#themchucvu1"></div>
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
				<!-- thêm chucvu mới -->
				<div class="modal" id="themchucvu1">
					<div class="modal-dialog themchucvu2 chucvu_themmoi width_350px">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<div class="row">
									<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
										<h4 class="modal-title">Thêm Chức vụ</h4>
									</div>
									<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
										<button type="button" class="fa fa-times-circle-o btn btn-danger" data-dismiss="modal"></button>
									</div>
								</div>
							</div>
							<!-- Modal body -->
							<div class="modal-body _1themtoanha">
								<form action="" id="form_themchucvumoi" name="form_themchucvumoi" 	method="POST" role="form" class="_1themphong1 ">
									<div class="form-group">
										<label for="">Mã Chức vụ</label>
										<input type="text" name="ma_chucvu_them" id="ma_chucvu_them" class="form-control chuinhoa" value="" required="" placeholder="Nhập mã Chức vụ" >
									</div>
									<div class="form-group">
										<label for="">Tên Chức vụ</label>
										<input type="text" name="ten_chucvu_them" id="ten_chucvu_them" class="form-control chuinthuong" value="" required=""  placeholder="Nhập tên Chức vụ" >
									</div>
									<p id="thongbao_themchucvu"></p>
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
				<!-- xem thông tin chucvu -->
				<div id="dataModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Thông tin Chức vụ</h4>
							</div>
							<div class="modal-body" id="thongtin_chitietchucvu">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Cập nhật lại thông tin phòng -->
				<div id="modal_sua_chucvu" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Cập nhật thông tin chucvu</h4>
							</div>
							<div class="modal-body">
								<form method="post" id="from_suathongtin_chucvu" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
									<label>Mã chucvu</label>
									<input type="text" name="ma_chucvu_sua123" id="ma_chucvu_sua123" class="form-control chuinhoa"  required="" />
									<br />
									<label>Tên chucvu</label>
									<textarea  name="ten_chucvusua_12" id="ten_chucvusua_12" class="form-control chuinthuong" rows="1" required=""></textarea>
									<br />
									<input type="hidden" name="id_chucvu_sua_12" id="id_chucvu_sua_12" />
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
					<div id="modal_xoa_chucvu" class="modal fade">
						<div class="modal-dialog width_350px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title canhgiua">Xóa Chức vụ</h4>
								</div>
								<div class="modal-body">
									<form method="post" id="From_xoa_chucvu" data-confirm="Bạn có chắn muốn xóa thông tin này?">
										<label>Mã Chức vụ</label>
										<input type="text" disabled="" name="ma_chucvu_xoa123" id="ma_chucvu_xoa123" class="form-control chuinhoa"  required="" />
										<br />
										<label>Tên Chức vụ</label>
										<textarea  name="ten_chucvuxoa_12" disabled="" id="ten_chucvuxoa_12" class="form-control chuinthuong" rows="1" required=""></textarea>
										<br />
										<input type="hidden" name="id_chucvu_xoa_12" id="id_chucvu_xoa_12" />
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