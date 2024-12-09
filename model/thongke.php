<?php
function loadall_thongke() {
    $sql = "SELECT 
    danhmuc.id AS madm, 
    danhmuc.name AS tendm, 
    COUNT(sanpham.id) AS countsp, 
    COALESCE(MIN(sanpham.price), 0) AS minprice, 
    COALESCE(MAX(sanpham.price), 0) AS maxprice, 
    COALESCE(AVG(sanpham.price), 0) AS avgprice
FROM 
    danhmuc
LEFT JOIN 
    sanpham 
ON 
    danhmuc.id = sanpham.iddm
GROUP BY 
    danhmuc.id, danhmuc.name
ORDER BY 
    danhmuc.id DESC
";
    return pdo_query($sql);
}

function loadall_sanpham_hot() {
    try {
        $sql = "SELECT 
                    sp.id AS masp, 
                    sp.name AS tensp, 
                    sp.price AS price,
                    SUM(c.soluong) AS total_sold, 
                    SUM(c.thanhtien) AS total_revenue
                FROM 
                    bill b
                JOIN 
                    cart c ON b.id = c.ibbill
                JOIN 
                    sanpham sp ON c.idpro = sp.id
                GROUP BY 
                    sp.id, sp.name, sp.price
                ORDER BY 
                    total_sold DESC
                LIMIT 10";  // Lấy 10 sản phẩm bán chạy nhất
                
        // Giả sử pdo_query trả về dữ liệu
        $result = pdo_query($sql);
        
        if (!$result) {
            throw new Exception("Lỗi khi truy vấn cơ sở dữ liệu!");
        }
        return $result;
    } catch (Exception $e) {
        echo "Có lỗi xảy ra: " . $e->getMessage();
        return null;
    }
}

function loadall_khachhang() {
    try {
        // Truy vấn SQL tính toán thông tin khách hàng chỉ với đơn hàng thành công
        $sql = "SELECT 
                    b.bill_name, 
                    b.bill_tel, 
                    b.bill_email, 
                    COUNT(b.id) AS total_orders,  -- Số lượng đơn hàng thành công
                    SUM(b.total) AS total_spent  -- Tổng chi tiêu của khách hàng (chỉ tính đơn hàng đã giao)
                FROM 
                    bill b
                WHERE 
                    b.bill_status = 4  -- Lọc chỉ những đơn hàng đã giao (thành công)
                GROUP BY 
                    b.bill_name, b.bill_tel, b.bill_email
                ORDER BY 
                    total_spent DESC";  // Sắp xếp theo tổng chi tiêu

        // Giả sử pdo_query trả về dữ liệu
        $result = pdo_query($sql);
        
        if (!$result) {
            throw new Exception("Lỗi khi truy vấn cơ sở dữ liệu!");
        }

        return $result;  // Trả về danh sách khách hàng đã có đơn hàng thành công
    } catch (Exception $e) {
        echo "Có lỗi xảy ra: " . $e->getMessage();
        return [];
    }
}


function loadall_doanhthu() {
    try {
        $sql = "SELECT 
                    SUM(b.total) AS total_revenue
                FROM 
                    bill b
                WHERE 
                    b.bill_status = 4";  // Lọc theo trạng thái Đã giao hàng
        
        // Giả sử pdo_query trả về dữ liệu
        $result = pdo_query($sql);
        
        if (!$result) {
            throw new Exception("Lỗi khi truy vấn cơ sở dữ liệu!");
        }
        
        return isset($result[0]['total_revenue']) ? $result[0]['total_revenue'] : 0;  // Trả về tổng doanh thu
    } catch (Exception $e) {
        echo "Có lỗi xảy ra: " . $e->getMessage();
        return 0;
    }
}

?>