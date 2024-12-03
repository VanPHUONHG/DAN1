<div class="row formtitle">
    <h1>DANH SÁCH TÀI KHOẢN</h1>
</div>
<div class="row formcontent">
    <div class="row mb10 formdsloai">
        <table>
            <tr>
                <th>MÃ TÀI KHOẢN</th>
                <th>TÊN TÀI KHOẢN</th>
                <th>EMAIL</th>
                <th>ĐỊA CHỈ</th>
                <th>SỐ ĐIỆN THOẠI</th>
                <th>VAI TRÒ</th>
                <th>THAO TÁC</th>
            </tr>
            
            <?php 
            foreach ($listtaikhoan as $tk) {
                extract($tk);
                $suatk = "index.php?act=suatk&id=".$id;
                $xoatk = "index.php?act=xoatk&id=".$id;

                echo '<tr>
                        <td>'.$id.'</td>
                        <td>'.$user.'</td>
                        <td>'.$email.'</td>
                        <td>'.$address.'</td>
                        <td>'.$tel.'</td>
                        <td>'.$role.'</td>
                        <td>
                            <a href="'.$suatk.'"><input type="button" value="Sửa"></a>
                            <a href="'.$xoatk.'" onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\');"><input type="button" value="Xóa"></a>
                        </td>
                    </tr>';
            }
            ?>
        </table>
    </div>
</div>
