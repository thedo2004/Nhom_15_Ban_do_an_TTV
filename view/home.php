
<?php
// Số danh mục hiển thị trên mỗi trang
$soDanhMucTrenTrang = 8;

// Xác định trang hiện tại
$trangHienTai = isset($_GET['trang']) ? $_GET['trang'] : 1;

// Tính vị trí bắt đầu lấy dữ liệu
$viTriBatDau = ($trangHienTai - 1) * $soDanhMucTrenTrang;

// Lấy danh sách danh mục từ vị trí bắt đầu
$danhSachDanhMuc = array_slice($spnew, $viTriBatDau, $soDanhMucTrenTrang);
// Sửa câu truy vấn SQL trong phần lấy danh sách danh mục
$sql = "SELECT * FROM danhmuc LIMIT $viTriBatDau, $soDanhMucTrenTrang";

// Thực hiện truy vấn và lấy dữ liệu
// ...

?>
</div>
<style>
.textcolor a{
  color: black;
}
.textcolor li :hover{
  color: white;
  background:black;
}
</style>
</div>
  <img src="img/banner.png" alt="" />
  <div class="banner" >
    <div class="hinh"> 
        <img src="https://theme.hstatic.net/1000306633/1000891824/14/block_home_category1_new.png?v=587" alt="" /></div>
    <div class="hinh"> <img src="https://theme.hstatic.net/1000306633/1000891824/14/block_home_category2_new.png?v=587" alt="" /></div>
    <div class="hinh"> <img src="https://theme.hstatic.net/1000306633/1000891824/14/block_home_category3_new.png?v=587" alt="" /></div>
  </div>
  <div class="typewriter">
  <h1 id="text">STREETWEAR BRAND LIMITED</h1>
  </div>
  <form action="index.php?act=sanpham" method="post" style="margin-left: 540px;
    margin-bottom: 30px;">
        <div class="container mt-4">
          <div class="row">
            <div class="col-md-4 custom-margin">
              <!-- Ô nhập dữ liệu (input) chiếm toàn bộ chiều rộng của container -->
              <input name="kyw" type="search" class="form-control" placeholder="Search...">
            </div>
            <div class="col-md-4 custom-margin">
              <input type="submit" name="listok" value="Search" class="btn btn-primary">
            </div>
          </div>
        </div>
      </form>
<div class="nd">
             <?php
    $i=0;
    foreach ($danhSachDanhMuc as $sp) {
     extract($sp);
if (isset($img_path)) {
    $hinh= $img_path.$img;
    $linksp="index.php?act=spct&idsp=".$id;
//     echo '<div class="boxsp mr">
//     <img src="'.$hinh.'" alt="">
//     <p>'.$price.'</p>
//     <a href="'.$linksp.'">'.$names.'</a>
// </div>';
echo'   <div class="card" style="border:none;">
<div class="imgBx ">
<a href="'.$linksp.'"><img src="'.$hinh.'" name="img" alt="nike-air-shoe" width="400px"/></a>
    
</div>

<div class="contentBx">
</div>
<div class="button">
<a class="button-link secondary-button" href="'.$linksp.'">View</a>
    <a class="button-link secondary-button" href="index.php?act=themgiohang&&id='.$id.'">Thêm vào giỏ</a>

</div>

<div class="name" name="names" ><h2>'.$price.'Vnđ</h2></div>
<div class="size">
    <h2><a href="'.$linksp.'">'.$names.'</a></h2>
</div>
</div>' ;

} else {
    echo "Biến \$img_path không tồn tại hoặc không được gán giá trị.";
}
   
    }
    ?>
    <div class="textcolor"><nav aria-label="Page navigation example" style="margin-left:450px;position: relative;
    right: 220px;">
  <ul class="pagination">
  <li class="page-item"><a class="page-link" href="index.php?act=sp$spnew&trang=<?php echo $trangHienTai-1;?>">Previous</a></li>    <?php
    for ($i = 1; $i <= ceil(count($spnew) / $soDanhMucTrenTrang); $i++) {
      echo '
      <li class="page-item"><a class="page-link" href="index.php?act=sp$spnew&trang=' . $i . '">' . $i . '</a></li>';
    }
    ?>
<li class="page-item"><a class="page-link" href="index.php?act=sp$spnew&trang=<?php echo $trangHienTai + 1; ?>">Next</a></li>
</nav>  </div>