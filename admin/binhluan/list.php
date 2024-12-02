<div class="row formtitle">
                <h1>Danh Sách Bình Luận</h1>
            </div>
            <div class="row formcontent">
                <div class="row mb10 formdsloai">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>NỘI DUNG BÌNH LUẬN</th>
                            <th>IDUSER</th>
                            <th>IDPRO</th>
                            <th>NGÀY BÌNH LUẬN</th>
                            <th>THAO TÁC</th>
                        </tr>
                        <?php 
                        foreach ($listbinhluan as $bl) {
                            extract($bl);

                            $suabl = "index.php?act=suabl&id=".$id;
                            $xoabl = "index.php?act=xoabl&id=".$id;

                            echo '<tr>
                                    <td>'.$id.'</td>
                                    <td>'.$noidung.'</td>
                                    <td>'.$iduser.'</td>
                                    <td>'.$idpro.'</td>
                                    <td>'.$ngaybinhluan.'</td>
                                    <td>
                                        <a href="'.$xoabl.'"><input type="button" value="Xóa"></a>
                                    </td>
                                  </tr>';
                        }
                        ?>
                    </table>
                </div>
            </div>