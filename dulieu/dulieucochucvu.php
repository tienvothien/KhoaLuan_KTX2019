<?php
include 'conn.php';

	$selecet_cochucvu = mysqli_query($con, "SELECT cochucvu.id_cochucvu, can_bo.id_canbo, can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo, can_bo.gioitinh, can_bo.ngay_sinh,chucvu.idchucvu, chucvu.tenchucvu FROM can_bo, chucvu, cochucvu WHERE cochucvu.idchucvu= chucvu.idchucvu AND can_bo.id_canbo=cochucvu.id_canbo and can_bo.xoa=0 AND cochucvu.xoa=0 ORDER BY can_bo.id_canbo, chucvu.idchucvu");
	if (!mysqli_num_rows($selecet_cochucvu)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã Cán bộ</th>
				<th>Tên Cán bộ</th>
				<th>Giới tính</th>
				<th>Ngày sinh</th>
				<th>Chưc vụ</th>
				<th>Sửa</th>
				<th>Chi tiết</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_cochucvu = mysqli_fetch_array($selecet_cochucvu)) {
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_cochucvu[ma_can_bo]</td>
				<td class='chuinthuong'>$row_cochucvu[ho_can_bo] $row_cochucvu[ten_can_bo] </td>
				<td class='canhgiua'>$row_cochucvu[gioitinh]</td>
				<td class='canhgiua'>".date('d/mY', strtotime($row_cochucvu['ngay_sinh']))."</td>
				<td class='canhgiua chuinthuong'>$row_cochucvu[tenchucvu]</td>";

				?>
				<td class="canhgiuanek12">
					<?php if ($row_cochucvu['idchucvu']!=0 ) {?>
					<input type="button" name="edit" value="Sửa" id="<?php echo $row_cochucvu['id_cochucvu']; ?>" class="btn btn-primary btn-xs id_sua_cochucvu" />
					<?php } ?>
				</td>
				<td class="canhgiuanek12">
					<input type="button" name="view" value="Chi  tiết" id="<?php echo $row_cochucvu['id_canbo']; ?>" class="btn btn-success btn-xs view_chitietcochucvu" />
				</td>
				<td class="canhgiuanek12">
					<?php if ($row_cochucvu['idchucvu']!=0 ) {
						?><input type="button" name="delete" value="Xóa" id="<?php echo $row_cochucvu['id_cochucvu']; ?>" class="btn btn-info btn-danger btn-xs xoa_cochucvu" />
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