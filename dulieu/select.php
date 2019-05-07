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
          $slsinhvien = mysqli_fetch_array(mysqli_query($con, "SELECT DISTINCT COUNT(o_phong.id_sinhvien) AS slsinhvien FROM sinh_vien, lop, o_phong WHERE sinh_vien.xoa=0 AND lop.xoa=0 AND o_phong.ngay_ket_thuc is NULL AND sinh_vien.id_lop=lop.id_lop AND lop.id_khoa='$row[id_khoa]' AND sinh_vien.id_sinhvien=o_phong.id_sinhvien"));
          $output .= '
      <tr>
        <td width="40%"><label>Mã khoa</label></td>
        <td width="60%" style="text-transform: uppercase;">' . $row["ma_khoa"] . '</td>
      </tr>
      <tr>
        <td width="40%"><label>Tên khoa</label></td>
        <td width="60%" style=" text-transform: capitalize;">' . $row["ten_khoa"] . '</td>
      </tr>
      <tr>
        <td width="40%"><label>Cán bộ thêm</label></td>
        <td width="60%" style=" text-transform: capitalize;">' . $row["ho_can_bo"] . " " . $row["ten_can_bo"] . '</td>
      </tr>
      <tr>
        <td width="40%"><label>Ngày thêm</label></td>
        <td width="60%">' . date('d/m/Y', strtotime($row["ngay"])) . '</td>
      </tr>
      <tr>
        <td width="40%"><label>Số lượng lớp</label></td>
        <td>'.$sllop['sollop'].'</td>
      </tr>
      <tr>
        <td width="40%"><label>Số lượng sinh viên Đang ở</label></td>
        <td width="60%" style=" text-transform: capitalize;">'.$slsinhvien['slsinhvien'].'</td>
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
   // dữ liệu chuc vu
  if (isset($_POST["id_chitietchucvu"])) {
      $output = '';
      include 'conn.php';
      $query = "SELECT chucvu.machucvu, chucvu.tenchucvu, can_bo.ho_can_bo, can_bo.ten_can_bo, chucvu.ngaythem FROM chucvu INNER JOIN can_bo ON chucvu.id_canbothem = can_bo.id_canbo WHERE chucvu.idchucvu ='$_POST[id_chitietchucvu]' and chucvu.xoa=0";
      $result = mysqli_query($con, $query);
      $output .= '
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">';
           while ($sel_dlthitebi = mysqli_fetch_array($result)) {
            $slchucvu = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_cochucvu) as solcochucvu FROM cochucvu WHERE idchucvu='$_POST[id_chitietchucvu]'"));
            $output .= '
              <tr>
                <td width="30%"><label>Mã Chức vụ</label></td>
                <td width="70%" style="text-transform: uppercase;" colspan="2">' . $sel_dlthitebi["machucvu"] . '</td>
                
              <tr>
                <td width="30%"><label>Tên Chức vụ</label></td>
                <td width="70%" colspan="2" style=" text-transform: capitalize;">' . $sel_dlthitebi["tenchucvu"] . '</td>
                 
              </tr>
              <tr>
                <td width="30%"><label>Số lượng cán bộ</label></td>
                <td width="70%"  style=" text-transform: capitalize;">' . $slchucvu["solcochucvu"] . '</td>
                 <td><a href="./../admin/dscanbocochucvucantim.php?idchucvu='.$_POST["id_chitietchucvu"].'" title=""><button type="button" class="btn btn-primary">Chi tiết</button> </a></td>
              </tr>
              
              <tr>
                <td width="30%"><label>Cán bộ thêm</label></td>
                <td width="70%" colspan="2" style=" text-transform: capitalize;">' . $sel_dlthitebi["ho_can_bo"] . " " . $sel_dlthitebi["ten_can_bo"] . '</td>
                 
              </tr>
              <tr>
                <td width="30%"><label>Ngày thêm</label></td>
                <td width="70%" colspan="2" >' . date("d/m/Y H:i:s", strtotime($sel_dlthitebi['ngaythem'])) . ' </td>
                 
              </tr>
              
                ';
                  }
            $output .= '
        </table>
      </div>
      ';
      echo $output;
  } // end xử lý hiện thông tin chitet chuc vu
  if (isset($_POST["id_chitietthietbitrongloaiphong"])) {
      $output = '';
      include 'conn.php';
      $query = "SELECT ctb.idcothietbi,ctb.soluong, lp.id_loaiphong,lp.ten_loai_phong,thietbi.idtb, thietbi.tenthietbi, ctb.id_canbothem, can_bo.ho_can_bo, can_bo.ten_can_bo, ctb.ngaythem FROM loaiphongcothietbi ctb INNER JOIN loai_phong lp ON ctb.id_loaiphong = lp.id_loaiphong INNER JOIN thietbi ON thietbi.idtb = ctb.idtb INNER JOIN can_bo ON ctb.id_canbothem=can_bo.id_canbo WHERE thietbi.xoa=0 AND ctb.xoa=0 AND lp.xoa=0 AND ctb.idcothietbi='$_POST[id_chitietthietbitrongloaiphong]'";

      $result = mysqli_query($con, $query);
      $output .= '
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">';
           while ($row_ctb = mysqli_fetch_array($result)) {
            $slphong = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(phong.idphong) AS slphong FROM phong INNER JOIN loai_phong ON phong.id_loaiphong = loai_phong.id_loaiphong WHERE loai_phong.id_loaiphong='$row_ctb[id_loaiphong]' AND phong.xoa=0 AND loai_phong.xoa=0"));
             $tongslthietbi=$row_ctb['soluong']*$slphong['slphong'];

            $slhong1 = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(tr.slhong) slhong FROM loaiphongcothietbi ctb, tinhtrang_thietbi_phong tr WHERE ctb.idcothietbi ='$_POST[id_chitietthietbitrongloaiphong]' and tr.xoa=0 AND ctb.idcothietbi= tr.idcothietbi"));
            $slhong=$slhong1['slhong'];
            if ($slhong==0) {
              $slhong=0;
            }
            $output .= '
              <tr>
                <td width="30%"><label>Loại Phòng</label></td>
                <td width="70%" class="chuinthuong">' . $row_ctb["ten_loai_phong"] . '</td>
              </tr>
              <tr>
                <td width="30%"><label>Thiết bị</label></td>
                <td width="70%" class="chuinthuong">' . $row_ctb["tenthietbi"] . '</td>
              </tr>
              <tr>
                <td width="30%"><label>Số lượng thiết bị/phòng</label></td>
                <td width="70%" style=" class="chuinthuong">' . $row_ctb["soluong"] . '</td>
              </tr>
              <tr>
                <td width="30%"><label> Tổng số thiết bị</label></td>
                <td width="70%" style=" text-transform: capitalize;">' . $tongslthietbi . '</td>
              </tr>
              <tr>
                <td width="30%"><label> Số thiết bị tốt</label></td>
                <td width="70%" style=" text-transform: capitalize; color: red;">'. ($tongslthietbi-$slhong).'</td>
              </tr>
              <tr>
                <td width="30%"><label> Só thiết bị hư</label></td>
                <td width="70%" style=" text-transform: capitalize; color: red;">'.$slhong.'</td>
              </tr>
              <tr>
                <td width="30%"><label>Cán bộ thêm</label></td>
                <td width="70%" class="chuinthuong">' . $row_ctb["ho_can_bo"] . " " . $row_ctb["ten_can_bo"] . '</td>
              </tr>
              <tr>
                <td width="30%"><label>Ngày thêm</label></td>
                <td width="70%">' . date("d/m/Y H:i:s", strtotime($row_ctb['ngaythem'])) . '</td>
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
   // dữ liệu ccán bộ
  if (isset($_POST["id_chitietcan_bo"])) {
      $output = '';
      include 'conn.php';
      $query = "SELECT * FROM can_bo WHERE can_bo.id_canbo ='$_POST[id_chitietcan_bo]' and can_bo.xoa=0";
      $result = mysqli_query($con, $query);
      $output .= '
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">';
           while ($row_can_bo1 = mysqli_fetch_array($result)) {
            $tenchucvune='';
            
            $output .= '
              <tr>
                <td width="40%"><label>Ảnh</label></td>
                <td width="60%" class=""><img  class ="img-responsive" src="./../images/'.$row_can_bo1["hinhanh"].'" alt="" style="width:100px"></td>
              </tr>
              <tr>
                <td width="40%"><label>Mã Cán bộ</label></td>
                <td width="60%" class="">' .$row_can_bo1["ma_can_bo"] . '</td>
              </tr>
              <tr>
                <td width="40%"><label>Tên Cán bộ</label></td>
                <td width="60%" class="chuinthuong">' .$row_can_bo1["ho_can_bo"] .'&nbsp;'.$row_can_bo1["ten_can_bo"] . '</td>
              </tr>
              <tr>
                <td width="40%"><label>Giới tính</label></td>
                <td width="60%" class="">' .$row_can_bo1["gioitinh"] . '</td>
              </tr>
              <tr>
                <td width="40%"><label>Ngày sinh</label></td>
                <td width="60%" class="">' .date('d/m/Y', strtotime($row_can_bo1["ngay_sinh"])) . '</td>
              </tr>
              <tr>
                <td width="40%"><label>Điện thoại</label></td>
                <td width="60%" class="">' .$row_can_bo1["sdt"] . '</td>
              </tr>
              <tr>
                <td width="40%"><label>Email</label></td>
                <td width="60%" class="">' .$row_can_bo1["email"] . '</td>
              </tr>
              <tr>
                <td width="40%"><label>Chức vụ</label></td>
                <td width="60%" class="chuinthuong">'; 
                  $ktra_chucv =(mysqli_query($con, "SELECT * FROM chucvu INNER JOIN cochucvu ON chucvu.idchucvu = cochucvu.idchucvu WHERE cochucvu.id_canbo = '$_POST[id_chitietcan_bo]' AND cochucvu.xoa =0 ORDER BY chucvu.idchucvu" ));
                  if (mysqli_num_rows($ktra_chucv)) {
                    while ($slchucvu = mysqli_fetch_array($ktra_chucv)){
                        $output .= '- '. $tenchucvune=$slchucvu['tenchucvu'].'<br>'; 

                    }
                  }else{
                    $output .= ''.$tenchucvune;

                  }
               $output .= ' </td>
              </tr>
              <tr>
                <td width="40%"><label>Ngày thêm</label></td>
                <td width="60%" colspan="2" >' . date("d/m/Y", strtotime($row_can_bo1['ngaythem'])) . ' </td>
              </tr>
              
                ';
                  }
            $output .= '
        </table>
      </div>
      ';
      echo $output;
  } // end xử lý hiện thông tin chitet cán bộ
  // dữ liệu Tòa nhà
  if (isset($_POST["id_chitiettoa_nha"])) {
      $output = '';
      include 'conn.php';
      $query = "SELECT toa_nha.id_toanha, toa_nha.ma_toa_nha, toa_nha.ten_toa_nha, toa_nha.loai_toa_nha,toa_nha.ngaythem, can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo FROM toa_nha, can_bo WHERE toa_nha.xoa=0 AND toa_nha.id_toanha='$_POST[id_chitiettoa_nha]' AND can_bo.id_canbo=toa_nha.id_canbothem ";
      // đếm số lượng phòng ở của tòa nhà
        $slphong = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(idphong) AS slphong FROM phong WHERE phong.xoa=0 AND phong.id_toanha='$_POST[id_chitiettoa_nha]'"));
        // đếm số lượng gường
        $slguong = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(loai_phong.sl_nguoi_o) AS slguong FROM phong, loai_phong WHERE phong.xoa=0 AND phong.id_toanha='$_POST[id_chitiettoa_nha]' AND phong.id_loaiphong=loai_phong.id_loaiphong"));
        // đếm số lượng sinh viên của tòa nhà
        $slsinhvien = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(o_phong.id_ophong) AS slsinhvien FROM phong, o_phong WHERE o_phong.ngay_ket_thuc is NULL AND phong.id_toanha='$_POST[id_chitiettoa_nha]' AND phong.idphong=o_phong.id_phong"));
      $result = mysqli_query($con, $query);
      $output .= '
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped " id="myTable">';
           while ($row_toa_nha1 = mysqli_fetch_array($result)) {
           
            $output .= '
              
              <tr>
                <td width="50%"><label>Mã Tòa nhà</label></td>
                <td width="50%" class="">' .$row_toa_nha1["ma_toa_nha"] . '</td>
              </tr>
              <tr>
                <td width="50%"><label>Tên Tòa nhà</label></td>
                <td width="50%" class="chuinthuong">' .$row_toa_nha1["ten_toa_nha"] . '</td>
              </tr>
              <tr>
                <td width="50%"><label>Loại</label></td>
                <td width="50%" class="">' .$row_toa_nha1["loai_toa_nha"] . '</td>
              </tr>
              <tr>
                <td width="50%"><label>Số phòng</label></td>
                <td width="50%" class="">' .$slphong["slphong"] . '</td>
              </tr>
              <tr>
                <td width="50%"><label>Số Gường</label></td>
                <td width="50%" class="">' .$slguong["slguong"] . '</td>
              </tr>
              <tr>
                <td width="50%"><label>Số sinh viên đang ở</label></td>
                <td width="50%" class="">' .$slsinhvien["slsinhvien"] . '</td>
              </tr>
              
              <tr>
                <td width="50%"><label>Người thêm</label></td>
                <td width="50%" class="chuinthuong">' .$row_toa_nha1["ho_can_bo"] .$row_toa_nha1["ten_can_bo"] .'<br>'. $row_toa_nha1["ma_can_bo"].'</td>
              </tr>
              <tr>
                <td width="50%"><label>Ngày thêm</label></td>
                <td width="50%" colspan="2" >' . date("d/m/Y", strtotime($row_toa_nha1['ngaythem'])) . ' </td>
              </tr>
              
                ';
                  }
            $output .= '
        </table>
      </div>
      ';
      echo $output;
  } // end xử lý hiện thông tin chitet Tòa nhà
  // dữ liệu Loại phòng
  if (isset($_POST["id_chitietloai_phong"])) {
      $output = '';
      include 'conn.php';
      $query = "SELECT loai_phong.id_loaiphong, loai_phong.ma_loai_phong, loai_phong.ten_loai_phong, loai_phong.gia_loai_phong,loai_phong.ngay_them,loai_phong.sl_nguoi_o, can_bo.ma_can_bo, can_bo.ho_can_bo, can_bo.ten_can_bo FROM loai_phong, can_bo WHERE loai_phong.xoa=0 AND loai_phong.id_loaiphong='$_POST[id_chitietloai_phong]' AND can_bo.id_canbo=loai_phong.id_canbothem ";
      // đếm số lượng phòng ở của Loại phòng
        $slphong = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(idphong) AS slphong FROM phong WHERE phong.xoa=0 AND phong.id_loaiphong='$_POST[id_chitietloai_phong]'"));
        // đếm số lượng gường
        $slguong = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(loai_phong.sl_nguoi_o) AS slguong FROM phong, loai_phong WHERE phong.xoa=0 AND phong.id_loaiphong='$_POST[id_chitietloai_phong]' AND phong.id_loaiphong=loai_phong.id_loaiphong"));
        // đếm số lượng sinh viên của Loại phòng
        $slsinhvien = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(o_phong.id_ophong) AS slsinhvien FROM phong, o_phong WHERE o_phong.ngay_ket_thuc is NULL AND phong.id_loaiphong='$_POST[id_chitietloai_phong]' AND phong.idphong=o_phong.id_ophong"));
      $result = mysqli_query($con, $query);
      $output .= '
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped " id="myTable">';
           while ($row_loai_phong1 = mysqli_fetch_array($result)) {
           
            $output .= '
              
              <tr>
                <td width="50%"><label>Mã Loại phòng</label></td>
                <td width="50%" class="chuinhoa">' .$row_loai_phong1["ma_loai_phong"] . '</td>
              </tr>
              <tr>
                <td width="50%"><label>Tên Loại phòng</label></td>
                <td width="50%" class="chuinthuong">' .$row_loai_phong1["ten_loai_phong"] . '</td>
              </tr>
              <tr>
                <td width="50%"><label>Giá loại phòng ( VNĐ)</label></td>
                <td width="50%" class="">' .number_format ( $row_loai_phong1["gia_loai_phong"] , $decimals = 0 , $dec_point = "." , $thousands_sep = ","  ) . '</td>
              </tr>
              <tr>
                <td width="50%"><label>Số người ở tối đa</label></td>
                <td width="50%" class="">' .$row_loai_phong1["sl_nguoi_o"]. '</td>
              </tr>
              <tr>
                <td width="50%"><label>Số phòng</label></td>
                <td width="50%" class="">' .$slphong["slphong"] . '</td>
              </tr>
              <tr>
                <td width="50%"><label>Số Gường</label></td>
                <td width="50%" class="">' .$slguong["slguong"] . '</td>
              </tr>
              <tr>
                <td width="50%"><label>Số sinh viên đang ở</label></td>
                <td width="50%" class="">' .$slsinhvien["slsinhvien"] . '</td>
              </tr>
              
              <tr>
                <td width="50%"><label>Người thêm</label></td>
                <td width="50%" class="chuinthuong">' .$row_loai_phong1["ho_can_bo"] .$row_loai_phong1["ten_can_bo"] .'<br>'. $row_loai_phong1["ma_can_bo"].'</td>
              </tr>
              <tr>
                <td width="50%"><label>Ngày thêm</label></td>
                <td width="50%" colspan="2" >' . date("d/m/Y", strtotime($row_loai_phong1['ngay_them'])) . ' </td>
              </tr>
              
                ';
                  }
            $output .= '
        </table>
      </div>
      ';
      echo $output;
  } // end xử lý hiện thông tin chitet Loại phòng
   // dữ liệucán bộ có chức vụ
  if (isset($_POST["id_cochucvu_sua"])) {
      $output = '';
      include 'conn.php';
      $query = "SELECT can_bo.ma_can_bo, can_bo.id_canbo, can_bo.hinhanh,can_bo.ho_can_bo, can_bo.ten_can_bo, can_bo.gioitinh, can_bo.ngay_sinh, can_bo.sdt, can_bo.email, chucvu.tenchucvu, cochucvu.ngaythem FROM can_bo, cochucvu, chucvu WHERE cochucvu.id_cochucvu='$_POST[id_cochucvu_sua]' AND can_bo.id_canbo=cochucvu.id_canbo AND cochucvu.idchucvu= chucvu.idchucvu";
      $result = mysqli_query($con, $query);
      $output .= '
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">';
           while ($row_can_bo1 = mysqli_fetch_array($result)) {
            
            $output .= '
              <tr>
                <td width="40%"><label>Ảnh</label></td>
                <td width="60%" class=""><img  class ="img-responsive" src="./../images/'.$row_can_bo1["hinhanh"].'" alt="" style="width:100px"></td>
              </tr>
              <tr>
                <td width="40%"><label>Mã Cán bộ</label></td>
                <td width="60%" class="">' .$row_can_bo1["ma_can_bo"] . '</td>
              </tr>
              <tr>
                <td width="40%"><label>Tên Cán bộ</label></td>
                <td width="60%" class="chuinthuong">' .$row_can_bo1["ho_can_bo"] .'&nbsp;'.$row_can_bo1["ten_can_bo"] . '</td>
              </tr>
              <tr>
                <td width="40%"><label>Giới tính</label></td>
                <td width="60%" class="">' .$row_can_bo1["gioitinh"] . '</td>
              </tr>
              <tr>
                <td width="40%"><label>Ngày sinh</label></td>
                <td width="60%" class="">' .date('d/m/Y', strtotime($row_can_bo1["ngay_sinh"])) . '</td>
              </tr>
              <tr>
                <td width="40%"><label>Điện thoại</label></td>
                <td width="60%" class="">' .$row_can_bo1["sdt"] . '</td>
              </tr>
              <tr>
                <td width="40%"><label>Email</label></td>
                <td width="60%" class="">' .$row_can_bo1["email"] . '</td>
              </tr>
              <tr>
                <td width="40%"><label>Chức vụ</label></td>
                <td width="60%" class="chuinthuong">'.$row_can_bo1["tenchucvu"].' </td>
              </tr>
              <tr>
                <td width="40%"><label>Ngày thêm</label></td>
                <td width="60%" colspan="2" >' . date("d/m/Y", strtotime($row_can_bo1['ngaythem'])) . ' </td>
              </tr>
              
                ';
                  }
            $output .= '
        </table>
      </div>
      ';
      echo $output;
  } // end xử lý hiện thông tin chitet cán bộ có chức vụ
     // dữ liệu thông tin can bộ thêm có cán bộ có chức vụ
  if (isset($_POST["id_mscsb"])) {
      $output = '';
      include 'conn.php';
      $query = "SELECT can_bo.ma_can_bo, can_bo.id_canbo, can_bo.hinhanh,can_bo.ho_can_bo, can_bo.ten_can_bo, can_bo.gioitinh, can_bo.ngay_sinh, can_bo.sdt, can_bo.email FROM can_bo WHERE can_bo.ma_can_bo='$_POST[id_mscsb]'";

      $result = mysqli_query($con, $query);
      if (!mysqli_num_rows($result)) {
           $output = 'Chưa có dữ liệu';
      }else{
      $output .= '
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">';
           while ($row_can_bo1 = mysqli_fetch_array($result)) {
            
            $output .= '
              <tr>
                <td width="40%"><label>Ảnh</label></td>
                <td width="60%" class=""><img  class ="img-responsive" src="./../images/'.$row_can_bo1["hinhanh"].'" alt="" style="width:100px"></td>
              </tr>
              <tr>
                <td width="40%"><label>Mã Cán bộ</label></td>
                <td width="60%" class="">' .$row_can_bo1["ma_can_bo"] . '</td>
              </tr>
              <tr>
                <td width="40%"><label>Tên Cán bộ</label></td>
                <td width="60%" class="chuinthuong">' .$row_can_bo1["ho_can_bo"] .'&nbsp;'.$row_can_bo1["ten_can_bo"] . '</td>
              </tr>
              <tr>
                <td width="40%"><label>Giới tính</label></td>
                <td width="60%" class="">' .$row_can_bo1["gioitinh"] . '</td>
              </tr>
              <tr>
                <td width="40%"><label>Ngày sinh</label></td>
                <td width="60%" class="">' .date('d/m/Y', strtotime($row_can_bo1["ngay_sinh"])) . '</td>
              </tr>
              <tr>
                <td width="40%"><label>Điện thoại</label></td>
                <td width="60%" class="">' .$row_can_bo1["sdt"] . '</td>
              </tr>
              <tr>
                <td width="40%"><label>Email</label></td>
                <td width="60%" class="">' .$row_can_bo1["email"] . '</td>
              </tr>
              
              
                ';
                  }
            $output .= '
        </table>
      </div>
      ';}
      echo $output;
  } // end xử lý hiện thông tin chitet thông tin can bộ thêm có cán bộ có chức vụ
  // xử lý hiện thông tin loại phòng chon thêm phòng mới
  if (isset($_POST["loai_phong_phong_themmoi"])) {
      $output = '';
      include 'conn.php';
      $query = "SELECT  loai_phong.id_loaiphong, loai_phong.ten_loai_phong, loai_phong.gia_loai_phong, loai_phong.sl_nguoi_o FROM loai_phong WHERE loai_phong.xoa=0 AND loai_phong.id_loaiphong='$_POST[loai_phong_phong_themmoi]'ORDER BY loai_phong.ten_loai_phong";

      $result = mysqli_query($con, $query);
      if (!mysqli_num_rows($result)) {
           $output = 'Chưa có dữ liệu';
      }else{
      $output .= '
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">';
           while ($row_tt_lp = mysqli_fetch_array($result)) {
            
            $output .= '
              <tr>
                <td width="50%"><label>Loại phòng</label></td>
                <td width="50%" class="">' .$row_tt_lp["ten_loai_phong"] . '</td>
              </tr>
               <tr>
                <td width="50%"><label>Số người ở</label></td>
                <td width="50%" class="">' .$row_tt_lp["sl_nguoi_o"] . '</td>
              </tr>
              <tr>
                <td width="50%"><label>Giá /người/tháng (VNĐ)</label></td>
                <td width="50%" class="">' .number_format ( $row_tt_lp["gia_loai_phong"], $decimals = 0 , $dec_point = "." , $thousands_sep = ","  )  . '</td>
              </tr>
              
                ';
                  }
            $output .= '
        </table>
      </div>
      ';}
      echo $output;
  } // end ử lý hiện thông tin loại phòng chon thêm phòng mới  
  if (isset($_POST["id_phong_sua_12"])) {
      $output = '';
      include 'conn.php';
      $query = "SELECT  loai_phong.id_loaiphong, loai_phong.ten_loai_phong, loai_phong.gia_loai_phong, loai_phong.sl_nguoi_o FROM loai_phong, phong WHERE phong.id_loaiphong=loai_phong.id_loaiphong and loai_phong.xoa=0 AND phong.idphong='$_POST[id_phong_sua_12]' ORDER BY loai_phong.ten_loai_phong";

      $result = mysqli_query($con, $query);
      if (!mysqli_num_rows($result)) {
           $output = 'Chưa có dữ liệu';
      }else{
      $output .= '
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">';
           while ($row_tt_lp = mysqli_fetch_array($result)) {
            
            $output .= '
              <tr>
                <td width="50%"><label>Loại phòng</label></td>
                <td width="50%" class="">' .$row_tt_lp["ten_loai_phong"] . '</td>
              </tr>
               <tr>
                <td width="50%"><label>Số người ở</label></td>
                <td width="50%" class="">' .$row_tt_lp["sl_nguoi_o"] . '</td>
              </tr>
              <tr>
                <td width="50%"><label>Giá /người/tháng (VNĐ)</label></td>
                <td width="50%" class="">' .number_format ( $row_tt_lp["gia_loai_phong"], $decimals = 0 , $dec_point = "." , $thousands_sep = ","  )  . '</td>
              </tr>
              
                ';
                  }
            $output .= '
        </table>
      </div>
      ';}
      echo $output;
  } // end ử lý hiện thông tin loại phòng chon thêm phòng mới
  // hiện thông tin chi tiết phòng
  if (isset($_POST["id_chitiet_phong"])) {
      $output = '';
      include 'conn.php';
      $query = "SELECT phong.idphong, phong. ma_phong, phong.stt_tang, phong.id_canbothem, phong.thoigianthem, toa_nha.ten_toa_nha, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o, loai_phong.gia_loai_phong , can_bo.ma_can_bo, can_bo.ten_can_bo, can_bo.ho_can_bo FROM phong, toa_nha, loai_phong, can_bo WHERE phong.xoa=0 AND phong.idphong='$_POST[id_chitiet_phong]' AND phong.id_toanha= toa_nha.id_toanha AND phong.id_loaiphong= loai_phong.id_loaiphong AND can_bo.id_canbo= phong.id_canbothem";

      $result = mysqli_query($con, $query);
      if (!mysqli_num_rows($result)) {
           $output = 'Chưa có dữ liệu';
      }else{

      $output .= '
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">';
           $row_tt_phong_ct = mysqli_fetch_array($result); 
            $slsinhvien = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(o_phong.id_sinhvien) AS slsinhvien FROM o_phong WHERE o_phong.ngay_ket_thuc is NULL AND o_phong.id_phong ='$_POST[id_chitiet_phong]'"));
            $output .= '
              <tr>
                <td width="50%"><label>Số phòng</label></td>
                <td width="50%" class="">' .$row_tt_phong_ct["ma_phong"] . '</td>
              </tr>
               <tr>
                <td width="50%"><label>Tầng</label></td>
                <td width="50%" class="">' .$row_tt_phong_ct["stt_tang"] . '</td>
              </tr>

               <tr>
                <td width="50%"><label>Tòa nhà</label></td>
                <td width="50%" class="">' .$row_tt_phong_ct["ten_toa_nha"] . '</td>
              </tr>
               <tr>
                <td width="50%"><label>Loại phòng</label></td>
                <td width="50%" class="">' .$row_tt_phong_ct["ten_loai_phong"] . '</td>
              </tr>
              <tr>
                <td width="50%"><label>Giá /người/tháng (VNĐ)</label></td>
                <td width="50%" class="">' .number_format ( $row_tt_phong_ct["gia_loai_phong"], $decimals = 0 , $dec_point = "." , $thousands_sep = ","  )  . '</td>
              </tr>
               <tr>
                <td width="50%"><label>Số người được ở</label></td>
                <td width="50%" class="">' .$row_tt_phong_ct["sl_nguoi_o"] . '</td>
              </tr>
               <tr>
                <td width="50%"><label>Đang ở</label></td>
                <td width="50%" class="">' .$slsinhvien["slsinhvien"] . '</td>
              </tr>
               <tr>
                <td width="50%"><label>Người thêm</label></td>
                <td width="50%" class="">' .$row_tt_phong_ct["ho_can_bo"] .$row_tt_phong_ct["ten_can_bo"] .'<br>'.$row_tt_phong_ct["ma_can_bo"]  . '</td>
              </tr>
               <tr>
                <td width="50%"><label>Thời gian thêm</label></td>
                <td width="50%" class="">' .date('d/m/Y', strtotime($row_tt_phong_ct["thoigianthem"])) . '</td>
              </tr>
              
              
                ';
            $output .= '
        </table>
      </div>
      ';}
      echo $output;
  } // end iện thông tin chi tiết phòng
  // hiện thông tin chi tiết phòng và thiết bị phòng
  if (isset($_POST["id_chitiet_phong_tinhtrangthietbi"])) {
      $output = '';
      include 'conn.php';
      $query = "SELECT phong.idphong, phong. ma_phong, phong.stt_tang, phong.id_canbothem, phong.thoigianthem, toa_nha.ten_toa_nha, loai_phong.ten_loai_phong, loai_phong.sl_nguoi_o, loai_phong.gia_loai_phong , can_bo.ma_can_bo, can_bo.ten_can_bo, can_bo.ho_can_bo FROM phong, toa_nha, loai_phong, can_bo WHERE phong.xoa=0 AND phong.idphong='$_POST[id_chitiet_phong_tinhtrangthietbi]' AND phong.id_toanha= toa_nha.id_toanha AND phong.id_loaiphong= loai_phong.id_loaiphong AND can_bo.id_canbo= phong.id_canbothem";

      $result = mysqli_query($con, $query);
      if (!mysqli_num_rows($result)) {
           $output = 'Chưa có dữ liệu';
      }else{

      $output .= '
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">';
           $row_tt_phong_ct = mysqli_fetch_array($result); 
            $slsinhvien = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(o_phong.id_sinhvien) AS slsinhvien FROM o_phong WHERE o_phong.ngay_ket_thuc is NULL AND o_phong.id_phong ='$_POST[id_chitiet_phong_tinhtrangthietbi]'"));
            $output .= '
               <tr>
                <td width="25%"><label>Tòa nhà</label></td>
                <td width="25%" class="">' .$row_tt_phong_ct["ten_toa_nha"] . '</td>
                <td width="25%"><label>Phòng số</label></td>
                <td width="25%" class="">' .$row_tt_phong_ct["ma_phong"] . '</td>
              </tr>
              <tr>
                <td width="25%"><label>Loại phòng</label></td>
                <td width="25%" class="">' .$row_tt_phong_ct["ten_loai_phong"] . '</td>
                <td width="25%"><label>Giá /người/tháng (VNĐ)</label></td>
                <td width="25%" class="">' .number_format ( $row_tt_phong_ct["gia_loai_phong"], $decimals = 0 , $dec_point = "." , $thousands_sep = ","  )  . '</td>
              </tr>
               <tr>
                <td width="25%"><label>Số người được ở</label></td>
                <td width="25%" class="">' .$row_tt_phong_ct["sl_nguoi_o"] . '</td>
                <td width="25%"><label>Đang ở</label></td>
                <td width="25%" class="">' .$slsinhvien["slsinhvien"] . '</td>
              </tr>
                ';
                $tim_tb = mysqli_query($con,"SELECT loaiphongcothietbi.idcothietbi, loaiphongcothietbi.idtb, thietbi.tenthietbi , loaiphongcothietbi.soluong, phong.idphong FROM loaiphongcothietbi, phong, thietbi WHERE phong.xoa=0 AND phong.idphong='$_POST[id_chitiet_phong_tinhtrangthietbi]' AND loaiphongcothietbi.xoa=0 and phong.id_loaiphong=loaiphongcothietbi.id_loaiphong AND thietbi.idtb=loaiphongcothietbi.idtb");
                while ($r1=mysqli_fetch_array($tim_tb)) {
                  $r2=mysqli_fetch_array(mysqli_query($con,"SELECT tr.slhong FROM tinhtrang_thietbi_phong tr WHERE tr.idphong ='$r1[idphong]'  AND tr.idcothietbi ='$r1[idcothietbi]' AND tr.xoa=0"));
                  $r23=$r2["slhong"];
                  if ($r23=='') {
                    $r23=0;
                  }
                   $output .= '
                      </tr>
                         <tr>
                          <td width="25%"><label>Thiết bị</label></td>
                          <td width="25%" class="">' .$r1["tenthietbi"] . '</td>
                          <td width="25%"><label>số hỏng/ Tổng Số lượng</label></td>
                          <td width="25%" class="">'.$r23 .'/'.$r1["soluong"] . '</td>

                        </tr>

                     ';
                }
            $output .= '
        </table>
      </div>
      ';}
      echo $output;
  } // end iện thông tin chi tiết phòng và thiết bị phòng
  // hiện thông tin chi tiết phòng và kiem tra thiết bị phòng
  if (isset($_POST["id_phong_sua_12_thietbi_tinhtrang"])) {
      $d_phong1=$_POST["id_phong_sua_12_thietbi_tinhtrang"];
      $output = '';
      include 'conn.php';
      $query = "SELECT ctb.idcothietbi, phong.idphong, thietbi.idtb, thietbi.tenthietbi, ctb.soluong FROM loaiphongcothietbi ctb ,thietbi, phong WHERE thietbi.xoa=0 AND ctb.xoa=0 AND phong.idphong='$d_phong1' and thietbi.idtb = ctb.idtb AND ctb.id_loaiphong= phong.id_loaiphong";

      $result = mysqli_query($con, $query);
      if (!mysqli_num_rows($result)) {
           $output = 'Chưa có dữ liệu';
      }else{

      $output .= '<div class="table-responsive">
                    <table class="table table-bordered">';
           while ($r1 = mysqli_fetch_array($result)) {
            // số lượng thiết bị hỏng
              $r11 = mysqli_fetch_array(mysqli_query($con,"SELECT ctb.idcothietbi, tr.id_tinhtrang, tr.slhong,tr.ngay_kt FROM loaiphongcothietbi ctb, tinhtrang_thietbi_phong tr WHERE ctb.idcothietbi = tr.idcothietbi AND ctb.xoa=0 AND ctb.idcothietbi='$r1[idcothietbi]' and tr.idphong='$r1[idphong]' and tr.xoa=0 ORDER BY tr.ngay_kt DESC"));
              $slhongcu=0;
              if ($r11["slhong"]!='') {
                $slhongcu=$r11["slhong"];
              }
            $output .= '
                    <tr>
                         <td style="width: 230px">
                            <div class="form-group">
                              <label for="">Thiết bị</label>
                              <input type="text"  class="form-control " value="'.$r1["tenthietbi"].'" disabled >
                              </div>
                          </td>
                          <td style="width: 15%">
                            <div class="form-group">
                              <label>Số lượng</label>
                              <input type="text"  class="form-control idsloa canhgiua"  value=' .$r1["soluong"].' disabled >
                            </div>
                          </td>
                           <td style="width: 15%">
                            <div class="form-group">
                              <label>Hỏng củ</label>
                              <input type="text"  class="form-control idsloa canhgiua"  value="'.$slhongcu.'" disabled >
                            </div>
                          </td>
                          <td style="width: 30%"> 
                            <div class="form-group">
                              <label>Số hỏng mới</label>
                              <input type="number"   min="0" value="0" class="canhgiua _1231 form-control"  data-id1="'. $r1["idcothietbi"].'-'.$r1["idphong"].'" contenteditable >
                            </div>
                          </td>
                          </tr>

                     ';
                }
            $output .= '</tbody>
                    </table>
       
      ';}
      echo $output;
  } // end iện thông tin chi tiết phòng và kiem tra thiết bị phòng

?>
