<?php
include 'conn.php';
	$selecet_phong = mysqli_query($con, "SELECT toa_nha.id_toanha, toa_nha.ten_toa_nha, phong.idphong, phong.ma_phong, phong.stt_tang, loai_phong.id_loaiphong, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o FROM phong, toa_nha, loai_phong WHERE phong.xoa=0 AND toa_nha.xoa=0 AND phong.id_toanha=toa_nha.id_toanha AND loai_phong.xoa=0 AND phong.id_loaiphong=loai_phong.id_loaiphong ORDER BY toa_nha.ten_toa_nha, phong.stt_tang, phong.ma_phong");
	if (!mysqli_num_rows($selecet_phong)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Tòa nhà</th>
				<th>Phòng</th>
				<th>Tầng</th>
				<th>Loại phòng</th>
				<th>Sinh viên <br> đang ở</th>
				<th>Sửa</th>
				<th>Chi tiết</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_phong = mysqli_fetch_array($selecet_phong)) {
			echo "
			<tr>
					<td style='text-align:center;'>$stt</td>
					<td class='chuinthuong canhgiua'>$row_phong[ten_toa_nha]</td>
					<td class='chuinhoa canhgiua'>$row_phong[ma_phong]</td>
					<td class='canhgiua'>$row_phong[stt_tang]</td>
					<td class='chuinthuong'>$row_phong[ten_loai_phong]</td>
					<td class='canhgiua'>Chưa viet thuat toan/$row_phong[sl_nguoi_o]</td>
					";
				?>
				<td class="canhgiuanek12">
					<input type="button" name="edit" value="Sửa" id="<?php echo $row_phong['idphong']; ?>" class="btn btn-primary btn-xs id_sua_phong" />
				</td>
				<td class="canhgiuanek12">
					<input type="button" name="view" value="Chi  tiết" id="<?php echo $row_phong['idphong']; ?>" class="btn btn-success btn-xs view_chitietphong" />
				</td>
				<td class="canhgiuanek12">
					<input type="button" name="delete" value="Xóa" id="<?php echo $row_phong['idphong']; ?>" class="btn btn-info btn-danger btn-xs xoa_phong" />
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