<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "header.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            // Danh mục
        case 'adddm':
            // Kiểm tra user có click vào nút thêm mới hay không
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenLoai = $_POST['tenloai'];
                insert_danhmuc($tenLoai); 
                $thongBao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;
            // Danh sách danh mục
        case 'listdm':
            $listdm = loadAll_danhmuc();
            include "danhmuc/list.php";
            break;
            // Xóa danh mục
        case 'xoaDanhMuc':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                delete_danhmuc($id);
            }
            $listdm = loadAll_danhmuc();
            include "danhmuc/list.php";
            break;
            // Sửa danh mục
        case 'suaDanhMuc':
            if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadOne_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;
            // Cập nhật danh mục
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenLoai= $_POST['tenloai'];
                $id= $_POST['id'];
                update_danhmuc($id, $tenLoai);
                $thongBao = "Cập nhật thành công";
            }
            $listdm = loadAll_danhmuc();
            include "danhmuc/list.php";
            break;
            // SẢN PHẨM
        case 'addsp':
            // kiểm tra xem người dùng có clich vào nút add ko
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                $thongbao = "THÊM THÀNH CÔNG";
                // header('Location: index.php?act=listdm');
            }
            $listdanhmuc = loadall_danhmuc();
            // var_dump($listdanhmuc);die();
            include 'sanpham/add.php';
            break;
            // Danh sách sản phẩm
        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);
            include 'sanpham/list.php';
            break;
            // Xóa sản phẩm
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham();
            include 'sanpham/list.php';
            break;
            // Sửa sản phẩm
        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include 'sanpham/update.php';
            break;
            
            // Cập nhật sản phẩm
        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
                $thongbao = "cap nhat thanh cong";
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham();
            include 'sanpham/list.php';
            break;
                        
        default:
            include "home.php";
            break;   
    }
} else {
    include "home.php";
}
include "footer.php";
?>