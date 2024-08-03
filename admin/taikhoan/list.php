<!-- taikhoan/list.php -->

<?php
$soDanhMucTrenTrang = 5;

// Xác định trang hiện tại
$trangHienTai = isset($_GET['trang']) && is_numeric($_GET['trang']) ? (int)$_GET['trang'] : 1;

// Tính vị trí bắt đầu lấy dữ liệu
$viTriBatDau = ($trangHienTai - 1) * $soDanhMucTrenTrang;

// Lấy danh sách danh mục từ vị trí bắt đầu
$danhSachDanhMuc = array_slice($listtk, $viTriBatDau, $soDanhMucTrenTrang);
// var_dump($danhSachDanhMuc);
// die;
// Sửa câu truy vấn SQL trong phần lấy danh sách danh mục
$sql = "SELECT * FROM a LIMIT $viTriBatDau, $soDanhMucTrenTrang";

?>
<div class="table">
    <div class="title">
        <h2 style="text-align: center;"> QUẢN LÍ TÀI KHOẢN</h2>
    </div>
    <a href="index.php?act=addtk"><button type="button" class="btn btn-primary" style="margin-left: 80px; margin-top:30px;">Add</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">address</th>
                <th scope="col">Phone</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($danhSachDanhMuc as $taikhoan) {
                extract($taikhoan);
                $lockUnlockUrl = $is_locked ? "index.php?act=unlock&id=" . $id : "index.php?act=lock&id=" . $id;
            ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $user; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $address; ?></td>
                    <td><?php echo $tel; ?></td>
                    <td><?php echo $is_locked ? 'Khóa' : 'Mở'; ?></td>
                    <td>
                        <a href="<?php echo $lockUnlockUrl; ?>">
                            <button type="button" class="btn btn-<?php echo $is_locked ? 'success' : 'danger'; ?>">
                                <?php echo $is_locked ? 'Mở' : 'Khóa'; ?>
                            </button>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="textcolor">
        <nav aria-label="Page navigation example" style="margin-left:450px">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="index.php?act=listtk&trang=<?php echo $trangHienTai - 1; ?>">Previous</a></li> <?php
                                                                                                                                                for ($i = 1; $i <= ceil(count($listtk) / $soDanhMucTrenTrang); $i++) {
                                                                                                                                                    echo '
      <li class="page-item"><a class="page-link" href="index.php?act=listtk&trang=' . $i . '">' . $i . '</a></li>';
                                                                                                                                                }
                                                                                                                                                ?>
                <li class="page-item"><a class="page-link" href="index.php?act=listtk&trang=<?php echo $trangHienTai + 1; ?>">Next</a></li>
        </nav>
    </div>
</div>