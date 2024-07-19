<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bt1.css">
</head>
<body onload="loadImg()">
    <div class="boxcenter">
        <div class="row mb header">
            <h1>Siêu thị trực tuyến</h1>
        </div>
        <div class="row mb menu">
            <ul>
                <li><a href="index.php?act=home">Trang chủ</a></li>
                <li><a href="index.php?act=gt">Giới Thiệu</a></li>
                <li><a href="">Liên hệ</a></li>
                <li><a href="">Góp ý</a></li>
                <li><a href="">Hỏi đáp</a></li>
            </ul>
        </div>
        <div class="row mb ">
            <div class="boxtrai mr ">
                <div class="row">
                    <div class="banner" >
                        <img  alt="" name="img_banner">
                    </div>
                </div> -->
                <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/home.css">
  <!-- Thư viện MDB CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.12.0/mdb.min.css" integrity="sha512-JhSBC+2/BBQPhd7+V9iDuhI5BH1U/paTTwKgKlP+vo5TJ6Y8WlP/xMXXpuvXkq59Y3oK6a5JJ5H9MCjn1Q8jAA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <style>
      /* body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}
.menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

.menu li {
    display: inline-block;
    position: relative;
}

.menu a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.menu li:hover {
    background-color: #555;
} */

.submenu {
    position: relative;
}

.submenu ul {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: white;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.submenu:hover ul {
    display: block;
}

.submenu ul li {
    display: block;
}
.text a {
    text-decoration: none;
}
.product-name a{ 
 color: black;

}


  </style>
  <div class="text">
  <div class="menu-container">
    <ul class="menu">
    
     <a href="index.php"> <img class="img"  src="img/logo.jpg" alt="" witdh="600px "/> </a>
        <?php                         
                          foreach ($dm as $dm) {
                            extract($dm);
                            $linkdm="index.php?act=sanpham&iddm=".$id;
                            echo '<li><a href="'.$linkdm.'">'.$name.'</a></li>';
                          }
                            ?>
      <div class="a-right">
        <?php
        if (isset($_SESSION['user'])) {
          extract($_SESSION['user']);
          ?>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        <li><a href="">Xin chào <?=$user?></a></li>
        <li class="submenu">
                <a href="#">thông tin</a>
                <ul style="width:150px">
                <li><a href="index.php?act=mybill">HÓA ĐƠN </a></li>
                <li><a href="index.php?act=edittk">TÀI KHOẢN </a></li>
                <li><a href="index.php?act=giohang">GIỎ HÀNG </a></li>

                <li><a href="index.php?act=thoat">THOÁT</a></li>
                </ul>
            </li>
            
        <?php 
        if ($role==1) {
        ?>
        <li><a href="admin/index.php?act=listdm">ADMIN </a></li>
        <?php }?>
          <?php
        } else {
        ?>
      <li><a href="index.php?act=dangnhap">ĐĂNG NHẬP</a></li>
      <li><a href="index.php?act=dangky">ĐĂNG KÍ</a></li>
      <li><a href="index.php?act=giohang">GIỎ HÀNG </a></li>
      <li><a href="index.php?act=mybill">HÓA ĐƠN </a></li>
      <?php }?>
    </div>
    </ul>
  </div>
  