<?php
include 'conn.php';
	if (isset($_GET['phongo'])) {
		$selecet_sinh_vien = mysqli_query($con, "SELECT sinh_vien.id_sinhvien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv, sinh_vien.ngay_sinh, sinh_vien.gioi_tinh, sinh_vien.que_quan, sinh_vien.so_cmnd, sinh_vien.ngay_cap, sinh_vien.noi_cap, sinh_vien.matinh, sinh_vien.mahuyen, sinh_vien.maxa, sinh_vien.so_nha, sinh_vien.so_dt, sinh_vien.email, sinh_vien.hotencha, sinh_vien.sdtcha, sinh_vien.hotenme, sinh_vien.sdtme, sinh_vien.id_lop, phong.idphong, phong.ma_phong, toa_nha.ten_toa_nha, toa_nha.ma_toa_nha, toa_nha.id_toanha,toa_nha.loai_toa_nha, lop.id_lop, lop.ten_lop, o_phong.ngay_bat_dau , o_phong.id_ophong,o_phong.hoc_ky, o_phong.nam_hoc FROM toa_nha,sinh_vien, o_phong, phong, lop WHERE sinh_vien.xoa=0 and  phong.idphong ='$_GET[phongo]' and o_phong.ngay_ket_thuc IS NULL AND o_phong.id_sinhvien= sinh_vien.id_sinhvien AND o_phong.id_phong=phong.idphong AND toa_nha.id_toanha = phong.id_toanha and sinh_vien.id_lop= lop.id_lop ORDER BY toa_nha.loai_toa_nha, toa_nha.ten_toa_nha, phong.ma_phong,sinh_vien.ten_sv, o_phong.ngay_bat_dau ");
		 		
	}elseif (isset($_GET['nu'])) {
		$selecet_sinh_vien = mysqli_query($con, "SELECT sinh_vien.id_sinhvien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv, sinh_vien.ngay_sinh, sinh_vien.gioi_tinh, sinh_vien.que_quan, sinh_vien.so_cmnd, sinh_vien.ngay_cap, sinh_vien.noi_cap, sinh_vien.matinh, sinh_vien.mahuyen, sinh_vien.maxa, sinh_vien.so_nha, sinh_vien.so_dt, sinh_vien.email, sinh_vien.hotencha, sinh_vien.sdtcha, sinh_vien.hotenme, sinh_vien.sdtme, sinh_vien.id_lop, phong.idphong, phong.ma_phong, toa_nha.ten_toa_nha, toa_nha.ma_toa_nha, toa_nha.id_toanha,toa_nha.loai_toa_nha, lop.id_lop, lop.ten_lop, o_phong.ngay_bat_dau , o_phong.id_ophong ,o_phong.hoc_ky, o_phong.nam_hoc FROM toa_nha,sinh_vien, o_phong, phong, lop WHERE sinh_vien.xoa=0 and sinh_vien.gioi_tinh='Nữ' and o_phong.ngay_ket_thuc IS NULL AND o_phong.id_sinhvien= sinh_vien.id_sinhvien AND o_phong.id_phong=phong.idphong AND toa_nha.id_toanha = phong.id_toanha and sinh_vien.id_lop= lop.id_lop ORDER BY toa_nha.loai_toa_nha, toa_nha.ten_toa_nha, phong.ma_phong,sinh_vien.ten_sv, o_phong.ngay_bat_dau ");
	}elseif (isset($_GET['nam'])) {
		$selecet_sinh_vien = mysqli_query($con, "SELECT sinh_vien.id_sinhvien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv, sinh_vien.ngay_sinh, sinh_vien.gioi_tinh, sinh_vien.que_quan, sinh_vien.so_cmnd, sinh_vien.ngay_cap, sinh_vien.noi_cap, sinh_vien.matinh, sinh_vien.mahuyen, sinh_vien.maxa, sinh_vien.so_nha, sinh_vien.so_dt, sinh_vien.email, sinh_vien.hotencha, sinh_vien.sdtcha, sinh_vien.hotenme, sinh_vien.sdtme, sinh_vien.id_lop, phong.idphong, phong.ma_phong, toa_nha.ten_toa_nha, toa_nha.ma_toa_nha, toa_nha.id_toanha,toa_nha.loai_toa_nha, lop.id_lop, lop.ten_lop, o_phong.ngay_bat_dau , o_phong.id_ophong ,o_phong.hoc_ky, o_phong.nam_hoc FROM toa_nha,sinh_vien, o_phong, phong, lop WHERE sinh_vien.xoa=0 and sinh_vien.gioi_tinh='Nam' and o_phong.ngay_ket_thuc IS NULL AND o_phong.id_sinhvien= sinh_vien.id_sinhvien AND o_phong.id_phong=phong.idphong AND toa_nha.id_toanha = phong.id_toanha and sinh_vien.id_lop= lop.id_lop ORDER BY toa_nha.loai_toa_nha, toa_nha.ten_toa_nha, phong.ma_phong,sinh_vien.ten_sv, o_phong.ngay_bat_dau ");
	}else{
		$selecet_sinh_vien = mysqli_query($con, "SELECT sinh_vien.id_sinhvien, sinh_vien.mssv, sinh_vien.ho_sv, sinh_vien.ten_sv, sinh_vien.ngay_sinh, sinh_vien.gioi_tinh, sinh_vien.que_quan, sinh_vien.so_cmnd, sinh_vien.ngay_cap, sinh_vien.noi_cap, sinh_vien.matinh, sinh_vien.mahuyen, sinh_vien.maxa, sinh_vien.so_nha, sinh_vien.so_dt, sinh_vien.email, sinh_vien.hotencha, sinh_vien.sdtcha, sinh_vien.hotenme, sinh_vien.sdtme, sinh_vien.id_lop, phong.idphong, phong.ma_phong, toa_nha.ten_toa_nha, toa_nha.ma_toa_nha, toa_nha.id_toanha,toa_nha.loai_toa_nha, lop.id_lop, lop.ten_lop, o_phong.ngay_bat_dau , o_phong.id_ophong ,o_phong.hoc_ky, o_phong.nam_hoc FROM toa_nha,sinh_vien, o_phong, phong, lop WHERE sinh_vien.xoa=0 and o_phong.ngay_ket_thuc IS NULL AND o_phong.id_sinhvien= sinh_vien.id_sinhvien AND o_phong.id_phong=phong.idphong AND toa_nha.id_toanha = phong.id_toanha and sinh_vien.id_lop= lop.id_lop ORDER BY toa_nha.loai_toa_nha, toa_nha.ten_toa_nha, phong.ma_phong,sinh_vien.ten_sv, o_phong.ngay_bat_dau ");
	}
		if (!mysqli_num_rows($selecet_sinh_vien)) {
			echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
		} else {
		?>
		<div class="table-responsive">
			<table class="table table-hover table-bordered table-striped" id="myTable">
				<thead>
					<tr>
						<th style="text-align:center;" class="stt_sv">STT</th>
						<th>Phòng</th>
						<th>MSSV</th>
						<th style="width:120px;">Tên Sinh viên</th>
						<th>Ngày sinh</th>
						<th style="width:40px;">Giới <br>tính</th>
						<th>Quê <br>Quán</th>
						<th class="hidden" style="width:300px;">HKTT</th>
						<th>Điện thoại</th>
						<th>Lớp</th>
						<th style="width:40px;">Hoc kỳ <br>Năm học</th>
						<th>Ở ngày</th>
						<th>Chuyển</th>
						<th>Chi tiết</th>
						<th>Nghỉ</th>
						<th>Ghi <br> chú</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$stt = 1;
					$ngayhethong= strtotime(date("m/d/Y"));
					$ngay_hk2_1 = strtotime("1/1/".date("Y"));
					$ngayht_hk2_2= strtotime("5/30".date("Y"));
					$ngayht_hk_he_2 = strtotime("7/30/".date("Y"));
					$ngayht_hk1_1 = strtotime("12/30/".date("Y"));
					
					while ($row_sinh_vien = mysqli_fetch_array($selecet_sinh_vien)) {
						$diachi2='';
						$diachi1='';
						// lấy địa chỉ
						$diachi = mysqli_fetch_array(mysqli_query($con, "SELECT xa.capxa, xa.tenxa, huyen.tenhuyen, huyen.caphuyen, tinh.tentinh FROM tinh INNER JOIN huyen ON tinh.matinh = huyen.matinh INNER JOIN xa ON huyen.mahuyen = xa.mahuyen WHERE xa.maxa = '$row_sinh_vien[maxa]'"));
						$diachi1=$row_sinh_vien['so_nha'].",".$diachi["capxa"] .$diachi['tenxa'].",".$diachi["caphuyen"].$diachi['tenhuyen'].",".$diachi['tentinh'];
						 $diachi22 = mysqli_fetch_array(mysqli_query($con, "SELECT  tinh.tentinh FROM tinh  WHERE tinh.matinh = '$row_sinh_vien[que_quan]'"));
						 $diachi2=$diachi22['tentinh'];
						//end địa chỉ
						// lấy tên lớp
						 $lop = mysqli_fetch_array(mysqli_query($con, "SELECT lop.ma_lop FROM lop WHERE lop.xoa =0 AND lop.id_lop ='$row_sinh_vien[id_lop]'"));
						$lop1=$lop["ma_lop"];
						//end tên lớp
					echo "
					<tr>
						<td style='text-align:center;'>$stt</td>
						<td style='text-align:center;' class='chuinhoa'>$row_sinh_vien[ma_phong]-$row_sinh_vien[ma_toa_nha]</td>
						<td class='chuinhoa canhgiua'>$row_sinh_vien[mssv]</td>
						<td class='chuinthuong'>$row_sinh_vien[ho_sv] $row_sinh_vien[ten_sv]</td>
						<td class='canhgiua'>".date('d/m/Y', strtotime($row_sinh_vien["ngay_sinh"]))."</td>
						<td class='canhgiua chuinthuong'>$row_sinh_vien[gioi_tinh]</td>
						<td class='canhgiua chuinthuong'>$diachi2</td>
						<td class='canhgiua chuinthuong hidden '>$diachi1</td>
						<td class='canhgiua chuinhoa'>$row_sinh_vien[so_dt]</td>
						<td class='chuinhoa'>$lop1</td>
						<td class=' canhgiua'>$row_sinh_vien[hoc_ky] <br> $row_sinh_vien[nam_hoc]</td>
						<td class='canhgiua'>".date('d/m/Y', strtotime($row_sinh_vien["ngay_bat_dau"]))."</td>

						";

						?>
						<td class="canhgiuanek12"><input type="button" name="edit" value="Chuyển" id="<?php echo $row_sinh_vien['id_ophong']; ?>" class="btn btn-primary btn-xs id_sua_sinh_vien_o_phong" /></td>
						<td class="canhgiuanek12"><input type="button" name="view" value="Chi tiết" id="<?php echo $row_sinh_vien['id_ophong']; ?>" class="btn btn-success btn-xs view_chitietsinh_vien_o_phong" /></td>
						<td class="canhgiuanek12"><input type="button" name="delete" value="Nghỉ ở" id="<?php echo $row_sinh_vien['id_ophong']; ?>" class="btn btn-info btn-danger btn-xs xoa_sinh_vien_o_phong" /></td>
						<?php 
						$hoc_ky1 = $row_sinh_vien["hoc_ky"];

						if ( $hoc_ky1==2  && $ngayhethong >= $ngay_hk2_1 && $ngayhethong<=$ngayht_hk2_2  ) {
							echo "<td></td>";
						}else if ( $hoc_ky1=="Hè"  && $ngayhethong > $ngayht_hk2_2 && $ngayhethong<=$ngayht_hk_he_2  ) {
							echo "<td></td>";
						}else if ( $hoc_ky1==1  && $ngayhethong > $ngayht_hk_he_2 && $ngayhethong<=$ngayht_hk1_1  ) {
							echo "<td></td>";
						}else{
							echo "<td style='color:red'>Quá hạn</td>";
						}
						echo "	</tr>	";
					$stt++;
					}
					?>
				</tbody>
			</table>
		</div>
		<?php
}
?>