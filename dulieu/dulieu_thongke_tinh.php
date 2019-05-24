<?php
include 'conn.php';

	$selecet_tinh = mysqli_query($con, "SELECT * FROM tinh order by tinh.tentinh ");
	if (!mysqli_num_rows($selecet_tinh)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã Tỉnh</th>
				<th>Tên Tỉnh</th>
				<th>Số huyện <br> có sinh viên</th>
				<th>Số <br>Sinh viên <br>Đang ở</th>
				<th>Số <br>Sinh viên <br>Đã ở</th>
				<th>Danh sách</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_tinh = mysqli_fetch_array($selecet_tinh)) {
				// tìm số lớp có sinh ở
				$slsv_dang_o = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(DISTINCT sinh_vien.id_sinhvien) AS slsv_dang_o FROM sinh_vien, o_phong WHERE o_phong.ngay_ket_thuc is NULL and o_phong.id_sinhvien = sinh_vien.id_sinhvien AND sinh_vien.matinh='$row_tinh[matinh]'"));
				// dữ liệu huyện có sinh viên ở
				$slsv_dang_o_huyen = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(DISTINCT huyen.mahuyen) AS slsv_dang_o_huyen FROM sinh_vien, o_phong, huyen WHERE o_phong.ngay_ket_thuc is NULL and o_phong.id_sinhvien = sinh_vien.id_sinhvien AND sinh_vien.matinh='$row_tinh[matinh]' and sinh_vien.mahuyen=huyen.mahuyen and huyen.matinh= '$row_tinh[matinh]'"));
				$slsv_da_o = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(DISTINCT sinh_vien.id_sinhvien) AS slsv_da_o FROM sinh_vien, o_phong WHERE o_phong.ngay_ket_thuc is not NULL and o_phong.id_sinhvien = sinh_vien.id_sinhvien AND sinh_vien.matinh='$row_tinh[matinh]'"));
				//tìm số lượng sinh viên ở phòng
				
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_tinh[matinh]</td>
				<td class='chuinthuong'>$row_tinh[tentinh]</td>
				<td class='canhgiua'>$slsv_dang_o_huyen[slsv_dang_o_huyen]</td>
				<td class='canhgiua'>$slsv_dang_o[slsv_dang_o]</td>
				<td class='canhgiua'>$slsv_da_o[slsv_da_o]</td>
				";?>
				<td class="canhgiuanek12">
					<a href="./../admin/thongke_huyen.php?tinh=<?php echo $row_tinh['matinh']; ?>" title="">
					<input type="button" name="view" value="Danh sách" id="" class="btn btn-success btn-xs" /></a>
				</td>
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