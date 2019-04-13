<?php
include 'conn.php';
	$selecet_khoa = mysqli_query($con, "SELECT * FROM thietbi WHERE thietbi.xoa=0 ORDER BY thietbi.tenthietbi");
	if (!mysqli_num_rows($selecet_khoa)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<h3 class="canhgiua chuinhoa">Danh sách thiết bị trong ký túc xá</h3>
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã Thiết bị</th>
				<th>Tên thiết bịc</th>
				<th>Ngày Thêm</th>
				<th>Sửa</th>
				<th>Chi tiết</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$stt = 1;
				while ($row = mysqli_fetch_array($selecet_khoa)) {
					$can_bothem = mysqli_fetch_array(mysqli_query($con, "SELECT  can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo WHERE id_canbo='$row[id_canbothem]'"));
					echo "
					<tr>
						<td style='text-align:center;'>$stt</td>
						<td class='chuinhoa canhgiua' >$row[mathietbi]</td>
						<td class='chuinthuong'>$row[tenthietbi]</td>
						<td class='canhgiua'>".date("d/m/Y H:i:s", strtotime($row['ngaythem']))."</td>

						<td class='canhgiuanek12'><input type='button' name='edit' value='Sửa' id='".$row['idtb']."' class='btn btn-primary btn-xs id_sua_thietbi' /></td>
						<td class='canhgiuanek12'><input type='button' name='view' value='Chi tiết' id='".$row['idtb']."' class='btn btn-success btn-xs view_chitietthietbi' /></td>
						<td class='canhgiuanek12'><input type='button' name='delete' value='Xóa' id='".$row['idtb']."' class='btn btn-info btn-danger btn-xs xoa_thietbi' /></td>
						
					</tr>
					";
					$stt++;
				}
			?>
		</tbody>
	</table>
</div>
<?php } ?>