<?php
include 'conn.php';

	$selecet_chucvu = mysqli_query($con, "SELECT * FROM chucvu WHERE chucvu.xoa=0 ");
	if (!mysqli_num_rows($selecet_chucvu)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<h3 class="canhgiua chuinhoa">danh sách Chức vụ</h3>
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã Chức vụ</th>
				<th>Tên Chức vụ</th>
				<th>Số Cán bộ</th>
				<th>Sửa</th>
				<th>Chi tiết</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_chucvu = mysqli_fetch_array($selecet_chucvu)) {
				$slchucvu = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_cochucvu) as solcochucvu FROM cochucvu INNER JOIN can_bo ON can_bo.id_canbo = cochucvu.id_canbo WHERE idchucvu='$row_chucvu[idchucvu]' and can_bo.xoa=0"));
				
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_chucvu[machucvu]</td>
				<td class='chuinthuong'>$row_chucvu[tenchucvu]</td>
				<td class='canhgiua'>$slchucvu[solcochucvu]</td>";?>
				<td class="canhgiuanek12">
					<input type="button" name="edit" value="Sửa" id="<?php echo $row_chucvu['idchucvu']; ?>" class="btn btn-primary btn-xs id_sua_chucvu" />
				</td>
				<td class="canhgiuanek12">
					<input type="button" name="view" value="Chi  tiết" id="<?php echo $row_chucvu['idchucvu']; ?>" class="btn btn-success btn-xs view_chitietchucvu" />
					<a href="./../admin/dscanbocochucvucantim.php?idchucvu=<?php echo $row_chucvu['idchucvu']; ?>" title="">
						<input type="button" name="view" value="Danh sách" id="" class="btn btn-warning btn-xs" />
					</a>
				</td>
				<td class="canhgiuanek12">
					<input type="button" name="delete" value="Xóa" id="<?php echo $row_chucvu['idchucvu']; ?>" class="btn btn-info btn-danger btn-xs xoa_chucvu" />
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