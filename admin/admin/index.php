<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/giohang.php";
include "../model/thongke.php";
include "header.php";
//controller
if(isset( $_GET['act'])){
    $act=$_GET['act'];
    switch($act){
        ///admin tài khoản
        case 'listtk':
            $listtk= loadall_taikhoan();
            include "taikhoan/list.php";
            break;  
            case 'lock':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    lock_taikhoan($_GET['id']);
                }
                $listtk = loadall_taikhoan();
                include "taikhoan/list.php";
                break;
        
            case 'unlock':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    unlock_taikhoan($_GET['id']);
                }
                $listtk = loadall_taikhoan();
                include "taikhoan/list.php";
                break;
             
                // case 'adduser':
                //     if (isset($_POST['addtk']) && ($_POST['addtk'] )) {
                //         $user=$_POST['user'];
                //         $email=$_POST['email'];
                //         $tel=$_POST['tel'];
                //         $address=$_POST['address'];
                //         $id=$_POST['id'];
                //         $pass=$_POST['pass'];
                //         insert_taikhoan($id,$user,$email,$address,$tel,$pass);
                //         // $_SESSION['user']=checkuser($email,$pass);
                //         $thongbao="thành công";
                //     }
                //     // $listtk= loadall_taikhoan();
                //     include "taikhoan/list.php";
                //     break;

                //admin danh mục
                case 'addtk':
                    // Kiểm tra nếu người dùng đã nhấn nút "addtk"
                    if (isset($_POST['addtk']) && ($_POST['addtk'])) {
                        $user = isset($_POST['user']) ? $_POST['user'] : '';
                        $email = isset($_POST['email']) ? $_POST['email'] : '';
                        $address = isset($_POST['address']) ? $_POST['address'] : '';
                        $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
                        $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
            
                        // Kiểm tra hợp lệ
                        $error_message = validate_taikhoan($user, $email, $address, $tel, $pass);
            
                        if ($error_message === null) {
                            // Nếu không có lỗi, thực hiện thêm mới
                            insert_taikhoan($user, $pass, $email, $address, $tel);
                            $thongbao = 'Thêm Tài Khoản Thành Công';
                        } else {
                            // Nếu có lỗi, hiển thị thông báo lỗi
                            $thongbao = $error_message;
                        }
                    }
            
                    include "taikhoan/add.php";
                    break;
                    case 'adddm':
                        // Kiểm tra nếu người dùng đã nhấn nút "themmoi"
                        if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                            $tenloai = isset($_POST['tenloai']) ? $_POST['tenloai'] : '';
                    
                            // Kiểm tra xem đã điền đủ thông tin hay không
                            if (empty($tenloai)) {
                                $thongbao = 'Vui lòng điền đầy đủ thông tin.';
                            } else {
                                // Nếu đầy đủ thông tin, thực hiện thêm mới
                                insert_danhmuc($tenloai);
                                $thongbao = 'Nhập Thành Công';
                            }
                        }
                    
                        // Bao gồm trang thêm mới danh mục
                        include "danhmuc/add.php";
                        break;                    
            case 'listdm':
                $listdm= loadall_danhmuc();
                include "danhmuc/list.php";
                break;  
                case 'xoadm':
                    if(isset($_GET['id'])&& ($_GET['id']>0)){
                        delete_danhmuc($_GET['id']);
                    }
                    $listdm= loadall_danhmuc();
                    include "danhmuc/list.php";
                    break; 
                    case 'suadm':
                        if(isset($_GET['id'])&& ($_GET['id']>0)){
                          $dm=loadone_danhmuc($_GET['id']);
                        }
                        include "danhmuc/update.php";
                    break; 
                    case "updatedm":
                        if(isset($_POST['capnhap'])&&($_POST['capnhap'])){
                            $tenloai=$_POST['tenloai'];
                            $id=$_POST['id'];
                            update_danhmuc($id,$tenloai);
                            $thongbao=" Cập Nhật Thành Công";
                        }
                        $listdm= loadall_danhmuc();
                        //  var_dump($listdm);
                        // die;
                            include "danhmuc/list.php";
                            break; 
                           ///// //san pham//////////////
                           case 'addsp':
                            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                                $iddm = isset($_POST['iddm']) ? $_POST['iddm'] : '';
                                $tensp = isset($_POST['tensp']) ? $_POST['tensp'] : '';
                                $giasp = isset($_POST['giasp']) ? $_POST['giasp'] : '';
                                $luotxem = isset($_POST['luotxem']) ? $_POST['luotxem'] : '';
                                $mota = isset($_POST['mota']) ? $_POST['mota'] : '';
                                $soluong = isset($_POST['soluong']) ? $_POST['soluong'] : '';
                                $hinh = isset($_FILES['hinh']['name']) ? $_FILES['hinh']['name'] : '';
                                $error_message = validate_sanpham($iddm, $tensp, $giasp, $mota, $hinh,$soluong);
                                if ($error_message === null) {
                                    $target_dir = "../upload/";
                                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    
                                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                                        insert_sanpham($tensp, $giasp,$hinh, $mota, $iddm,$soluong);
                                        $thongbao = 'Nhập Thành Công';
                                    } else {
                                        $thongbao = 'Có lỗi khi tải lên hình ảnh.';
                                    }
                                } else {
                                    $thongbao = $error_message;
                                }
                            }
                            $listdm = loadall_danhmuc();
                            include "sanpham/add.php";
                            break;
                                case 'listsp':
                                    if(isset($_POST['listok'])&&($_POST['listok'])){
                                        $kyw=$_POST['kyw'];
                                        $iddm=$_POST['iddm'];
                                    }else{
                                        $kyw='';
                                        $iddm=0;
                                    }
                                    $listdm= loadall_danhmuc();
                                    $listsp= loadall_sanpham($kyw,$iddm);
                                    $a="ko thấy sản phẩm";
                                    // var_dump($listsp);
                                    // die;
                                    include "sanpham/list.php";
                                    break;  
                                    case 'xoasp':
                                        if(isset($_GET['id'])&& ($_GET['id']>0)){
                                            delete_sanpham($_GET['id']);
                                        }
                                        $listsp= loadall_sanpham("",0);
                                        include "sanpham/list.php";
                                        break; 
                                        case 'suasp':
                                            if(isset($_GET['id'])&& ($_GET['id']>0)){
                                              $sp=loadone_sanpham($_GET['id']);
                                            }
                                            $listdm= loadall_danhmuc();
                                            include "sanpham/update.php";
                                        break; 
                                        case "updatesp":
                                            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){          
                                                 $id=$_POST['id'];
                                                //  $iddm=$_POST['iddm'];
                                                $tensp=$_POST['tensp'];
                                                $giasp=$_POST['giasp'];
                                                $mota=$_POST['mota'];
                                                $soluong=$_POST['soluong'];
                                                $hinh=$_FILES['hinh']['name'];
                                                $target_dir = "../upload/";
                                                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                                                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                                                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                                                  } else {
                                                    // echo "Sorry, there was an error uploading your file.";
                                                    
                                                  }
                                              update_sanpham($id,$tensp,$giasp,$hinh,$mota,$soluong);
                                                 $thongbao=" Cập Nhật Thành Công";
                                            }
                                            $listdm= loadall_danhmuc();
                                            $listsp= loadall_sanpham("",0);
                                            // var_dump($listsp);
                                            // die;
                                                include "sanpham/list.php";
                                                break; 

                    case 'listbill': 
                        if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                            $kyw=$_POST['kyw'];
                        }else{
                            $kyw="";
                        }
                        ;
                        $listbill=loadall_bill($kyw,0);
                        include "donhang/list.php";
                        break;
                    case 'xoadh':
                        if(isset($_GET['id'])&& ($_GET['id']>0)){
                            delete_bill($_GET['id']);
                        }
                        $listbill= loadall_bill("",0);
                        include "donhang/list.php";
                        break; 
                        case 'suadh':
                            if(isset($_GET['id'])&& ($_GET['id']>0)){
                              $listdh=loadone_bill($_GET['id']);
                            }
                            include "donhang/update.php";
                        break;
                        case 'updatehd':
                            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                                $id=$_POST['id'];
                                $name=$_POST['billname'];
                                $email=$_POST['billemail'];
                                $address=$_POST['billaddress'];
                                $tel=$_POST['billtel'];
                                $status=$_POST['billstatus'];
                                update_donhang($id,$name,$email,$tel,$address,$status);
                                $thongbao=" Cập Nhật Thành Công";
                            }
                            $listbill= loadall_bill("",0);
                            include "donhang/list.php";
                            break;
                            case 'ctdh':
                                if(isset($_GET['id'])&& ($_GET['id']>0)){
                                  $listdh=loadone_bill($_GET['id']);
                                }
                                include "donhang/detail.php";
                            break;
                            case 'listkt': 
                                $listbill=loadall_ktbill();
                                include "donhang/listkt.php";
                                break;
                                case 'listthongke': 
                                    $listthongke1=loadall_thongke_danhmuc();
                                    
                                    include "thongke/list.php";
                                    break;
                                    case 'bieudo': 
                                        $listthongke1=loadall_thongke_danhmuc();
                                        
                                        include "thongke/bieudo.php";
                                        break;
                default:
                include "home.php";
                break;
    }
}
else{
    include "home.php";
}
// include "home.php";
include "footer.php"
?>