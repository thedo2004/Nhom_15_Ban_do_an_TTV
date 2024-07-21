<?php
$soDanhMucTrenTrang = 5;

// Xác định trang hiện tại
$trangHienTai = isset($_GET['trang']) && is_numeric($_GET['trang']) ? (int)$_GET['trang'] : 1;

// Tính vị trí bắt đầu lấy dữ liệu
$viTriBatDau = ($trangHienTai - 1) * $soDanhMucTrenTrang;

// Lấy danh sách danh mục từ vị trí bắt đầu
$danhSachDanhMuc = array_slice($listbill, $viTriBatDau, $soDanhMucTrenTrang);
// var_dump($danhSachDanhMuc);
// die;
// Sửa câu truy vấn SQL trong phần lấy danh sách danh mục
$sql = "SELECT * FROM a LIMIT $viTriBatDau, $soDanhMucTrenTrang";

?>
<div class="table" >
        <div class="title" ><h2 style="text-align: center;"> Kiểm tra đơn hàng</h2></div>
        <!--
        search input 

       table 
    -->
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Khách hàng</th>
                <th scope="col">Số lượng hàng</th>
                <th scope="col">Giá trị đơn hàng</th>
                <th scope="col">Tình trạng đơn hàng</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
            <?php
                        foreach ($danhSachDanhMuc as $bill) {
                            extract($bill);
                            $kh=$bill["bill_name"].'
                            <br> '.$bill["bill_email"].'
                            <br> '.$bill["bill_address"].'
                            <br> '.$bill["bill_tel"];
                            $countsp=loadall_cart_count($bill["id"]);
                            $ttdh=get_ttdh($bill["bill_status"]);
                            $suadh= "index.php?act=suadh&id=".$id;
                            $xoadh= "index.php?act=xoadh&id=".$id;
                            echo  '<tr>
                            <td>H2T-'.$bill['id'].'</td>
                            <td>'.$kh.' </td>
                            <td>'.$countsp.' </td>
                            <td>'.$bill['total'].' </td>
                            <td>'.$ttdh.' </td>
                            <td> 
                            <a href="'.$xoadh.'"><button type="button" class="btn btn-danger">Delete</button></a>
                            <a href="'.$suadh.'"><button type="button" class="btn btn-success">Edit</button></a></td>
                        </tr>';
                        }   
                    ?>
            </tbody>
          </table>
          <div class="textcolor"><nav aria-label="Page navigation example" style="margin-left:450px">
  <ul class="pagination">
  <li class="page-item"><a class="page-link" href="index.php?act=list$listbill&trang=<?php echo $trangHienTai-1;?>">Previous</a></li>    <?php
    for ($i = 1; $i <= ceil(count($listbill) / $soDanhMucTrenTrang); $i++) {
      echo '
      <li class="page-item"><a class="page-link" href="index.php?act=list$listbill&trang=' . $i . '">' . $i . '</a></li>';
    }
    ?>
<li class="page-item"><a class="page-link" href="index.php?act=list$listbill&trang=<?php echo $trangHienTai + 1; ?>">Next</a></li>
</nav> </div>
    </div>
</div>
</div>
</body>
</html>
       