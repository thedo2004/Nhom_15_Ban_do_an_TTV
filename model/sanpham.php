<?php
function insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm,$soluong){
    $sql="insert into sanpham (names,price,img,mota,iddanhmuc,soluong) values('$tensp','$giasp','$hinh','$mota','$iddm','$soluong')";
                pdo_execute($sql);
}
function delete_sanpham($id){
    $sql="delete  from sanpham where id=".$id;
    pdo_query($sql);
}

function loadall_sanpham_top10(){
    $sql="select * from sanpham where 1 order by luotxem desc limit 0,10";
         $listsp= pdo_query($sql);
            return $listsp;
}
function loadall_sanpham_home(){
    $sql="select * from sanpham where 1 order by id desc limit 0,9";
         $listsp= pdo_query($sql);
            return $listsp;
}
    function loadall_sanpham($kyw,$iddm){
        $sql="select * from sanpham where 1";
        if($kyw!=""){
            $sql.=" and names like '%".$kyw."%'";
        }
        if($iddm>0){
            $sql.=" and iddanhmuc ='".$iddm."'";
        }
        $sql.=" order by id desc";
             $listsp= pdo_query($sql);
                return $listsp;
    }
    function loadone_sanpham($id){
        $sql="select*  from sanpham where id=".$id;
         $sp=pdo_query_one($sql);
        return $sp;
    }
    function update_sanpham($id,$tensp,$giasp,$hinh,$mota,$soluong){
        if($hinh!=""){      
        $sql="update  sanpham set  names='".$tensp."',price='".$giasp."',img='".$hinh."',mota='".$mota."',soluong='".$soluong."' where id=".$id;
        }
        else  $sql="update  sanpham set  names='".$tensp."',price='".$giasp."',mota='".$mota."',soluong='".$soluong."' where id=".$id;
        pdo_execute($sql);
    }
function validate_sanpham($iddm, $tensp, $giasp, $mota, $hinh,$soluong) {
    // Kiểm tra xem đã nhập đủ thông tin hay không
    if (empty($iddm) || empty($tensp) || empty($giasp) || empty($mota) || empty($hinh)||empty($soluong)) {
        return 'Vui lòng điền đầy đủ thông tin.';
    }

    // Các kiểm tra hợp lệ khác có thể được thêm vào tại đây
    // Ví dụ: Kiểm tra giá sản phẩm là số dương, mô tả không quá dài, ...

    // Nếu không có lỗi, trả về null
    return null;
}
?>