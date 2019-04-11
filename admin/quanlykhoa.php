<?php
include './../dulieu/kiemtradangnhap.php';
?>
<!DOCTYPE html>
<html lang="en"><head>
	<title> Hệ thông KTX ĐH Kiên Giang </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/jpg" href="./../images/vnkgu.png"/>
	<script type="text/javascript" src="../vendor/bootstrap.js"></script>
	<script type="text/javascript" src="../js/js_quanlykhoa.js"></script>
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
				<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 benphai">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 chutieude">
								<h2>Quản lý khoa</h2>
							</div>
						</div>
					<hr class="ngay_ad"></div>
					<div class="container-fluid">
						<div class="row"><!-- nho doi ten class -->
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div id="dulieukhoa"><?php include './../dulieu/dulieukhoasv.php';?></div>
						</div>
						<div class="col-xs-11 col-sm-12 col-md-2 col-lg-2">
							<div class="nuthemmoi"><input type="button" class="btn btn-primary btn-block" name="themkhoa" value="Thêm mới" data-toggle="modal" data-target="#themkhoa1"></div>
						</div>

						</div><!-- end thaydoi1 -->
						</div><!-- end noidungthaydoi -->
						</div> <!-- end col-9 -->
						</div> <!-- end row noi dung -->
					</div>
					<?php include 'food.php';?>
					</div> <!-- end trang admin -->
				</body>
				<div class="modal" id="themkhoa1">
					<div class="modal-dialog themkhoa2 khoa_themmoi">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<div class="row">
									<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
										<h4 class="modal-title">Thêm Khoa</h4>
									</div>
									<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
										<button type="button" class="fa fa-times-circle-o btn btn-danger" data-dismiss="modal"></button>
									</div>
								</div>
							</div>
							<!-- Modal body -->
							<div class="modal-body _1themtoanha">
								<form action="" id="form_themkhoamoi" name="form_themkhoamoi" 	method="POST" role="form" class="_1themphong1 ">
									<div class="form-group">
										<label for="">Mã Khoa</label>
										<input type="text" name="ma_khoa_them" id="ma_khoa_them" class="form-control" value="" required="" placeholder="Nhập mã khoa" style=" text-transform: uppercase;">
									</div>
									<div class="form-group">
										<label for="">Tên Khoa</label>
										<input type="text" name="ten_khoa_them" id="ten_khoa_them" class="form-control" value="" required=""  placeholder="Nhập tên khoa" style=" text-transform: capitalize;">
									</div>
									<p id="thongbao_themkhoa"></p>
								</div>
								<!-- Modal footer -->
								<div class="modal-footer">
									<button type="submit" class="btn btn-danger">Thêm Khoa mới</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				</div><!-- end model -->
				<div id="dataModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Thông tin khoa</h4>
							</div>
							<div class="modal-body" id="employee_detail">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<div id="add_data_Modal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Cập nhật thông tin khoa</h4>
							</div>
							<div class="modal-body">
								<form method="post" id="insert_form">
									<label>Mã khoa</label>
									<input disabled type="text" name="name" id="name" class="form-control" style=" text-transform: uppercase;"/>
									<br />
									<label>Tên khoa</label>
									<textarea  name="address" id="address" class="form-control" rows="1" style=" text-transform: capitalize;"></textarea>
									<br />
									<input type="hidden" name="employee_id" id="employee_id" />
									<input type="hidden" name="thong_bao_loi_capnhat" id="thong_bao_loi_capnhat" />
									<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<div id="xoa_khoa" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Xóa khoa</h4>
							</div>
							<div class="modal-body">
								<form method="post" id="xoa_khoa_form">
									<label>Mã khoa</label>
									<input disabled type="text" name="name1" id="name1" class="form-control"style=" text-transform: uppercase;" />
									<br />
									<label>Tên khoa</label>
									<textarea disabled name="address1" id="address1" class="form-control" rows="1" style=" text-transform: capitalize;"></textarea>
									<br />
									<input type="hidden" name="employee_id1" id="employee_id1" />
									<input type="hidden" name="thong_bao_loi_capnhat" id="thong_bao_loi_capnhat" />
									<input type="submit" name="insert1" id="insert1" value="Insert" class="btn btn-success" />
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>