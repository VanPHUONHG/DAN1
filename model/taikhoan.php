<?php
    function insert_taikhoan($email, $user, $pass) {
        $sql = "INSERT INTO taikhoan(email, user, pass) VALUES('$email', '$user', '$pass')";
        pdo_execute($sql);
    }

    function check_user($user, $password) {
        $sql = "SELECT * FROM taikhoan WHERE user='".$user."' AND pass='".$password."' ";
        $sp = pdo_query_one($sql);
        return $sp;
    }

    function check_email($email) {
        $sql = "SELECT * FROM taikhoan WHERE email='".$email."' ";
        $sp = pdo_query_one($sql);
        return $sp;
    }

    function update_taikhoan($id, $user, $email, $address, $tel) {
        $sql = "UPDATE taikhoan SET user='".$user."', email='".$email."', address='".$address."', tel='".$tel."' WHERE id=".$id;
        pdo_execute($sql);
    }

    function loadAll_taikhoan() {
        $sql = "SELECT * FROM taikhoan ORDER BY id desc";
        $listtaikhoan = pdo_query($sql);
        return $listtaikhoan;
    }

    // hàm ktra để xem phải admin không mới được đăng nhập
    function checkUser($user, $pass) {
        $sql = "SELECT * FROM taikhoan WHERE user = ? AND password = ?";
        $stmt = pdo_query_one($sql, $user, $pass);
        return $stmt; // Trả về thông tin user hoặc `false` nếu không tìm thấy
    }

    function loadOne_taikhoan($id) {
        $sql = "SELECT * FROM taikhoan WHERE id = $id";
        $tk = pdo_query_one($sql);
        return $tk;
    }
    
    function check_account_existence($email, $username) {
        $sql = "SELECT * FROM taikhoan WHERE email = ? OR user = ?";
        return pdo_query_one($sql, $email, $username);
    }

    function delete_taikhoan($id)
    {
    $sql = "DELETE FROM taikhoan where id=" . $id;
    pdo_execute($sql);
    }
?>