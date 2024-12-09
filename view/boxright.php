    <div class="row mb10">

        <?php
        if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
            extract($_SESSION['user']);
        ?>
        <div class="boxtitle">Tài Khoản</div>
        <div class="boxcontent formtk">
            <div class="row mb10">
                <label for="user">Xin chào</label>
                <?= htmlspecialchars($user) ?>
            </div>

            <div class="row mb10">
            <ul>
                <li>
                    <a 
                        href="index.php?act=viewcart" 
                        class="<?php echo (isset($_SESSION['mycart']) && count($_SESSION['mycart']) > 0) ? 'active' : ''; ?>">
                        Giỏ hàng của tôi
                    </a>
                </li>
                <li><a href="index.php?act=mybill">Lịch sử mua hàng</a></li>
                <li><a href="index.php?act=edit_taikhoan">Cập nhật thông tin</a></li>
                <?php if ($role == 1) { ?>
                    <li><a href="admin/index.php">Đăng nhập admin</a></li>
                <?php } ?>
                <li><a href="index.php?act=logout">Đăng xuất</a></li>
            </ul>
        </div>

        </div>
        <?php
        }
        ?>
 
    </div>

    <div class="row mb">

        <div class="boxtitle">Danh Mục</div>
        <div class="boxcontent2 menudoc">
            <ul>
                <?php foreach ($dsdm as $dm): ?>
                    <?php
                    $linkdm = "index.php?act=sanpham&iddm=" . $dm['id'];
                    ?>
                    <li><a href="<?= htmlspecialchars($linkdm) ?>"><?= htmlspecialchars($dm['name']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="boxfooter searchBox">
            <form action="index.php?act=sanpham" method="post">
                <input type="text" name="kyw" placeholder="Từ khóa tìm kiếm">
                <input type="submit" name="timkiem" value="Tìm kiếm">
            </form>
        </div>

    </div>

    <div class="row">

        <div class="boxtitle">Top 10 yêu thích</div>
        <div class="row boxcontent">
            <?php
            foreach ($dstop10 as $top10) {
                $linksp = "index.php?act=sanphamct&idsp=" . $top10['id'];
                $imgSrc = htmlspecialchars($img_path . $top10['img']);
            ?>
                <div class="row mb10 top10">
                    <img src="<?= htmlspecialchars($imgSrc) ?>" alt="<?= htmlspecialchars($top10['name']) ?>">
                    <a href="<?= htmlspecialchars($linksp) ?>"><?= htmlspecialchars($top10['name']) ?></a>
                </div>
            <?php
            }
            ?>
        </div>

    </div>
