<?php
include 'conn.php';
	$selecet_lp = mysqli_query($con, "SELECT * FROM log_sua_dl, loaiphongcothietbi ctb, thietbi WHERE log_sua_dl.bangsua='loaiphongcothietbi' and thietbi.idtb=ctb.idtb and ctb.idcothietbi= log_sua_dl.iddulieu");
	if (!mysqli_num_rows($selecet_lp)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th>STT</th>
				<th >Tên Loại Phòng</th>
				<th >Thiết bị</th>
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
					$tt_loai_phong = mysqli_fetch_array(mysqli_query($con, "SELECT  loai_phong.ma_loai_phong,loai_phong.ten_loai_phong FROM loai_phong inner join loaiphongcothietbi ctb on ctb.id_loaiphong = loai_phong.id_loaiphong WHERE ctb.idcothietbi='$row[iddulieu]'"));
					// kiem tra noi dung thay doi 
					$noidungtrc= $noidungs ='';
					if ($row['cot']=='id_loaiphong') {// noi dung thay doi là loai phong
						$tt1_loai_phong = mysqli_fetch_array(mysqli_query($con, "SELECT  loai_phong.ma_loai_phong,loai_phong.ten_loai_phong FROM loai_phong WHERE loai_phong.id_loaiphong='$row[noidungtruocsua]'"));
						$noidungtrc = $tt1_loai_phong['ten_loai_phong'];
						$tt2_loai_phong = mysqli_fetch_array(mysqli_query($con, "SELECT  loai_phong.ma_loai_phong,loai_phong.ten_loai_phong FROM loai_phong WHERE loai_phong.id_loaiphong='$row[noidungsausua]'"));
						$noidungs = $tt2_loai_phong['ten_loai_phong'];
					}//end noi dung thay doi là loai phong
					if ($row['cot']=='idtb') {// noi dung thay doi là thiet bi
						$tt1_thietbi = mysqli_fetch_array(mysqli_query($con, "SELECT  thietbi.mathietbi,thietbi.tenthietbi FROM thietbi WHERE thietbi.idtb='$row[noidungtruocsua]'"));
						$noidungtrc = $tt1_thietbi['tenthietbi'];
						$tt2_thietbi = mysqli_fetch_array(mysqli_query($con, "SELECT  thietbi.mathietbi,thietbi.tenthietbi FROM thietbi WHERE thietbi.idtb='$row[noidungsausua]'"));
						$noidungs = $tt2_thietbi['tenthietbi'];
					}//end noi dung thay doi là thiet bi
					if ($row['cot']=='soluong') {// noi dung thay doi là số lượng
						
						$noidungtrc = $row['noidungtruocsua'];
						
						$noidungs = $row['noidungsausua'];
					}//end noi dung thay doi là số lượng
					echo "
					<tr>
						<td style='text-align:center;'>$stt</td>
						<td class='chuinthuong'>$tt_loai_phong[ten_loai_phong]</td>
						<td class='chuinthuong'>$row[tenthietbi]</td>
						<td class='chuinthuong'>$row[tencot]</td>
						<td class=''>$noidungtrc</td>
						<td class=''>$noidungs</td>
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
