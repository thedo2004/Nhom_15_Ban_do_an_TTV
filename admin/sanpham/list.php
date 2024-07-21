
<?php
$soDanhMucTrenTrang = 5;

// Xác định trang hiện tại
$trangHienTai = isset($_GET['trang']) && is_numeric($_GET['trang']) ? (int)$_GET['trang'] : 1;

// Tính vị trí bắt đầu lấy dữ liệu
$viTriBatDau = ($trangHienTai - 1) * $soDanhMucTrenTrang;

// Lấy danh sách danh mục từ vị trí bắt đầu
$danhSachDanhMuc = array_slice($listsp, $viTriBatDau, $soDanhMucTrenTrang);
// var_dump($danhSachDanhMuc);
// die;
// Sửa câu truy vấn SQL trong phần lấy danh sách danh mục
$sql = "SELECT * FROM a LIMIT $viTriBatDau, $soDanhMucTrenTrang";

?>
       <div class="table" >
        <div class="title" ><h2 style="text-align: center;"> QUẢN LÍ SẢN PHẨM</h2></div>
        <!--
        search input 
    -->
    <form action="index.php?act=listsp" method="post">
        <div class="container mt-4">
          <div class="row">
            <div class="col-md-4 custom-margin">
              <!-- Ô nhập dữ liệu (input) chiếm toàn bộ chiều rộng của container -->
              <input name="kyw" type="search" class="form-control" placeholder="Search...">
            </div>
            <div class="col-md-4 custom-margin">
              <select name="iddm" class="form-select" aria-label="Default select example">
                <option value="0" selected>Open this select menu</option>
                <?php
                    foreach ($listdm as $danhmuc) {
                        extract($danhmuc);
                        echo'<option value="'.$id.'">'.$name.'</option>';
                    }
                    ?>    
              </select>
            </div>
            <div class="col-md-4 custom-margin">
              <input type="submit" name="listok" value="Search" class="btn btn-primary">
            </div>
 
          </div>
        </div>
      </form>
    <a href="index.php?act=addsp">  <button type="button" class="btn btn-primary" style="margin-left: 80px; margin-top:30px;">Add</button></a>
         <!--
       table 
    -->
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã loại</th>
                <th scope="col">Name</th>
                <th scope="col">Gía</th>
                <th scope="col">Hình</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
            <?php
                        foreach ($danhSachDanhMuc as $sanpham) {
                            extract($sanpham);
                            $suasp= "index.php?act=suasp&id=".$id;
                            $xoasp= "index.php?act=xoasp&id=".$id;
                            $hinhpath="../upload/".$img;
                            if(is_file($hinhpath)){
                                $img="<img src='".$hinhpath."' height='80'>";
                            } else{
                                $img="không có hình";
                            }
                            echo  '<tr>
                            <td>'.$id.'</td>
                            <td>'.$names.' </td>
                            <td>'.$price.' </td>
                            <td>'.$img.' </td>
                            <td>'.$luotxem.' </td>
                            <td> 
                            <a href="'.$xoasp.'"><button type="button" class="btn btn-danger">Delete</button></a>
                            <a href="'.$suasp.'"><button type="button" class="btn btn-success">Edit</button></a></td>
                        </tr>';
                        }   
                    ?>
            </tbody>
          </table>
          <div class="textcolor"><nav aria-label="Page navigation example" style="margin-left:450px">
  <ul class="pagination">
  <li class="page-item"><a class="page-link" href="index.php?act=listsp&trang=<?php echo $trangHienTai-1;?>">Previous</a></li>    <?php
    for ($i = 1; $i <= ceil(count($listsp) / $soDanhMucTrenTrang); $i++) {
      echo '
      <li class="page-item"><a class="page-link" href="index.php?act=listsp&trang=' . $i . '">' . $i . '</a></li>';
    }
    ?>
<li class="page-item"><a class="page-link" href="index.php?act=listsp&trang=<?php echo $trangHienTai + 1; ?>">Next</a></li>
</nav> </div>
    </div>
</div>

</div>

</body>

</html>
       