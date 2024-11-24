<div class="row formtitle">
                <h1>DANH SÁCH KHÁCH HÀNG</h1>
            </div>
            <div class="row formcontent">
                <div class="row mb10 formdsloai">
                    <table>
                        <tr>
                            <th>Mã tài khoản</th>
                            <th>Tên tài khoản</th>
                            <th>Mật khẩu</th>
                            <th>Email</th>
                            <th>Đia chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Vai trò</th>
                            <th>Thao tác</th>
                        </tr>
                        
                        <?php 
                        foreach ($listtaikhoan as $tk) {
                            extract($tk);
                            $suatk = "index.php?act=suatk&id=".$id;
                            $xoatk = "index.php?act=xoatk&id=".$id;

                            echo '<tr>
                                    <td>'.$id.'</td>
                                    <td>'.$user.'</td>
                                    <td>'.$pass.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$address.'</td>
                                    <td>'.$tel.'</td>
                                    <td>'.$role.'</td>
                                    <td>
                                        <a href="'.$suatk.'"><input type="button" value="Sửa"></a>
                                        <a href="'.$xoatk.'"><input type="button" value="Xóa"></a>
                                    </td>
                                  </tr>';
                        }
                        ?>
                    </table>
                </div>
            </div>