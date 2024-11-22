<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DỰ ÁN 1</title>
    <link rel="stylesheet" href="view/css/style.css">

    <style>
        .row.mb.header {
            background-color: darkslategrey;
            /* Màu nền của tiêu đề */
            color: white;
            /* Màu chữ */
            text-align: center;
            /* Căn giữa chữ */
            padding: 10px 0;
            /* Khoảng cách trên và dưới */
            font-size: 2rem;
            /* Kích thước chữ */
            font-weight: bold;
            margin: 0;
            /* Loại bỏ khoảng cách bên ngoài */
        }

        /* Khung chạy chữ */
        .marquee {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            box-sizing: border-box;
            border: 5px solid;
            border-image: linear-gradient(90deg, red, orange, yellow, green, blue, indigo, violet) 1;
            animation: border-glow 3s linear infinite;
            /* Hiệu ứng đổi màu border */
            text-align: center;
            /* Căn giữa nội dung */
            font-size: 1.5rem;
            /* Tăng kích thước chữ */
            font-weight: bold;
            /* Làm chữ đậm */
            line-height: 2.5rem;
            /* Khoảng cách giữa các dòng */
            padding: 10px 0;
            /* Thêm khoảng trống trong khung */
        }

        /* Chữ chạy */
        .marquee-text {
            display: inline-block;
            animation: marquee 10s linear infinite;
            color: #333;
            font-size: 1.4vw;
            /* Màu chữ */
        }

        /* Hiệu ứng chạy ngang */
        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-220%);
            }
        }

        /* Hiệu ứng border đổi màu */
        @keyframes border-glow {
            0% {
                border-image-source: linear-gradient(90deg, red, orange, yellow, green, blue, indigo, violet);
            }

            100% {
                border-image-source: linear-gradient(450deg, violet, indigo, blue, green, yellow, orange, red);
            }
        }
    </style>


</head>

<body>
    <div class="boxcenter">
        <div class="row mb header">
            <h1>TrailForge - Giày Đẹp Mỗi Bước Đi</h1>
        </div>
        <div class="marquee">
            <span class="marquee-text">"Giảm ngay 20% cho đơn hàng đầu tiên! Đừng bỏ lỡ cơ hội sở hữu đôi giày chất lượng!"</span>
            <span class="marquee-text">"Mua 2 tặng 1! Lên đồ thật phong cách cùng những đôi giày yêu thích!"</span>
        </div>

        <div class="row mb menu">
            <ul>
                <li><a href="index.php"> Trang Chủ </a></li>
                <li><a href="index.php?act=gioithieu"> Giới Thiệu </a></li>
                <li><a href="index.php?act=lienhe"> Liên Hệ </a></li>
                <li><a href="index.php?act=gopy"> Góp Ý </a></li>
                <li><a href="index.php?act=hoidap"> Hỏi Đáp </a></li>
            </ul>

            <div>
            </div>
        </div>