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
            </div>

            <div class="row mb10">
                Tên sản phẩm: <br>
                <input type="text" name="tensp">
            </div>

            <div class="row mb10">
                Giá: <br>
                <input type="text" name="giasp">
            </div>

            <div class="row mb10">
                Hình ảnh: <br>
                <input type="file" name="hinh">
            </div>

            <div class="row mb10">
                Mô tả: <br>
                <textarea name="mota" cols="101" rows="8"></textarea>
            </div>

            <div class="row mb10">
                <input name="themmoi" type="submit" value="Thêm mới">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listsp"><input type="button" value="Danh sách sản phẩm"></a>
            </div>

            <?php
                if (isset($thongbao) && ($thongbao!="")) echo $thongbao;
            ?>
        </form>

    </div>
</div>