<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">    
            <div class="boxtitle">GIỎ HÀNG</div>
        <?php
        if (!isset($_SESSION['user'])) {
            // Nếu người dùng chưa đăng nhập, điều hướng đến trang đăng nhập
            header("Location: index.php?act=dangnhap");
            exit();
        } else {
        ?>
            <div class="row boxcontent cart">
                <table>
                    <?php
                        viewcart(1); // Hiển thị giỏ hàng
                    ?>
                </table>
            </div>
        <?php  
        }
        ?>
        </div>
        
        <div class="row mb bill">
            <!-- Kiểm tra giỏ hàng có sản phẩm không trước khi cho phép tiếp tục -->
            <?php if (isset($_SESSION['mycart']) && count($_SESSION['mycart']) > 0) { ?>
                <a href="index.php?act=bill"><input type="submit" value="TIẾP TỤC ĐẶT HÀNG"></a>
            <?php } else { ?>
                <input type="button" value="VUI LÒNG THÊM SẢN PHẨM" disabled>
            <?php } ?>
            <a href="index.php?act=delcart"><input type="button" value="XÓA GIỎ HÀNG"></a>
            <a href="index.php"><button>QUAY LẠI TRANG CHỦ</button></a>
        </div>
    </div>

    <div class="boxphai">
        <?php include "view/boxright.php"; ?>
    </div>
</div>
