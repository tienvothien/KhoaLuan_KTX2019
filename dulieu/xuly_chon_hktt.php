<?php 	
	// tỉnh thay đổi sẽ chọn huyện thay đồi
	if (isset($_POST['tinh_them_sinh_vien'])) {
		$matinh = $_POST['tinh_them_sinh_vien'];
		include 'conn.php';
		$sqlhuyen = "SELECT * FROM huyen where matinh ='$matinh' ORDER by tenhuyen ASC";
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
		$sqlxa = "SELECT * FROM xa where mahuyen ='$mahuyen' ORDER by tenxa ASC";
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
			$ma_lop = $rowxa['ma_lop'];
			echo "<option value='$id_lop' class='chuinhoa'>$ma_lop</option>";}
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
	if (isset($_POST['id_sinh_vien_sua'])) {// hiện tt xã sẽ thay đổi sửa tt sinh viên
		$id_sinh_vien_sua = $_POST['id_sinh_vien_sua'];
		include 'conn.php';
		$sqlxa = "SELECT xa.maxa, xa.capxa, xa.tenxa FROM sinh_vien , huyen, xa WHERE sinh_vien.id_sinhvien='$id_sinh_vien_sua' AND sinh_vien.mahuyen= huyen.mahuyen AND huyen.mahuyen=xa.mahuyen ORDER by xa.capxa,xa.tenxa ASC";
		$sqlxahien = mysqli_fetch_array(mysqli_query($con,"SELECT xa.maxa, xa.capxa, xa.tenxa FROM sinh_vien , xa WHERE sinh_vien.id_sinhvien='$id_sinh_vien_sua' AND sinh_vien.maxa= xa.maxa ORDER by xa.capxa, xa.tenxa ASC"));
		$queryxa = mysqli_query($con, $sqlxa);
		echo " <option value='".$sqlxahien['maxa']."'>".$sqlxahien['capxa']. $sqlxahien['tenxa']."</option>";
		while ($rowxa = mysqli_fetch_array($queryxa)) {
			$tenxa = $rowxa['tenxa'];
			$capxa = $rowxa['capxa'];
			$maxa = $rowxa['maxa'];
			echo "<option value='$maxa'>$capxa $tenxa</option>";}
	}// end hiện tt xã sẽ thay đổi sửa tt sinh viên
	if (isset($_POST['id_sinh_vien_sua_huyen'])) {// hiện tt xã sẽ thay đổi sửa tt sinh viên
		$id_sinh_vien_sua_huyen = $_POST['id_sinh_vien_sua_huyen'];
		include 'conn.php';
		$sqlhuyen = "SELECT huyen.mahuyen, huyen.caphuyen, huyen.tenhuyen FROM sinh_vien , huyen, tinh WHERE sinh_vien.id_sinhvien='$id_sinh_vien_sua_huyen' AND sinh_vien.matinh=tinh.matinh AND huyen.matinh=tinh.matinh  ORDER by huyen.caphuyen, huyen.tenhuyen ASC";
		$sqlhuyenhien = mysqli_fetch_array(mysqli_query($con,"SELECT huyen.mahuyen, huyen.caphuyen, huyen.tenhuyen FROM sinh_vien , huyen WHERE sinh_vien.id_sinhvien='$id_sinh_vien_sua_huyen' AND sinh_vien.mahuyen= huyen.mahuyen ORDER by huyen.caphuyen, huyen.tenhuyen ASC"));
		$queryhuyen = mysqli_query($con, $sqlhuyen);
		echo " <option value='".$sqlhuyenhien['mahuyen']."'>".$sqlhuyenhien['caphuyen']. $sqlhuyenhien['tenhuyen']."</option>";
		while ($rowhuyen = mysqli_fetch_array($queryhuyen)) {
			$tenhuyen = $rowhuyen['tenhuyen'];
			$caphuyen = $rowhuyen['caphuyen'];
			$mahuyen = $rowhuyen['mahuyen'];
			echo "<option value='$mahuyen'>$caphuyen $tenhuyen</option>";}
	}// end hiện tt xã sẽ thay đổi sửa tt sinh viên
	if (isset($_POST['id_sinh_vien_sua_id_lop'])) {// hiện tt id Khoa sẽ thay đổi sửa tt sinh viên
		$id_sinh_vien_sua_id_lop = $_POST['id_sinh_vien_sua_id_lop'];
		include 'conn.php';
		// ds lớp có cùng khoa
		$sql_dsklop = "SELECT l2.id_lop, l2.ten_lop, l2.ma_lop FROM lop l2 WHERE l2.id_khoa= (SELECT lop.id_khoa FROM lop, sinh_vien WHERE sinh_vien.id_lop= lop.id_lop AND sinh_vien.id_sinhvien = '$id_sinh_vien_sua_id_lop') and l2.xoa=0 and l2.id_lop!=(SELECT lop.id_lop FROM lop, sinh_vien WHERE sinh_vien.id_lop= lop.id_lop AND sinh_vien.id_sinhvien = '$id_sinh_vien_sua_id_lop') AND l2.khoa =(SELECT l3.khoa FROM lop l3, sinh_vien WHERE sinh_vien.id_lop= l3.id_lop AND sinh_vien.id_sinhvien = '$id_sinh_vien_sua_id_lop')";
		// tthonhg tin lớp của sinh viên
		$sql_lop_hienra = mysqli_fetch_array(mysqli_query($con,"SELECT lop.id_lop, lop.ten_lop, lop.ma_lop FROM lop, sinh_vien WHERE sinh_vien.id_lop= lop.id_lop AND sinh_vien.id_sinhvien = '$id_sinh_vien_sua_id_lop'"));
		$dsklop = mysqli_query($con, $sql_dsklop);
		echo " <option class='chuinhoa' value='".$sql_lop_hienra['id_lop']."' >". $sql_lop_hienra['ma_lop']."</option>";
		while ($rowhuyen = mysqli_fetch_array($dsklop)) {
			$ten_lop = $rowhuyen['ma_lop'];
			$id_lop = $rowhuyen['id_lop'];
			echo "<option value='$id_lop' class='chuinhoa'>$ten_lop</option>";}
	}// end hiện tt id Khoa sẽ thay đổi sửa tt sinh viên
 ?>