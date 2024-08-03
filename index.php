<?php
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/taikhoan.php";
include "model/danhmuc.php";
include "model/giohang.php";
$dm=loadall_danhmuc();
include "view/header.php";
include "gobal.php";
$top10=loadall_sanpham_top10();
$spnew = loadall_sanpham_home();
if ((isset($_GET['act']))&&($_GET['act'])) {
    $act=$_GET['act'];
    switch ($act) {

        // 
        
        case 'spct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id=$_GET['idsp'];
            $onesp=loadone_sanpham($id);
            include "view/sanphamct.php";
            }else {
                include "view/home.php";
            }
            break;
            case 'sanpham':
                if (isset($_POST['kyw']) && ($_POST['kyw']!="")){
                    $kyw=$_POST['kyw'];
                }else{
                    $kyw="";
                }
                if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                    $iddm=$_GET['iddm'];
                }else{
                    $iddm="";
                }
                $dssp=loadall_sanpham($kyw,$iddm);

                    include "view/sanpham.php";
                
                break;
        case 'gt':
            include "view/gt.php";
            break;
            case 'dangky':
                if (isset($_POST['dangki']) && ($_POST['dangki'])) {
                    // Lấy giá trị từ form
                    //
                    $user = isset($_POST['user']) ? $_POST['user'] : '';
                    $email = isset($_POST['email']) ? $_POST['email'] : '';
                    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
                    $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
                    $address = isset($_POST['address']) ? $_POST['address'] : '';
                    // Kiểm tra các điều kiện validate
                    if (empty($user) || empty($email) || empty($pass) || empty($tel) || empty($address)) {
                        $thongbao = "Vui lòng điền đầy đủ thông tin.";
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $thongbao = "Email không hợp lệ.";
                    } elseif (strlen($pass) < 8) {
                        $thongbao = "Mật khẩu phải có ít nhất 8 ký tự.";
                    } else {
                        // Thực hiện đăng ký nếu thông tin hợp lệ
                        insert_taikhoan($user, $pass, $email, $address, $tel);
                        $thongbao = "Đăng ký thành công";
                    }
                }
                include "view/taikhoan/dangki.php";
                break;
            

    case 'dangnhap':
        if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
            // Lấy giá trị từ form
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
    
            // Kiểm tra email và password có giá trị
            if (empty($email) || empty($pass)) {
                $thongbao = "Vui lòng nhập đầy đủ email và password.";
            } else {
                // Kiểm tra định dạng email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $thongbao = "Email không hợp lệ.";
                } else {
                    // Thực hiện đăng nhập
                    $checkuser = checkuser($email, $pass);
                    if ($checkuser['is_locked']) {
                        $thongbao="Tài khoản đã bị khóa";
                    }
                    elseif (is_array($checkuser)) {
                        $_SESSION['user'] = $checkuser;
                        $thongbao = "Đăng nhập thành công";
                        header("Location: index.php");
                        exit();
                    } else {
                        $thongbao = "Sai mật khẩu hoặc email";
                    }
                }
            }
        }
        include "view/taikhoan/dangnhap.php";
        break;
    
                    case 'edittk':
                        if (isset($_POST['catnhaptk']) && ($_POST['catnhaptk'] )) {
                            $user=$_POST['user'];
                            $email=$_POST['email'];
                            $tel=$_POST['tel'];
                            $address=$_POST['address'];
                            $id=$_POST['id'];
                            $pass=$_POST['pass'];
                            update_taikhoan($id,$user,$email,$address,$tel,$pass);
                            $_SESSION['user']=checkuser($email,$pass);
                            $thongbao="thay đổi thông tin thành công";
                        }
                        include "view/taikhoan/edit_taikhoan.php";
                        break;
                        case 'thoat':
                           session_unset();
                           header('location:index.php');
                            break;
            case 'home':
                include "view/home.php";
                break;



            case 'xoagiohang':
                if (isset($_SESSION["cart"]) && isset($_GET["id"])) {
                    $id = $_GET["id"];
                    $updatedCart = [];
    
                    foreach ($_SESSION["cart"] as $item) {
                        if ($item["id"] != $id) {
                            $updatedCart[] = $item;
                        }
                    }
    
                    // Cập nhật phiên giỏ hàng với danh sách đã lọc
                    $_SESSION["cart"] = $updatedCart;
    
                    // Kiểm tra xem giỏ hàng còn sản phẩm không
                    
                        include("./view/giohang.php");
                    }
                break;
            case 'giohang':
                if (isset($_GET["id"]) ) {
                    $id = $_GET["id"];
                    $list_sanpham_cart = list_sanpham_cart($id);
    
                    $soluongmua = 1;

    
                    if (is_array($list_sanpham_cart)) {
                        foreach ($list_sanpham_cart as $sanpham) {
                            $new_sanpham = [
                                "id" => $sanpham['id'],
                                "names" => $sanpham['names'],
                                "price" => $sanpham['price'],
                                "img" => $sanpham['img'],
                                "soluongmua" => $_POST["soluongmua"] ?? $soluongmua,
                            ];
                        }
                    }
    
                    // Kiểm tra session tồn tại hay không nếu chưa thì tăng lên
                    if (isset($_SESSION['cart'])) {
                        $i = 0;
                        while ($i < count($_SESSION['cart'])) {
                            if ($_SESSION['cart'][$i]['id'] == $id) {
                                $_SESSION['cart'][$i]['soluongmua'] += $soluongmua;
                                break;
                            }
                            $i++;
                        }
                        if ($i == count($_SESSION['cart'])) {
                            array_push($_SESSION['cart'], $new_sanpham);
                        }
                    } else {
                        $_SESSION['cart'] = array($new_sanpham);
                    }
                }
                include "view/giohang.php";
                break;
            case 'themgiohang':
                if (isset($_GET["id"]) || $_POST["themgio"]) {
                    $id = $_GET["id"];
                    $list_sanpham_cart = list_sanpham_cart($id);
    
                    $soluongmua = 1;

    
                    if (is_array($list_sanpham_cart)) {
                        foreach ($list_sanpham_cart as $sanpham) {
                            $new_sanpham = [
                                "id" => $sanpham['id'],
                                "names" => $sanpham['names'],
                                "price" => $sanpham['price'],
                                "img" => $sanpham['img'],
                                "soluongmua" => $_POST["soluongmua"] ?? $soluongmua,
                            ];
                        }
                    }
    
                    // Kiểm tra session tồn tại hay không nếu chưa thì tăng lên
                    if (isset($_SESSION['cart'])) {
                        $i = 0;
                        while ($i < count($_SESSION['cart'])) {
                            if ($_SESSION['cart'][$i]['id'] == $id) {
                                $_SESSION['cart'][$i]['soluongmua'] += $soluongmua;
                                break;
                            }
                            $i++;
                        }
                        if ($i == count($_SESSION['cart'])) {
                            array_push($_SESSION['cart'], $new_sanpham);
                        }
                    } else {
                        $_SESSION['cart'] = array($new_sanpham);
                    }
                    echo $thongbao;
                     header("location: index.php?act=giohang");
                }
                break;


                case 'bill':
                    include 'view/thanhtoan.php';
                    break;
                    case 'billconfirm':
                        //tạo bill
                        if (isset($_POST['dongydathang'])&&($_POST['dongydathang'])){
                            if(isset($_SESSION['user'])) $iduser=$_SESSION['user']['id'];
                            else $iduser=0;
                            $name=$_POST['name'];
                            $email=$_POST['email'];
                            $address=$_POST['address'];
                            $tel=$_POST['tel'];
                            $ngaydathang=date('h:i:sa d/m/Y');
                            $tongdonhang=tongdonhang();
                            $pttt=$_POST['pttt'];
                            
                            if ($pttt==0){
                            $bankname=$_POST['bankname'];
                            $bankuser=$_POST['bankuser'];
                            $banknumber=$_POST['banknum'];
                            $bankimage=$_FILES['bankimage']['name'];
                            
                            $target_dir = "upload/";
                            $target_file = $target_dir . basename($_FILES["bankimage"]["name"]);
                            if (empty($name) || empty($email) || empty($address) || empty($tel) || empty($bankname) || empty($bankuser) || empty($banknumber) || empty($bankimage)) {
                                $thongbao = "Vui lòng điền đầy đủ thông tin.";
                                include "view/thanhtoan.php";
                            }else
                            {
                            if (move_uploaded_file($_FILES["bankimage"]["tmp_name"], $target_file)) {
                                // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                              } else {
                                // echo "Sorry, there was an error uploading your file.";
                              };
                              $idbill= insert_bill($iduser,$name,$email,$address,$tel,$ngaydathang,$tongdonhang,$bankname,$bankuser,$banknumber,$bankimage,$pttt);

                              //insert into cart $session['cart'] & idbill
                              if (isset($_SESSION['user'])){
                              foreach($_SESSION['cart'] as $cart){
                                insert_cart($_SESSION['user']['id'],$cart['id'],$cart['img'],$cart['names'],$cart['price'],$cart['soluongmua'],$cart['price']*$cart['soluongmua'],$idbill);
                              }
                            }
                              ;
    
                              //xóa session
                              $_SESSION['cart']=[];
                              $thongbao="Cảm ơn quý khách đã mua hàng";
                              $bill=loadone_bill($idbill);
                              $listbill=loadall_cart($idbill);
                              include "view/hoadon.php";
                            };
                            
                            }else if ($pttt==1){
                                $bankname='';
                                $bankuser='';
                                $banknumber='';
                                $bankimage='';
                                $bankimage = '';
                            if (empty($name) || empty($email) || empty($address) || empty($tel)) {
                                $thongbao = "Vui lòng điền đầy đủ thông tin.";
                                include "view/thanhtoan.php";
                            }else
                            {
                              $idbill= insert_bill($iduser,$name,$email,$address,$tel,$ngaydathang,$tongdonhang,$bankname,$bankuser,$banknumber,$bankimage,$pttt);

                              //insert into cart $session['cart'] & idbill
                              if (isset($_SESSION['user'])){
                              foreach($_SESSION['cart'] as $cart){
                                insert_cart($_SESSION['user']['id'],$cart['id'],$cart['img'],$cart['names'],$cart['price'],$cart['soluongmua'],$cart['price']*$cart['soluongmua'],$idbill);
                              }
                            }
                              ;
    
                              //xóa session
                              $_SESSION['cart']=[];
                              $thongbao="Cảm ơn quý khách đã mua hàng";
                              $bill=loadone_bill($idbill);
                              $listbill=loadall_cart($idbill);
                              include "view/hoadon.php";
                            };
                            };
                            
                        }
                        break;

                    case 'hoadon':
                        include "view/hoadon.php";
                        break;
                        case 'mybill':
                            if (isset($_SESSION['user'])){
                            $mybill=loadall_mybill($_SESSION['user']['id']);
                            }else{
                                $mybill=loadall_mybill(0);
                            }
                            include "view/mybill.php";
                            break;  
                    
                            case 'chitietdh':
                                if(isset($_GET['id'])&& ($_GET['id']>0)){
                                $bill=loadone_bill($_GET['id']);
                                $listbill=loadall_cart($_GET['id']);
                                $thongbao="";
                                }
                                include "view/hoadon.php";
                                break;
                            case 'huydh':
                                if(isset($_POST['huy'])&&($_POST['id'])){
                                    $id=$_POST['id'];
                                    cancel_donhang($id);
                                    $thongbao=" Hủy Thành Công";
                                }
                                header("location: index.php?act=chitietdh&id=".$_POST['id']);
                                break;
                            
        default:


            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";

?>
