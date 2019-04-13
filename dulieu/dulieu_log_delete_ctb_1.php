<?php
include 'conn.php';
	$selecet_khoa = mysqli_query($con, "SELECT ctb.idcothietbi,ctb.soluong, lp.id_loaiphong,lp.ten_loai_phong,thietbi.idtb, thietbi.tenthietbi, ctb.id_canbothem, can_bo.ho_can_bo, can_bo.ten_can_bo, ctb.ngay_xoa FROM loaiphongcothietbi ctb INNER JOIN loai_phong lp ON ctb.id_loaiphong = lp.id_loaiphong INNER JOIN thietbi ON thietbi.idtb = ctb.idtb INNER JOIN can_bo ON ctb.id_canbothem=can_bo.id_canbo WHERE thietbi.xoa=0 AND ctb.xoa=1 AND lp.xoa=0  ");
	if (!mysqli_num_rows($selecet_khoa)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Loại Phòng</th>
				<th>Tên thiết bị</th>
				<th>Số lượng</th>
				<th>Người xóa</th>
				<th>Thời gian</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$stt = 1;
				while ($row = mysqli_fetch_array($selecet_khoa)) {
					
					echo "
					<tr>
						<td style='text-align:center;'>$stt</td>
						<td class='chuinthuong canhgiua'>$row[ten_loai_phong]</td>
						<td class='chuinthuong'>$row[tenthietbi]</td>
						<td class='chuinthuong'>$row[soluong]</td>
						<td class='chuinthuong'>$row[ho_can_bo] $row[ten_can_bo]</td>
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
