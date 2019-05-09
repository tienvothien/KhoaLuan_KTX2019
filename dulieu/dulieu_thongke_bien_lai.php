<?php
	include 'conn.php';
	
	$selecet_bien_lai = mysqli_query($con, "SELECT * FROM loai_bien_lai");
	if (!mysqli_num_rows($selecet_bien_lai)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th style="text-align:center;">STT</th>
				<th>Loại <br>biên lai</th>
				<th>Số <br> biên lai</th>
				<th>Số <br> Số tiền</th>
				
				
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			$tong=0;
			$tong_tien=0;
			while ($row_bien_lai = mysqli_fetch_array($selecet_bien_lai)) {
				
				if (isset($_POST['timkiem_bien_lai_ngay_batdau']) && isset($_POST['timkiem_bien_laigngay_kethuc']) && isset($_POST['timkiem_bien_lai_id_toanha'])) {
					$timkiem_bien_lai_ngay_batdau=$_POST['timkiem_bien_lai_ngay_batdau'];
					$timkiem_bien_laigngay_kethuc=$_POST['timkiem_bien_laigngay_kethuc'];
					$timkiem_bien_lai_id_toanha=$_POST['timkiem_bien_lai_id_toanha'];
					if ($timkiem_bien_lai_ngay_batdau=='') {
						$timkiem_bien_lai_ngay_batdau='2015/1/1';
					}
					if ($timkiem_bien_laigngay_kethuc=='') {
						$timkiem_bien_laigngay_kethuc=date("Y/m/d");
					}
					if ($timkiem_bien_lai_id_toanha!='' ) {
						$slbl = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(bien_lai.id) AS slbl, sum(bien_lai.so_tien) AS sltien FROM loai_bien_lai, bien_lai,phong, toa_nha WHERE bien_lai.id_loai_bien_lai= loai_bien_lai.id AND loai_bien_lai.id='$row_bien_lai[id]' AND bien_lai.ngay_them >='$timkiem_bien_lai_ngay_batdau' AND bien_lai.ngay_them <='$timkiem_bien_laigngay_kethuc' AND bien_lai.id_phong = phong.idphong AND phong.id_toanha=toa_nha.id_toanha AND toa_nha.id_toanha='$timkiem_bien_lai_id_toanha'"));
					}else{
						$slbl = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(bien_lai.id) AS slbl, sum(bien_lai.so_tien) AS sltien FROM loai_bien_lai, bien_lai WHERE bien_lai.id_loai_bien_lai= loai_bien_lai.id AND loai_bien_lai.id='$row_bien_lai[id]' AND bien_lai.ngay_them >='$timkiem_bien_lai_ngay_batdau' AND bien_lai.ngay_them <='$timkiem_bien_laigngay_kethuc'"));

					}
				}else{
				// số lượng biên lai
					$slbl = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(bien_lai.id) AS slbl, sum(bien_lai.so_tien) AS sltien FROM loai_bien_lai, bien_lai WHERE bien_lai.id_loai_bien_lai= loai_bien_lai.id AND loai_bien_lai.id='$row_bien_lai[id]'"));

				}
				$tong_tien+=$slbl["sltien"];
			echo "
			<tr>
					<td style='text-align:center;'>$stt</td>
					<td class='chuinthuong'>$row_bien_lai[ten_bien_lai] </td>
					<td class='chuinthuong canhgiua'>$slbl[slbl] </td>
					<td class='chuinthuong canhgiua'>". number_format ($slbl['sltien'] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," )." </td>
					
					
				";?>
				
				<?php echo "
			</tr>
			";
			$stt++;
			}
			echo "<tr>
					<td class='canhgiua' style='color:red; font-size:20px'>$stt</td>
					<td style='color:red; font-size:20px'>Tổng</td>
					<td></td>
					<td class='canhgiua' style='color:red; font-size:20px'>". number_format ($tong_tien , $decimals = 0 , $dec_point = "." , $thousands_sep = "," )."</td>
			</tr>";
			?>
		</tbody >
		
		</style>
	</table>
	
	<?php
	}
	?>