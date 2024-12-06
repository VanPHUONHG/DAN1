<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">QUÊN MẬT KHẨU</div>
            <div class="row boxcontent formtk">
                <form action="index.php?act=quenmk" method="post">
                    <div class="row mb10">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required>
                    </div> 

                    <div class="row mb10">
                        <input type="submit" name="gui" value="Gửi">
                        <input type="reset" value="Nhập lại">
                    </div>

                    <?php if (isset($thongbao) && $thongbao != ""): ?>
                        <div class="row mb10">
                            <p class="thongbao"><?php echo $thongbao; ?></p>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <div class="boxphai">
        <?php include "view/boxright1.php"; ?>
    </div>
</div>
