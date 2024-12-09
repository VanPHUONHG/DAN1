<div class="row formtitle">
    <h1>Cập nhật tài khoản</h1>
</div>
<div class="row formcontent">
    <form action="index.php?act=updatekh" method="post">
        <div class="row mb10">
            <label for="user">Tên tài khoản</label>
            <input type="text" name="user" value="<?= $tk['user'] ?>">
        </div>
        <div class="row mb10">
            <label for="email">Email</label>
            <input type="text" name="email" value="<?= $tk['email'] ?>">
        </div>
        <div class="row mb10">
            <label for="address">Địa chỉ</label>
            <input type="text" name="address" value="<?= $tk['address'] ?>">
        </div>
        <div class="row mb10">
            <label for="tel">Số điện thoại</label>
            <input type="text" name="tel" value="<?= $tk['tel'] ?>">
        </div>
        <div class="row mb10">
            <input type="hidden" name="id" value="<?= $tk['id'] ?>">
            <input type="submit" name="capnhat" value="Cập nhật">
        </div>
    </form>
</div>
