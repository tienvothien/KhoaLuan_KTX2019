<?php
include 'conn.php';
	if (isset($_GET['khoa'])) {
		$selecet_lop = mysqli_query($con, "SELECT DISTINCT lop.id_lop, lop.ma_lop, lop.ten_lop, lop.id_khoa, lop.khoa  FROM lop, sinh_vien, o_phong WHERE o_phong.ngay_ket_thuc is NULL and o_phong.id_sinhvien = sinh_vien.id_sinhvien AND sinh_vien.id_lop=lop.id_lop AND lop.id_khoa='$_GET[khoa]' order by  id_khoa, khoa, ten_lop");
	}else{
		$selecet_lop = mysqli_query($con, "SELECT * FROM lop WHERE lop.xoa=0 order by  id_khoa, khoa, ten_lop");
	}
	if (!mysqli_num_rows($selecet_lop)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã Lớp</th>
				<th style="    width: 150px;">Tên Lớp</th>
				<th>Khóa</th>
				<th style="    width: 140px;">Khoa</th>
				<th>Số lượng <br> đang ở</th>
				<th>Số lượng <br> đã ở</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_lop = mysqli_fetch_array($selecet_lop)) {
				// tinh số lượng sinh vien
				$slsv_dang_o = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(DISTINCT sinh_vien.id_sinhvien) AS slsv_dang_o FROM  sinh_vien, o_phong WHERE o_phong.ngay_ket_thuc is NULL and o_phong.id_sinhvien = sinh_vien.id_sinhvien AND sinh_vien.id_lop='$row_lop[id_lop]'"));
				$slsv_da_o = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(DISTINCT sinh_vien.id_sinhvien) AS slsv_da_o FROM sinh_vien, o_phong WHERE o_phong.ngay_ket_thuc is not NULL and o_phong.id_sinhvien = sinh_vien.id_sinhvien AND sinh_vien.id_lop='$row_lop[id_lop]'"));
				$slkhoa = mysqli_fetch_array(mysqli_query($con, "SELECT khoa.ten_khoa, khoa.ma_khoa FROM khoa WHERE id_khoa='$row_lop[id_khoa]'"));
				$nam_kt = $row_lop['khoa'];
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_lop[ma_lop]</td>
				<td class='chuinthuong'>$row_lop[ten_lop]</td>
				<td class='chuinthuong canhgiua'>$row_lop[khoa]</td>
				<td class=' chuinhoa canhgiua'>$slkhoa[ma_khoa]</td>
				<td class='canhgiua'>$slsv_dang_o[slsv_dang_o]</td>
				<td class='canhgiua'>$slsv_da_o[slsv_da_o]</td>";?>
				<?php echo "
			</tr>
			";
			$stt++;
			}
			?>
		</tbody>
	</table>

</div>
<?php
}?>
