<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">Đăng nhập</div>
            <div class="row boxcontent formtk">
                <form action="index.php?act=dangnhap" method="post">
                    <div class="row mb10">
                        <label for="user">Tên đăng nhập</label>
                        <input type="text" name="user" value="<?php echo isset($user) ? $user : ''; ?>" required>
                    </div>

                    <div class="row mb10">
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" required>
                    </div>

                    <div class="row mb10">
                        <input type="checkbox" name="remember"> Ghi nhớ tài khoản?
                    </div>

                    <div class="row mb">
                        <input type="submit" value="Đăng nhập" name="dangnhap">
                    </div>
                </form>
                <ul>
                    <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                    <li><a href="index.php?act=dangky">Đăng ký</a></li>
                </ul>

                <!-- Hiển thị thông báo dưới nút đăng nhập -->
                <h2 class="thongbao">
                    <?php
                        if (isset($thongbao) && ($thongbao != "")) {
                            echo $thongbao;
                        }
                    ?>
                </h2>
            </div>
        </div>
    </div>

    <div class="boxphai">
        <?php include "view/boxright1.php"; ?>
    </div>
</div>
