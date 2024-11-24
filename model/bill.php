<?php
function bill_chi_tiet($listbill) {
    global $img_path;
    $tong = 0;
    $i = 0;           
        echo '<tr>
                <th>HÌNH</th>
                <th>SẢN PHẨM</th>
                <th>ĐƠN GIÁ</th>
                <th>SỐ LƯỢNG</th>
                <th>THÀNH TIỀN</th>
             </tr>';

        foreach ($listbill as $cart) {
            $hinh = $img_path . $cart['img'];
            $tong += $cart['thanhtien'];               
            echo '
                <tr>
                <td><img src="' . $hinh . '" alt="" height="80px"></td>
                <td>' . $cart['name'] . '</td>
                <td>' . $cart['price'] . '</td>
                <td>' . $cart['soluong'] . '</td>
                <td>' . $cart['thanhtien'] . '</td>
                </tr>';
                $i += 1;
                }
            echo '<tr>
                    <td colspan="4">Tổng đơn hàng</td>
                    <td>' . $tong . '$</td>
                </tr>';
}

function insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang, $status = 0) {
    $sql = "INSERT INTO bill(iduser, bill_name, bill_email, bill_address, bill_tel, bill_pttt, ngaydathang, total, bill_status)  VALUES('$iduser', '$name', '$email', '$address', '$tel', '$pttt', '$ngaydathang', '$tongdonhang', '$status')";
    return pdo_execute_return_lastInsertId($sql);
}

function update_bill_status($bill_id, $new_status) {
    $sql = "UPDATE bill SET bill_status = '$new_status' WHERE id = '$bill_id'";
    pdo_execute($sql);
}

function loadone_bill($id) {
    $sql = "SELECT * FROM bill WHERE id=".$id;
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadall_bill($kyw="" ,$iduser=0) {
    $sql ="SELECT * FROM bill WHERE 1";
    if ($iduser>0) $sql.=" AND iduser=".$iduser;
    if ($kyw!="") $sql.=" AND id like '%".$kyw."%' ";
    $sql.=" ORDER BY id DESC";
    $listbill = pdo_query($sql);
    return $listbill;
}

function get_ttdh($n) {
    switch ($n) {
        case '0':
            return "Đang xử lý";  
        case '1':
            return "Chờ xác nhận";
        case '2':
            return "Đang giao";
        case '3':
            return "Đã giao";
        default:
            return "Trạng thái không xác định";
    }
}

function get_payment_method($payment_code) {
    switch ($payment_code) {
        case 0:
            return "Thanh toán trực tiếp";
        case 1:
            return "Chuyển khoản";
        case 2:
            return "Thanh toán online";
        case 3:
            return "Ví điện tử";
        default:
            return "Chưa xác định"; 
    }
}

?>