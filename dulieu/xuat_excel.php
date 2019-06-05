<?php
require('./../Classes/PHPExcel.php');
include './../dulieu/conn.php';
if(isset($_POST['timkiem_dang_ophongngay_batdau']) && isset($_POST['timkiem_dang_ophong_id_toanha']) && isset($_POST['timkiem_dang_ophongngay_kethuc'])){
	$xuat_ophong_ngay_batdau=$_POST['timkiem_dang_ophongngay_batdau'];
	$xuat_ophong_ngay_kethuc=$_POST['timkiem_dang_ophongngay_kethuc'];
	$xuat_ophong_id_toanha=$_POST['timkiem_dang_ophong_id_toanha'];
	if ($xuat_ophong_ngay_kethuc=='') {
		$xuat_ophong_ngay_kethuc=date('Y/m/d');
	}
	if ($xuat_ophong_ngay_batdau=='') {
		 $xuat_ophong_ngay_batdau=date('2015/1/1');
	}
	session_start();
	$objExcel = new PHPExcel;
	$objExcel->setActiveSheetIndex(0);
	$sheet = $objExcel->getActiveSheet()->setTitle();
	$rowCount = 2;
	$sheet->setCellValue('A'.$rowCount,'Danh sách Sinh viên đang ở Ký túc xá  ngày '.date('d/m/Y',strtotime($xuat_ophong_ngay_batdau)).' đến ngày '.date('d/m/Y',strtotime($xuat_ophong_ngay_kethuc)) )->mergeCells('A2:'.'N2');
	$sheet->getStyle('A2:N2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$sheet->getStyle('A2:N2')->getFont()->setBold(true);
	$sheet->getStyle('A2:N2')->getFont()->setSize(20);
	$sheet->getStyle('A2:N2')->getFont()->setName("Times New Roman");
	$rowCount = 4;
	$sheet->setCellValue('A'.$rowCount,'STT');
	$sheet->setCellValue('B'.$rowCount,'Tòa nhà');
	$sheet->setCellValue('C'.$rowCount,'Phòng');
	$sheet->setCellValue('D'.$rowCount,'MSSV');
	$sheet->setCellValue('E'.$rowCount,'Họ và tên');
	$sheet->setCellValue('F'.$rowCount,'Ngày sinh');
	$sheet->setCellValue('G'.$rowCount,'Giới tính');
	$sheet->setCellValue('H'.$rowCount,'Quê quán');
	$sheet->setCellValue('I'.$rowCount,'SĐT');
	$sheet->setCellValue('J'.$rowCount,'Lớp');
	$sheet->setCellValue('K'.$rowCount,'Học Kỳ');
	$sheet->setCellValue('L'.$rowCount,'Năm học');
	$sheet->setCellValue('M'.$rowCount,'Ở từ ngày');
	$sheet->setCellValue('N'.$rowCount,'Ghi chú');
	$sheet->getColumnDimension("B")->setAutosize(true);// width âuto
	$sheet->getColumnDimension("C")->setAutosize(true); // width auto
	$sheet->getColumnDimension("D")->setAutosize(true); // width auto
	$sheet->getColumnDimension("E")->setAutosize(true); // width auto
	$sheet->getColumnDimension("F")->setAutosize(true); // width auto
	$sheet->getColumnDimension("G")->setAutosize(true); // width auto
	$sheet->getColumnDimension("H")->setAutosize(true); // width auto
	$sheet->getColumnDimension("I")->setAutosize(true); // width auto
	$sheet->getColumnDimension("J")->setAutosize(true); // width auto
	$sheet->getColumnDimension("K")->setAutosize(true); // width auto
	$sheet->getColumnDimension("L")->setAutosize(true); // width auto
	$sheet->getColumnDimension("M")->setAutosize(true); // width auto
	$sheet->getColumnDimension("N")->setAutosize(true); // width auto
	$sheet->getStyle('A4:N4')->getFont()->setBold(true);// chữ in đêm
	$sheet->getStyle('A4:N4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);// canh giữa
	$stt=1;
		
			include 'conn.php';
		if ($xuat_ophong_id_toanha!='') {
			$result = mysqli_query($con, "SELECT sinh_vien.id_sinhvien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv, sinh_vien.ngay_sinh, sinh_vien.gioi_tinh, sinh_vien.que_quan, sinh_vien.so_cmnd, sinh_vien.ngay_cap, sinh_vien.noi_cap, sinh_vien.matinh, sinh_vien.mahuyen, sinh_vien.maxa, sinh_vien.so_nha, sinh_vien.so_dt, sinh_vien.email, sinh_vien.hotencha, sinh_vien.sdtcha, sinh_vien.hotenme, sinh_vien.sdtme, sinh_vien.id_lop, phong.idphong, phong.ma_phong, toa_nha.ten_toa_nha, toa_nha.ma_toa_nha, toa_nha.id_toanha,toa_nha.loai_toa_nha, lop.id_lop, lop.ten_lop, o_phong.ngay_bat_dau , o_phong.id_ophong,o_phong.hoc_ky, o_phong.nam_hoc FROM toa_nha,sinh_vien, o_phong, phong, lop WHERE sinh_vien.xoa=0 and phong.id_toanha= $xuat_ophong_id_toanha and o_phong.ngay_ket_thuc IS NULL and ( o_phong.ngay_bat_dau BETWEEN '$xuat_ophong_ngay_batdau' and '$xuat_ophong_ngay_kethuc') AND o_phong.id_sinhvien= sinh_vien.id_sinhvien AND o_phong.id_phong=phong.idphong AND toa_nha.id_toanha = phong.id_toanha and sinh_vien.id_lop= lop.id_lop ORDER BY sinh_vien.id_sinhvien, o_phong.ngay_bat_dau, toa_nha.loai_toa_nha, toa_nha.ten_toa_nha, phong.ma_phong ");
		}else{
			$result = mysqli_query($con, "SELECT sinh_vien.id_sinhvien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv, sinh_vien.ngay_sinh, sinh_vien.gioi_tinh, sinh_vien.que_quan, sinh_vien.so_cmnd, sinh_vien.ngay_cap, sinh_vien.noi_cap, sinh_vien.matinh, sinh_vien.mahuyen, sinh_vien.maxa, sinh_vien.so_nha, sinh_vien.so_dt, sinh_vien.email, sinh_vien.hotencha, sinh_vien.sdtcha, sinh_vien.hotenme, sinh_vien.sdtme, sinh_vien.id_lop, phong.idphong, phong.ma_phong, toa_nha.ten_toa_nha, toa_nha.ma_toa_nha, toa_nha.id_toanha,toa_nha.loai_toa_nha, lop.id_lop, lop.ten_lop, o_phong.ngay_bat_dau , o_phong.id_ophong,o_phong.hoc_ky, o_phong.nam_hoc FROM toa_nha,sinh_vien, o_phong, phong, lop WHERE sinh_vien.xoa=0 and o_phong.ngay_ket_thuc IS NULL and ( o_phong.ngay_bat_dau BETWEEN '$xuat_ophong_ngay_batdau' and '$xuat_ophong_ngay_kethuc') AND o_phong.id_sinhvien= sinh_vien.id_sinhvien AND o_phong.id_phong=phong.idphong AND toa_nha.id_toanha = phong.id_toanha and sinh_vien.id_lop= lop.id_lop ORDER BY sinh_vien.id_sinhvien, o_phong.ngay_bat_dau, toa_nha.loai_toa_nha, toa_nha.ten_toa_nha, phong.ma_phong ");
		}
	$ngayhethong= strtotime(date("m/d/Y"));
	$ngay_hk2_1 = strtotime("1/1/".date("Y"));
	$ngayht_hk2_2= strtotime("5/30".date("Y"));
	$ngayht_hk_he_2 = strtotime("7/30/".date("Y"));
	$ngayht_hk1_1 = strtotime("12/30/".date("Y"));
	while($row_sinh_vien = mysqli_fetch_array($result)){

		$hoc_ky1 = $row_sinh_vien["hoc_ky"];
		if ( $hoc_ky1==2  && $ngayhethong >= $ngay_hk2_1 && $ngayhethong<=$ngayht_hk2_2  ) {
			$ghichu='';
		}else if ( $hoc_ky1=="Hè"  && $ngayhethong > $ngayht_hk2_2 && $ngayhethong<=$ngayht_hk_he_2  ) {
			$ghichu='';
		}else if ( $hoc_ky1==1  && $ngayhethong > $ngayht_hk_he_2 && $ngayhethong<=$ngayht_hk1_1  ) {
			$ghichu='';
		}else{
			$ghichu='Quá hạn';
		}
		$diachi2='';
		$diachi1='';
		// lấy địa chỉ
		$diachi = mysqli_fetch_array(mysqli_query($con, "SELECT xa.capxa, xa.tenxa, huyen.tenhuyen, huyen.caphuyen, tinh.tentinh FROM tinh INNER JOIN huyen ON tinh.matinh = huyen.matinh INNER JOIN xa ON huyen.mahuyen = xa.mahuyen WHERE xa.maxa = '$row_sinh_vien[maxa]'"));
		$diachi1=$row_sinh_vien['so_nha'].",".$diachi["capxa"] .$diachi['tenxa'].",".$diachi["caphuyen"].$diachi['tenhuyen'].",".$diachi['tentinh'];
		$diachi22 = mysqli_fetch_array(mysqli_query($con, "SELECT  tinh.tentinh FROM tinh  WHERE tinh.matinh = '$row_sinh_vien[que_quan]'"));
		$diachi2=$diachi22['tentinh'];
		//end địa chỉ
		// lấy tên lớp
		$lop = mysqli_fetch_array(mysqli_query($con, "SELECT lop.ma_lop FROM lop WHERE lop.xoa =0 AND lop.id_lop ='$row_sinh_vien[id_lop]'"));
		$lop1=$lop["ma_lop"];
		$rowCount++;
		$sheet->getStyle('A'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);// canh giữa
		$sheet->setCellValue('A'.$rowCount,$stt);
		$sheet->setCellValue('B'.$rowCount,strtoupper($row_sinh_vien['ma_toa_nha']));
		$sheet->setCellValue('C'.$rowCount,$row_sinh_vien['ma_phong']);
		$sheet->setCellValue('D'.$rowCount,$row_sinh_vien['mssv']);
		$sheet->setCellValue('E'.$rowCount,ucwords($row_sinh_vien['ho_sv'].' '.$row_sinh_vien['ten_sv']));
		$sheet->setCellValue('F'.$rowCount,date('d/m/Y', strtotime($row_sinh_vien['ngay_sinh'])));
		$sheet->setCellValue('G'.$rowCount,ucwords($row_sinh_vien['gioi_tinh']));
		$sheet->setCellValue('H'.$rowCount,$diachi2);
		$sheet->setCellValue('I'.$rowCount,$row_sinh_vien['so_dt']);
		$sheet->setCellValue('J'.$rowCount,strtoupper($lop1));
		$sheet->setCellValue('K'.$rowCount,$row_sinh_vien['hoc_ky']);
		$sheet->setCellValue('L'.$rowCount,$row_sinh_vien['nam_hoc']);
		$sheet->setCellValue('M'.$rowCount, date('d/m/Y', strtotime($row_sinh_vien['ngay_bat_dau'])));
		$sheet->setCellValue('N'.$rowCount,$ghichu);

		$sheet->getStyle('B'.$rowCount.':C'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('F'.$rowCount.':G'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('I'.$rowCount.':N'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$stt++;
	}
	$styleArray=  array(// khung
		'borders' => array(
			'allborders'=>array(
				'style'=> PHPExcel_Style_Border::BORDER_THIN
			)
		)
	);
	$sheet->getStyle('A4:N'.$rowCount)->applyFromArray($styleArray);
	$rowCount+=2;
	$sheet->setCellValue('I'.$rowCount,'Kiên Giang, Ngày '.date('d').' tháng ' . date('m').' năm '.date('Y'))->mergeCells('I'.$rowCount.':N'.$rowCount);
	$sheet->getStyle('I'.$rowCount.':N'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$rowCount+=1;
	$sheet->setCellValue('I'.$rowCount,'Người lập')->mergeCells('I'.$rowCount.':N'.$rowCount);
	$sheet->getStyle('I'.$rowCount.':N'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$rowCount+=4;
	$ten = mysqli_fetch_array(mysqli_query($con,"SELECT can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo WHERE can_bo.id_canbo='".$_SESSION['id_canbo']."'"));
	$ten_ne = $ten['ho_can_bo'].' '.$ten['ten_can_bo'];
	$sheet->setCellValue('I'.$rowCount,$ten_ne)->mergeCells('I'.$rowCount.':N'.$rowCount);
	$sheet->getStyle('I'.$rowCount.':N'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$sheet->getStyle('I'.$rowCount.':N'.$rowCount)->getFont()->setBold(true);
	$sheet->getStyle('A4:N'.$rowCount)->getFont()->setSize(13);
	$sheet->getStyle('A4:N'.$rowCount)->getFont()->setName("Times New Roman");
	$objWriter = new PHPExcel_Writer_Excel2007($objExcel);
	$tenfiel= strtotime(date('Y/m/d H:i:s'));
	$filename = 'sinhvieoktx'.$tenfiel.'.xlsx';
	$objWriter->save($filename);
	header('Content-Disposition: attachment; filename="' . $filename . '"');
	header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
	header('Content-Length: ' . filesize($filename));
	header('Content-Transfer-Encoding: binary');
	header('Cache-Control: must-revalidate');
	header('Pragma: no-cache');
	readfile($filename);
	return ;
}
if(isset($_POST['xuat_excel_da_ophpng'])){
	$timkiem_daophongngay_batdau=$_POST['timkiem_daophongngay_batdau'];
		$timkiem_daophongngay_kethuc=$_POST['timkiem_daophongngay_kethuc'];
		$timkiem_dang_ophong_id_toanha=$_POST['timkiem_dang_ophong_id_toanha'];
		if ($timkiem_daophongngay_kethuc=='') {
			$timkiem_daophongngay_kethuc=date('Y/m/d');
		}if ($timkiem_daophongngay_batdau=='') {
			 $timkiem_daophongngay_batdau=date('2015/1/1');
		}
	session_start();
	$objExcel = new PHPExcel;
	$objExcel->setActiveSheetIndex(0);
	$sheet = $objExcel->getActiveSheet()->setTitle();
	$rowCount = 2;
	$sheet->setCellValue('A'.$rowCount,'Danh sách Sinh viên đã ở Ký túc xá ngày '.date('d/m/Y',strtotime($timkiem_daophongngay_batdau)).' đến ngày '.date('d/m/Y',strtotime($timkiem_daophongngay_kethuc)))->mergeCells('A2:'.'N2');
	$sheet->getStyle('A2:N2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$sheet->getStyle('A2:N2')->getFont()->setBold(true);
	$sheet->getStyle('A2:N2')->getFont()->setSize(20);
	$sheet->getStyle('A2:N2')->getFont()->setName("Times New Roman");
	$rowCount = 4;
	$sheet->setCellValue('A'.$rowCount,'STT');
	$sheet->setCellValue('B'.$rowCount,'Tòa nhà');
	$sheet->setCellValue('C'.$rowCount,'Phòng');
	$sheet->setCellValue('D'.$rowCount,'MSSV');
	$sheet->setCellValue('E'.$rowCount,'Họ và tên');
	$sheet->setCellValue('F'.$rowCount,'Ngày sinh');
	$sheet->setCellValue('G'.$rowCount,'Giới tính');
	$sheet->setCellValue('H'.$rowCount,'Quê quán');
	$sheet->setCellValue('I'.$rowCount,'SĐT');
	$sheet->setCellValue('J'.$rowCount,'Lớp');
	$sheet->setCellValue('K'.$rowCount,'Học Kỳ');
	$sheet->setCellValue('L'.$rowCount,'Năm học');
	$sheet->setCellValue('M'.$rowCount,'Ở từ ngày');
	$sheet->setCellValue('N'.$rowCount,'Nghỉ từ ngày');
	$sheet->getColumnDimension("B")->setAutosize(true);// width âuto
	$sheet->getColumnDimension("C")->setAutosize(true); // width auto
	$sheet->getColumnDimension("D")->setAutosize(true); // width auto
	$sheet->getColumnDimension("E")->setAutosize(true); // width auto
	$sheet->getColumnDimension("F")->setAutosize(true); // width auto
	$sheet->getColumnDimension("G")->setAutosize(true); // width auto
	$sheet->getColumnDimension("H")->setAutosize(true); // width auto
	$sheet->getColumnDimension("I")->setAutosize(true); // width auto
	$sheet->getColumnDimension("J")->setAutosize(true); // width auto
	$sheet->getColumnDimension("K")->setAutosize(true); // width auto
	$sheet->getColumnDimension("L")->setAutosize(true); // width auto
	$sheet->getColumnDimension("M")->setAutosize(true); // width auto
	$sheet->getColumnDimension("N")->setAutosize(true); // width auto
	$sheet->getStyle('A4:N4')->getFont()->setBold(true);// chữ in đêm
	$sheet->getStyle('A4:N4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);// canh giữa
	$stt=1;
		
			include 'conn.php';
		if ($timkiem_dang_ophong_id_toanha!='') {
			$result = mysqli_query($con, "SELECT sinh_vien.id_sinhvien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv, sinh_vien.ngay_sinh, sinh_vien.gioi_tinh, sinh_vien.que_quan, sinh_vien.so_cmnd, sinh_vien.ngay_cap, sinh_vien.noi_cap, sinh_vien.matinh, sinh_vien.mahuyen, sinh_vien.maxa, sinh_vien.so_nha, sinh_vien.so_dt, sinh_vien.email, sinh_vien.hotencha, sinh_vien.sdtcha, sinh_vien.hotenme, sinh_vien.sdtme, sinh_vien.id_lop, phong.idphong, phong.ma_phong, toa_nha.ten_toa_nha, toa_nha.ma_toa_nha, toa_nha.id_toanha,toa_nha.loai_toa_nha, lop.id_lop, lop.ten_lop, o_phong.ngay_bat_dau , o_phong.ngay_ket_thuc,  o_phong.id_ophong,o_phong.hoc_ky, o_phong.nam_hoc FROM toa_nha,sinh_vien, o_phong, phong, lop WHERE sinh_vien.xoa=0 and phong.id_toanha= $timkiem_dang_ophong_id_toanha and o_phong.ngay_ket_thuc IS not NULL and ( o_phong.ngay_bat_dau BETWEEN '$timkiem_daophongngay_batdau' and '$timkiem_daophongngay_kethuc') AND o_phong.id_sinhvien= sinh_vien.id_sinhvien AND o_phong.id_phong=phong.idphong AND toa_nha.id_toanha = phong.id_toanha and sinh_vien.id_lop= lop.id_lop ORDER BY sinh_vien.id_sinhvien, o_phong.ngay_bat_dau, toa_nha.loai_toa_nha, toa_nha.ten_toa_nha, phong.ma_phong ");
		}else{
			$result = mysqli_query($con, "SELECT sinh_vien.id_sinhvien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv, sinh_vien.ngay_sinh, sinh_vien.gioi_tinh, sinh_vien.que_quan, sinh_vien.so_cmnd, sinh_vien.ngay_cap, sinh_vien.noi_cap, sinh_vien.matinh, sinh_vien.mahuyen, sinh_vien.maxa, sinh_vien.so_nha, sinh_vien.so_dt, sinh_vien.email, sinh_vien.hotencha, sinh_vien.sdtcha, sinh_vien.hotenme, sinh_vien.sdtme, sinh_vien.id_lop, phong.idphong, phong.ma_phong, toa_nha.ten_toa_nha, toa_nha.ma_toa_nha, toa_nha.id_toanha,toa_nha.loai_toa_nha, lop.id_lop, lop.ten_lop, o_phong.ngay_bat_dau ,  o_phong.ngay_ket_thuc, o_phong.id_ophong,o_phong.hoc_ky, o_phong.nam_hoc FROM toa_nha,sinh_vien, o_phong, phong, lop WHERE sinh_vien.xoa=0 and o_phong.ngay_ket_thuc IS not NULL and ( o_phong.ngay_bat_dau BETWEEN '$timkiem_daophongngay_batdau' and '$timkiem_daophongngay_kethuc') AND o_phong.id_sinhvien= sinh_vien.id_sinhvien AND o_phong.id_phong=phong.idphong AND toa_nha.id_toanha = phong.id_toanha and sinh_vien.id_lop= lop.id_lop ORDER BY sinh_vien.id_sinhvien, o_phong.ngay_bat_dau, toa_nha.loai_toa_nha, toa_nha.ten_toa_nha, phong.ma_phong ");
		}
	
	while($row_sinh_vien = mysqli_fetch_array($result)){
		$diachi2='';
		$diachi1='';
		// lấy địa chỉ
		$diachi = mysqli_fetch_array(mysqli_query($con, "SELECT xa.capxa, xa.tenxa, huyen.tenhuyen, huyen.caphuyen, tinh.tentinh FROM tinh INNER JOIN huyen ON tinh.matinh = huyen.matinh INNER JOIN xa ON huyen.mahuyen = xa.mahuyen WHERE xa.maxa = '$row_sinh_vien[maxa]'"));
		$diachi1=$row_sinh_vien['so_nha'].",".$diachi["capxa"] .$diachi['tenxa'].",".$diachi["caphuyen"].$diachi['tenhuyen'].",".$diachi['tentinh'];
		$diachi22 = mysqli_fetch_array(mysqli_query($con, "SELECT  tinh.tentinh FROM tinh  WHERE tinh.matinh = '$row_sinh_vien[que_quan]'"));
		$diachi2=$diachi22['tentinh'];
		//end địa chỉ
		// lấy tên lớp
		$lop = mysqli_fetch_array(mysqli_query($con, "SELECT lop.ma_lop FROM lop WHERE lop.xoa =0 AND lop.id_lop ='$row_sinh_vien[id_lop]'"));
		$lop1=$lop["ma_lop"];
		$rowCount++;
		$sheet->getStyle('A'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);// canh giữa
		$sheet->setCellValue('A'.$rowCount,$stt);
		$sheet->setCellValue('B'.$rowCount,strtoupper($row_sinh_vien['ma_toa_nha']));
		$sheet->setCellValue('C'.$rowCount,$row_sinh_vien['ma_phong']);
		$sheet->setCellValue('D'.$rowCount,$row_sinh_vien['mssv']);
		$sheet->setCellValue('E'.$rowCount,ucwords($row_sinh_vien['ho_sv'].' '.$row_sinh_vien['ten_sv']));
		$sheet->setCellValue('F'.$rowCount,date('d/m/Y', strtotime($row_sinh_vien['ngay_sinh'])));
		$sheet->setCellValue('G'.$rowCount,$row_sinh_vien['gioi_tinh']);
		$sheet->setCellValue('H'.$rowCount,$diachi2);
		$sheet->setCellValue('I'.$rowCount,$row_sinh_vien['so_dt']);
		$sheet->setCellValue('J'.$rowCount,strtoupper($lop1));
		$sheet->setCellValue('K'.$rowCount,$row_sinh_vien['hoc_ky']);
		$sheet->setCellValue('L'.$rowCount,$row_sinh_vien['nam_hoc']);
		$sheet->setCellValue('M'.$rowCount, date('d/m/Y', strtotime($row_sinh_vien['ngay_bat_dau'])));
		$sheet->setCellValue('N'.$rowCount, date('d/m/Y', strtotime($row_sinh_vien['ngay_ket_thuc'])));
		$sheet->getStyle('B'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('C'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('F'.$rowCount.':G'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('I'.$rowCount.':N'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$stt++;
	}
	$styleArray=  array(// khung
		'borders' => array(
			'allborders'=>array(
				'style'=> PHPExcel_Style_Border::BORDER_THIN
			)
		)
	);
	$sheet->getStyle('A4:'.'N'.$rowCount)->applyFromArray($styleArray);
	$rowCount+=1;
	$sheet->setCellValue('I'.$rowCount,'Kiên Giang, Ngày '.date('d').' tháng ' . date('m').' năm '.date('Y'))->mergeCells('I'.$rowCount.':N'.$rowCount);
	$sheet->getStyle('I'.$rowCount.':N'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$rowCount+=1;
	$sheet->setCellValue('I'.$rowCount,'Người lập')->mergeCells('I'.$rowCount.':N'.$rowCount);
	$sheet->getStyle('I'.$rowCount.':N'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$rowCount+=4;
	$ten = mysqli_fetch_array(mysqli_query($con,"SELECT can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo WHERE can_bo.id_canbo='".$_SESSION['id_canbo']."'"));
	$ten_ne = $ten['ho_can_bo'].' '.$ten['ten_can_bo'];
	$sheet->setCellValue('I'.$rowCount,$ten_ne)->mergeCells('I'.$rowCount.':N'.$rowCount);
	$sheet->getStyle('I'.$rowCount.':N'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$sheet->getStyle('I'.$rowCount.':N'.$rowCount)->getFont()->setBold(true);
	$sheet->getStyle('A4:N'.$rowCount)->getFont()->setSize(13);
	$sheet->getStyle('A4:N'.$rowCount)->getFont()->setName("Times New Roman");
	$objWriter = new PHPExcel_Writer_Excel2007($objExcel);
	$tenfiel= strtotime(date('Y/m/d H:i:s'));
	$filename = 'danh_sach_sinh_vien_da_o_ktx'.$tenfiel.'.xlsx';
	$objWriter->save($filename);
	header('Content-Disposition: attachment; filename="' . $filename . '"');
	header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
	header('Content-Length: ' . filesize($filename));
	header('Content-Transfer-Encoding: binary');
	header('Cache-Control: must-revalidate');
	header('Pragma: no-cache');
	readfile($filename);
	return ;
}
?>
