<div class="row">
    <div class="row formtitle">
        <h1>Thêm Banner</h1>
    </div>

    <div class="row formcontent">
    <form action="index.php?act=addbanner" method="post" enctype="multipart/form-data">
    <div class="row mb10">
        <label for="ten_banner">Tên Banner:</label>
        <input type="text" id="ten_banner" name="ten_banner" required>
    </div>

    <div class="row mb10">
        <label for="hinh_anh">Hình Ảnh:</label>
        <input type="file" id="hinh_anh" name="hinh_anh" required>
    </div>

    <div class="row mb10">
        <label for="mo_ta">Mô Tả:</label>
        <textarea id="mo_ta" name="mo_ta"></textarea>
    </div>

    <input type="submit" name="themmoi" value="Thêm Mới">
    </form>

    </div>
    
</div>