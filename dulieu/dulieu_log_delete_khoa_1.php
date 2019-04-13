<?php
include 'conn.php';
	$selecet_khoa = mysqli_query($con, "SELECT * FROM khoa WHERE khoa.xoa=1 ");
	if (!mysqli_num_rows($selecet_khoa)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã Lớp</th>
				<th>Tên Lớp</th>
				<th>Người xóa</th>
				<th>Thời gian</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$stt = 1;
				while ($row = mysqli_fetch_array($selecet_khoa)) {
					$canbotdoi = mysqli_fetch_array(mysqli_query($con, "SELECT  can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo WHERE id_canbo='$row[id_canboxoa]'"));
					//tìm khoa
			echo "
			<tr>
					<td style='text-align:center;'>$stt</td>
					<td class='chuinhoa canhgiua'>$row[ma_khoa]</td>
					<td class='chuinthuong'>$row[ten_khoa]</td>
					<td class='chuinthuong'>$canbotdoi[ho_can_bo] $canbotdoi[ten_can_bo]</td>
					<td class='canhgiua'>".date("d/m/Y H:i:ss", strtotime($row['ngay_xoa']))."</td>
				</tr>
					";
					$stt++;
				}
			?>
		</tbody>
	</table>
</div>
<?php } ?>