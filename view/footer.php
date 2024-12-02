<div class="row mb">
  <footer>
    <div class="footer-middle">
      <div class="footer-column">
        <h4>Thông tin liên lạc</h4>
        <ul>
          <li><a href="#">Email: phuongcoca74@gmail.com</a></li>
          <li><a href="#">Địa chỉ: 70 - 200 - Trung Hòa - Cầu Giấy</a></li>
          <li><a href="#">Lh: 0354549423</a></li>
          <li><a href="#">Thời gian mở cửa: 8:00-21:00</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h4>Shop</h4>
        <ul>
          <li><a href="#">Men's Shoes</a></li>
          <li><a href="#">Women's Shoes</a></li>
          <li><a href="#">Kids' Shoes</a></li>
          <li><a href="#">SA'Shoes</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h4>Thương Hiệu Hợp Tác</h4>
        <div class="social-icons">
          <ul>
            <li><a href="index.php?act=sanpham&iddm=33">Jodan</a></li>
            <li><a href="index.php?act=sanpham&iddm=32">Nike</a></li>
            <li><a href="index.php?act=sanpham&iddm=31">Balenciaga</a></li>
            <li><a href="index.php?act=sanpham&iddm=30">Adidas</a></li>
            <li><a href="index.php?act=sanpham&iddm=29">Puma</a></li>
            <li><a href="index.php?act=sanpham&iddm=28">Converse</a></li>
            <li><a href="index.php?act=sanpham&iddm=27">Vans</a></li>
            <li><a href="index.php?act=sanpham&iddm=26">Gucci</a></li>
            <li><a href="index.php?act=sanpham&iddm=25">New balance</a></li>
          </ul>
        </div>
      </div>

      <div class="footer-column">
        <h4>Trợ Giúp</h4>
        <div class="social-icons1">
        <ul>
            <li><a href="#">Trung tâm trợ giúp</a></li>
            <li><a href="#">Hình thức thanh toán</a></li>
            <li><a href="#">Hướng dẫn đăng nhập</a></li>
            <li><a href="#">Điều khoản & Điều kiện sử dụng</a></li>
            <li><a href="#">Liên hệ</a></li>
          </ul>
        </div>
      </div>

    </div>

    <div class="footer-bottom">
      <p>&copy; Nguyễn Văn Phương - Nguyễn Hồng Quân - Hoàng Thế Anh &copy;</p>
    </div>
  </footer>
</div>
</div>
<!-- JS CHO Slideshow -->
<script>
    let currentIndex = 0;

function changeSlide(direction) {
    const slides = document.querySelector('.slides');
    const totalSlides = slides.children.length;

    currentIndex += direction;
    if (currentIndex < 0) {
        currentIndex = totalSlides - 1;
    } else if (currentIndex >= totalSlides) {
        currentIndex = 0;
    }

    slides.style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Auto-slide
setInterval(() => {
    changeSlide(1);
}, 3500);

</script>
</body>

</html>