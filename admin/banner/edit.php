<div class="row formtitle">
    <h1>Cập nhật Banner</h1>
</div>

<div class="row formcontent">
    <form action="index.php?act=updatebanner" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $banner['id'] ?>">

        <label for="ten_banner">Tên Banner:</label>
        <input type="text" id="ten_banner" name="ten_banner" value="<?= $banner['ten_banner'] ?>" required>

        <label for="hinh_anh">Hình Ảnh:</label>
        <input type="file" id="hinh_anh" name="hinh_anh">
        <img src="../uploads/<?= $banner['hinh_anh'] ?>" width="100" alt="Banner Image">
        <input type="hidden" name="hinh_anh_old" value="<?= $banner['hinh_anh'] ?>"> 
        <br>
        <label for="mo_ta">Mô Tả:</label>
        <textarea id="mo_ta" name="mo_ta"><?= $banner['mo_ta'] ?></textarea>

        <input type="submit" name="capnhat" value="Cập Nhật">
    </form>
</div>
