<div class="row mb">
<footer>
    <div class="footer-middle">
      <div class="footer-column">
        <h4>Customer Service</h4>
        <ul>
          <li><a href="#">Help Center</a></li>
          <li><a href="#">Order Tracking</a></li>
          <li><a href="#">Returns & Refunds</a></li>
          <li><a href="#">Shipping Info</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h4>Shop</h4>
        <ul>
          <li><a href="#">Men's Shoes</a></li>
          <li><a href="#">Women's Shoes</a></li>
          <li><a href="#">Kids' Shoes</a></li>
          <li><a href="#">Sale</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h4>Follow Us</h4>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
      </div>

      <div class="footer-column">
        <h4>Follow Us</h4>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
      </div>

    </div>

    <div class="footer-bottom">
      <p>&copy; Dự án 1</p>
    </div>
  </footer>
        </div>
    </div>
<!-- JS CHO Slideshow -->
<script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }

        // Auto change slides every 2 seconds
        setInterval(() => plusSlides(1), 2000);

</script>
</body>
</html>