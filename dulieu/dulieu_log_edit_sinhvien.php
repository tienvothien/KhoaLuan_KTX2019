<?php
include 'conn.php';
	$selecet_khoa = mysqli_query($con, "SELECT * FROM log_sua_dl WHERE log_sua_dl.bangsua='sinh_vien' order by ngaysua DESC");
	if (!mysqli_num_rows($selecet_khoa)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th>STT</th>
				<th >MSSV</th>
				<th >họ tên</th>
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
					$noidungtruocsua=$row['noidungtruocsua'];
					$noidungsausua=$row['noidungsausua'];
					$cot = $row['cot'];
					if ($cot=='id_lop') {
						$ttloptr = mysqli_fetch_array(mysqli_query($con,"SELECT lop.ma_lop FROM lop WHERE lop.id_lop ='$noidungtruocsua'"));
						$noidungtruocsua=$ttloptr['ma_lop'];
						$ttlopsau = mysqli_fetch_array(mysqli_query($con,"SELECT lop.ma_lop FROM lop WHERE lop.id_lop ='$noidungsausua'"));
						$noidungsausua=$ttlopsau['ma_lop'];

					}elseif ($cot=='noi_cap') {
						$tt_noi_captr = mysqli_fetch_array(mysqli_query($con,"SELECT tinh.tentinh FROM tinh WHERE tinh.matinh ='$noidungtruocsua'"));
						$noidungtruocsua=$tt_noi_captr['tentinh'];
						$tt_noi_capsau = mysqli_fetch_array(mysqli_query($con,"SELECT tinh.tentinh FROM tinh WHERE tinh.matinh ='$noidungsausua'"));
						$noidungsausua=$tt_noi_capsau['tentinh'];
					}elseif ($cot=='que_quan') {
						$tt_noi_captr = mysqli_fetch_array(mysqli_query($con,"SELECT tinh.tentinh FROM tinh WHERE tinh.matinh ='$noidungtruocsua'"));
						$noidungtruocsua=$tt_noi_captr['tentinh'];
						$tt_noi_capsau = mysqli_fetch_array(mysqli_query($con,"SELECT tinh.tentinh FROM tinh WHERE tinh.matinh ='$noidungsausua'"));
						$noidungsausua=$tt_noi_capsau['tentinh'];
					}elseif ($cot=='maxa') {
						$tt_maxatr = mysqli_fetch_array(mysqli_query($con,"SELECT xa.capxa, xa.tenxa FROM xa WHERE xa.maxa ='$noidungtruocsua'"));
						$noidungtruocsua=$tt_maxatr['capxa']." ".$tt_maxatr['tenxa'];
						$tt_maxasau = mysqli_fetch_array(mysqli_query($con,"SELECT xa.capxa, xa.tenxa FROM xa WHERE xa.maxa ='$noidungsausua'"));
						$noidungsausua=$tt_maxasau['capxa']." ".$tt_maxasau['tenxa'];
					}elseif ($cot=='mahuyen') {
						$tt_mahuyentr = mysqli_fetch_array(mysqli_query($con,"SELECT huyen.caphuyen,huyen.tenhuyen FROM huyen WHERE huyen.mahuyen ='$noidungtruocsua'"));
						$noidungtruocsua=$tt_mahuyentr['caphuyen']." ".$tt_mahuyentr['tenhuyen'];
						$tt_mahuyensau = mysqli_fetch_array(mysqli_query($con,"SELECT huyen.caphuyen,huyen.tenhuyen FROM huyen WHERE huyen.mahuyen ='$noidungsausua'"));
						$noidungsausua=$tt_mahuyensau['caphuyen']." ".$tt_mahuyensau['tenhuyen'];
					}elseif ($cot=='matinh') {
						$tt_matinhtr = mysqli_fetch_array(mysqli_query($con,"SELECT tinh.tentinh FROM tinh WHERE tinh.matinh ='$noidungtruocsua'"));
						$noidungtruocsua=$tt_matinhtr['tentinh'];
						$tt_matinhsau = mysqli_fetch_array(mysqli_query($con,"SELECT tinh.tentinh FROM tinh WHERE tinh.matinh ='$noidungsausua'"));
						$noidungsausua=$tt_matinhsau['tentinh'];
					}
					// Thông tin các bộ
					$canbotdoi = mysqli_fetch_array(mysqli_query($con, "SELECT  can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo WHERE id_canbo='$row[nguoisua]'"));
					// thông tin lớp
					$tt_sinh_vien = mysqli_fetch_array(mysqli_query($con, "SELECT  sinh_vien.mssv,sinh_vien.ho_sv, sinh_vien.ten_sv FROM sinh_vien WHERE sinh_vien.id_sinhvien='$row[iddulieu]'"));
					// thông tin khoa sửa của lớp
					echo "
					<tr>
						<td style='text-align:center;'>$stt</td>
						<td class='canhgiua chuinhoa'>$tt_sinh_vien[mssv]</td>
						<td class=' chuinthuong'>$tt_sinh_vien[ho_sv] $tt_sinh_vien[ten_sv]</td>
						<td class='chuinthuong'>$row[tencot]</td>
						<td class=' ";
						if ($cot=="id_lop") {
							echo "chuinhoa";
						}
						echo "'>$noidungtruocsua</td>
						<td class=' ";
						if ($cot=="id_lop") {
							echo "chuinhoa";
						}
						echo "'>$noidungsausua</td>
						<td class='chuinthuong '>$canbotdoi[ho_can_bo] $canbotdoi[ten_can_bo]</td>
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
