<div class="row mb">
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
