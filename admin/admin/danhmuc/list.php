
<?php
// Số danh mục hiển thị trên mỗi trang
$soDanhMucTrenTrang = 5;

// Xác định trang hiện tại
$trangHienTai = isset($_GET['trang']) ? $_GET['trang'] : 1;

// Tính vị trí bắt đầu lấy dữ liệu
$viTriBatDau = ($trangHienTai - 1) * $soDanhMucTrenTrang;

// Lấy danh sách danh mục từ vị trí bắt đầu
$danhSachDanhMuc = array_slice($listdm, $viTriBatDau, $soDanhMucTrenTrang);
// Sửa câu truy vấn SQL trong phần lấy danh sách danh mục
$sql = "SELECT * FROM danhmuc LIMIT $viTriBatDau, $soDanhMucTrenTrang";

// Thực hiện truy vấn và lấy dữ liệu
// ...

?>
     <!-- Hiển thị danh sách danh mục -->
     <style>
      
     </style>
     <div class="table">    
           <div class="title" ><h2 style="text-align: center;"> QUẢN LÍ DANH MỤC</h2></div>
           <a href="index.php?act=adddm"><button type="button" class="btn btn-primary" style="margin-left: 160px; margin-top:30px;">Add</button> </a>  
<table class="table" style="position: relative;
    left: 100px;">        
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($danhSachDanhMuc as $danhmuc) {
        extract($danhmuc);
        $suadm= "index.php?act=suadm&id=".$id;
        $xoadm= "index.php?act=xoadm&id=".$id;
        echo '<tr>
            <td>'.$id.'</td>
            <td>'.$name.'</td>
            <td> <a href="'.$xoadm.'"><button type="button" class="btn btn-danger">Delete</button></a>
            <a href="'.$suadm.'"><button type="button" class="btn btn-success">Edit</button></a></td>
        </tr>';
    }
    ?>
    </tbody>
</table>

<!-- Hiển thị các liên kết phân trang -->
<div class="textcolor"><nav aria-label="Page navigation example" style="margin-left:450px">
  <ul class="pagination">
  <li class="page-item"><a class="page-link" href="index.php?act=listdm&trang=<?php echo $trangHienTai-1;?>">Previous</a></li>    <?php
    for ($i = 1; $i <= ceil(count($listdm) / $soDanhMucTrenTrang); $i++) {
      echo '
      <li class="page-item"><a class="page-link" href="index.php?act=listdm&trang=' . $i . '">' . $i . '</a></li>';
    }
    ?>
<li class="page-item"><a class="page-link" href="index.php?act=listdm&trang=<?php echo $trangHienTai + 1; ?>">Next</a></li>
</nav>  </div>

