<div class="row formtitle">
        <h1>DANH SÁCH LOẠI HÀNG</h1>
            </div>
            <div class="row formcontent">
                <div class="row mb10 formdsloai">
                    <table>
                        <tr>
                            <th>MÃ LOẠI</th>
                            <th>TÊN LOẠI</th>
                            <th></th>
                        </tr>
                        
                        <?php 
                        foreach ($listdm as $dm) {
                            extract($dm);
                            $suaDanhMuc = "index.php?act=suaDanhMuc&id=".$id;
                            $xoaDanhMuc = "index.php?act=xoaDanhMuc&id=".$id;
                            echo '<tr>
                                    <td>'.$id.'</td>
                                    <td>'.$name.'</td>
                                    <td>
                                        <a href="'.$suaDanhMuc.'"><input type="button" value="Sửa"></a>
                                        <a href="'.$xoaDanhMuc.'" onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\');"><input type="button" value="Xóa"></a>
                                    </td>
                                  </tr>';
                        }
                        ?>
                    </table>
                </div>

                <div class="row mb10">
                    <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
                </div>
            </div>