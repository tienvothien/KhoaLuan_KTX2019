<?php
include 'kiemtradangnhap.php';
  if (isset($_POST["id_chitietkhoa"])) {
  $output = '';
  include 'conn.php';
  $query = "SELECT * FROM khoa INNER JOIN can_bo ON khoa.id_canbothem = can_bo.id_canbo WHERE khoa.xoa=0 AND khoa.id_khoa='".$_POST["id_chitietkhoa"] . "'";
  $result = mysqli_query($con, $query);
  $output .= '
<div class="table-responsive">
  <table class="table table-bordered table-hover">';
      while ($row = mysqli_fetch_array($result)) {
        //dem số lượng lớp đang có sinh viên ở
        $sllop = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_lop) as sollop FROM lop WHERE lop.xoa =0 and id_khoa='$row[id_khoa]'"));
        //đếm số lượng sinh viên đang ở trong ký túc xá
        $output .= '
    <tr>
      <td width="30%"><label>Mã khoa</label></td>
      <td width="70%" style="text-transform: uppercase;">' . $row["ma_khoa"] . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Tên khoa</label></td>
      <td width="70%" style=" text-transform: capitalize;">' . $row["ten_khoa"] . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Cán bộ thêm</label></td>
      <td width="70%" style=" text-transform: capitalize;">' . $row["ho_can_bo"] . " " . $row["ten_can_bo"] . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Ngày thêm</label></td>
      <td width="70%">' . date('d/m/Y', strtotime($row["ngay"])) . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Số lượng lớp</label></td>
      <td>'.$sllop['sollop'].'</td>
    </tr>
    <tr>
      <td width="30%"><label>Số lượng sinh viên</label></td>
      <td width="70%" style=" text-transform: capitalize;">nhó viets thuat toán</td>
    </tr>
    ';
      }
      $output .= '
  </table>
</div>
';
  echo $output;
}
// dữ liệu lớp
  if (isset($_POST["id_chitietlop"])) {
  $output = '';
  include 'conn.php';
  $query = "SELECT * FROM  khoa INNER JOIN  lop  on lop.id_khoa = khoa.id_khoa INNER JOIN can_bo ON lop.id_canbothem = can_bo.id_canbo WHERE lop.xoa=0  and lop.id_lop='".$_POST["id_chitietlop"] . "'";
  $result = mysqli_query($con, $query);
  $output .= '
<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped">';
      while ($row = mysqli_fetch_array($result)) {
        $namkt= $row['nam_BD']+4;
        //dem số lượng lớp đang có sinh viên ở
        $slsinh_vien = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_sinhvien) as solsinh_vien FROM sinh_vien WHERE id_lop='$row[id_lop]'"));
        //đếm số lượng sinh viên đang ở trong ký túc xá
        $output .= '
    <tr>
      <td width="30%"><label>Mã Lớp</label></td>
      <td width="70%" style="text-transform: uppercase;">' . $row["ma_lop"] . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Tên Lớp</label></td>
      <td width="70%" style=" text-transform: capitalize;">' . $row["ten_lop"] . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Khoa</label></td>
      <td width="70%" style=" text-transform: capitalize;">' . $row["ten_khoa"] . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Khóa</label></td>
      <td width="70%" style=" text-transform: capitalize;">' . $row["khoa"] . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Niên khóa</label></td>
      <td width="70%" style=" text-transform: capitalize;">' . $row["nam_BD"] .'-'.$namkt.'</td>
    </tr>
    <tr>
      <td width="30%"><label>Cán bộ thêm</label></td>
      <td width="70%" style=" text-transform: capitalize;">' . $row["ho_can_bo"] . " " . $row["ten_can_bo"] . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Ngày thêm</label></td>
      <td width="70%">' . date('d/m/Y', strtotime($row["ngay"])) . '</td>
    </tr>
    <tr>
      <td width="30%"><label>Số lượng sinh viên</label></td>
      <td width="70%" style=" text-transform: capitalize;">'.$slsinh_vien['solsinh_vien'].'</td>
    </tr>
    ';
      }
      $output .= '
  </table>
</div>
';
  echo $output;
 }// end xử lý hiện thông tin lớp
 // dữ liệu Thiết bị
   if (isset($_POST["id_chitietthietbi"])) {
  $output = '';
  include 'conn.php';
  $query = "SELECT thietbi.mathietbi, thietbi.tenthietbi, can_bo.ho_can_bo, can_bo.ten_can_bo, thietbi.ngaythem FROM thietbi INNER JOIN can_bo ON thietbi.id_canbothem = can_bo.id_canbo WHERE thietbi.idtb ='$_POST[id_chitietthietbi]' and thietbi.xoa=0";
  $result = mysqli_query($con, $query);
  $output .= '
  <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">';
       while ($sel_dlthitebi = mysqli_fetch_array($result)) {
        $output .= '
          <tr>
            <td width="30%"><label>Mã Lớp</label></td>
            <td width="70%" style="text-transform: uppercase;">' . $sel_dlthitebi["mathietbi"] . '</td>
          </tr>
          <tr>
            <td width="30%"><label>Tên Lớp</label></td>
            <td width="70%" style=" text-transform: capitalize;">' . $sel_dlthitebi["tenthietbi"] . '</td>
          </tr>
          
          <tr>
            <td width="30%"><label>Cán bộ thêm</label></td>
            <td width="70%" style=" text-transform: capitalize;">' . $sel_dlthitebi["ho_can_bo"] . " " . $sel_dlthitebi["ten_can_bo"] . '</td>
          </tr>
          <tr>
            <td width="30%"><label>Ngày thêm</label></td>
            <td width="70%">' . date("d/m/Y H:i:s", strtotime($sel_dlthitebi['ngaythem'])) . '</td>
          </tr>
          
            ';
              }
        $output .= '
    </table>
  </div>
  ';
    echo $output;
  }
 // end xử lý hiện thông tin Thiết bị
?>