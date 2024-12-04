<?php
session_start();
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/taikhoan.php";
include "model/cart.php";
include "model/bill.php";
include "model/banner.php";
include "view/header.php";
include "global.php";


if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];

$spnew = loadAll_sanpham_home();
$dsdm = loadAll_danhmuc();
$dstop10 = loadAll_sanpham_top10();
$banners = loadAll_banner();
    // Sản phẩm
if ((isset($_GET['act']) && ($_GET['act']) != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanpham':
            if (isset($_POST['kyw']) && $_POST['kyw']!="") {
                $kyw= $_POST['kyw'];

            } else {
                $kyw= "";
            }
            if (isset($_GET['iddm']) && $_GET['iddm']>0) {
                $iddm= $_GET['iddm'];
            } else {
                $iddm= 0;
            }
            $dssp= loadAll_sanpham($kyw, $iddm);
            $tendm= load_ten_dm($iddm);
            include "view/sanpham/sanpham.php";
            break;
            
            // Sản phẩm chi tiết
        case 'sanphamct':
            if (isset($_GET['idsp']) && $_GET['idsp']>0) {
                $id= $_GET['idsp'];
                $onesp= loadOne_sanpham($id);
                extract($onesp);
                $spcl= load_sanpham_cungloai($id,$iddm);
                include "view/sanpham/sanphamct.php";
            } else {
                include "view/home.php";
            }
            break;

            // Đăng ký
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
            
                // Kiểm tra xem tài khoản đã tồn tại chưa
                $existing_account = check_account_existence($email, $user);
                if ($existing_account) {
                    // Nếu tồn tại, báo lỗi
                    $thongbao = "Email hoặc tên đăng nhập đã tồn tại. Vui lòng sử dụng thông tin khác.";
                } else {
                    // Nếu không tồn tại, tiến hành đăng ký
                    insert_taikhoan($email, $user, $pass);
                    $thongbao = "Đăng ký thành công. Vui lòng đăng nhập để tiếp tục.";
                }
            }
            include "view/taikhoan/dangky.php";
            break;
            

            // Đăng nhập
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user= $_POST['user'];
                $password= $_POST['password'];
                $check_user= check_user($user, $password);   
                if (is_array($check_user)) {
                    $_SESSION['user']= $check_user;
                    $thongbao= "BẠN ĐÃ ĐĂNG NHẬP THÀNH CÔNG";
                    header('Location: index.php');
                } else {
                    $thongbao= "TÀI KHOẢN KHÔNG TỒN TẠI. VUI LÒNG KIỂM TRA LẠI";
                }               
            }
            include "view/taikhoan/dangky.php";
            break;

            // Sửa thông tin tài khoản
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user= $_POST['user'];
                $pass= $_POST['pass'];
                $email= $_POST['email'];
                $address= $_POST['address'];
                $tel= $_POST['tel'];
                $id= $_POST['id'];
                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $_SESSION['user']= check_user($user, $pass);
                header('Location: index.php?act=edit_taikhoan');        
            }
            include "view/taikhoan/edit_taikhoan.php";
            break;

            // Quên mật khẩu
        case 'quenmk':
            if (isset($_POST['gui']) && ($_POST['gui'])) {
                $email= $_POST['email'];
                $checkemail= check_email($email);
                if (is_array($checkemail)) {
                    $thongbao= "Mật khẩu của bạn là: ".$checkemail['pass'];
                } else {
                    $thongbao= "Email này không tồn tại";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;

            // Đăng xuất
        case 'logout':
            session_unset();
            header('Location: index.php');
            break;
        
        case 'viewcart':
            include "view/cart/viewcart.php";
            break;

            // Thêm sản phẩm
        case 'addtocart':
            if (isset($_POST['addtocart']) && $_POST['addtocart']) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = 1;
                $ttien = $soluong * $price;
                $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                    
                // Thêm sản phẩm vào giỏ hàng
                $_SESSION['mycart'][] = $spadd;
            }
            include "view/cart/viewcart.php";
            break;

            // Xóa sản phẩm khỏi giỏ hàng
        case 'delcart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('Location:' . $_SERVER['HTTP_REFERER']);
            break;
            
            case 'bill':
                include "view/cart/bill.php";
                break;

            // Tạo bill
            case 'billconform':
                if (isset($_POST['dongydathang']) && $_POST['dongydathang']) {
                    // Kiểm tra nếu người dùng đã đăng nhập
                    if (isset($_SESSION['user'])) {
                        $iduser = $_SESSION['user']['id'];
                    } else {
                        $iduser = 0;  // Nếu người dùng chưa đăng nhập
                    }
            
                    // Lấy thông tin người dùng từ form
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
            
                    $pttt = isset($_POST['pttt']) ? $_POST['pttt'] : 0; // Mặc định là "Trả tiền khi nhận hàng"

                    // Lấy ngày giờ đặt hàng
                    $ngaydathang = date("h:i:sa d/m/Y");
            
                    // Tính tổng giá trị đơn hàng
                    $tongdonhang = tongdonhang();  // Hàm tính tổng tiền đơn hàng
            
                    // Gọi hàm insert_bill để lưu thông tin đơn hàng
                    $idbill = insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);
            
                    // Insert thông tin các sản phẩm trong giỏ hàng vào bảng cart
                    foreach ($_SESSION['mycart'] as $cart) {
                        insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                    }
            
                    // Reset giỏ hàng sau khi đặt đơn hàng thành công
                    $_SESSION['mycart'] = [];  // Xóa giỏ hàng
            
                    // Hiển thị thông tin đơn hàng vừa tạo
                    $bill = loadone_bill($idbill);
                    $billct = loadall_cart($idbill);
            
                    // Hiển thị trang xác nhận đơn hàng
                    include "view/cart/billconform.php";
                }
                break;
        
            // Đơn hàng của tôi
        case 'mybill':
                $listbill= loadall_bill("",$_SESSION['user']['id']);
                include "view/cart/mybill.php";
                break;

                case 'cancelbill':
                    if (isset($_GET['idbill']) && $_GET['idbill'] > 0) {
                        $idbill = $_GET['idbill'];
                
                        // Gọi hàm cập nhật trạng thái đơn hàng sang "Đã hủy"
                        update_bill_status($idbill, -1); // 4 = Đã hủy
                
                        // Điều hướng về lại lịch sử đơn hàng
                        header("Location: index.php?act=mybill");
                    }
                    break;

                // Xử lý xác nhận đơn hàng
                case 'confirmorder':
                    if (isset($_GET['idbill']) && $_GET['idbill'] > 0) {
                        $idbill = $_GET['idbill'];

                        // Cập nhật trạng thái đơn hàng thành "Thành công" trong bảng hóa đơn
                        update_bill_status($idbill, 4); // 4 là mã trạng thái "Thành công"
                        
                        // Điều hướng về lại trang "Đơn hàng của tôi"
                        header("Location: index.php?act=mybill");
                    }
                    break;

                

        case 'boxsp':
                include "view/sanpham/sanphamct.php";
                break;
                
        case 'gioithieu':
                include "view/gioithieu/gioithieu.php";
                break;

        case 'sanpham':
            include "view/sanpham/sanpham.php";
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
