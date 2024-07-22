<?php
function insert_danhmuc($tenloai){
    $sql="insert into danhmuc (name) values('$tenloai')";
                pdo_execute($sql);
}
// function delete_danhmuc($id){
//     $sql="delete from danhmuc where id=".$id;
//     pdo_query($sql);
// }
function delete_danhmuc($id) {
    // Kiểm tra xem danh mục có sản phẩm không
    if (has_products_in_danhmuc($id)) {
        // Nếu có sản phẩm, thì có thể thực hiện các hành động khác, ví dụ như hiển thị thông báo lỗi
        echo "Không thể xóa danh mục có sản phẩm.";
        return;
    }

    // Nếu không có sản phẩm, tiếp tục xóa danh mục
    $sql = "DELETE FROM danhmuc WHERE id=" . $id;
    pdo_query($sql);
}

function has_products_in_danhmuc($iddm) {
    // Kiểm tra xem có sản phẩm thuộc danh mục không
}

    function loadall_danhmuc(){
        $sql="select * from danhmuc order by id";
                $listdm = pdo_query($sql);
                return $listdm;
    }
    function loadone_danhmuc($id){
        $sql="select*  from danhmuc where id=".$id;
         $dm=pdo_query_one($sql);
        return $dm;
    }
    function update_danhmuc($id,$tenloai){
        $sql="update  danhmuc set name='".$tenloai."' where id=".$id;
        pdo_execute($sql);
    }

?>