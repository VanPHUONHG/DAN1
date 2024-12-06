<div class="row formtitle">
    <h1>THỐNG KÊ DANH MỤC</h1>
</div>

<div class="row formcontent"> 

    <!-- Thống kê danh mục -->
    <div class="row mb10 formdsloai">
        <table>
            <tr>
                <th>MÃ DANH MỤC</th>
                <th>TÊN DANH MỤC</th>
                <th>SỐ LƯỢNG</th>
                <th>GIÁ CAO NHẤT</th>
                <th>GIÁ THẤP NHẤT</th>
                <th>GIÁ TRUNG BÌNH</th>
            </tr>   
            
            <?php
                foreach ($listthongke as $tk) {
                    extract($tk);
                    echo '<tr>
                            <td>'.$madm.'</td>
                            <td>'.$tendm.'</td>
                            <td>'.$countsp.'</td>
                            <td>'.$maxprice.'</td>
                            <td>'.$minprice.'</td>
                            <td>'.$avgprice.'</td>
                        </tr>';
                }
            ?>
        </table>
    
    
</div>

<div class="row formtitle">
    <h1>THỐNG KÊ SẢN PHẨM HOT</h1>
</div>

<div class="row formcontent"> 
    <!-- Thống kê sản phẩm hot -->
    <div class="row mb10 formdsloai">
        <table>
            <thead>
                <tr>
                    <th style="text-align: center;">MÃ SẢN PHẨM</th>
                    <th style="text-align: center;">TÊN SẢN PHẨM</th>
                    <th style="text-align: center;">SỐ LƯỢNG BÁN</th>
                    <th style="text-align: center;">TỔNG DOANH THU</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($listsp_hot as $sp) {
                        extract($sp);
                        echo '<tr>
                                <td style="text-align: center;">'.$masp.'</td>
                                <td>'.$tensp.'</td>
                                <td style="text-align: center;">'.$total_sold.'</td>
                                <td style="text-align: right;">'.number_format($total_revenue, 0, ',', '.').' $</td>
                            </tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row formtitle">
    <h1>THỐNG KÊ KHÁCH HÀNG CHI TIÊU NHIỀU NHẤT</h1>
</div>

<div class="row formcontent">
    <!-- Thống kê khách hàng -->
    <div class="row mb10 formdsloai">
        <table>
            <thead>
                <tr>
                    <th style="text-align: center;">TÊN KHÁCH HÀNG</th>
                    <th style="text-align: center;">SỐ ĐIỆN THOẠI</th>
                    <th style="text-align: center;">EMAIL</th>
                    <th style="text-align: center;">SỐ LƯỢNG ĐƠN HÀNG</th>
                    <th style="text-align: center;">TỔNG CHI TIÊU</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (empty($list_khachhang)) {
                        echo '<tr><td colspan="5" style="text-align: center;">Không có dữ liệu khách hàng!</td></tr>';
                    } else {
                        foreach ($list_khachhang as $khachhang) {
                            echo '<tr>
                                    <td>'.$khachhang['bill_name'].'</td>
                                    <td>'.$khachhang['bill_tel'].'</td>
                                    <td>'.$khachhang['bill_email'].'</td>
                                    <td>'.$khachhang['total_orders'].'</td>
                                    <td>'.number_format($khachhang['total_spent'], 0, ',', '.').' $</td>
                                  </tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
// Lấy tổng doanh thu
$total_revenue = loadall_doanhthu();
?>

<div class="row formcontent">
    <!-- Thống kê tổng doanh thu -->
    <div class="row mb10 formdsloai">
        <table>
            <thead>
                <tr>
                    <th style="text-align: center;">TỔNG DOANH THU</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;">
                        <?php 
                        if($total_revenue) {
                            echo number_format($total_revenue, 0, ',', '.') . ' VND'; 
                        } else {
                            echo "Chưa có doanh thu"; // Trường hợp không có doanh thu
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Nút xem biểu đồ -->
<div class="row mb10">
        <a href="index.php?act=bieudo"><input type="button" value="XEM BIỂU ĐỒ"></a>
</div>
