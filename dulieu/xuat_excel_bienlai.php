<?php
require('./../Classes/PHPExcel.php');
include './../dulieu/conn.php';
if(isset($_POST['timkiem_bien_lai_ngay_batdau']) ){
	session_start();
		$timkiem_bien_lai_ngay_batdau=$_POST['timkiem_bien_lai_ngay_batdau'];
		$timkiem_bien_laigngay_kethuc=$_POST['timkiem_bien_laigngay_kethuc'];
		$timkiem_bien_lai_id_toanha=$_POST['timkiem_bien_lai_id_toanha'];
		$timkiem_bien_lai_loai_tien=$_POST['timkiem_bien_lai_loai_tien'];
		if ($timkiem_bien_lai_ngay_batdau=='') {
			$timkiem_bien_lai_ngay_batdau='2015/1/1';
		}
		if ($timkiem_bien_laigngay_kethuc=='') {
			$timkiem_bien_laigngay_kethuc=date("Y/m/d");
		}
	$objExcel = new PHPExcel;
	$objExcel->setActiveSheetIndex(0);
	$sheet = $objExcel->getActiveSheet()->setTitle();
	$rowCount = 2;
	$sheet->setCellValue('A'.$rowCount,'Danh sách Sinh viên đón Biên lai từ ngày '.date("d/m/Y", strtotime($timkiem_bien_lai_ngay_batdau)).' đến ngày '.date("d/m/Y", strtotime($timkiem_bien_laigngay_kethuc )))->mergeCells('A2:'.'J2');
	$sheet->getStyle('A2:J2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$sheet->getStyle('A2:J2')->getFont()->setBold(true);
	$sheet->getStyle('A2:J2')->getFont()->setSize(20);
	$sheet->getStyle('A2:J2')->getFont()->setName("Times New Roman");
	$rowCount = 4;
	$sheet->setCellValue('A'.$rowCount,'STT');
	$sheet->setCellValue('B'.$rowCount,'MSSV');
	$sheet->setCellValue('C'.$rowCount,'Họ và tên');
	$sheet->setCellValue('D'.$rowCount,'Phòng');
	$sheet->setCellValue('E'.$rowCount,'Số tiền');
	$sheet->setCellValue('F'.$rowCount,'Số biên lai');
	$sheet->setCellValue('G'.$rowCount,'Ngày đón');
	$sheet->setCellValue('H'.$rowCount,'Loại');
	$sheet->setCellValue('I'.$rowCount,'Người thu');
	$sheet->setCellValue('J'.$rowCount,'Mã CB');
	
	$sheet->getColumnDimension("B")->setAutosize(true);// width âuto
	$sheet->getColumnDimension("C")->setAutosize(true); // width auto
	$sheet->getColumnDimension("D")->setAutosize(true); // width auto
	$sheet->getColumnDimension("E")->setAutosize(true); // width auto
	$sheet->getColumnDimension("F")->setAutosize(true); // width auto
	$sheet->getColumnDimension("G")->setAutosize(true); // width auto
	$sheet->getColumnDimension("H")->setAutosize(true); // width auto
	$sheet->getColumnDimension("I")->setAutosize(true); // width auto
	$sheet->getColumnDimension("J")->setAutosize(true); // width auto
	
	$sheet->getStyle('A4:J4')->getFont()->setBold(true);// chữ in đêm
	$sheet->getStyle('A4:J4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);// canh giữa
	$stt=1;
	include 'conn.php';
	if ($timkiem_bien_lai_id_toanha!='' && $timkiem_bien_lai_loai_tien!='') {
			$result = mysqli_query($con, "SELECT bien_lai.id AS id_bl, bien_lai.so_bien_lai, bien_lai.so_tien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv, phong.ma_phong, toa_nha.ma_toa_nha, toa_nha.ten_toa_nha, loai_bien_lai.ten_bien_lai, bien_lai.ngay_them, bien_lai.id_canbo, can_bo.ma_can_bo, can_bo.ho_can_bo,can_bo.ten_can_bo FROM bien_lai, sinh_vien, phong, toa_nha, loai_bien_lai, can_bo WHERE toa_nha.id_toanha='$timkiem_bien_lai_id_toanha' and bien_lai.id_sinhvien= sinh_vien.id_sinhvien AND phong.idphong= bien_lai.id_phong AND toa_nha.id_toanha=phong.id_toanha AND bien_lai.id_loai_bien_lai = loai_bien_lai.id AND can_bo.id_canbo=bien_lai.id_canbo and bien_lai.ngay_them >= '$timkiem_bien_lai_ngay_batdau' and bien_lai.ngay_them <= '$timkiem_bien_laigngay_kethuc' and bien_lai.id_loai_bien_lai='$timkiem_bien_lai_loai_tien' order by bien_lai.ngay_them DESC");
		}else if ($timkiem_bien_lai_id_toanha=='' && $timkiem_bien_lai_loai_tien!='') {
			$result = mysqli_query($con, "SELECT bien_lai.id AS id_bl, bien_lai.so_bien_lai, bien_lai.so_tien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv, phong.ma_phong, toa_nha.ma_toa_nha, toa_nha.ten_toa_nha, loai_bien_lai.ten_bien_lai, bien_lai.ngay_them, bien_lai.id_canbo, can_bo.ma_can_bo, can_bo.ho_can_bo,can_bo.ten_can_bo FROM bien_lai, sinh_vien, phong, toa_nha, loai_bien_lai, can_bo WHERE bien_lai.id_sinhvien= sinh_vien.id_sinhvien AND phong.idphong= bien_lai.id_phong AND toa_nha.id_toanha=phong.id_toanha AND bien_lai.id_loai_bien_lai = loai_bien_lai.id AND can_bo.id_canbo=bien_lai.id_canbo and bien_lai.ngay_them >= '$timkiem_bien_lai_ngay_batdau' and bien_lai.ngay_them <= '$timkiem_bien_laigngay_kethuc' and bien_lai.id_loai_bien_lai='$timkiem_bien_lai_loai_tien' order by bien_lai.ngay_them DESC");
		}else if ($timkiem_bien_lai_id_toanha!='' && $timkiem_bien_lai_loai_tien=='') {
			$result = mysqli_query($con, "SELECT bien_lai.id AS id_bl, bien_lai.so_bien_lai, bien_lai.so_tien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv, phong.ma_phong, toa_nha.ma_toa_nha, toa_nha.ten_toa_nha, loai_bien_lai.ten_bien_lai, bien_lai.ngay_them, bien_lai.id_canbo, can_bo.ma_can_bo, can_bo.ho_can_bo,can_bo.ten_can_bo FROM bien_lai, sinh_vien, phong, toa_nha, loai_bien_lai, can_bo WHERE toa_nha.id_toanha='$timkiem_bien_lai_id_toanha' and bien_lai.id_sinhvien= sinh_vien.id_sinhvien AND phong.idphong= bien_lai.id_phong AND toa_nha.id_toanha=phong.id_toanha AND bien_lai.id_loai_bien_lai = loai_bien_lai.id AND can_bo.id_canbo=bien_lai.id_canbo and bien_lai.ngay_them >= '$timkiem_bien_lai_ngay_batdau' and bien_lai.ngay_them <= '$timkiem_bien_laigngay_kethuc'  order by bien_lai.ngay_them DESC");
		}else{
			$result = mysqli_query($con, "SELECT bien_lai.id AS id_bl, bien_lai.so_bien_lai, bien_lai.so_tien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv, phong.ma_phong, toa_nha.ma_toa_nha, toa_nha.ten_toa_nha, loai_bien_lai.ten_bien_lai, bien_lai.ngay_them, bien_lai.id_canbo, can_bo.ma_can_bo, can_bo.ho_can_bo,can_bo.ten_can_bo FROM bien_lai, sinh_vien, phong, toa_nha, loai_bien_lai, can_bo WHERE  (bien_lai.ngay_them BETWEEN '$timkiem_bien_lai_ngay_batdau' and '$timkiem_bien_laigngay_kethuc') and bien_lai.id_sinhvien= sinh_vien.id_sinhvien AND phong.idphong= bien_lai.id_phong AND toa_nha.id_toanha=phong.id_toanha AND bien_lai.id_loai_bien_lai = loai_bien_lai.id AND can_bo.id_canbo=bien_lai.id_canbo order by bien_lai.ngay_them DESC");
		}
		$tong=0;
		$tong_tien=0;
	while($row_sinh_vien = mysqli_fetch_array($result)){
		$tong_tien+=$row_sinh_vien["so_tien"];
			$rowCount++;
			$sheet->getStyle('A'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);// canh giữa
			$sheet->setCellValue('A'.$rowCount,$stt);
			$sheet->setCellValue('B'.$rowCount,$row_sinh_vien['mssv']);
			$sheet->setCellValue('C'.$rowCount,ucwords($row_sinh_vien['ho_sv'].' '.$row_sinh_vien['ten_sv']));
			$sheet->setCellValue('D'.$rowCount,strtoupper($row_sinh_vien['ma_phong'].' - '.$row_sinh_vien['ma_toa_nha']));
			$sheet->setCellValue('E'.$rowCount,$row_sinh_vien['so_tien']);
			$sheet->setCellValue('F'.$rowCount,$row_sinh_vien['so_bien_lai']);
			$sheet->setCellValue('G'.$rowCount,date('d/m/Y', strtotime($row_sinh_vien['ngay_them'])));
			$sheet->setCellValue('H'.$rowCount,$row_sinh_vien['ten_bien_lai']);
			$sheet->setCellValue('I'.$rowCount,ucwords($row_sinh_vien['ho_can_bo'].' '.$row_sinh_vien['ten_can_bo']));
			$sheet->setCellValue('J'.$rowCount,$row_sinh_vien['ma_can_bo']);
			$sheet->getStyle('B'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('D'.$rowCount.':G'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('I'.$rowCount.':J'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$stt++;
	}
	$styleArray=  array(// khung
		'borders' => array(
			'allborders'=>array(
				'style'=> PHPExcel_Style_Border::BORDER_THIN
			)
		)
	);
	$rowCount+=1;
	$sheet->setCellValue('A'.$rowCount,'Tổng')->mergeCells('A'.$rowCount.':C'.$rowCount);
	$sheet->setCellValue('E'.$rowCount,$tong_tien);
	$sheet->getStyle('A4:'.'J'.$rowCount)->applyFromArray($styleArray);
	
	$rowCount+=2;
	$sheet->setCellValue('G'.$rowCount,'Kiên Giang, Ngày '.date('d').' tháng ' . date('m').' năm '.date('Y'))->mergeCells('G'.$rowCount.':J'.$rowCount);
	$sheet->getStyle('G'.$rowCount.':J'.$rowCount)->getFont()->setItalic(true);
	$sheet->getStyle('G'.$rowCount.':J'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$rowCount+=1;
	$sheet->setCellValue('G'.$rowCount,'Người lập')->mergeCells('G'.$rowCount.':J'.$rowCount);
	$sheet->getStyle('G'.$rowCount.':J'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$rowCount+=4;
	$ten = mysqli_fetch_array(mysqli_query($con,"SELECT can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo WHERE can_bo.id_canbo='".$_SESSION['id_canbo']."'"));
	$ten_ne = $ten['ho_can_bo'].' '.$ten['ten_can_bo'];
	$sheet->setCellValue('G'.$rowCount,ucwords($ten_ne))->mergeCells('G'.$rowCount.':J'.$rowCount);
	$sheet->getStyle('G'.$rowCount.':J'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$sheet->getStyle('G'.$rowCount.':J'.$rowCount)->getFont()->setBold(true);
	$sheet->getStyle('A4:J'.$rowCount)->getFont()->setSize(13);
	$sheet->getStyle('A4:J'.$rowCount)->getFont()->setName("Times New Roman");
	$objWriter = new PHPExcel_Writer_Excel2007($objExcel);
	$tenfiel= strtotime(date('Y/m/d H:i:s'));
	$filename = 'danh_sach_sinh_vien_don_tien'.$tenfiel.'.xlsx';
	$objWriter->save($filename);
	header('Content-Disposition: attachment; filename="' . $filename . '"');
	header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
	header('Content-Length: ' . filesize($filename));
	header('Content-Transfer-Encoding: binary');
	header('Cache-Control: must-revalidate');
	header('Pragma: no-cache');
	readfile($filename);
	return ;
	echo "1";
}
?>