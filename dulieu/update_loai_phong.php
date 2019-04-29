
<?php
	include 'kiemtradangnhap.php';
		// kiểm tra và cap nbhat lại thông tin Loại phòng
	if (isset($_POST['ma_loai_phong_update_124']) && isset($_POST['ten_loai_phong_update_124']) && isset($_POST['slnguoio_loai_phong_update_124'])&& isset($_POST['gia_loai_phong_update_124']) ) {
		$id_loai_phong_update = $_POST['id_loai_phong_update_124'];
		$ma_loai_phong_update = $_POST['ma_loai_phong_update_124'];
		$ten_loai_phong_update = $_POST['ten_loai_phong_update_124'];
		$slnguoio_loai_phong_update = $_POST['slnguoio_loai_phong_update_124'];
		$gia_loai_phong_update = preg_replace('/(,)/u', '', strip_tags($_POST['gia_loai_phong_update_124']));
		// kiểm tra mã Loại phòng tồn tại chưa
		$kiemtramaloai_phong = mysqli_query($con,"SELECT * FROM loai_phong WHERE loai_phong.xoa=0 AND loai_phong.id_loaiphong <> '$id_loai_phong_update' and  loai_phong.ma_loai_phong='$ma_loai_phong_update'");
		// dlog
		//end
		if(mysqli_num_rows($kiemtramaloai_phong)){
			echo "1";// mã đã tồn tại
		}else{
			// kiểm tra tên Loại phòng tồn tại chưa
			$kiemtra_ten_loai_phong = mysqli_query($con,"SELECT * FROM loai_phong WHERE loai_phong.xoa=0 AND loai_phong.id_loaiphong <> '$id_loai_phong_update' and  loai_phong.ten_loai_phong='$ten_loai_phong_update'");
			if(mysqli_num_rows($kiemtra_ten_loai_phong)){
				echo "2";// mã đã tồn tại
			}else{
				$kiemtra_update_loai_phong=99;
				// ghi log
				$logdl_loai_phong_row = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM loai_phong WHERE loai_phong.xoa=0 and loai_phong.id_loaiphong ='$id_loai_phong_update'"));
				if ($ma_loai_phong_update!=$logdl_loai_phong_row["ma_loai_phong"]) { // kiểm mã có thay đổi  mã Loại phòng
					$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('loai_phong','Loại phòng','$id_loai_phong_update','ma_loai_phong','Mã Loại phòng', '$logdl_loai_phong_row[ma_loai_phong]','$ma_loai_phong_update','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
					mysqli_query($con, $log1);
					//cập nhật dữ liệu thay đổi
					$Update_loai_phong1 ="UPDATE loai_phong  SET loai_phong.ma_loai_phong = '$ma_loai_phong_update' WHERE loai_phong.id_loaiphong ='$id_loai_phong_update'";
					if(mysqli_query($con, $Update_loai_phong1)){
						$kiemtra_update_loai_phong=99;
					}else{
						$kiemtra_update_loai_phong=100;
					}
				}//end  kiểm mã có thay đổi  mã Loại phòng
				if ($ten_loai_phong_update!=$logdl_loai_phong_row["ten_loai_phong"]) { // kiểm mã có thay đổi  tên Loại phòng
					$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('loai_phong','Loại phòng','$id_loai_phong_update','ten_loai_phong','tên Loại phòng', '$logdl_loai_phong_row[ten_loai_phong]','$ten_loai_phong_update','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
					mysqli_query($con, $log1);
					//cập nhật dữ liệu thay đổi
					$Update_loai_phong1 ="UPDATE loai_phong  SET loai_phong.ten_loai_phong = '$ten_loai_phong_update' WHERE loai_phong.id_loaiphong ='$id_loai_phong_update'";
					if(mysqli_query($con, $Update_loai_phong1)){
						$kiemtra_update_loai_phong=99;
					}else{
						$kiemtra_update_loai_phong=100;
					}
				}//end  kiểm tên có thay đổi  tên Loại phòng
				if ($slnguoio_loai_phong_update!=$logdl_loai_phong_row["sl_nguoi_o"]) { // kiểm mã có thay đổi  Số lượng người ở
					$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('loai_phong','Loại phòng','$id_loai_phong_update','sl_nguoi_o','Số lượng người ở', '$logdl_loai_phong_row[sl_nguoi_o]','$slnguoio_loai_phong_update','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
					mysqli_query($con, $log1);
					//cập nhật dữ liệu thay đổi
					$Update_loai_phong1 ="UPDATE loai_phong  SET loai_phong.sl_nguoi_o = '$slnguoio_loai_phong_update' WHERE loai_phong.id_loaiphong ='$id_loai_phong_update'";
					if(mysqli_query($con, $Update_loai_phong1)){
						$kiemtra_update_loai_phong=99;
					}else{
						$kiemtra_update_loai_phong=100;
					}
				}//end  kiểm tên có thay đổi  Số lượng người ở
				if ($gia_loai_phong_update!=$logdl_loai_phong_row["gia_loai_phong"]) { // kiểm mã có thay đổi  Giá phòng
					$log1 = "INSERT INTO log_sua_dl(bangsua, tenbang, iddulieu, cot, tencot, noidungtruocsua, noidungsausua, nguoisua, ngaysua) VALUES ('loai_phong','Loại phòng','$id_loai_phong_update','gia_loai_phong','Giá phòng', '$logdl_loai_phong_row[gia_loai_phong]','$gia_loai_phong_update','$_SESSION[id_canbo]', '".date('Y/m/d H:i:s')."')"; // ghi vao log
					mysqli_query($con, $log1);
					//cập nhật dữ liệu thay đổi
					$Update_loai_phong1 ="UPDATE loai_phong  SET loai_phong.gia_loai_phong = '$gia_loai_phong_update' WHERE loai_phong.id_loaiphong ='$id_loai_phong_update'";
					if(mysqli_query($con, $Update_loai_phong1)){
						$kiemtra_update_loai_phong=99;
					}else{
						$kiemtra_update_loai_phong=100;
					}
				}//end  kiểm tên có thay đổi  Giá phòng
				
				
				echo $kiemtra_update_loai_phong;
			}
		}
	} //ket thuc cap nhat thong tin Loại phòng
	mysqli_close($con);

?>