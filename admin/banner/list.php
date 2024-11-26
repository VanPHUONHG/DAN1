<div class="row formtitle">
        <h1>Danh sách Banner</h1>
            </div>
            <div class="row formcontent">
                <div class="row mb10 formdsloai1">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Tên Banner</th>
                            <th>Hình ảnh</th>
                            <th>Mô tả</th>
                            <th>Hành động</th>
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