<div class="row">
    <div class="row formtitle">
        <h1>THÊM MỚI SẢN PHẨM</h1>
    </div>

    <div class="row formcontent">
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
            <div class="row mb10">
                Danh mục <br>
                <select name="iddm" id="">
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        echo '<option value='.$id.'>'.$name.'</option>';
                    }
                    ?>
                </select>
                <?php if (isset($errors['iddm'])) { echo "<span style='color: red;'>".$errors['iddm']."</span>"; } ?>
            </div>

            <div class="row mb10">
                Tên sản phẩm: <br>
                <input type="text" name="tensp" value="<?= isset($tensp) ? $tensp : '' ?>">
                <?php if (isset($errors['tensp'])) { echo "<span style='color: red;'>".$errors['tensp']."</span>"; } ?>
            </div>

            <div class="row mb10">
                Giá: <br>
                <input type="text" name="giasp" value="<?= isset($giasp) ? $giasp : '' ?>">
                <?php if (isset($errors['giasp'])) { echo "<span style='color: red;'>".$errors['giasp']."</span>"; } ?>
            </div>

            <div class="row mb10">
                Hình ảnh: <br>
                <input type="file" name="hinh">
                <?php if (isset($errors['hinh'])) { echo "<span style='color: red;'>".$errors['hinh']."</span>"; } ?>
            </div>

            <div class="row mb10">
                Mô tả: <br>
                <textarea name="mota" cols="101" rows="8"><?= isset($mota) ? $mota : '' ?></textarea>
                <br>
                <?php if (isset($errors['mota'])) { echo "<span style='color: red;'>".$errors['mota']."</span>"; } ?>
            </div>

            <div class="row mb10">
                <input name="themmoi" type="submit" value="Thêm mới">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listsp"><input type="button" value="Danh sách sản phẩm"></a>
            </div>

            <?php
                if (isset($thongbao) && ($thongbao != "")) {
                    echo "<p style='color: red;'>".$thongbao."</p>";
                }
            ?>
        </form>
    </div>
</div>
