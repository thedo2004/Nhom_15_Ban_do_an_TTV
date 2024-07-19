<link rel="stylesheet" href="css/home.css">
<style>
    .quantity-btn {
    cursor: pointer;
    background-color: black;
    color: #fff;
    border: none;
    padding: 5px 10px;
    font-size: 16px;
}

.quantity-value {
    margin: 0 5px;
    font-size: 16px;
}

</style>
<!-- Thêm vào phần đầu của tệp HTML của bạn -->

<link href="assets/css/spct.css" rel="stylesheet" />
<div class="container">
    <section class="shopping-cart-area">
        <div class="container">
            <h3>Giỏ hàng</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart-form table-responsive">
                        <form action="#" method="post">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumb">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Unit price</th>
                                    </tr>
                                </thead>
                                <?php
                                if (isset($_SESSION["cart"])) {
                                    echo count($_SESSION["cart"])." sản phẩm";
                                } else {
                                    echo "0 sản phẩm";
                                }
                                ?>
                                <?php
                                    if (isset($_SESSION["cart"])) {
                                        if (count($_SESSION["cart"])!=0){
                                        foreach ($_SESSION["cart"] as $item) {
                                            extract($item);
                                            ?>
                                <tbody>
                                    <tr class="cart-product-item">
                                        <td class="product-remove">
                                            <a href="index.php?act=xoagiohang&&id=<?php echo $item['id']; ?>"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        <td class="product-thumb">
                                            <a href="#">
                                                <img src="./upload/<?php echo $item['img']; ?>" width="90" height="110" alt="Image-HasTech">
                                            </a>
                                        </td>
                                        <td class="product-name"><a href="index.php?act=spct&idsp=<?php echo $item['id']; ?>"><?php echo $item['names']; ?></a></h4>
                                        </td>
                                            <h4 class="title">
                                        <td class="product-price">
                                            <span class="price">£<?php echo $item['price']; ?></span>
                                        </td>
                                        <!-- <td class="product-price">
                                            <span class="price"><?php echo $item['soluongmua']; ?></span>
                                        </td> -->
                                            <td class="product-quantity">
                                                <button class="quantity-btn" data-product-id="<?php echo $item['soluongmua']; ?>" data-action="increase">+</button>
                                                <span class="quantity-value"><?php echo $item['soluongmua']; ?></span>
                                                <button class="quantity-btn" data-product-id="<?php echo $item['soluongmua']; ?>" data-action="decrease">-</button>
                                            </td>
                                        
                                        <!-- <td class="product-price">
                                            <span class="price"><?php echo $item['luotxem']; ?></span>
                                        </td> -->
                                        <td class="product-subtotal">
                                            <span class="price">£<?php echo $item['price']; ?></span>
                                        </td>
                                    </tr>
                                    <?php }  ?>
                                    <tr class="actions">
                                        <td class="border-0" colspan="6">
                                            <a href="index.php" class="btn-theme btn-flat">View Product</a>
                                            <a href="index.php?act=bill" class="btn-theme btn-flat">Continue Shopping</a>
                                        </td>
                                    </tr>
                                    <?php }else{?>
                                        <tr class="actions">
                                        <td class="border-0" colspan="6">
                                            <a href="index.php" class="btn-theme btn-flat">View Product</a>
                                        </td>
                                    </tr>
                                    <?php }  }?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
                                           document.addEventListener('DOMContentLoaded', function () {
                                            var quantityButtons = document.querySelectorAll('.quantity-btn');

                                            quantityButtons.forEach(function (button) {
                                                button.addEventListener('click', function () {
                                                    var productId = this.getAttribute('data-product-id');
                                                    var action = this.getAttribute('data-action');
                                                    var quantityElement = document.querySelector('.quantity-value[data-product-id="' + productId + '"]');
                                                    var currentQuantity = parseInt(quantityElement.textContent);

                                                    // Thực hiện tăng hoặc giảm số lượng
                                                    if (action === 'increase') {
                                                        currentQuantity += 1;
                                                    } else if (action === 'decrease' && currentQuantity > 1) {
                                                        currentQuantity -= 1;
                                                    }

                                                    // Cập nhật số lượng trên giao diện
                                                    quantityElement.textContent = currentQuantity;

                                                    // Log giá trị của productId sau mỗi lần click
                                                    console.log(currentQuantity);
                                                });
                                            });
                                        });
                                       
                                        </script>
        <script src="assets/js/jquery-main.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/custom.js"></script>
        <!-- Thêm vào cuối tệp HTML của bạn -->
