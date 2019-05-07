<?php
	include 'conn.php';
	$selecet_loai_phong = mysqli_query($con, "SELECT * FROM loai_phong WHERE loai_phong.xoa=1 ");
	if (!mysqli_num_rows($selecet_loai_phong)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã Loại phòng</th>
				<th>Tên Loại phòng</th>
				<th>Giá phòng/ <br> người/tháng <br> (VNĐ)</th>
				<th>Người ở</th>
				<th>Số phòng</th>
				<th>Người xóa</th>
				<th>Ngày xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_loai_phong = mysqli_fetch_array($selecet_loai_phong)) {
				// đếm số lượng phòng ở của tòa nhà
				$slphong = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(idphong) AS slphong FROM phong WHERE phong.xoa=0 AND phong.id_loaiphong='$row_loai_phong[id_loaiphong]'"));
				$can_bo = mysqli_fetch_array(mysqli_query($con,"SELECT can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo where can_bo.id_canbo = '$row_loai_phong[id_canboxoa]'"));
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_loai_phong[ma_loai_phong]</td>
				<td class='chuinthuong'>$row_loai_phong[ten_loai_phong] </td>
				<td class='chuinthuong canhgiua'>". number_format ($row_loai_phong["gia_loai_phong"] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," )."</td>
				<td class='chuinthuong canhgiua'>$row_loai_phong[sl_nguoi_o] </td>
				<td class='chuinthuong canhgiua'>$slphong[slphong] </td>
				<td class='chuinthuong'>$can_bo[ho_can_bo] $can_bo[ten_can_bo] <br> $can_bo[ma_can_bo]</td>
				<td class='chuinhoa'>".date('d/m/Y', strtotime($row_loai_phong['ngay_xoa']))."</td>
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