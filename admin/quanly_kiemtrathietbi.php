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
		<script type="text/javascript" src="../js/js_quanly_kiemtra_tinhtrang_tb.js"></script>
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
									<h2>Quản lý tình trạng thiết bị phòng</h2>
								</div>
							</div>
						<hr class="ngay_ad"></div>
						<div class="container-fluid">
							<div class="row"><!-- nho doi ten class -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div id="dulieuphong"><?php include './../dulieu/dulieu_kiemtrathietbi.php';?></div>
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
				
				<!-- xem thông tin phong -->
				<div id="dataModal" class="modal fade">
					<div class="modal-dialog ">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Thông tin Phòng</h4>
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
					<div class="modal-dialog ">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Cập nhật thông tin Phòng</h4>
							</div>
							<div class="modal-body">
								<form method="post" id="from_suathongtin_phong" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
									<div class="table-responsive">
										<table class="table table-hover table-bordered">
											
											<tbody>
												<tr>
													<td style="width: 230px">
														<div class="form-group">
															<label for="">Tòa nhà</label>
															<select name="id_toa_nha_sua_15" id="id_toa_nha_sua_15" class="form-control chuinthuong" required="required" disabled>
																<option value="" id="dul_id_toanha_sai">Chọn Tòa nhà</option>
																<?php
																	$q_toa_nha= mysqli_query($con,"SELECT toa_nha.id_toanha, toa_nha.ten_toa_nha FROM toa_nha WHERE toa_nha.xoa=0 ORDER BY toa_nha.ten_toa_nha");
																	while ($ds_toa_nha = mysqli_fetch_array($q_toa_nha)){
																		echo "<option value='".$ds_toa_nha['id_toanha']."'>".$ds_toa_nha['ten_toa_nha']."</option>";
																	}
																?>
															</select>
														</div>
													</td>
													<td>
														<div class="form-group">
															<label for="">Số phòng</label>
															<input type="number" name="sophong_sua_15" id="sophong_sua_15" class="form-control " value="" required="" min="100" placeholder="Nhập số phòng" disabled="">
														</div>
														<div class="form-group" id="tt_canbo">
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="form-group">
															<label for="">Tầng</label>
															<input type="number" name="tang_phong_sua_15" id="tang_phong_sua_15" class="form-control " value="" required="" min="1" max="10" placeholder="Nhập số phòng" disabled>
														</div>
													</td>
													<td>
														<div class="form-group">
															<label for="">Loại phòng</label>
															<select name="loai_phong_phong_sua_15" id="loai_phong_phong_sua_15" class="form-control chuinthuong" required="required" disabled>
																<?php
																	$q_loai_phong= mysqli_query($con,"SELECT loai_phong.id_loaiphong, loai_phong.ten_loai_phong FROM loai_phong WHERE loai_phong.xoa=0 ORDER BY loai_phong.ten_loai_phong");
																	while ($ds_loai_phong = mysqli_fetch_array($q_loai_phong)){
																		echo "<option value='".$ds_loai_phong['id_loaiphong']."'>".$ds_loai_phong['ten_loai_phong']."</option>";
																	}
																?>
															</select>
														</div>
													</td>
												</tr>
												</tbody>
										</table>
											</tbody>
										</table>
										<div id="dulieu_kiemtra"></div>
										<input type="hidden" name="id_phong_sua_12" id="id_phong_sua_12" />
										<div class="modal-footer">
											<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
										</form>
									</div>
									
								</div>
							</div>
						</div>
					</div>