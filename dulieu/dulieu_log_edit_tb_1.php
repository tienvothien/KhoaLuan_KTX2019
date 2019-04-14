<?php
include 'conn.php';
	$selecet_lp = mysqli_query($con, "SELECT * FROM log_sua_dl WHERE log_sua_dl.bangsua='thietbi' ");
	if (!mysqli_num_rows($selecet_lp)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th>STT</th>
				<th >Mã Thiết bị</th>
				<th >Tên thiết bị</th>
				<th>Trường thay đổi</th>
				<th>Nội dung trước</th>
				<th>Nội dung sau</th>
				<th>Người thay đổi</th>
				<th >Mã số cán bộ</th>
				<th>Thời gian</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$stt = 1;
				while ($row = mysqli_fetch_array($selecet_lp)) {
					// Thông tin các bộ
					$canbotdoi = mysqli_fetch_array(mysqli_query($con, "SELECT  can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo WHERE id_canbo='$row[nguoisua]'"));
					// thông tin lớp
					$tt_thietbi = mysqli_fetch_array(mysqli_query($con, "SELECT  thietbi.mathietbi,thietbi.tenthietbi FROM thietbi WHERE thietbi.idtb='$row[iddulieu]'"));
					// kiem tra noi dung thay doi 
						$noidungtrc = $row['noidungtruocsua'];
						$noidungs = $row['noidungsausua'];
					echo "
					<tr>
						<td style='text-align:center;'>$stt</td>
						<td class='chuinhoa'>$tt_thietbi[mathietbi]</td>
						<td class='chuinthuong'>$tt_thietbi[tenthietbi]</td>
						<td class='chuinthuong'>$row[tencot]</td>";
						if ($row['cot']=='mathietbi') {
							echo "
								<td class='chuinhoa canhgiua'>$noidungtrc</td>
								<td class='chuinhoa canhgiua'>$noidungs</td>";
						}else {
							echo "
								<td class=''>$noidungtrc</td>
								<td class=''>$noidungs</td>";
						}
						
						echo "
							<td class=''>$canbotdoi[ho_can_bo] $canbotdoi[ten_can_bo]</td>
							<td class='canhgiua'>$canbotdoi[ma_can_bo] </td>
							<td class='canhgiua'>".date("d/m/Y H:i:s", strtotime($row['ngaysua']))."</td>
					</tr>
					";
					$stt++;
				}
			?>
		</tbody>
	</table>
</div>
<?php } ?>
