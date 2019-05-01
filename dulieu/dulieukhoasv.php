<?php
include 'conn.php';

	$selecet_khoa = mysqli_query($con, "SELECT * FROM khoa WHERE khoa.xoa=0 ");
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
				<th>Sửa</th>
				<th>Chi tiết</th>
				<th>Danh sách</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_khoa = mysqli_fetch_array($selecet_khoa)) {
				$sllop = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_lop) as sollop FROM lop WHERE id_khoa='$row_khoa[id_khoa]'"));
				
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_khoa[ma_khoa]</td>
				<td class='chuinthuong'>$row_khoa[ten_khoa]</td>
				<td class='canhgiua'>$sllop[sollop]</td>";?>
				<td class="canhgiuanek12"><input type="button" name="edit" value="Sửa" id="<?php echo $row_khoa['id_khoa']; ?>" class="btn btn-primary btn-xs id_sua_khoa" /></td>

				<td class="canhgiuanek12"><input type="button" name="view" value="Chi tiết" id="<?php echo $row_khoa['id_khoa']; ?>" class="btn btn-success btn-xs view_chitietkhoa" /></td>
				<td class="canhgiuanek12">
					<a href="dslop_cuakhoa.php?khoa=<?php echo $row_khoa['id_khoa']; ?>" title="">
					<input type="button" name="view" value="Danh sách" id="" class="btn btn-success btn-xs" /></a>
				</td>
				<td class="canhgiuanek12"><input type="button" name="delete" value="Xóa" id="<?php echo $row_khoa['id_khoa']; ?>" class="btn btn-info btn-danger btn-xs xoa_khoa" /></td>
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