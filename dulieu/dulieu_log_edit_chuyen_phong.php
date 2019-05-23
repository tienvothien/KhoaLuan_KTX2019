<?php
include 'conn.php';
if (isset($_POST['timkiem_dang_ophongngay_batdau'])) {
	 $timkiem_dang_ophongngay_batdau=$_POST['timkiem_dang_ophongngay_batdau'];
	 $timkiem_dang_ophongngay_kethuc=$_POST['timkiem_dang_ophongngay_kethuc'];
	 $timkiem_dang_ophong_id_toanha=$_POST['timkiem_dang_ophong_id_toanha'];
	 $timkiem_dang_ophong_idphong=$_POST['timkiem_dang_ophong_idphong'];
	if ($timkiem_dang_ophongngay_kethuc=='') {
	 	$timkiem_dang_ophongngay_kethuc=date('Y/m/d 23:00:00');
	}if ($timkiem_dang_ophongngay_batdau=='') {
		  $timkiem_dang_ophongngay_batdau=date('2015/1/1');
	}
	if ($timkiem_dang_ophong_idphong=='' && $timkiem_dang_ophong_id_toanha!='') {
		$selecet_khoa = mysqli_query($con, "SELECT DISTINCT log_sua_dl.idlog, log_sua_dl.bangsua, log_sua_dl.tenbang, log_sua_dl.iddulieu, log_sua_dl.cot, log_sua_dl.tencot, log_sua_dl.noidungtruocsua, log_sua_dl.noidungsausua, log_sua_dl.nguoisua, log_sua_dl.ngaysua FROM log_sua_dl, toa_nha, phong WHERE log_sua_dl.bangsua='o_phong' AND toa_nha.id_toanha='$timkiem_dang_ophong_id_toanha' AND phong.id_toanha=toa_nha.id_toanha AND(log_sua_dl.noidungtruocsua=phong.idphong or log_sua_dl.noidungsausua =phong.idphong) AND (log_sua_dl.ngaysua BETWEEN '$timkiem_dang_ophongngay_batdau' AND '$timkiem_dang_ophongngay_kethuc')ORDER BY ngaysua DESC");
	}else if ($timkiem_dang_ophong_idphong!='') {
		$selecet_khoa = mysqli_query($con, "SELECT * FROM log_sua_dl WHERE log_sua_dl.bangsua='o_phong' AND (log_sua_dl.noidungtruocsua='$timkiem_dang_ophong_idphong' or log_sua_dl.noidungsausua ='$timkiem_dang_ophong_idphong') AND (log_sua_dl.ngaysua BETWEEN '$timkiem_dang_ophongngay_batdau' AND '$timkiem_dang_ophongngay_kethuc') ORDER BY ngaysua DESC");
	}else{
		$selecet_khoa = mysqli_query($con, "SELECT * FROM log_sua_dl WHERE log_sua_dl.bangsua='o_phong' AND  (log_sua_dl.ngaysua BETWEEN '$timkiem_dang_ophongngay_batdau' AND '$timkiem_dang_ophongngay_kethuc') ORDER BY ngaysua DESC");
		
	}	
}else{
	$selecet_khoa = mysqli_query($con, "SELECT * FROM log_sua_dl WHERE log_sua_dl.bangsua='o_phong'  ORDER BY ngaysua DESC");
}
	if (!mysqli_num_rows($selecet_khoa)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th>STT</th>
				<th >MSSV</th>
				<th >Tên</th>
				<th>Chuyển phòng</th>
				<th>Từ phòng</th>
				<th>Sang phòng</th>
				<th>Người Chuyển</th>
				<th >Mã số cán bộ</th>
				<th>Thời gian</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$stt = 1;
				while ($row = mysqli_fetch_array($selecet_khoa)) {
					// Thông tin các bộ
					$canbotdoi = mysqli_fetch_array(mysqli_query($con, "SELECT  can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo WHERE id_canbo='$row[nguoisua]'"));
					// thông tin lớp
					$tt_sinh_vien = mysqli_fetch_array(mysqli_query($con, "SELECT  sinh_vien.mssv, sinh_vien.ten_sv, sinh_vien.ho_sv FROM sinh_vien, o_phong WHERE o_phong.id_ophong='$row[iddulieu]'  and o_phong.id_sinhvien= sinh_vien.id_sinhvien"));
					$tt_ptrc = mysqli_fetch_array(mysqli_query($con, "SELECT  phong.ma_phong, toa_nha.ma_toa_nha from phong, toa_nha where phong.idphong= $row[noidungtruocsua] and toa_nha.id_toanha= phong.id_toanha"));
					$tt_p_S = mysqli_fetch_array(mysqli_query($con, "SELECT  phong.ma_phong, toa_nha.ma_toa_nha from phong, toa_nha where phong.idphong= $row[noidungsausua] and toa_nha.id_toanha= phong.id_toanha"));
					// thông tin khoa sửa của lớp
					echo "
					<tr>
						<td style='text-align:center;'>$stt</td>
						<td class='canhgiua chuinhoa'>$tt_sinh_vien[mssv]</td>
						<td class=' chuinthuong'>$tt_sinh_vien[ho_sv] $tt_sinh_vien[ten_sv] </td>
						<td class='canhgiua'>$row[tencot]</td>
						<td class='chuinhoa canhgiua'>$tt_ptrc[ma_phong] - $tt_ptrc[ma_toa_nha] </td>
						<td class='chuinhoa canhgiua'>$tt_p_S[ma_phong] - $tt_p_S[ma_toa_nha]</td>
						<td class=''>$canbotdoi[ho_can_bo] $canbotdoi[ten_can_bo]</td>
						<td class='canhgiua'>$canbotdoi[ma_can_bo] </td>
						<td class='canhgiua'>".date("d/m/Y H:i:s", strtotime($row['ngaysua']))."</td>
					</tr>
					";
					$stt++;
				}
			?>
		</tbody>
	</table>
</div>
<?php } ?>
