<?php
include 'conn.php';

	$selecet_khoa = mysqli_query($con, "SELECT * FROM khoa WHERE khoa.xoa=0 order by khoa.ten_khoa ");
	if (!mysqli_num_rows($selecet_khoa)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã khoa</th>
				<th>Tên khoa</th>
				<th>Số lớp</th>
				<th>Số <br>Sinh viên <br>Đang ở</th>
				<th>Số <br>Sinh viên <br>Đã ở</th>
				<th>Danh sách</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_khoa = mysqli_fetch_array($selecet_khoa)) {
				// tìm số lớp có sinh ở
				$sllop = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT( DISTINCT lop.id_lop) as sollop FROM lop, sinh_vien, o_phong WHERE o_phong.ngay_ket_thuc is NULL and o_phong.id_sinhvien = sinh_vien.id_sinhvien AND sinh_vien.id_lop=lop.id_lop AND lop.id_khoa='$row_khoa[id_khoa]'"));
				$slsv_dang_o = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(DISTINCT sinh_vien.id_sinhvien) AS slsv_dang_o FROM lop, sinh_vien, o_phong WHERE o_phong.ngay_ket_thuc is NULL and o_phong.id_sinhvien = sinh_vien.id_sinhvien AND sinh_vien.id_lop=lop.id_lop AND lop.id_khoa='$row_khoa[id_khoa]'"));
				$slsv_da_o = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(DISTINCT sinh_vien.id_sinhvien) AS slsv_da_o FROM lop, sinh_vien, o_phong WHERE o_phong.ngay_ket_thuc is not NULL and o_phong.id_sinhvien = sinh_vien.id_sinhvien AND sinh_vien.id_lop=lop.id_lop AND lop.id_khoa='$row_khoa[id_khoa]'"));
				//tìm số lượng sinh viên ở phòng
				
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_khoa[ma_khoa]</td>
				<td class='chuinthuong'>$row_khoa[ten_khoa]</td>
				<td class='canhgiua'>$sllop[sollop]</td>
				<td class='canhgiua'>$slsv_dang_o[slsv_dang_o]</td>
				<td class='canhgiua'>$slsv_da_o[slsv_da_o]</td>
				";?>
				<td class="canhgiuanek12">
					<a href="./../admin/thongke_lop.php?khoa=<?php echo $row_khoa['id_khoa']; ?>" title="">
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