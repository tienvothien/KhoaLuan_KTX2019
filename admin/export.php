<?php

require('./../Classes/PHPExcel.php');
include './../dulieu/conn.php';
	$objExcel = new PHPExcel;
	$objExcel->setActiveSheetIndex(0);
	$sheet = $objExcel->getActiveSheet()->setTitle();

	$rowCount = 2;
	$sheet->setCellValue('A'.$rowCount,'Danh sách thiết bị')->mergeCells('A2:'.'C2');
	$sheet->getStyle('A2:C2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$sheet->getStyle('A2:C2')->getFont()->setBold(true);
	$rowCount = 4;
	$sheet->setCellValue('A'.$rowCount,'STT');
	$sheet->setCellValue('B'.$rowCount,'Mã thiết bị');
	$sheet->setCellValue('C'.$rowCount,'tên thiết bị');
	$sheet->getColumnDimension("B")->setAutosize(true);
	$sheet->getColumnDimension("C")->setAutosize(true); // width auto
	$sheet->getStyle('A4:C4')->getFont()->setBold(true);// chữ in đêm
	$sheet->getStyle('A4:C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);// canh giữa
	$stt=1;
	$result = mysqli_query($con,"SELECT thietbi.mathietbi, thietbi.tenthietbi FROM thietbi WHERE thietbi.xoa=0");
	while($row = mysqli_fetch_array($result)){
		$rowCount++;
		$sheet->getStyle('A'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);// canh giữa
		$sheet->setCellValue('A'.$rowCount,$stt);
		$sheet->setCellValue('B'.$rowCount,$row['mathietbi']);
		$sheet->setCellValue('C'.$rowCount,$row['tenthietbi']);
		$stt++;

	}

	$styleArray=  array(
		'borders' => array(
			'allborders'=>array(
				'style'=> PHPExcel_Style_Border::BORDER_THIN
			)
		 )
	 );
	$sheet->getStyle('A4:'.'C'.$rowCount)->applyFromArray($styleArray);
	$objWriter = new PHPExcel_Writer_Excel2007($objExcel);
	$tenfiel= strtotime(date('Y/m/d H:i:s'));
	$filename = 'thietbi-'.$tenfiel.'.xlsx';
	$objWriter->save($filename);

	header('Content-Disposition: attachment; filename="' . $filename . '"');  
	header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');  
	header('Content-Length: ' . filesize($filename));  
	header('Content-Transfer-Encoding: binary');  
	header('Cache-Control: must-revalidate');  
	header('Pragma: no-cache');  
	readfile($filename);  
	return;



?>
