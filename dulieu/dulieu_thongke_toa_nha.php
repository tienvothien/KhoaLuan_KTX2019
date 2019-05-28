<?php
	include 'conn.php';
	$selecet_toa_nha = mysqli_query($con, "SELECT * FROM toa_nha WHERE toa_nha.xoa=0 ORDER BY toa_nha.loai_toa_nha, toa_nha.ten_toa_nha");
	if (!mysqli_num_rows($selecet_toa_nha)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã Tòa Nhà</th>
				<th style="width: 150px">Tên Tòa Nhà</th>
				<th>Loại</th>
				<th>Số phòng</th>
				<th>Số Gường</th>
				<th>Đang ở </th>
				<th>Đã ở</th>
				<th>Gường <br>trống</th>
				<th>Chuyển phòng <br>(lượt)</th>
				<th>Danh sách</th>
				<th>Chi tiết</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_toa_nha = mysqli_fetch_array($selecet_toa_nha)) {
				// đếm số lượng phòng ở của tòa nhà
				$slphong = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(idphong) AS slphong FROM phong WHERE phong.xoa=0 AND phong.id_toanha='$row_toa_nha[id_toanha]'"));
				// đếm số lượng gường
				$slguong = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(loai_phong.sl_nguoi_o) AS slguong FROM phong, loai_phong WHERE phong.xoa=0 AND phong.id_toanha='$row_toa_nha[id_toanha]' AND phong.id_loaiphong=loai_phong.id_loaiphong"));
				// đếm số lượng sinh viên của tòa nhà
				$slsinhvien = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(o_phong.id_sinhvien) AS slsinhvien FROM phong, o_phong WHERE o_phong.ngay_ket_thuc is NULL AND phong.id_toanha='$row_toa_nha[id_toanha]' AND phong.idphong=o_phong.id_phong"));
				// đếm số lượng sinh viên của tòa nhà
				$sl_chuyen = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(o_phong.id_sinhvien) AS sl_chuyen FROM phong, o_phong WHERE o_phong.ngay_ket_thuc is not NULL and o_phong.chuyenphong=1 AND phong.id_toanha='$row_toa_nha[id_toanha]' AND phong.idphong=o_phong.id_phong"));
				// đếm số lượng sinh viên của tòa nhà
				$sl_da_o = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(o_phong.id_sinhvien) AS sl_da_o FROM phong, o_phong WHERE o_phong.ngay_ket_thuc is not NULL AND phong.id_toanha='$row_toa_nha[id_toanha]' AND phong.idphong=o_phong.id_phong"));
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_toa_nha[ma_toa_nha]</td>
				<td class='chuinthuong'>$row_toa_nha[ten_toa_nha] </td>
				<td class='chuinthuong canhgiua'>$row_toa_nha[loai_toa_nha] </td>
				<td class='chuinthuong canhgiua'>$slphong[slphong] </td>
				<td class='chuinthuong canhgiua'>$slguong[slguong] </td>
				<td class='chuinthuong canhgiua'>$slsinhvien[slsinhvien] </td>
				<td class='chuinthuong canhgiua'>$sl_da_o[sl_da_o] </td>
				<td class='chuinthuong canhgiua'>".($slguong['slguong']-$slsinhvien['slsinhvien'] )."</td>
				<td class='chuinthuong canhgiua'>$sl_chuyen[sl_chuyen] </td>
			";?>
				
				<td class="canhgiuanek12"><input type="button" name="view" value="Chi tiết" id="<?php echo $row_toa_nha['id_toanha']; ?>" class="btn btn-success btn-xs view_chitiettoa_nha" /></td>
				<td class="canhgiuanek12">
					<a href="./../admin/thongke_phong.php?toanha=<?php echo $row_toa_nha['id_toanha']; ?>" title="">
						<input type="button" name="view" value="Danh sách" class="btn btn-warning btn-xs " />
					</a>
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