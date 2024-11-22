<?php
/**
 * Kết nối đến cơ sở dữ liệu sử dụng PDO
 */
function pdo_get_connection() {
    $dburl = "mysql:host=localhost;dbname=duan1;charset=utf8";
    $username = 'root';
    $password = '';
    try {
        // Tạo kết nối PDO
        $conn = new PDO($dburl, $username, $password);
        // Thiết lập chế độ lỗi cho PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        // Ghi log lỗi và thông báo người dùng
        error_log("Database connection error: " . $e->getMessage());
        die("Không thể kết nối đến cơ sở dữ liệu. Vui lòng thử lại sau!");
    }
}

/**
 * Thực thi câu lệnh SQL (INSERT, UPDATE, DELETE)
 * @param string $sql câu lệnh SQL
 * @param mixed ...$args danh sách tham số truyền vào câu lệnh
 */
function pdo_execute($sql, ...$args) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
    } catch (PDOException $e) {
        // Ghi log lỗi và thông báo
        error_log("SQL execution error: " . $e->getMessage());
        die("Có lỗi xảy ra trong quá trình thực thi. Vui lòng thử lại!");
    } finally {
        unset($conn); // Đóng kết nối
    }
}

/**
 * Thực thi câu lệnh SQL và trả về ID bản ghi vừa thêm
 * @param string $sql câu lệnh SQL
 * @param mixed ...$args danh sách tham số truyền vào câu lệnh
 * @return int ID của bản ghi vừa thêm
 */
function pdo_execute_return_lastInsertId($sql, ...$args) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        error_log("SQL insert error: " . $e->getMessage());
        die("Có lỗi xảy ra trong quá trình thêm dữ liệu!");
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh SELECT và trả về tất cả bản ghi
 * @param string $sql câu lệnh SQL
 * @param mixed ...$args danh sách tham số truyền vào câu lệnh
 * @return array danh sách bản ghi
 */
function pdo_query($sql, ...$args) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về dạng mảng liên kết
    } catch (PDOException $e) {
        error_log("SQL query error: " . $e->getMessage());
        die("Có lỗi xảy ra khi truy vấn dữ liệu!");
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh SELECT và trả về một bản ghi
 * @param string $sql câu lệnh SQL
 * @param mixed ...$args danh sách tham số truyền vào câu lệnh
 * @return array|null bản ghi hoặc null nếu không tìm thấy
 */
function pdo_query_one($sql, ...$args) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về bản ghi đầu tiên
    } catch (PDOException $e) {
        error_log("SQL single query error: " . $e->getMessage());
        die("Có lỗi xảy ra khi lấy dữ liệu!");
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh SELECT và trả về giá trị đầu tiên
 * @param string $sql câu lệnh SQL
 * @param mixed ...$args danh sách tham số truyền vào câu lệnh
 * @return mixed giá trị đầu tiên của bản ghi
 */
function pdo_query_value($sql, ...$args) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? array_values($row)[0] : null;
    } catch (PDOException $e) {
        error_log("SQL value query error: " . $e->getMessage());
        die("Có lỗi xảy ra khi lấy giá trị!");
    } finally {
        unset($conn);
    }
}
