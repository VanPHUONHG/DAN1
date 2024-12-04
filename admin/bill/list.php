<div class="row formtitle mb10">
    <h1>DANH SÁCH ĐƠN HÀNG</h1>
</div>

<form action="index.php?act=listbill" method="post">
    <input type="text" name="kyw" placeholder="Tìm kiếm...">
    <input type="submit" name="" value="Tìm kiếm">
</form>

<div class="row formcontent">   
<div class="row mb10 formdsloai">
    <table>
        <tr>
            <th>MÃ ĐƠN HÀNG</th>
            <th>KHÁCH HÀNG</th>
            <th>SỐ LƯỢNG HÀNG</th>
            <th>GIÁ TRỊ ĐƠN HÀNG</th>
            <th>TÌNH TRẠNG ĐƠN HÀNG</th>
            <th>NGÀY ĐẶT HÀNG</th>
            <th>CẬP NHẬT TRẠNG THÁI</th>
            <th>HÀNH ĐỘNG</th>
        </tr>

        <?php
        foreach ($listbill as $bill) {
            extract($bill);
            $xoabill = "index.php?act=deleteBill&bill_id=" . $bill['id'];
            $kh = $bill["bill_name"] . '<br>' . $bill["bill_email"] . '<br>' . $bill["bill_address"] . '<br>' . $bill["bill_tel"];
            $ttdh = get_ttdh($bill["bill_status"]);
            $count = loadall_cart_count($bill["id"]);

            echo '<tr>
                    <td>DAM-' . $bill['id'] . '</td>
                    <td>' . $kh . '</td>
                    <td>' . $count . '</td>
                    <td><strong>' . $bill['total'] . '</strong>$</td>
                    <td>' . $ttdh . '</td>
                    <td>' . $bill['ngaydathang'] . '</td>';
            
            // Hiển thị form cập nhật trạng thái
            echo '<td>
                    <form action="index.php?act=updateBillStatus" method="post">
                        <input type="hidden" name="bill_id" value="' . $bill['id'] . '">
                        <select name="new_status">
                            <option value="0"' . ($bill["bill_status"] == 0 ? "selected" : "") . '>Đang xử lý</option>
                            <option value="1"' . ($bill["bill_status"] == 1 ? "selected" : "") . '>Chờ xác nhận</option>
                            <option value="2"' . ($bill["bill_status"] == 2 ? "selected" : "") . '>Đang giao</option>
                            <option value="3"' . ($bill["bill_status"] == 3 ? "selected" : "") . '>Đã giao</option>
                        </select>
                        <input type="submit" value="Cập nhật">
                    </form>
                </td>';

            // Nếu trạng thái đơn hàng là "Đã hủy", hiển thị nút "Xóa đơn hàng"
            if ($bill['bill_status'] == -1) {
                echo '<td>
                        <a href="' . $xoabill . '" 
                        onclick="return confirm(\'Bạn có chắc chắn muốn xóa đơn hàng này?\')">
                            Xóa đơn hàng
                        </a>
                    </td>';
            } else {
                echo '<td></td>'; // Nếu chưa hủy, không hiển thị nút xóa
            }


            echo '</tr>';
        }
        ?>
    </table>
</div>
