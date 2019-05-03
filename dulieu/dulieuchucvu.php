<?php
include 'conn.php';

	$selecet_chucvu = mysqli_query($con, "SELECT * FROM chucvu WHERE chucvu.xoa=0 ORDER BY chucvu.tenchucvu");
	if (!mysqli_num_rows($selecet_chucvu)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
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
				$slchucvu = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_cochucvu) as solcochucvu FROM cochucvu WHERE idchucvu='$row_chucvu[idchucvu]' and cochucvu.xoa=0"));
				if ($row_chucvu['idchucvu']==19) {
					$sl_sv=mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_sinhvien) as sol_sinh_vien FROM sinh_vien WHERE sinh_vien.xoa=0"));
					$slchucvu['solcochucvu']=$sl_sv['sol_sinh_vien'];
				}
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_chucvu[machucvu]</td>
				<td class='chuinthuong'>$row_chucvu[tenchucvu]</td>
				<td class='canhgiua'>$slchucvu[solcochucvu]</td>";?>
				<td class="canhgiuanek12">
					<?php if ($row_chucvu['idchucvu']!=19 && $row_chucvu['idchucvu']!=0) {?>
					<input type="button" name="edit" value="Sửa" id="<?php echo $row_chucvu['idchucvu']; ?>" class="btn btn-primary btn-xs id_sua_chucvu" />
					<?php } ?>
				</td>
				<td class="canhgiuanek12">
					<input type="button" name="view" value="Chi  tiết" id="<?php echo $row_chucvu['idchucvu']; ?>" class="btn btn-success btn-xs view_chitietchucvu" />
					<?php if ($row_chucvu['idchucvu']==19  ){?>
						<a href="./../admin/quanlysinhvien.php" title="">
						<input type="button" name="view" value="Danh sách" id="" class="btn btn-warning btn-xs" />
						</a>
					<?php } else{ ?>
						<a href="./../admin/dscanbocochucvucantim.php?idchucvu=<?php echo $row_chucvu['idchucvu']; ?>" title="">
						<input type="button" name="view" value="Danh sách" id="" class="btn btn-warning btn-xs" />
						</a>
					<?php } ?>
				</td>
				<td class="canhgiuanek12">
					<?php if ($row_chucvu['idchucvu']!=19 && $row_chucvu['idchucvu']!=0) {
						?><input type="button" name="delete" value="Xóa" id="<?php echo $row_chucvu['idchucvu']; ?>" class="btn btn-info btn-danger btn-xs xoa_chucvu" />
					<?php } ?>
					
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