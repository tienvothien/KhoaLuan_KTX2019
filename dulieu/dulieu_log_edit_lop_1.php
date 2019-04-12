<?php
include 'conn.php';
	$selecet_khoa = mysqli_query($con, "SELECT * FROM log_sua_dl WHERE log_sua_dl.bangsua='lop' ");
	if (!mysqli_num_rows($selecet_khoa)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Nội dung thay đổi</th>
				<th>Nội dung trước</th>
				<th>Nội dung sau</th>
				<th>Người thay đổi</th>
				<th>Thời gian</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$stt = 1;
				while ($row = mysqli_fetch_array($selecet_khoa)) {
					$canbotdoi = mysqli_fetch_array(mysqli_query($con, "SELECT  can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo WHERE id_canbo='$row[nguoisua]'"));
					echo "
					<tr>
						<td style='text-align:center;'>$stt</td>
						<td class=''>$row[tencot]</td>
						<td class=''>$row[noidungtruocsua]</td>
						<td class=''>$row[noidungsausua]</td>
						<td class=''>$canbotdoi[ho_can_bo] $canbotdoi[ten_can_bo]</td>
						<td class='canhgiua'>".date("d/m/Y H:i:ss", strtotime($row['ngaysua']))."</td>
					</tr>
					";
					$stt++;
				}
			?>
		</tbody>
	</table>
</div>
<?php } ?>
<script>$(document).ready( function () {
    $('#myTable').DataTable();
} );</script>