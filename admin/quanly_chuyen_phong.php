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
	<script type="text/javascript" src="../js/js_chuyenphong.js"></script>
	<link rel="stylesheet" href="../vendor/bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- #region datatables files -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/ad_css.css">
	<!-- #endregion -->
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
				<?php include './../admin/menutrai1.php';?>
				<div class="col-xs-12 col-sm-8 col-md-10 col-lg-10 benphai">
					<div class="container-fluid " style="padding: 0px;">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 chutieude">
								<h2>Quản lý Chuyển phòng</h2>
							</div>
						</div>
					<hr class="ngay_ad">
				</div>
					<div class="container-fluid  ">
						<form action="./../dulieu/xuat_excel_chuyenphong.php" id="" method="POST" role="form">
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
										<button type="submit" class="btn btn-info xuat_excel12" id="xuat_excel12" name="xuat_excel_chuyenphong">Xuất Excel</button>

									</div>
								</div>
								
							</div>
						</form>
						<br>
						<div class="row"><!-- nho doi ten class -->
						<div class="dulieu_log_edit_lop" id="dlchuyenphong" style="width: 100%; font-size: 14px;"><?php include './../dulieu/dulieu_log_edit_chuyen_phong.php'; ?></div>
						</div><!-- end thaydoi1 -->
						</div><!-- end noidungthaydoi -->
						</div> <!-- end col-9 -->
						</div> <!-- end row noi dung -->
					</div>
					<?php include './../admin/food.php';?>
					</div> <!-- end trang admin -->
				</body>
			</html>
			<script>
				$(document).ready( function () {
			$('#myTable').DataTable();
				} );
			</script>