<?php
function checkAdmin() {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
        header("Location: ../index.php");
        exit();
    }
}

if (isset($_POST['dangnhap'])) {
    $user = $_POST['user'];
    $password = $_POST['pass'];

    // Kiểm tra tài khoản trong database
    $result = checkUser($user, $pass); // Hàm kiểm tra thông tin user
    if (is_array($result)) {
        $_SESSION['user'] = $result; // Lưu toàn bộ thông tin user vào session
        header("Location: index.php");
    } else {
        $thongbao = "Tài khoản hoặc mật khẩu không đúng!";
    }
}
?>