<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">ĐƠN HÀNG CỦA BẠN</div>
            <div class="row boxcontent cart">
                <table>
                    <tr>
                        <th>MÃ ĐƠN HÀNG</th>
                        <th>NGÀY ĐẶT</th>
                        <th>SỐ LƯỢNG ĐẶT HÀNG</th>
                        <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                        <th>PHƯƠNG THỨC THANH TOÁN</th>
                        <th>TRẠNG THÁI ĐƠN HÀNG</th>
                    </tr>
                    
                    <?php if (!empty($listbill)) { ?>
            <?php foreach ($listbill as $bill) { ?>
                <tr>
                    <td>DAM-<?php echo htmlspecialchars($bill['id']); ?></td>
                    <td><?php echo htmlspecialchars($bill['ngaydathang']); ?></td>
                    <td><?php echo loadall_cart_count($bill['id']); ?></td>
                    <td><?php echo htmlspecialchars($bill['total']); ?></td>
                    <td>
                        <?php 
                            // Gọi hàm get_payment_method để lấy phương thức thanh toán
                            echo htmlspecialchars(get_payment_method($bill['bill_pttt'])); 
                        ?>
                    </td>  
                    <td>
                        <?php 
                            // Hiển thị trạng thái đơn hàng theo phương thức thanh toán và trạng thái đơn hàng
                            echo htmlspecialchars(get_ttdh($bill['bill_status'])); 
                        ?>
                    </td>
  
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="7">No orders found.</td>
            </tr>
        <?php } ?>
    
                </table>
            </div>
        </div>
    </div>

    <div class="boxphai">
        <?php include "view/boxright.php"; ?>
    </div>
</div>
