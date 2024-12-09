<div class="row">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">CẢM ƠN</div>
            <div class="row boxcontent" style="text-align:center">
                    <h1>Cảm ơn quý khách đã đặt hàng.</h1>
            </div>
        </div>
        <?php 
            if (isset($bill) && (is_array($bill))) {
                extract($bill);
            }
        ?>
        <div class="row mb">
            <div class="boxtitle">THÔNG TIN ĐƠN HÀNG</div>
            <div class="row boxcontent" style="text-align:center">
                    <li>-MÃ ĐƠN HÀNG: DUAN-<?=$bill['id'];?></li>
                    <li>-NGÀY ĐẶT HÀNG: <?=$bill['ngaydathang'];?></li>
                    <li>-TỔNG ĐƠN HÀNG: <?=$bill['total'];?></li>
                    <li>
                        -PHƯƠNG THỨC THANH TOÁN: 
                        <?php
                            switch ($bill['bill_pttt']) {
                                case 0:
                                    echo "Thanh toán trực tiếp";
                                    break;
                                case 1:
                                    echo "Chuyển khoản";
                                    break;
                                
                                case 2:
                                    echo "Thanh toán online";
                                    break;

                                case 3:
                                    echo "Ví điện tử";
                                    break;

                                // Bạn có thể thêm các case khác nếu có thêm phương thức thanh toán
                                default:
                                    echo "Chưa xác định";
                                    break;
                            }
                        ?>
                    </li>

            </div>
        </div>

        <div class="row mb">
            <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
            <div class="row boxcontent billform">
            <table>
                        <tr>
                            <td>NGƯỜI ĐẶT HÀNG</td>
                            <td><?=$bill['bill_name'];?></td>
                        </tr>

                        <tr>
                            <td>ĐỊA CHỈ</td>
                            <td><?=$bill['bill_address'];?></td>
                        </tr>

                        <tr>
                            <td>EMAIL</td>
                            <td><?=$bill['bill_email'];?></td>
                        </tr>

                        <tr>
                            <td>ĐIỆN THOẠI</td>
                            <td><?=$bill['bill_tel'];?></td>
                        </tr>
            </table>
            </div>
        </div>

        <div class="row mb">
            <div class="boxtitle">CHI TIẾT ĐƠN HÀNG</div>
            <div class="row boxcontent cart">
                <table>
                    
                    <?php
                        bill_chi_tiet($billct);
                    ?>
                    
                </table>
            </div>
        </div>

        <div class="row mb">
            <a href="index.php"><button>Quay lại trang chủ</button></a>
        </div>
    </div>

    <div class="boxphai">
        <?php include "view/boxright.php"; ?>
    </div>
</div>
