<?php

	if (isset($_POST["id_chitietsinh_vien"])) {
    $output = '';
    include 'conn.php';
    $query = "SELECT sv.mssv, sv.anh_ca_nhan, sv.ho_sv, sv.ten_sv, sv.ngay_sinh, sv.gioi_tinh, sv.que_quan, sv.so_cmnd, sv.ngay_cap, sv.noi_cap, sv.matinh, sv.mahuyen, sv.maxa, sv.so_nha,sv.so_dt, sv.email, sv.hotencha, sv.sdtcha, sv.hotenme, sv.sdtme, sv.id_lop, sv.id_canbothem, sv.ngay_them FROM sinh_vien sv WHERE sv.id_sinhvien ='$_POST[id_chitietsinh_vien]' and sv.xoa=0";
    $result = mysqli_query($con, $query);
    $output .= '
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">';
				$row = mysqli_fetch_array($result);
	         	// tìm quê quán  
				$quequan = mysqli_fetch_array(mysqli_query($con,"SELECT tinh.tentinh FROM sinh_vien INNER JOIN tinh ON sinh_vien.que_quan = tinh.matinh WHERE sinh_vien.id_sinhvien ='$_POST[id_chitietsinh_vien]'" ));
				// noi cap cmnd
				$noicapcmnd = mysqli_fetch_array(mysqli_query($con,"SELECT tinh.tentinh FROM sinh_vien INNER JOIN tinh ON sinh_vien.noi_cap = tinh.matinh WHERE sinh_vien.id_sinhvien ='$_POST[id_chitietsinh_vien]'" ));
				// tim lop
				$loptt = mysqli_fetch_array(mysqli_query($con,"SELECT lop.ma_lop, khoa.ten_khoa FROM sinh_vien INNER JOIN lop ON sinh_vien.id_lop = lop.id_lop INNER JOIN khoa ON lop.id_khoa = khoa.id_khoa WHERE sinh_vien.id_sinhvien ='$_POST[id_chitietsinh_vien]'" ));
				$diachi = mysqli_fetch_array(mysqli_query($con, "SELECT xa.tenxa, huyen.tenhuyen, tinh.tentinh FROM tinh INNER JOIN huyen ON tinh.matinh = huyen.matinh INNER JOIN xa ON huyen.mahuyen = xa.mahuyen WHERE xa.maxa = '$row[maxa]'"));
				$diachi1=$row['so_nha'].", Xã ".$diachi['tenxa'].", Huyện ".$diachi['tenhuyen'].", tỉnh ".$diachi['tentinh'];
				//canbothem
				$canbothem = mysqli_fetch_array(mysqli_query($con,"SELECT can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo FROM can_bo WHERE can_bo.xoa=0 and can_bo.id_canbo ='$row[id_canbothem]'"));
				$output .= '
				<tr>
					
					<td colspan="4" style="text-transform: uppercase;">
						<img src="./../images/'. $row["anh_ca_nhan"].'" class="img-responsive" alt="Image" style="width:100px; margin: auto;">
					</td>
				</tr>
				<tr>
					<th width="16%">MSSV</th>
					<td width="40%">'.$row['mssv'].'</td>
					<th width="16%">Họ và tên</th>
					<td class="chuinthuong" width="30%">'.$row['ho_sv'] . '&nbsp;'.$row['ten_sv'].'</td>
				</tr>
				<tr>
					<th >Ngày Sinh</th>
					<td >' . date('d/m/Y', strtotime($row["ngay_sinh"])) . '</td>
					<th>Giới tính</th>
					<td class="chuinthuong">'.$row['gioi_tinh'].'</td>
				</tr>
				<tr>
					<th>Số CMND</th>
					<td>'.$row['so_cmnd'].'</td>
				
					<th>Ngày Cấp <br> Nơi cấp</th>
					<td class="chuinthuong">'.date('d/m/Y', strtotime($row['ngay_cap'])).' <br> '.$noicapcmnd['tentinh'].'</td>
				</tr>
				<tr>
					<th>HKTT</th>
					<td class="chuinthuong">'.$diachi1.'</td>
					<th>Quê quán</th>
					<td class="chuinthuong" >'.$quequan['tentinh'].'</td>
				</tr>
				<tr>
					<th>Điện thoại</th>
					<td class=" chuinhoa">'.$row['so_dt'].'</td>
					<th>Email</th>
					<td class="" >'.$row['email'].'</td>
				</tr>
				<tr>
					<th>Lớp</th>
					<td class=" chuinhoa">'.$loptt['ma_lop'].'</td>
					<th>Khoa</th>
					<td class="chuinthuong" >'.$loptt['ten_khoa'].'</td>
				</tr>
				<tr>
					<th>Họ tên cha</th>
					<td class=" chuinthuong">'.$row['hotencha'].'</td>
					<th>SĐT cha</th>
					<td class="" >'.$row['sdtcha'].'</td>
				</tr>
				<tr>
					<th>Họ tên me</th>
					<td class=" chuinthuong">'.$row['hotenme'].'</td>
					<th>SĐT mẹ</th>
					<td class="" >'.$row['sdtme'].'</td>
				</tr>
				<tr>
					<th >Ngày thêm</th>
					<td >' . date('d/m/Y', strtotime($row["ngay_them"])) . '</td>
					<th>Cán bộ thêm</th>
					<td class="chuinthuong">'.$canbothem['ho_can_bo'].'&nbsp;'.$canbothem['ten_can_bo'].'<br>'.$canbothem['ma_can_bo'].'</td>
				</tr>
	';
	$output .= '
	    	</table>
	    </div>
	';
		echo $output;
	  }?>