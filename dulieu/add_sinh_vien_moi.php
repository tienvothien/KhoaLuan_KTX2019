<?php include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm Loại phòng thì thêm không thì thoát
if (isset($_POST['ma_sinhvien_themmoi123'])) {
	// xuwr lý hình ảnh
	$duongdananhcanbo = "./../images/"; // đường dẫn ảnh
	$hinhanhthem=$_FILES['image12']['name'];// lấy tên ảnh sinh viên thêm
	$target_file = $duongdananhcanbo . basename($_FILES["image12"]["name"]);// lấy loại file
	// end xử lý đường dẫn ảnh
	$ma_sinhvien_themmoi123=$_POST['ma_sinhvien_themmoi123'];// lấy mssv
	$ho_sinhvienthemmoi_12=$_POST['ho_sinhvienthemmoi_12'];// lấy họ  sinh viên
	$ten_sinhvienthemmoi_12=$_POST['ten_sinhvienthemmoi_12'];// lấy tên sinh viên
	$ngaysinh_sinhvienthemmoi_12=$_POST['ngaysinh_sinhvienthemmoi_12']; // lấy ngày sinh sinh viên
	$gioitinh_sinhvienthemmoi_12=$_POST['gioitinh_sinhvienthemmoi_12']; // lấy ngày giới tính sinh viên
	$tinh_them_sinh_vien=$_POST['tinh_them_sinh_vien']; // lấy  mã tỉnh sinh viên
	$huyen_them_sinh_vien=$_POST['huyen_them_sinh_vien']; // lấy  mã huyện sinh viên
	$xa_them_sinh_vien=$_POST['xa_them_sinh_vien']; // lấy  mã xã sinh viên
	$sonha_them_sinh_vien=$_POST['sonha_them_sinh_vien']; // lấy số nhà sinh viên
	$quequan_them_sinh_vien=$_POST['quequan_them_sinh_vien']; // lấy id quên quán nhà sinh viên
	$cmnd_them_sinh_vien=$_POST['cmnd_them_sinh_vien']; // lấy số cmnd sinh viên
	$ngay_capcnnd_them_sinh_vien=$_POST['ngay_capcnnd_them_sinh_vien']; // lấy ngày cấp số cmnd sinh viên
	$noicap_them_sinh_vien=$_POST['noicap_them_sinh_vien']; // lấy nơi cấp số cmnd sinh viên
	$so_dt_them_sinh_vien=$_POST['so_dt_them_sinh_vien']; // lấy sdt sinh viên
	$email_them_sinh_vien=$_POST['email_them_sinh_vien']; // lấy email sinh viên
	$lop_them_sinh_vien=$_POST['lop_them_sinh_vien']; // lấy mã lớp sinh viên
	$hotencha_them_sinh_vien=$_POST['hotencha_them_sinh_vien']; // lấy họ và tên cha sinh viên
	$sdtcha_them_sinh_vien=$_POST['sdtcha_them_sinh_vien']; // lấy sđt cha sinh viên
	$hotenme_them_sinh_vien=$_POST['hotenme_them_sinh_vien']; // lấy họ tên mẹ sinh viên
	$sdtme_them_sinh_vien=$_POST['sdtme_them_sinh_vien']; // lấy họ tên mẹ sinh viên
	$ngay = date('Y/m/d H:i:s');
	//kiểm tra mã số sinh viên có trùng không
	$kiemtra_mssv = (mysqli_query($con,"SELECT sinh_vien.id_sinhvien FROM sinh_vien WHERE sinh_vien.mssv='$ma_sinhvien_themmoi123'"));
	if (mysqli_num_rows($kiemtra_mssv)) {
		echo "1";// mssv đã tồn tại
	}else{
		$kiemtra_so_cmnd = (mysqli_query($con,"SELECT sinh_vien.id_sinhvien FROM sinh_vien WHERE sinh_vien.so_cmnd='$cmnd_them_sinh_vien'"));
	if (mysqli_num_rows($kiemtra_so_cmnd)) {
		echo "6";// mssv đã tồn tại
	}else{
			$kiemtra_sdt_sv = (mysqli_query($con,"SELECT sinh_vien.id_sinhvien FROM sinh_vien WHERE sinh_vien.so_dt='$so_dt_them_sinh_vien'  OR sinh_vien.sdtcha='$so_dt_them_sinh_vien' OR sinh_vien.sdtme='$so_dt_them_sinh_vien'" ));
			if (mysqli_num_rows($kiemtra_sdt_sv) && $so_dt_them_sinh_vien!='') {
				echo "2";// sđt đã tồn tại
			}else{
				$kiemtra_email_sv = (mysqli_query($con,"SELECT sinh_vien.id_sinhvien FROM sinh_vien WHERE sinh_vien.email='$email_them_sinh_vien'"));
				if (mysqli_num_rows($kiemtra_email_sv) && $email_them_sinh_vien!='') {
					echo "3";// email đã tồn tại
				}else{
					$insert_sinhvien ="INSERT INTO sinh_vien(mssv,anh_ca_nhan,ho_sv,ten_sv,ngay_sinh,gioi_tinh,que_quan,so_cmnd,ngay_cap,noi_cap,matinh,mahuyen,maxa,so_nha,so_dt,email,hotencha,sdtcha,hotenme,sdtme,id_lop,id_canbothem,ngay_them) VALUES ('$ma_sinhvien_themmoi123','$hinhanhthem','$ho_sinhvienthemmoi_12','$ten_sinhvienthemmoi_12','$ngaysinh_sinhvienthemmoi_12','$gioitinh_sinhvienthemmoi_12','$quequan_them_sinh_vien','$cmnd_them_sinh_vien','$ngay_capcnnd_them_sinh_vien','$noicap_them_sinh_vien','$tinh_them_sinh_vien','$huyen_them_sinh_vien','$xa_them_sinh_vien','$sonha_them_sinh_vien','$so_dt_them_sinh_vien','$email_them_sinh_vien','$hotencha_them_sinh_vien','$sdtcha_them_sinh_vien','$hotenme_them_sinh_vien','$sdtme_them_sinh_vien','$lop_them_sinh_vien','$_SESSION[id_canbo]','$ngay')";
							if (mysqli_query($con, $insert_sinhvien)) {
								move_uploaded_file($_FILES["image12"]["tmp_name"], $target_file);
								// thêm tài khoản vào
								mysqli_query($con,"INSERT INTO taikhoan(idms, matkhau, ngaythem, idtktao, is_sinhvien) VALUES ('$ma_sinhvien_themmoi123','".md5(md5(md5($ma_sinhvien_themmoi123)))."','$ngay','$_SESSION[id_canbo]','1' )");
								echo "99";
							}else {
								echo var_dump(mysqli_query($con, $insert_sinhvien));;
							}
						}
					}
				}
			
		
	}
	
} else {
	header("location:./../admin/login");
}
mysqli_close($con);
?>