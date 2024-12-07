<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <?php
                extract($onesp);
            ?>
            <div class="boxtitle"><?= htmlspecialchars($name) ?></div>
            <div class="row boxcontent">
                <?php
                    $imgSrc = htmlspecialchars($img_path . $img);
                    echo "<div class='row mb spct'><img src='$imgSrc' alt='" . htmlspecialchars($name) . "' style=\"width: 50%;\"><br></div>";
                    echo htmlspecialchars($mota);
                ?>
            </div>
        </div>
        
        <!-- Bình luận -->
        <div class="row mb" id="binhluan">
            <!-- Bình luận sẽ được tải từ file bìnhluanform.php -->
        </div>

        <!-- Các sản phẩm cùng loại -->
        <div class="row mb">
            <div class="boxtitle">SẢN PHẨM CÙNG LOẠI</div>
            <div class="row boxcontent">
                <ul>
                    <?php
                        foreach ($spcl as $sp_cung_loai) {
                            extract($sp_cung_loai);
                            $linksp = "index.php?act=sanphamct&idsp=" . htmlspecialchars($id);
                            echo '<li><a href="' . $linksp . '">' . htmlspecialchars($name) . '</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="boxphai">
        <?php include "view/boxright.php"; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function(){
        // Lấy id sản phẩm từ PHP và truyền qua AJAX
        var idpro = <?= $id ?>; // Lấy ID sản phẩm
        $("#binhluan").load("view/binhluan/binhluanform.php", { idpro: idpro });
    });
</script>