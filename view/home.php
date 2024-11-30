<div class="row mb">
    <div class="boxtrai mr">
        <div class="row">
            <div class="banner-slider">  
            <div class="slides">
                <?php foreach ($banners as $banner): ?>
                    <div class="slide">
                        <img src="<?php echo $img_path . $banner['hinh_anh']; ?>" alt="Banner">
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
            <button class="next" onclick="changeSlide(1)">&#10095;</button>
        </div>        
    </div>

    <div class="row">
    <?php
        $i = 0;
        foreach ($spnew as $sp) {
            extract($sp);
            $linksp = "index.php?act=sanphamct&idsp=" . $id;
            $hinh = $img_path . $img;
            $mr = (($i == 2) || ($i == 5) || ($i == 8)) ? "mr" : "";
            echo '<div class="boxsp ' . $mr . '">
                <div class="row img">
                    <a href="' . $linksp . '"><img src="' . $hinh . '" alt=""></a>
                </div>
                <p>$' . $price . '</p>
                <a href="' . $linksp . '">' . $name . '</a>
                <form action="index.php?act=addtocart" method="post">
                    <input type="hidden" name="id" value="'.$id.'">
                    <input type="hidden" name="name" value="'.$name.'">
                    <input type="hidden" name="img" value="'.$img.'">
                    <input type="hidden" name="price" value="'.$price.'">
                    <input type="submit" value="Thêm giỏ hàng" name="addtocart" class="btn-add-cart">
                </form>
            </div>';
            $i++;
        }
    ?>
    </div>
    </div>

    <div class="boxphai">
        <?php include "view/boxright.php"; ?>
    </div>
</div>
