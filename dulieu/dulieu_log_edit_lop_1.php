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
				<th>STT</th>
				<th >Mã Lớp</th>
				<th >Lớp</th>
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
				while ($row = mysqli_fetch_array($selecet_khoa)) {
					// Thông tin các bộ
					$canbotdoi = mysqli_fetch_array(mysqli_query($con, "SELECT  can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo WHERE id_canbo='$row[nguoisua]'"));
					// thông tin lớp
					$tt_lop = mysqli_fetch_array(mysqli_query($con, "SELECT  lop.ma_lop,lop.ten_lop FROM lop WHERE lop.id_lop='$row[iddulieu]'"));
					// thông tin khoa sửa của lớp
					if ($row['cot']=='id_khoa') {
						$tt_khoa1 = mysqli_fetch_array(mysqli_query($con, "SELECT  khoa.ma_khoa,khoa.ten_khoa FROM khoa WHERE khoa.id_khoa='$row[noidungtruocsua]'"));
						$row["noidungtruocsua"]=$tt_khoa1['ten_khoa'];
						$tt_khoa2 = mysqli_fetch_array(mysqli_query($con, "SELECT  khoa.ma_khoa,khoa.ten_khoa FROM khoa WHERE khoa.id_khoa='$row[noidungsausua]'"));
						$row["noidungsausua"]=$tt_khoa2['ten_khoa'];
					}
					
					echo "
					<tr>
						<td style='text-align:center;'>$stt</td>
						<td class='canhgiua chuinhoa'>$tt_lop[ma_lop]</td>
						<td class='canhgiua chuinthuong'>$tt_lop[ten_lop]</td>
						<td class=''>$row[tencot]</td>
						<td class='"; if ($row['cot']=='ma_lop') {echo "chuinhoa";}echo "'>$row[noidungtruocsua]</td>
						<td class='"; if ($row['cot']=='ma_lop') {
							echo "chuinhoa";
						}echo "'>$row[noidungsausua]</td>
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
