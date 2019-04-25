<?php 	
	// tỉnh thay đổi sẽ chọn huyện thay đồi
	if (isset($_POST['tinh_them_sinh_vien'])) {
		$matinh = $_POST['tinh_them_sinh_vien'];
		include 'conn.php';
		$sqlhuyen = "SELECT * FROM huyen where matinh ='$matinh' ORDER by mahuyen ASC";
		$queryhuyen = mysqli_query($con, $sqlhuyen);
		echo " <option value=''>Chọn huyện</option>";
		while ($rowhuyen = mysqli_fetch_array($queryhuyen)) {
			$tenhuyen = $rowhuyen['tenhuyen'];
			$caphuyen = $rowhuyen['caphuyen'];
			$mahuyen = $rowhuyen['mahuyen'];
			echo "<option value='$mahuyen'>$caphuyen $tenhuyen</option>";}
	}//end tỉnh thay đổi sẽ chọn huyện thay đổi
	if (isset($_POST['huyen_them_sinh_vien'])) {// huyện thay đổi xã sẽ thay đổi
		$mahuyen = $_POST['huyen_them_sinh_vien'];
		include 'conn.php';
		$sqlxa = "SELECT * FROM xa where mahuyen ='$mahuyen' ORDER by maxa ASC";
		$queryxa = mysqli_query($con, $sqlxa);
		echo " <option value=''>Chọn Xã</option>";
		while ($rowxa = mysqli_fetch_array($queryxa)) {
			$tenxa = $rowxa['tenxa'];
			$capxa = $rowxa['capxa'];
			$maxa = $rowxa['maxa'];
			echo "<option value='$maxa'>$capxa $tenxa</option>";}
	}// end huyện thay đổi xã sẽ thay đổi
	if (isset($_POST['id_khoa_them_sinh_vien']) && isset($_POST['khoa_them_sinh_vien'])) {// huyện thay đổi lớpsẽ thay đổi
		$id_khoa1 = $_POST['id_khoa_them_sinh_vien'];
		$khoa1 = $_POST['khoa_them_sinh_vien'];
		include 'conn.php';
		$sqlxa = "SELECT lop.id_lop,lop.ma_lop, lop.ten_lop FROM lop where lop.id_khoa ='$id_khoa1' and lop.khoa= '$khoa1' and lop.xoa=0 ORDER by ma_lop ASC";
		$queryxa = mysqli_query($con, $sqlxa);
		echo " <option value=''>Chọn lớp</option>";
		while ($rowxa = mysqli_fetch_array($queryxa)) {
			$id_lop = $rowxa['id_lop'];
			$ten_lop = $rowxa['ten_lop'];
			echo "<option value='$id_lop'>$ten_lop</option>";}
	}// end huyện thay đổi lớpsẽ thay đổi

	if (isset($_POST['khoa_them_sinh_vien1'])) {// Khóa thay đổi Khoa sẽ thay đổi
		include 'conn.php';
		$sqlkhoa = "SELECT khoa.id_khoa,khoa.ma_khoa, khoa.ten_khoa FROM khoa where khoa.xoa=0 ORDER by ma_khoa ASC";
		$querykhoa = mysqli_query($con, $sqlkhoa);
		echo " <option value=''>Chọn Khoa </option>";
		while ($rowkhoa = mysqli_fetch_array($querykhoa)) {
			$id_khoa = $rowkhoa['id_khoa'];
			$ten_khoa = $rowkhoa['ten_khoa'];
			echo "<option value='$id_khoa'>$ten_khoa</option>";}
	}// end Khóa thay đổi Khoa sẽ thay đổi
		// tỉnh thay đổi mssv
	if (isset($_POST['ma_sinhvien_themmoi123'])) {
		$ma_sinhvien_themmoi123 = $_POST['ma_sinhvien_themmoi123'];
		include 'conn.php';
		$sqlsv = "SELECT sinh_vien.id_sinhvien FROM sinh_vien WHERE sinh_vien.mssv='$ma_sinhvien_themmoi123'";
		$querysv = mysqli_query($con, $sqlsv);
		if (mysqli_num_rows($querysv)) {
			echo "1";
		}
	}//end tỉnh thay đổi mssv
	
 ?>