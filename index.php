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
            
                $thongbao = '';
            
                if (empty($email) || empty($user) || empty($pass)) {
                    $thongbao = "Tất cả thông tin phải được điền đầy đủ!";
                }elseif (strlen($user) < 5) {
                    $thongbao = "Tên đăng nhập người dùng phải có ít nhất 5 ký tự!";
                }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $thongbao = "Email không hợp lệ!";
                }elseif (strlen($pass) < 6) {
                    $thongbao = "Mật khẩu phải có ít nhất 6 ký tự!";
                }elseif (!preg_match('/[A-Z]/', $pass)) {
                    $thongbao = "Mật khẩu phải chứa ít nhất 1 chữ cái viết hoa!";
                }elseif (!preg_match('/[a-z]/', $pass)) {
                    $thongbao = "Mật khẩu phải chứa ít nhất 1 chữ cái viết thường!";
                }elseif (!preg_match('/[0-9]/', $pass)) {
                    $thongbao = "Mật khẩu phải chứa ít nhất 1 chữ số!";
                }else {
                    $existing_account = check_account_existence($email, $user);
                        if ($existing_account) {
                            $thongbao = "Email hoặc tên đăng nhập đã tồn tại. Vui lòng sử dụng thông tin khác.";
                        } else {
                            insert_taikhoan($email, $user, $pass);
                            $thongbao = "Đăng ký thành công. Vui lòng đăng nhập để tiếp tục!";
                        }
                    }
                }
                include "view/taikhoan/dangky.php";
                break;
        
        case 'dangnhap1':
            include "view/taikhoan/dangnhap.php";
            break;
            
            // Đăng nhập
            case 'dangnhap':
                if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                    // Lấy dữ liệu từ form
                    $user = $_POST['user'];
                    $password = $_POST['password'];
            
                    // Khởi tạo các thông báo lỗi
                    $thongbao = '';
            
                    // Kiểm tra xem người dùng có nhập đầy đủ thông tin không
                    if (empty($user) || empty($password)) {
                        $thongbao = "Tên đăng nhập và mật khẩu không được để trống!";
                    } else {
                        // Kiểm tra thông tin tài khoản
                        $check_user = check_user($user, $password);
            
                        if (is_array($check_user)) {
                            // Nếu tài khoản tồn tại, lưu thông tin người dùng vào session
                            $_SESSION['user'] = $check_user;
                            header('Location: index.php');
                            exit;
                        } else {
                            $thongbao = "Tài khoản hoặc mật khẩu sai!";
                        }
                    }
                }
                include "view/taikhoan/dangnhap.php";
                break;
            

            case 'edit_taikhoan':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    // Lấy dữ liệu từ form
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $id = $_POST['id'];
            
                    // Khởi tạo biến thông báo
                    $thongbao = '';
            
                    // Kiểm tra tất cả các trường có được điền đầy đủ không
                    if (empty($user) || empty($pass) || empty($email) || empty($address) || empty($tel)) {
                        $thongbao = "Không được bỏ trống thông tin!";
                    } 
                    // Kiểm tra email có hợp lệ không
                    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $thongbao = "Email không hợp lệ!";
                    } 
                    // Kiểm tra số điện thoại có đúng định dạng không
                    elseif (!preg_match('/^[0-9]{10,11}$/', $tel)) {
                        $thongbao = "Số điện thoại phải gồm 10 hoặc 11 chữ số!";
                    }
                    // Kiểm tra mật khẩu có đủ độ mạnh không
                    elseif (strlen($pass) < 6) {
                        $thongbao = "Mật khẩu phải có ít nhất 6 ký tự!";
                    } 
                    // Kiểm tra mật khẩu có chứa ít nhất 1 chữ cái viết hoa
                    elseif (!preg_match('/[A-Z]/', $pass)) {
                        $thongbao = "Mật khẩu phải chứa ít nhất 1 chữ cái viết hoa!";
                    } 
                    // Kiểm tra mật khẩu có chứa ít nhất 1 chữ cái viết thường
                    elseif (!preg_match('/[a-z]/', $pass)) {
                        $thongbao = "Mật khẩu phải chứa ít nhất 1 chữ cái viết thường!";
                    } 
                    // Kiểm tra mật khẩu có chứa ít nhất 1 chữ số
                    elseif (!preg_match('/[0-9]/', $pass)) {
                        $thongbao = "Mật khẩu phải chứa ít nhất 1 chữ số!";
                    } 
                    // Kiểm tra mật khẩu có chứa ít nhất 1 ký tự đặc biệt
                    elseif (!preg_match('/[\W_]/', $pass)) {
                        $thongbao = "Mật khẩu phải chứa ít nhất 1 ký tự đặc biệt!";
                    } 
                    else {
                        // Nếu tất cả hợp lệ, cập nhật tài khoản
                        update_taikhoan($id, $user, $pass, $email, $address, $tel);
                        $_SESSION['user'] = check_user($user, $pass);  // Lưu lại thông tin người dùng vào session
                        $thongbao = "Cập nhật tài khoản thành công!";
                    }
                }
            
                // Trả thông báo về view
                include "view/taikhoan/edit_taikhoan.php";
                break;
                        
            // Quên mật khẩu
            case 'quenmk':
                // Kiểm tra nếu người dùng đã nhấn nút "Gửi"
                if (isset($_POST['gui']) && ($_POST['gui'])) {
                    $email = $_POST['email'];
            
                    // Khởi tạo thông báo lỗi và biến email
                    $thongbao = '';
                    $error_email = '';
            
                    // Kiểm tra xem email có được nhập hay không
                    if (empty($email)) {
                        $error_email = "Email không được để trống!";
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $error_email = "Email không hợp lệ!";
                    }
            
                    // Nếu không có lỗi về email, kiểm tra trong cơ sở dữ liệu
                    if (empty($error_email)) {
                        $checkemail = check_email($email);
            
                        if (is_array($checkemail)) {
                            $thongbao = "Mật khẩu của bạn là: " . $checkemail['pass'];
                        } else {
                            $thongbao = "Email này không tồn tại";
                        }
                    } else {
                        // Nếu có lỗi về email
                        $thongbao = $error_email;
                    }
                }
            
                // Bao gồm view quên mật khẩu
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
