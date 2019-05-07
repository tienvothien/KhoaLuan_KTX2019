<?php
include 'conn.php';

	$selecet_chucvu = mysqli_query($con, "SELECT * FROM chucvu WHERE chucvu.xoa=1 ORDER BY chucvu.tenchucvu");
	if (!mysqli_num_rows($selecet_chucvu)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã Chức vụ</th>
				<th>Tên Chức vụ</th>
				<th>Số Cán bộ</th>
				<th>Người xóa</th>
				<th>Ngày xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_chucvu = mysqli_fetch_array($selecet_chucvu)) {
				$slchucvu = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_cochucvu) as solcochucvu FROM cochucvu WHERE idchucvu='$row_chucvu[idchucvu]' and cochucvu.xoa=0"));
				if ($row_chucvu['idchucvu']==19) {
					$sl_sv=mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_sinhvien) as sol_sinh_vien FROM sinh_vien WHERE sinh_vien.xoa=0"));
					$slchucvu['solcochucvu']=$sl_sv['sol_sinh_vien'];
				}
				$can_bo = mysqli_fetch_array(mysqli_query($con,"SELECT can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo where can_bo.id_canbo = '$row_chucvu[id_canboxoa]'"));
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_chucvu[machucvu]</td>
				<td class='chuinthuong'>$row_chucvu[tenchucvu]</td>
				<td class='canhgiua'>$slchucvu[solcochucvu]</td>
				<td class='chuinthuong'>$can_bo[ho_can_bo] $can_bo[ten_can_bo] <br> $can_bo[ma_can_bo]</td>
				<td class='chuinhoa'>".date('d/m/Y', strtotime($row_chucvu['ngay_xoa']))."</td>
				";?>
				
				<?php echo "
			</tr>
			";
			$stt++;
			}
			?>
		</tbody>
	</table>

<?php
}
?>