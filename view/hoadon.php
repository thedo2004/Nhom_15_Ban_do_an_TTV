<link rel="stylesheet" href="css/home.css">


<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
<link href="assets/css/spct.css" rel="stylesheet" />


<link rel="stylesheet" href="css/hoadon.css">

<header>
<?php
        extract($bill);
        $countsp=loadall_cart_count($bill["id"]);
        $ttdh=get_ttdh($bill_status);
        $pttt=get_pttt($bank_method);
?>

<h1>Hóa đơn bán hàng</h1>
</header>
<main>
<h1>Hóa đơn</h1>
<table>
  <tr>
    <th>Số hóa đơn</th>
    <td>H2T-<?=$bill['id'];?></td>
  </tr>
  <tr>
    <th>Ngày bán</th>
    <td><?=$bill['ngaydathang'];?></td>
  </tr>
  <tr>
    <th>Khách hàng</th>
    <td><?=$bill['bill_name'];?></td>
  </tr>
  <tr>
    <th>Địa chỉ</th>
    <td><?=$bill['bill_address'];?></td>
  </tr>
  <tr>
    <th>Số Điện Thoại</th>
    <td><?=$bill['bill_tel'];?></td>
  </tr>
  <tr>
    <th>Tổng mặt hàng</th>
    <td><?=$countsp;?></td>
  </tr>
  <tr>
    <th>Thành tiền</th>
    <td><?=$bill['total'];?></td>
  </tr>
  <tr>
    <th>Phương thức thanh toán</th>
    <td><?=$pttt;?></td>
  </tr>
  <tr>
    <th>Trạng thái</th>
    <td><?=$ttdh;?></td>
  </tr>


  <tr>
    <th></th>
    <td>
    <?php if($bill_status==1 or $bill_status==2 ){?>
  <form action="index.php?act=huydh" method="POST">
  <input type="hidden" name="id" value="<?php echo $id;?>">
    <input type="submit" name="huy" value="Hủy đơn hàng" class="btn-theme">
  </form>
  <?php  } ?>

    </td>
  </tr>
  
</table>

<div class="container">
        <h3>Chi tiết giỏ hàng</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="shopping-cart-form table-responsive">
              <form action="#" method="post">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th class="product-thumb">&nbsp;</th>
                      <th class="product-name">Product</th>
                      <th class="product-price">Price</th>
                      <th class="product-quantity">Quantity</th>
                      <th class="product-subtotal">Total</th>
                    </tr>
                  </thead>
                  <?php
                      $tong=0;
                      $ttien=0;
                      $hoadon='';
                      $tongsl=0;
                      foreach ($listbill as $cart) {
                        $tong=$cart['price']*$cart['soluong'];
                        $ttien+=$tong;
                        $tongsl+=$cart['soluong'];
                      ?>
                  <tbody>
                    <tr class="cart-product-item">
                      <td class="product-thumb">
                        <a href="#">
                        <img src="./upload/<?php echo $cart['img']; ?>" width="90" height="110" alt="Image-HasTech">
                        </a>
                      </td>
                      <td class="product-name">
                        <h4 class="title"><?php echo $cart['name']; ?></h4>
                      </td>
                      <td class="product-price">
                      <span class="price">£<?php echo $cart['price']; ?></span>
                      </td>
                      <td class="product-quantity">
                      <span class="price"><?php echo $cart['soluong']; ?></span>
                      </td>
                      <td class="product-subtotal">
                      <span class="price"><?php echo $tong; ?> Vnđ</span>
                      </td>
                    </tr>
                    <?php } ?>
                    <tr class="cart-product-item">
                      <td class="product-thumb">
                      </td>
                      <td class="product-name">
                      </td>
                      <td class="product-price">
                      </td>
                      <td class="product-quantity">
                      <span class="price"><?php echo $tongsl; ?></span>
                      </td>
                      <td class="product-subtotal">
                      <span class="price"><?php echo $bill['total']-30000; ?> Vnđ</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </div>

</main>
</body>
<div class=button>
<div class="back"> <a href="index.php?act=home" class="btn-theme">Trang chủ</a></div>

<div class="next" ><a href="index.php?act=mybill" class="btn-theme">Hóa đơn</a></div>
</div>
<footer>
<p><?=$thongbao?></p>
</footer>