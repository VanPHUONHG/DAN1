<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">ĐĂNG KÝ</div>
            <div class="row boxcontent formtk">
                <form action="index.php?act=dangky" method="post">
                    <div class="row mb10">
                        <label for="">Email</label>
                        <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>"> 
                    </div> 
                  
                    <div class="row mb10">
                        <label for="">Tên đăng nhập</label>
                        <input type="text" name="user" value="<?php echo isset($user) ? $user : ''; ?>">
                    </div>

                    <div class="row mb10">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="pass" value="<?php echo isset($pass) ? $pass : ''; ?>">
                    </div>

                    <div class="row mb10">
                        <input type="submit" name="dangky" value="Đăng ký">
                        <input type="reset" value="Nhập lại">
                    </div>
                </form>
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
        <?php
            if (isset($_SESSION['user'])) {
                // Nếu người dùng đã đăng nhập, hiển thị boxright.php
                include "view/boxright.php";
            } else {
                // Nếu người dùng chưa đăng nhập, hiển thị boxright1.php
                include "view/boxright1.php";
            }
        ?>
    </div>
</div>
