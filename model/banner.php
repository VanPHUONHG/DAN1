<?php
// Lấy tất cả banner
function loadAll_banner() {
    $sql = "SELECT * FROM banners ORDER BY id DESC";
    return pdo_query($sql);
}

// Thêm mới banner
function insert_banner($ten_banner, $hinh_anh, $mo_ta) {
    try {
        $sql = "INSERT INTO banners (ten_banner, hinh_anh, mo_ta) VALUES ('$ten_banner', '$hinh_anh', '$mo_ta')";
        pdo_execute($sql);
    } catch (PDOException $e) {
        echo "Lỗi SQL: " . $e->getMessage();
    }
}

// Xóa banner
function delete_banner($id) {
    $sql = "DELETE FROM banners WHERE id = ?";
    pdo_execute($sql, $id);
}

// Lấy thông tin banner theo id
function loadOne_banner($id) {
    $sql = "SELECT * FROM banners WHERE id = ?";
    return pdo_query_one($sql, $id);
}

// Cập nhật banner
function update_banner($id, $ten_banner, $hinh_anh, $mo_ta) {
    $sql = "UPDATE banners SET ten_banner = ?, hinh_anh = ?, mo_ta = ? WHERE id = ?";
    pdo_execute($sql, $ten_banner, $hinh_anh, $mo_ta, $id);
}

?>