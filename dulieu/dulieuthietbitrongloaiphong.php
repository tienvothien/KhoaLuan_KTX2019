<?php
include 'conn.php';
$query1 = mysqli_query($con, " SELECT loaiphongcothietbi.idcothietbi, loai_phong.id_loaiphong, loai_phong.ten_loai_phong, thietbi.idtb, thietbi.tenthietbi, loaiphongcothietbi.soluong FROM loaiphongcothietbi INNER JOIN thietbi ON loaiphongcothietbi.idtb = thietbi.idtb INNER JOIN loai_phong ON loaiphongcothietbi.id_loaiphong = loai_phong.id_loaiphong WHERE loai_phong.xoa=0 AND thietbi.xoa=0 AND loaiphongcothietbi.xoa=0 ORDER BY loai_phong.id_loaiphong");
if (mysqli_num_rows($query1)) {
?>
<table class="table table-hover table-bordered table-striped" id="myTable"  cellspacing='0' cellpadding='0' >
	<thead>
		<tr >
			<th class="text-center">STT</th>
			<th class="text-center align-middle">Tên loại phòng</th>
			<th class="text-center">Tên thiết bị</th>
			<th class="text-center">Số lượng <br>/phòng (cái)</th>
			<th class="text-center">Số phòng</th>
			<th class="text-center">Tổng số thiết bị </th>
			<th class="canhgiua">Sửa</th>
			<th class="canhgiua">Chi tiết</th>
			<th colspan="" rowspan="" headers="" scope="">Phòng</th>
			<th class="canhgiua">Xóa</th>
			
		</tr>
	</thead>
	<tbody>
		<?php
			// taij cacs array
			$arr = array();
			$idcothietbi = array();
			$tenthietbi = array();
			$id_loaiphong = array();
			$ten_loai_phong = array();
			$soluong = array();
			
			$stt = 1;
			// lấy dữ liệu từ  câu lệnh SQL
			while ($row = mysqli_fetch_assoc($query1)) {
				array_push($tenthietbi, $row['tenthietbi']);
				array_push($idcothietbi, $row['idcothietbi']);
				array_push($id_loaiphong, $row['id_loaiphong']);
				array_push($ten_loai_phong, $row['ten_loai_phong']);
				array_push($soluong, $row['soluong']);
				// kiểm tra xem id loại phong có trung không
				if (!isset($arr[$row['id_loaiphong']])) {
					$arr[$row['id_loaiphong']]['rowspan'] = 0;
				}
				$arr[$row['id_loaiphong']]['printed'] = 'no';
				$arr[$row['id_loaiphong']]['rowspan'] += 1;
			}
			//đem số lượng phòng 
			
			// in ra bằng dòng lệnh For
			for ($i = 0; $i < sizeof($tenthietbi); $i++) {
				$id_loaiPhongNam = $id_loaiphong[$i];
				$i2=$i+1;
				$slphong = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(phong.idphong) AS slphong FROM phong INNER JOIN loai_phong ON phong.id_loaiphong = loai_phong.id_loaiphong WHERE loai_phong.id_loaiphong='$id_loaiphong[$i]' AND phong.xoa=0 AND loai_phong.xoa=0"));
				echo "
					<tr>
						<td class='canhgiua'>".$i2."</td>";
						// nếu trùng thi tinh rowpan
						if ($arr[$id_loaiPhongNam]['printed'] == 'no') {
							echo "
								<td class='canhgiua textnamgiua' rowspan='" . $arr[$id_loaiPhongNam]['rowspan'] . "'   >" . $ten_loai_phong[$i] . "
								</td>";
							$arr[$id_loaiPhongNam]['printed'] = 'yes';
						}// ket thuc tính rowspan
						;
						echo "
						<td class='chuinthuong'>" . $tenthietbi[$i] . "</td>
						<td class='canhgiua'>" . $soluong[$i] . "</td>
						<td class='canhgiua'>" . $slphong['slphong'] . "</td>
						<td class='canhgiua'>" . $tongslthietbi=$soluong[$i]*$slphong['slphong'] . "</td>

					";
				?>
				
				<td class="canhgiuanek12"><input type="button" name="edit" value="Sửa" id="<?php echo $idcothietbi[$i]; ?>" class="btn btn-primary btn-xs id_sua_thietbitrongloaiphong" /></td>
				<td class="canhgiuanek12"><input type="button" name="view" value="Chi tiết" id="<?php echo $idcothietbi[$i]; ?>" class="btn btn-success btn-xs view_chitietthietbitrongloaiphong" /></td>
				<td class="canhgiua">
					<a href="./../admin/quanly_kiemtrathietbi.php?thietbiphong=<?php echo $idcothietbi[$i]; ?>" title="">
						<input type="button" name="view" value="Phòng" id="" class="btn btn-success btn-xs " />
					</a>
				</td>
				<td class="canhgiuanek12"><input type="button" name="delete" value="Xóa" id="<?php echo $idcothietbi[$i]; ?>" class="btn btn-info btn-danger btn-xs xoa_thietbitrongloaiphong" /></td>
			<?php
				echo "</tr>
				";
			}
		} else {
			echo " Chưa có dữ liệu";
		}
		?>
	</tbody>
</table>
