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
?>