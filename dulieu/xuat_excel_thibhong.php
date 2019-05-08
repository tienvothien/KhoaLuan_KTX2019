<?php
require('./../Classes/PHPExcel.php');
include './../dulieu/conn.php';
if(isset($_POST['xuat_excel_thibhong'])){
	session_start();
	$objExcel = new PHPExcel;
	$objExcel->setActiveSheetIndex(0);
	$sheet = $objExcel->getActiveSheet()->setTitle();
	$rowCount = 2;
	$sheet->setCellValue('A'.$rowCount,'Danh sách Thiết bị hỏng đến ngày '.date('d/m/Y'))->mergeCells('A2:H2');
	$sheet->getStyle('A2:H2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$sheet->getStyle('A2:H2')->getFont()->setBold(true);
	$sheet->getStyle('A2:H2')->getFont()->setSize(20);
	$sheet->getStyle('A2:H2')->getFont()->setName("Times New Roman");
	$rowCount = 4;
	$sheet->setCellValue('A'.$rowCount,'STT');
	$sheet->setCellValue('B'.$rowCount,'Phòng');
	$sheet->setCellValue('C'.$rowCount,'Thiết bị');
	$sheet->setCellValue('D'.$rowCount,'Số thiết bị (Cái)');
	$sheet->setCellValue('E'.$rowCount,'Số hỏng (cái)');
	$sheet->setCellValue('F'.$rowCount,'Ngày kiểm tra');
	$sheet->setCellValue('G'.$rowCount,'Người kiểm tra');
	$sheet->setCellValue('H'.$rowCount,'MÃ cán bộ');
	
	$sheet->getColumnDimension("B")->setAutosize(true);// width âuto
	$sheet->getColumnDimension("C")->setAutosize(true); // width auto
	$sheet->getColumnDimension("D")->setAutosize(true); // width auto
	$sheet->getColumnDimension("E")->setAutosize(true); // width auto
	$sheet->getColumnDimension("F")->setAutosize(true); // width auto
	$sheet->getColumnDimension("G")->setAutosize(true); // width auto
	$sheet->getColumnDimension("H")->setAutosize(true); // width auto
	
	$sheet->getStyle('A4:H4')->getFont()->setBold(true);// chữ in đêm
	$sheet->getStyle('A4:H4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);// canh giữa
	$stt=1;
	include 'conn.php';
	$result = mysqli_query($con, "SELECT phong.idphong, phong.ma_phong, toa_nha.ma_toa_nha, toa_nha.ten_toa_nha, ctb.idtb, ctb.soluong, thietbi.tenthietbi , tr.slhong, tr.ngay_kt, tr.can_bo_kt, can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo FROM tinhtrang_thietbi_phong tr, loaiphongcothietbi ctb, phong, thietbi, toa_nha, can_bo WHERE tr.xoa=0 AND tr.idcothietbi = ctb.idcothietbi AND ctb.xoa=0 AND tr.idphong=phong.idphong AND ctb.idtb = thietbi.idtb AND toa_nha.id_toanha= phong.id_toanha AND can_bo.id_canbo = tr.can_bo_kt ORDER BY toa_nha.ten_toa_nha, phong.ma_phong");
	while($row_sinh_vien = mysqli_fetch_array($result)){
		
		$rowCount++;
		$sheet->getStyle('A'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);// canh giữa
		$sheet->setCellValue('A'.$rowCount,$stt);
		$sheet->setCellValue('B'.$rowCount,$row_sinh_vien['ma_phong'] .'-'.$row_sinh_vien['ma_toa_nha']);
		$sheet->setCellValue('C'.$rowCount,$row_sinh_vien['tenthietbi']);
		$sheet->setCellValue('D'.$rowCount,$row_sinh_vien['soluong']);
		$sheet->setCellValue('E'.$rowCount,$row_sinh_vien['slhong']);
		$sheet->setCellValue('F'.$rowCount,date("d/m/Y", strtotime($row_sinh_vien['ngay_kt'])));
		$sheet->setCellValue('G'.$rowCount,$row_sinh_vien['ho_can_bo'] .' ' .$row_sinh_vien['ten_can_bo']);
		$sheet->setCellValue('H'.$rowCount,$row_sinh_vien['ma_can_bo']);
		
		$sheet->getStyle('B'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('D'.$rowCount.':F'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('H'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$stt++;
	}
	$styleArray=  array(// khung
		'borders' => array(
			'allborders'=>array(
				'style'=> PHPExcel_Style_Border::BORDER_THIN
			)
		)
	);
	$sheet->getStyle('A4:'.'H'.$rowCount)->applyFromArray($styleArray);
	$rowCount+=1;
	$sheet->setCellValue('F'.$rowCount,'Kiên Giang, Ngày '.date('d').' tháng ' . date('m').' năm '.date('Y'))->mergeCells('F'.$rowCount.':H'.$rowCount);
	$sheet->getStyle('F'.$rowCount.':H'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$rowCount+=1;
	$sheet->setCellValue('F'.$rowCount,'Người lập')->mergeCells('F'.$rowCount.':H'.$rowCount);
	$sheet->getStyle('F'.$rowCount.':H'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$rowCount+=4;
	$ten = mysqli_fetch_array(mysqli_query($con,"SELECT can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo WHERE can_bo.id_canbo='".$_SESSION['id_canbo']."'"));
	$ten_ne = $ten['ho_can_bo'].' '.$ten['ten_can_bo'];
	$sheet->setCellValue('F'.$rowCount,$ten_ne)->mergeCells('F'.$rowCount.':H'.$rowCount);
	$sheet->getStyle('F'.$rowCount.':H'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$sheet->getStyle('F'.$rowCount.':H'.$rowCount)->getFont()->setBold(true);
	$sheet->getStyle('A4:H'.$rowCount)->getFont()->setSize(13);
	$sheet->getStyle('A4:H'.$rowCount)->getFont()->setName("Times New Roman");
	$objWriter = new PHPExcel_Writer_Excel2007($objExcel);
	$tenfiel= strtotime(date('Y/m/d H:i:s'));
	$filename = 'danh_sach_thiet_bi_hong'.$tenfiel.'.xlsx';
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
