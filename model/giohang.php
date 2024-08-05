<?php
function list_sanpham_cart($id)
{
    $sql = "SELECT * FROM `sanpham` WHERE sanpham.id = ? limit 1";
    $list_sanpham = pdo_query($sql, $id);
    return $list_sanpham;
}
function tongdonhang(){
    $tong=0;
    $ttien=0;
    foreach ($_SESSION['cart'] as $cart){
        $ttien+=$cart['price']*$cart['soluongmua'];
        $tong=$ttien + 30000;
    }
    return $tong;
}
function insert_bill($iduser,$name,$email,$address,$tel,$ngaydathang,$tongdonhang,$bankname,$bankuser,$banknumber,$bankimage,$pttt){
    $sql="insert into donhang(iduser,bill_name,bill_email,bill_address,bill_tel,ngaydathang,total,bank_name,bank_user,bank_number,bank_img,bank_method)
    values('$iduser','$name','$email','$address','$tel','$ngaydathang','$tongdonhang','$bankname','$bankuser','$banknumber','$bankimage','$pttt') ";
    return pdo_execute_return_lastInsertId($sql);
}
function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill){
    $sql="insert into giohang(iduser,idpro,img,name,price,soluong,thanhtien,idbill)
    values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill') ";
    return pdo_execute($sql);
}
function loadone_bill($id){
    $sql="select * from donhang where id=".$id;
    $bill=pdo_query_one($sql);
    return $bill;
}
function loadone_cart($idbill){
    $sql="select * from giohang where idbill=".$idbill;
    $listbill=pdo_query_one($sql);
    return $listbill;
}
function loadall_cart($idbill){
    $sql="select * from giohang where idbill=".$idbill;
    $listbill=pdo_query($sql);
    return $listbill ;
}
function loadall_cart_count($idbill){
    $sql="select * from giohang where idbill=".$idbill;
    $listbill=pdo_query($sql);
    return sizeof($listbill) ;
}
function loadall_bill($kyw="",$iduser=0){
    $sql="select * from donhang where 1";
    if ($iduser>0) $sql.=" AND iduser=".$iduser;
    if ($kyw!="") $sql.=" AND id like'%".$kyw."%'";
    $sql.=" order by id desc";
    $listbill=pdo_query($sql);
    return $listbill ;
}
function delete_bill($id){
    $sql="delete from donhang where id=".$id;
    $sql2="delete from giohang where idbill=".$id;
    pdo_query($sql);
    pdo_query($sql2);
}
function get_ttdh($n){
    switch ($n){
        case '0':
            $tt="Đơn hàng không hợp lệ";
            break;
        case '1':
            $tt="Chờ kiểm tra";
            break;
        case '2':
            $tt="Chờ xử lý";
            break; 
        case '3':
            $tt="Đang giao";
            break;
        case '4':
            $tt="Đã giao";
            break;  
            case '5':
                $tt="Đã hủy";
                break;          
        default:
            $tt="Chờ kiểm tra";
            break;
    }
    return $tt;
}

function loadall_mybill($iduser){
    $sql="select * from donhang where iduser=".$iduser." order by id desc";
    $mybill=pdo_query($sql);
    return $mybill ;
}
function loadall_ktbill(){
    $sql="select * from donhang where bill_status='1' order by id desc";
    $mybill=pdo_query($sql);
    return $mybill ;
}
function update_donhang($id,$name,$email,$tel,$address,$status){
    $sql="update donhang set bill_name='".$name."',bill_email='".$email."',bill_tel='".$tel."',bill_address='".$address."',bill_status='".$status."' where id=".$id;
    pdo_execute($sql);
}
function get_pttt($n){
    switch ($n){
        case '0':
            $tt="Thanh toán chuyển khoản";
            break;
        case '1':
            $tt="Thanh toán khi nhận hàng";
            break;
    }
    return $tt;
}

function cancel_donhang($id){
    $sql="update donhang set bill_status =5 where id=".$id;
    pdo_execute($sql);
}


?>