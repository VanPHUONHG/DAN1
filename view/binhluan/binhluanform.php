<?php
session_start();
include_once "../../model/pdo.php"; // Đảm bảo chỉ bao gồm một lần
include_once "../../model/binhluan.php"; // Đảm bảo chỉ bao gồm một lần


if (isset($_REQUEST['idpro'])) {
    $idpro = $_REQUEST['idpro']; // Lấy ID sản phẩm từ URL hoặc dữ liệu gửi qua
} else {
    // Nếu không có idpro thì chuyển hướng về trang sản phẩm
    header("Location: /da1/DAN1/index.php?act=sanphamct&idsp=1"); // Bạn có thể thay đổi ID mặc định ở đây
    exit();
}

// Lấy tất cả bình luận cho sản phẩm
$dsbl = loadAll_binhluan($idpro);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận</title>
    <link rel="stylesheet" href="view/css/style.css">
    <style>
        .binhluan table {
            width: 80%;
            margin-left: 5%;
        }

        .binhluan table td:nth-child(1) {
            width: 50%;
        }

        .binhluan table td:nth-child(2) {
            width: 20%;
        }

        .binhluan table td:nth-child(3) {
            width: 30%;
        }
    </style>
</head>
<body>
    <div class="row mb">
        <div class="row boxtitle">Bình luận</div>
        <div class="boxcontent binhluan">
            <table>
                <?php
                // Duyệt và hiển thị bình luận
                foreach ($dsbl as $binhluan) {
                    extract($binhluan);
                    echo '<tr><td>' . htmlspecialchars($noidung) . '</td>';
                    echo '<td>' . htmlspecialchars($iduser) . '</td>';
                    echo '<td>' . htmlspecialchars($ngaybinhluan) . '</td></tr>';
                }
                ?>
            </table>
        </div>

        <div class="boxfooter searchBox ">
            <!-- Hiển thị form bình luận -->
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="idpro" value="<?= $idpro ?>"> <!-- Gửi ID sản phẩm -->
                <textarea name="noidung" required></textarea>
                <input type="submit" name="guibinhluan" value="Gửi bình luận">
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['guibinhluan']) && $_POST['guibinhluan']) {
        $noidung = $_POST['noidung'];
        if (empty($noidung)) {
            echo "Vui lòng nhập bình luận!";
        } else {
            // Kiểm tra nếu người dùng chưa đăng nhập
            if (!isset($_SESSION['user'])) {
                // Nếu chưa đăng nhập, lưu lại ID sản phẩm và chuyển hướng đến trang đăng nhập
                $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI']; // Lưu lại URL hiện tại (bao gồm ID sản phẩm)
                header('Location: /da1/DAN1/index.php?act=dangnhap1');  // Sử dụng đường dẫn tuyệt đối để đến trang đăng nhập
                exit();
            } else {
                // Nếu đã đăng nhập, thực hiện gửi bình luận
                $iduser = $_SESSION['user']['id'];
                $ngaybinhluan = date("h:i:sa d/m/Y");

                // Gọi hàm insert bình luận vào cơ sở dữ liệu
                insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);

                // Sau khi bình luận, chuyển hướng lại về trang sản phẩm
                header("Location: " . $_SERVER['HTTP_REFERER']); // Chuyển hướng lại trang hiện tại để hiển thị bình luận
                exit();
            }
        }
    }
    ?>
</body>
</html>
