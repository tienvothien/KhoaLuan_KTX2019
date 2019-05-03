<?php
include 'conn.php';
	$selecet_khoa = mysqli_query($con, "SELECT cochucvu.id_cochucvu,can_bo.id_canbo, can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo, can_bo.gioitinh, can_bo.ngay_sinh, can_bo.ngaythem, can_bo.sdt, can_bo.email FROM can_bo INNER JOIN cochucvu ON can_bo.id_canbo = cochucvu.id_canbo INNER JOIN chucvu ON chucvu.idchucvu = cochucvu.idchucvu WHERE can_bo.xoa=0 AND cochucvu.xoa=0 and chucvu.idchucvu = '$_GET[idchucvu]'");
	if (!mysqli_num_rows($selecet_khoa)) {
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
				<th>Ngày sinh</th>
				<th>Giới tính</th>
				<th>Điện thoại</th>
				<th>Email</th>
				<th>Ngày Thêm</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$stt = 1;
				while ($row = mysqli_fetch_array($selecet_khoa)) {
					echo "
					<tr>
						<td class='canhgiua'>$stt</td>
						<td class='chuinhoa canhgiua' >$row[ma_can_bo]</td>
						<td class='chuinthuong'>$row[ho_can_bo] $row[ten_can_bo]</td>
						<td class='canhgiua'>".date('d/m/Y', strtotime($row['ngay_sinh']))."</td>
						<td class='canhgiua'>$row[gioitinh]</td>
						<td class='canhgiua'>$row[sdt]</td>
						<td class=''>$row[email]</td>
						<td class='canhgiua'>".date("d/m/Y", strtotime($row['ngaythem']))."</td>
					</tr>
					";
					$stt++;
				}
			?>
		</tbody>
	</table>
</div>
<?php } ?>
