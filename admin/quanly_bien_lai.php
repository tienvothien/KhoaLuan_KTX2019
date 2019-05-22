<?php
include './../dulieu/kiemtradangnhap_ketoan.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Hệ thông KTX ĐH Kiên Giang </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/jpg" href="./../images/vnkgu.png"/>
		<script type="text/javascript" src="../vendor/bootstrap.js"></script>
		<script type="text/javascript" src="../js/js_bien_lai.js"></script>
		<script type="text/javascript" src="../js/js_hien_thi_dang_tien.js"></script>
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
					<?php include 'menutrai1.php';?>
					<div class="col-xs-12 col-sm-8 col-md-10 col-lg-10 benphai">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 chutieude">
								<h2>Quản lý Biên lai</h2>
							</div>
						</div>
						<hr class="ngay_ad">
						<form action="./../dulieu/xuat_excel_bienlai.php" id="" method="POST" role="form">
							<div class="row text-center">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  ">
									<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 khungtim_bl text-justify">
										<label for="" class="form-control boviennha text-right" >Tìm sinh viên ở từ ngày</label>
									</div>
									<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 khungtim_bl">
										<input type="date" class="form-control" id="timkiem_bien_lai_ngay_batdau"  name="timkiem_bien_lai_ngay_batdau" placeholder="Input field" style="    width: 45%; float:left">
										<label class="form-control boviennha" style=" width:3%; float: left">-</label>
										<input class="form-control" type="date" class=form-control id="timkiem_bien_laigngay_kethuc"  name="timkiem_bien_laigngay_kethuc" placeholder="Input field" style="    width: 45%">
									</div>
									<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 khungtim_bl">
										<select name="timkiem_bien_lai_id_toanha" id="timkiem_bien_lai_id_toanha" class="form-control" >
											<option value="">Chọn tòa nhà</option>
											<?php  $qr = mysqli_query($con, "SELECT toa_nha.id_toanha, toa_nha.ma_toa_nha, toa_nha.ten_toa_nha FROM toa_nha where toa_nha.xoa=0  order by toa_nha.ten_toa_nha");
												while ($r= mysqli_fetch_array($qr)) {
											
													echo " <option value='".$r['id_toanha']."'>".$r["ma_toa_nha"]."-".$r["ten_toa_nha"]."</option>";
												}
											?>
											
										</select>
									</div>
									<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 khungtim_bl">
										<select name="timkiem_bien_lai_loai_tien" id="timkiem_bien_lai_loai_tien" class="form-control" >
											<option value="">Chọn loại</option>
											<?php  $qr = mysqli_query($con, "SELECT loai_bien_lai.id, loai_bien_lai.ten_bien_lai FROM loai_bien_lai");
												while ($r= mysqli_fetch_array($qr)) {
											
													echo " <option value='".$r['id']."'>".$r["ten_bien_lai"]."</option>";
												}
											?>
											
										</select>
									</div>
									<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2  khungtim_bltext-left">
										<button type="button" id="tim_kiem_bien_lai" class="btn btn-primary">Tìm</button>
										<button type="submit" class="btn btn-info xuat_excel12" id="xuat_excel12" name="xuat_excel_bienlai">Xuất Excel</button>
									</div>
								</div>
							</div>
						</form>
						<br>
						
						<div class="row"><!-- nho doi ten class -->
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div id="dulieu_o_phong"><?php include './../dulieu/dulieu_bien_lai.php';?></div>
						</div>
						<div class="col-xs-11 col-sm-12 col-md-2 col-lg-2">
							<div class="nuthemmoi">
								<input type="button" class="btn btn-primary btn-block" name="them_o_phong" value="Thêm mới" data-toggle="modal" data-target="#them_o_phong1">
							</div>
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
							<form action="" id="from_them_bien_lai" name="from_them_bien_lai" 	method="POST" role="form" class="_1themphong1 " enctype="multipart/form-data" data-confirm="Bạn có chắn muốn thêm thông tin này?">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="">Mã Sinh viên đón tiền</label>
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
											<label for="">Loại tiền</label>
											<select name="loai_tien" id="loai_tien" class="form-control chuinthuong" required="required">
												<option value="">Chọn loại</option>
												<?php
												$qr_tbl = (mysqli_query($con, "SELECT * FROM loai_bien_lai"));
												while ($r=mysqli_fetch_array($qr_tbl)) {
													echo "<option value='".$r['id']."'>".$r['ten_bien_lai']."";
														}
														
													?>
												</select>
												
											</select>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="">Số biên lai</label>
											<input type="number" name="so_bien_lai" id="so_bien_lai" class="form-control" value="" min="0" max="" step="" required="required" title="">
											
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<label>Tiền ( VMĐ)</label>
										<div class="form-group">
											<input type="text" name="so_tien_don" id="so_tien_don" class="form-control" value=""  required="required" placeholder="Nhập giá Loại phòng" title="" onkeyup="this.value=FormatNumber(this.value);">
										</div>
									</div>
								</div>
							</div>
							<!-- Modal footer -->
							<div class="modal-footer text-center">
								<button type="submit" class="btn btn-danger" name="submit_them_bien_lai_moi123">Thêm mới</button>
								<h3 class=" text-center">Thông tin sinh viên</h3>
								<div class="form-group text-center" id="tt_sinhvie"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
			</div><!-- end model -->