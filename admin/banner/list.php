<div class="row">
    <div class="row formtitle mb10">
        <h1>DANH SÁCH BANNER</h1>
    </div>
    
    <div class="row formcontent">
        <div class="row mb10 formdsloai">
            <table>
                <tr>
                    <th>Mã Banner</th>
                    <th>Tên Banner</th>
                    <th>Hình Ảnh</th>
                    <th>Mô Tả</th>
                    <th>Thao Tác</th>
                </tr>
                <?php
                foreach ($listbanner as $banner) {
                    extract($banner);
                    $suabanner = "index.php?act=editbanner&id=" . $id;
                    $xoabanner = "index.php?act=deletebanner&id=" . $id;
                    $hinhpath = '../uploads/' . $hinh_anh;
                    if (is_file($hinhpath)) {
                        $hinh = "<img src='" . $hinhpath . "' height='90'>";
                    } else {
                        $hinh = 'no photo';
                    }
                    echo '<tr>
                            <td>' . $id . '</td>
                            <td>' . $ten_banner . '</td>
                            <td>' . $hinh . '</td>
                            <td>' . $mo_ta . '</td>                        
                            <td>
                                <a href="' . $suabanner . '"><input type="button" value="Sửa"></a>
                                <a href="' . $xoabanner . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\');"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>';
                }
                ?>
            </table>
        </div>
        
        <div class="row mb10">
            <a href="index.php?act=addbanner"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>
