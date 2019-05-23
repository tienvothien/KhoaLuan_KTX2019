<?php
include 'conn.php';

	$selecet_sinh_vien = mysqli_query($con, "SELECT * FROM sinh_vien WHERE sinh_vien.xoa=0  order by sinh_vien.ten_sv, sinh_vien.ho_sv");
	if (!mysqli_num_rows($selecet_sinh_vien)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;" class="stt_sv">STT</th>
				<th>MSSV</th>
				<th style="width: auto;">Tên Sinh viên</th>
				<th>Ngày sinh</th>
				<th>Giới tính</th>
				<th>Quê Quán</th>
				<th class="hide">HKTT</th>
				<th class="hide">Điện thoại</th>
				<th>Họ tên Cha</th>
				<th>SĐT cha</th>
				<th>Họ tên Mẹ</th>
				<th>SĐT Mẹ</th>
				<th>Lớp</th>
				<th>Sửa</th>
				<th>Chi tiết</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
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
				<td class='chuinhoa canhgiua'>$row_sinh_vien[mssv]</td>
				<td class='chuinthuong'>$row_sinh_vien[ho_sv] $row_sinh_vien[ten_sv]</td>
				<td class='canhgiua'>".date('d/m/Y', strtotime($row_sinh_vien["ngay_sinh"]))."</td>
				<td class='canhgiua chuinthuong'>$row_sinh_vien[gioi_tinh]</td>
				<td class='canhgiua chuinthuong'>$diachi2</td>
				<td class=' chuinthuong hide'>$diachi1</td>

				<td class='canhgiua chuinhoa hide'>$row_sinh_vien[so_dt]</td>
				<td class='chuinthuong '>$row_sinh_vien[hotencha]</td>
				<td class='canhgiua chuinhoa '>$row_sinh_vien[sdtcha]</td>
				<td class='chuinthuong '>$row_sinh_vien[hotenme]</td>
				<td class='canhgiua chuinhoa '>$row_sinh_vien[sdtme]</td>
				<td class='chuinhoa'>$lop1</td>";?>
				<td class="canhgiuanek12"><input type="button" name="edit" value="Sửa" id="<?php echo $row_sinh_vien['id_sinhvien']; ?>" class="btn btn-primary btn-xs id_sua_sinh_vien" /></td>
				<td class="canhgiuanek12"><input type="button" name="view" value="Chi tiết" id="<?php echo $row_sinh_vien['id_sinhvien']; ?>" class="btn btn-success btn-xs view_chitietsinh_vien" /></td>
				
				<?php echo "
			</tr>
			";
			$stt++;
			}
			?>
		</tbody>
	</table>

<?php
}
?>