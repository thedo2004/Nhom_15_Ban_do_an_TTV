<link rel="stylesheet" href="css/home.css">


<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
<link href="assets/css/spct.css" rel="stylesheet" />
<div class="container" >
    <div class="title" ><h2 style="text-align: center;">Đơn hàng của tôi</h2></div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Người đặt</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Số lượng mặt hàng</th>
                <th scope="col">Tổng giá trị đơn hàng</th>
                <th scope="col">Tình trạng đơn hàng</th>
                <th scope="col">Chi tiết</th>
              </tr>
            </thead>
            <?php
                    $ttdh=0;
                    if (is_array($mybill)){
                    foreach($mybill as $bill){
                        extract($bill);
                        $ttdh=get_ttdh($bill_status);
                        $countsp=loadall_cart_count($id);
                        $chitietdh= "index.php?act=chitietdh&id=".$id;
                        echo'
                    <tbody>
                        <tr>
                            <td>H2T-'.$id.'</td>
                            <td>'.$bill_name.'</td>
                            <td>'.$ngaydathang.'</td>
                            <td>'.$countsp.'</td>
                            <td>'.$total.'</td>
                            <td>'.$ttdh.'</td>
                            <td><a href="'.$chitietdh.'"><button type="button" class="btn btn-success">Detail</button></a></td>
                        </tr>
                    </tbody>
                        ';
                    } }
                
            ?>

    </table>
</div>