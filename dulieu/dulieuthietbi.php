<?php
include 'conn.php';
	$selecet_khoa = mysqli_query($con, "SELECT * FROM thietbi WHERE thietbi.xoa=0 ORDER BY thietbi.tenthietbi");
	if (!mysqli_num_rows($selecet_khoa)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Mã Thiết bị</th>
				<th>Tên thiết bị</th>
				<th>Số Phòng </th>
				<th>Đang trang <br> bị (cái) </th>
				<th>Đang hỏng <br>(cái)</th>
				<th>Đã hỏng <br>(cái)</th>
				<th>Sửa</th>
				<th>Chi tiết</th>
				<th>Phòng</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$stt = 1;
				while ($row = mysqli_fetch_array($selecet_khoa)) {
					$can_bothem = mysqli_fetch_array(mysqli_query($con, "SELECT  can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo WHERE id_canbo='$row[id_canbothem]'"));
					$slp = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(phong.idphong) AS slp from  phong, loaiphongcothietbi ctb WHERE ctb.idtb='$row[idtb]' AND ctb.xoa=0 AND phong.id_loaiphong = ctb.id_loaiphong"));
					// tính số lượng thiêt bị
					$sltb = mysqli_fetch_array(mysqli_query($con, "SELECT  sum(ctb.soluong)AS sltb from  loaiphongcothietbi ctb WHERE ctb.idtb='$row[idtb]' AND ctb.xoa=0"));
					// tinh số lượng thiết bị hỏng
					$slhong_tb = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(slhong) as slhong_tb FROM tinhtrang_thietbi_phong, loaiphongcothietbi WHERE loaiphongcothietbi.idcothietbi=tinhtrang_thietbi_phong.idcothietbi and tinhtrang_thietbi_phong.xoa=0 AND loaiphongcothietbi.xoa=0 AND loaiphongcothietbi.idtb='$row[idtb]'"));
					$slhong_dahong_tb = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(slhong) as slhong_dahong_tb FROM tinhtrang_thietbi_phong, loaiphongcothietbi WHERE loaiphongcothietbi.idcothietbi=tinhtrang_thietbi_phong.idcothietbi and tinhtrang_thietbi_phong.xoa=1 AND loaiphongcothietbi.xoa=0 AND loaiphongcothietbi.idtb='$row[idtb]'"));
					
					echo "
					<tr>
						<td style='text-align:center;'>$stt</td>
						<td class='chuinhoa canhgiua' >$row[mathietbi]</td>
						<td class='chuinthuong'>$row[tenthietbi]</td>
						<td class='canhgiua'>$slp[slp]</td>
						<td class='canhgiua'>".$sltb['sltb']*$slp['slp']."</td>
						<td class='canhgiua'>".$slhong_tb['slhong_tb']."</td>
						<td class='canhgiua'>".$slhong_dahong_tb['slhong_dahong_tb']."</td>
					";
					?>	
						<td class="canhgiuanek12"><input type="button" name="edit" value="Sửa" id="<?php echo $row['idtb']; ?>" class="btn btn-primary btn-xs id_sua_thietbi" /></td>
						<td class="canhgiuanek12"><input type="button" name="view" value="Chi tiết" id="<?php echo$row['idtb'];?>" class="btn btn-success btn-xs view_chitietthietbi" /></td>
						<td class="canhgiua">
							<a href="./../admin/quanly_kiemtrathietbi.php?thietbi=<?php echo$row['idtb'];?>" title="">
								<input type="button" name="view" value="Phòng" id="" class="btn btn-info btn-xs view_chitietthietbi" />
							</a>
						</td>
						<td class="canhgiuanek12"><input type="button" name="delete" value="Xóa" id="<?php echo$row['idtb'];?>" class="btn btn-info btn-danger btn-xs xoa_thietbi" /></td>
					<?php	
					 echo "</tr>";
					
					$stt++;
				}
			?>
		</tbody>
	</table>
</div>
<?php } ?>
