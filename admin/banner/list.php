<div class="row formtitle">
        <h1>DANH SÁCH BANNER</h1>
            </div>
            <div class="row formcontent">
                <div class="row mb10 formdsloai1">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>TÊN BANNER</th>
                            <th>HÌNH ẢNH</th>
                            <th>MÔ TẢ</th>
                            <th>HÀNH ĐỘNG</th>
                        </tr>
                        <?php foreach ($listbanner as $banner): ?>
                            <tr>
                                <td><?= $banner['id'] ?></td>
                                <td><?= $banner['ten_banner'] ?></td>
                                <td><img src="<?= $banner['hinh_anh'] ?>" width="100"></td>
                                <td><?= $banner['mo_ta'] ?></td>
                                <td>
                                    <a href="index.php?act=editbanner&id=<?= $banner['id'] ?>">Sửa</a> |
                                    <a href="index.php?act=deletebanner&id=<?= $banner['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                <div class="row mb10">
                    <a href="index.php?act=addbanner"><input type="button" value="Nhập thêm"></a>
                </div>
            </div>