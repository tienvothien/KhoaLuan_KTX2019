<?php
if (isset($_GET['tinh'])) {
	
include 'conn.php';
	
	$selecet_huyen = mysqli_query($con, "SELECT * FROM huyen where matinh='$_GET[tinh]' order by huyen.tenhuyen ");
	if (!mysqli_num_rows($selecet_huyen)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã Huyện</th>
				<th>Tên Huyện</th>
				<th>Số <br>Sinh viên <br>Đang ở</th>
				<th>Số <br>Sinh viên <br>Đã ở</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_huyen = mysqli_fetch_array($selecet_huyen)) {
				// tìm số lớp có sinh ở
				$slsv_dang_o = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(DISTINCT sinh_vien.id_sinhvien) AS slsv_dang_o FROM sinh_vien, o_phong WHERE o_phong.ngay_ket_thuc is NULL and o_phong.id_sinhvien = sinh_vien.id_sinhvien AND sinh_vien.mahuyen='$row_huyen[mahuyen]'"));
				$slsv_da_o = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(DISTINCT sinh_vien.id_sinhvien) AS slsv_da_o FROM sinh_vien, o_phong WHERE o_phong.ngay_ket_thuc is not NULL and o_phong.id_sinhvien = sinh_vien.id_sinhvien AND sinh_vien.mahuyen='$row_huyen[mahuyen]'"));
				//tìm số lượng sinh viên ở phòng
				
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'> $row_huyen[mahuyen]</td>
				<td class='chuinthuong'>$row_huyen[caphuyen] &nbsp; $row_huyen[tenhuyen]</td>
				<td class='canhgiua'>$slsv_dang_o[slsv_dang_o]</td>
				<td class='canhgiua'>$slsv_da_o[slsv_da_o]</td>
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
}
?>