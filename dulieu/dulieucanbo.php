<?php
include 'conn.php';

	$selecet_can_bo = mysqli_query($con, "SELECT * FROM can_bo WHERE can_bo.xoa=0 ");
	if (!mysqli_num_rows($selecet_can_bo)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Ảnh</th>
				<th>Mã Cán bộ</th>
				<th>Tên Cán bộ</th>
				<th>Ngày sinh</th>
				<th>Giới tính</th>
				<th>Điện thoại
				<th>Email</th>
				<th>Chức vụ</th>
				<th>Sửa</th>
				<th>Chi tiết</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_can_bo = mysqli_fetch_array($selecet_can_bo)) {
				$tenchucvune='';
				$ktra =(mysqli_query($con, "SELECT * FROM chucvu INNER JOIN cochucvu ON chucvu.idchucvu = cochucvu.idchucvu WHERE cochucvu.id_canbo = '$row_can_bo[id_canbo]' AND cochucvu.xoa =0"));
				if (mysqli_num_rows($ktra)) {
					$slchucvu = mysqli_fetch_array($ktra);
					$tenchucvune=$slchucvu['tenchucvu'];
				}
				
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='canhgiua'><img class='img-responsive ' style= ' width:100%;'src='./../images/$row_can_bo[hinhanh]'></td>
				<td class='chuinhoa canhgiua'>$row_can_bo[ma_can_bo]</td>
				<td class='chuinthuong'>$row_can_bo[ho_can_bo] $row_can_bo[ten_can_bo]</td>
				<td class=''>".date('d/m/Y', strtotime($row_can_bo["ngay_sinh"]))."</td>
				<td class='canhgiua'>$row_can_bo[gioitinh]</td>
				<td class='canhgiua'>$row_can_bo[sdt]</td>
				<td class=''>$row_can_bo[email]</td>
				<td class='chuinthuong'>$tenchucvune</td>";?>
				<td class="canhgiuanek12"><input type="button" name="edit" value="Sửa" id="<?php echo $row_can_bo['id_canbo']; ?>" class="btn btn-primary btn-xs id_sua_can_bo" /></td>
				<td class="canhgiuanek12"><input type="button" name="view" value="Chi tiết" id="<?php echo $row_can_bo['id_canbo']; ?>" class="btn btn-success btn-xs view_chitietcan_bo" /></td>
				<td class="canhgiuanek12"><input type="button" name="delete" value="Xóa" id="<?php echo $row_can_bo['id_canbo']; ?>" class="btn btn-info btn-danger btn-xs xoa_can_bo" /></td>
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