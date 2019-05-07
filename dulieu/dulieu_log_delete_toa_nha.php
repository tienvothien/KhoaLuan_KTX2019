<?php
	include 'conn.php';
	$selecet_toa_nha = mysqli_query($con, "SELECT * FROM toa_nha WHERE toa_nha.xoa=1 ORDER BY toa_nha.loai_toa_nha, toa_nha.ten_toa_nha");
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
				<th>Sinh Viên <br>đang ở</th>
				<th>Người xóa</th>
				<th>Ngày xóa</th>
				
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
				$slsinhvien = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(o_phong.id_ophong) AS slsinhvien FROM phong, o_phong WHERE o_phong.ngay_ket_thuc is NULL AND phong.id_toanha='$row_toa_nha[id_toanha]' AND phong.idphong=o_phong.id_phong"));
				$can_bo = mysqli_fetch_array(mysqli_query($con,"SELECT can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo where can_bo.id_canbo = '$row_toa_nha[id_canboxoa]'"));
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_toa_nha[ma_toa_nha]</td>
				<td class='chuinthuong'>$row_toa_nha[ten_toa_nha] </td>
				<td class='chuinthuong canhgiua'>$row_toa_nha[loai_toa_nha] </td>
				<td class='chuinthuong canhgiua'>$slphong[slphong] </td>
				<td class='chuinthuong canhgiua'>$slguong[slguong] </td>
				<td class='chuinthuong canhgiua'>$slsinhvien[slsinhvien] </td>
				<td class='chuinthuong'>$can_bo[ho_can_bo] $can_bo[ten_can_bo] <br> $can_bo[ma_can_bo]</td>
				<td class='chuinhoa'>".date('d/m/Y', strtotime($row_toa_nha['ngay_xoa']))."</td>
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