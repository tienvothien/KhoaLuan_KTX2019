<?php
include 'conn.php';
	$selecet_khoa = mysqli_query($con, "SELECT * FROM lop WHERE lop.xoa=1 ");
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
				<th>Khóa</th>
				<th>Niên Khóa</th>
				<th>Khoa</th>
				<th>Người xóa</th>
				<th>Thời gian</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$stt = 1;
				while ($row = mysqli_fetch_array($selecet_khoa)) {
					$canbotdoi = mysqli_fetch_array(mysqli_query($con, "SELECT  can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo WHERE id_canbo='$row[id_canboxoa]'"));
					$slsinh_vien = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_sinhvien) as solsinh_vien FROM sinh_vien WHERE id_lop='$row[id_lop]'"));
					//tìm khoa
					$slkhoa = mysqli_fetch_array(mysqli_query($con, "SELECT khoa.ten_khoa FROM khoa WHERE id_khoa='$row[id_khoa]'"));
					$nam_kt = $row['nam_BD']+4;
			echo "
			<tr>
					<td style='text-align:center;'>$stt</td>
					<td class='chuinhoa canhgiua'>$row[ma_lop]</td>
					<td class='chuinthuong'>$row[ten_lop]</td>
					<td class='chuinthuong canhgiua'>$row[khoa]</td>
					<td class='chuinthuong canhgiua'>$row[nam_BD] - $nam_kt</td>
					<td class='canhgiua chuinthuong'>$slkhoa[ten_khoa]</td>
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