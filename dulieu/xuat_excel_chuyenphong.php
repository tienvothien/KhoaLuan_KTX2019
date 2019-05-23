<?php
require('./../Classes/PHPExcel.php');
include './../dulieu/conn.php';
if(isset($_POST['xuat_excel_chuyenphong']) ){
	session_start();
		$timkiem_dang_ophongngay_batdau=$_POST['timkiem_dang_ophongngay_batdau'];
		$timkiem_dang_ophongngay_kethuc=$_POST['timkiem_dang_ophongngay_kethuc'];
		$timkiem_dang_ophong_id_toanha=$_POST['timkiem_dang_ophong_id_toanha'];
		$timkiem_dang_ophong_idphong=$_POST['timkiem_dang_ophong_idphong'];
		if ($timkiem_dang_ophongngay_batdau=='') {
			$timkiem_dang_ophongngay_batdau='2015/1/1';
		}
		if ($timkiem_dang_ophongngay_kethuc=='') {
			$timkiem_dang_ophongngay_kethuc=date("Y/m/d");
		}
	$objExcel = new PHPExcel;
	$objExcel->setActiveSheetIndex(0);
	$sheet = $objExcel->getActiveSheet()->setTitle();
	$rowCount = 2;
	$sheet->setCellValue('A'.$rowCount,'Danh sách Sinh viên chuyển phòng từ ngày '.date("d/m/Y", strtotime($timkiem_dang_ophongngay_batdau)).' đến ngày '.date("d/m/Y", strtotime($timkiem_dang_ophongngay_kethuc )))->mergeCells('A2:'.'H2');
	$sheet->getStyle('A2:H2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$sheet->getStyle('A2:H2')->getFont()->setBold(true);
	$sheet->getStyle('A2:H2')->getFont()->setSize(20);
	$sheet->getStyle('A2:H2')->getFont()->setName("Times New Roman");
	$rowCount = 4;
	$sheet->setCellValue('A'.$rowCount,'STT');
	$sheet->setCellValue('B'.$rowCount,'MSSV');
	$sheet->setCellValue('C'.$rowCount,'Họ và tên');
	$sheet->setCellValue('D'.$rowCount,'Từ phòng');
	$sheet->setCellValue('E'.$rowCount,'Sang phòng');
	$sheet->setCellValue('F'.$rowCount,'Người chuyển');
	$sheet->setCellValue('G'.$rowCount,'Mã CB');
	$sheet->setCellValue('H'.$rowCount,'Thời gian');
	
	
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
	if ($timkiem_dang_ophong_idphong=='' && $timkiem_dang_ophong_id_toanha!='') {
		$selecet_khoa = mysqli_query($con, "SELECT DISTINCT log_sua_dl.idlog, log_sua_dl.bangsua, log_sua_dl.tenbang, log_sua_dl.iddulieu, log_sua_dl.cot, log_sua_dl.tencot, log_sua_dl.noidungtruocsua, log_sua_dl.noidungsausua, log_sua_dl.nguoisua, log_sua_dl.ngaysua FROM log_sua_dl, toa_nha, phong WHERE log_sua_dl.bangsua='o_phong' AND toa_nha.id_toanha='$timkiem_dang_ophong_id_toanha' AND phong.id_toanha=toa_nha.id_toanha AND(log_sua_dl.noidungtruocsua=phong.idphong or log_sua_dl.noidungsausua =phong.idphong) AND (log_sua_dl.ngaysua BETWEEN '$timkiem_dang_ophongngay_batdau' AND '$timkiem_dang_ophongngay_kethuc')ORDER BY ngaysua DESC");
	}else if ($timkiem_dang_ophong_idphong!='') {
		$selecet_khoa = mysqli_query($con, "SELECT * FROM log_sua_dl WHERE log_sua_dl.bangsua='o_phong' AND (log_sua_dl.noidungtruocsua='$timkiem_dang_ophong_idphong' or log_sua_dl.noidungsausua ='$timkiem_dang_ophong_idphong') AND (log_sua_dl.ngaysua BETWEEN '$timkiem_dang_ophongngay_batdau' AND '$timkiem_dang_ophongngay_kethuc') ORDER BY ngaysua DESC");
	}else{
		$selecet_khoa = mysqli_query($con, "SELECT * FROM log_sua_dl WHERE log_sua_dl.bangsua='o_phong' AND  (log_sua_dl.ngaysua BETWEEN '$timkiem_dang_ophongngay_batdau' AND '$timkiem_dang_ophongngay_kethuc') ORDER BY ngaysua DESC");
		
	}	
	while($row_sinh_vien = mysqli_fetch_array($selecet_khoa)){
		// Thông tin các bộ
		$canbotdoi = mysqli_fetch_array(mysqli_query($con, "SELECT  can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo WHERE id_canbo='$row_sinh_vien[nguoisua]'"));
		// thông tin lớp
		$tt_sinh_vien = mysqli_fetch_array(mysqli_query($con, "SELECT  sinh_vien.mssv, sinh_vien.ten_sv, sinh_vien.ho_sv FROM sinh_vien, o_phong WHERE o_phong.id_ophong='$row_sinh_vien[iddulieu]'  and o_phong.id_sinhvien= sinh_vien.id_sinhvien"));
		$tt_ptrc = mysqli_fetch_array(mysqli_query($con, "SELECT  phong.ma_phong, toa_nha.ma_toa_nha from phong, toa_nha where phong.idphong= $row_sinh_vien[noidungtruocsua] and toa_nha.id_toanha= phong.id_toanha"));
		$tt_p_S = mysqli_fetch_array(mysqli_query($con, "SELECT  phong.ma_phong, toa_nha.ma_toa_nha from phong, toa_nha where phong.idphong= $row_sinh_vien[noidungsausua] and toa_nha.id_toanha= phong.id_toanha"));
					// thông tin khoa sửa của lớp
			$rowCount++;
			$sheet->getStyle('A'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);// canh giữa
			$sheet->setCellValue('A'.$rowCount,$stt);
			$sheet->setCellValue('B'.$rowCount,$tt_sinh_vien['mssv']);
			$sheet->setCellValue('C'.$rowCount,$tt_sinh_vien['ho_sv'].' '.$tt_sinh_vien['ten_sv']);
			$sheet->setCellValue('D'.$rowCount,$tt_ptrc['ma_phong'].' - '.$tt_ptrc['ma_toa_nha']);
			$sheet->setCellValue('E'.$rowCount,$tt_p_S['ma_phong'].' - '.$tt_p_S['ma_toa_nha']);
			$sheet->setCellValue('F'.$rowCount,$canbotdoi['ho_can_bo'].' '.$canbotdoi['ten_can_bo']);
			$sheet->setCellValue('G'.$rowCount,$canbotdoi['ma_can_bo']);
			$sheet->setCellValue('H'.$rowCount,date("d/m/Y H:i:s", strtotime($row_sinh_vien['ngaysua'])));
			$sheet->getStyle('B'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('D'.$rowCount.':E'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('G'.$rowCount.':H'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
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
	
	$rowCount+=2;
	$sheet->setCellValue('E'.$rowCount,'Kiên Giang, Ngày '.date('d').' tháng ' . date('m').' năm '.date('Y'))->mergeCells('E'.$rowCount.':H'.$rowCount);
	$sheet->getStyle('E'.$rowCount.':H'.$rowCount)->getFont()->setItalic(true);
	$sheet->getStyle('E'.$rowCount.':H'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$rowCount+=1;
	$sheet->setCellValue('E'.$rowCount,'Người lập')->mergeCells('E'.$rowCount.':H'.$rowCount);
	$sheet->getStyle('E'.$rowCount.':H'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$rowCount+=4;
	$ten = mysqli_fetch_array(mysqli_query($con,"SELECT can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo WHERE can_bo.id_canbo='".$_SESSION['id_canbo']."'"));
	$ten_ne = $ten['ho_can_bo'].' '.$ten['ten_can_bo'];
	$sheet->setCellValue('E'.$rowCount,$ten_ne)->mergeCells('E'.$rowCount.':H'.$rowCount);
	$sheet->getStyle('E'.$rowCount.':H'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$sheet->getStyle('E'.$rowCount.':H'.$rowCount)->getFont()->setBold(true);
	$sheet->getStyle('A4:H'.$rowCount)->getFont()->setSize(13);
	$sheet->getStyle('A4:H'.$rowCount)->getFont()->setName("Times New Roman");
	$objWriter = new PHPExcel_Writer_Excel2007($objExcel);
	$tenfiel= strtotime(date('Y/m/d H:i:s'));
	$filename = 'danh_sach_sinh_vien_chuyen_phong'.$tenfiel.'.xlsx';
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