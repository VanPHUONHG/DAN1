<?php
session_start();
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "view/header.php";
include "global.php";


if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];

$spnew = loadAll_sanpham_home();
$dsdm = loadAll_danhmuc();
$dstop10 = loadAll_sanpham_top10();
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
            include "view/sanpham.php";
            break;
            
            // Sản phẩm chi tiết
        case 'sanphamct':
            if (isset($_GET['idsp']) && $_GET['idsp']>0) {
                $id= $_GET['idsp'];
                $onesp= loadOne_sanpham($id);
                extract($onesp);
                $spcl= load_sanpham_cungloai($id,$iddm);
                include "view/sanphamct.php";
            } else {
                include "view/home.php";
            }
            break;

            // Đăng ký
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email= $_POST['email'];
                $user= $_POST['user'];
                $pass= $_POST['pass'];
                insert_taikhoan($email, $user, $pass);
                $thongbao= "ĐÃ ĐĂNG KÝ THÀNH CÔNG. VUI LÒNG ĐĂNG NHẬP ĐỂ THỰC HIỆN CHỨC NĂNG";
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


        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
?>
