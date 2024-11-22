<div class="row mb">
            <div class="boxtrai mr">
                <div class="row">
                    <div class="banner">
                        <!-- Slideshow container -->
                        <div class="slideshow-container">
                            <!-- Full-width images with number and caption text -->
                            <div class="mySlides fade">
                                <div class="numbertext">1 / 6</div>
                                <img src="view/img/banner3.jpg" style="width:100%">
                                <div class="text"></div>
                            </div>
                            <div class="mySlides fade">
                                <div class="numbertext">2 / 6</div>
                                <img src="view/img/banner6.jpg" style="width:100%">
                                <div class="text"></div>
                            </div>
                            <div class="mySlides fade">
                                <div class="numbertext">3 / 6</div>
                                <img src="./view/img/banner2.jpg" style="width:100%">
                                <div class="text"></div>
                            </div>
                            <div class="mySlides fade">
                                <div class="numbertext">4 / 6</div>
                                <img src="view/img/banner4.jpg" style="width:100%">
                                <div class="text"></div>
                            </div>
                            <div class="mySlides fade">
                                <div class="numbertext">5 / 6</div>
                                <img src="view/img/baner5.jpg" style="width:100%">
                                <div class="text"></div>
                            </div>
                            <div class="mySlides fade">
                                <div class="numbertext">6 / 6</div>
                                <img src="view/img/banner7.webp" style="width:100%">
                                <div class="text"></div>
                            </div>
                            <!-- Next and previous buttons -->
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                        <br>
                        <!-- The dots/circles -->
                        <div style="text-align:center">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                            <span class="dot" onclick="currentSlide(4)"></span>
                            <span class="dot" onclick="currentSlide(5)"></span>
                            <span class="dot" onclick="currentSlide(6)"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                <?php
                $i = 0;
                foreach ($spnew as $sp) {
                    extract($sp);
                    $linksp = "index.php?act=sanphamct&idsp=" . $id;
                    $hinh = $img_path . $img;
                    if (($i == 2) || ($i == 5) || ($i == 8)) {
                        $mr = "mr";
                    } else {
                        $mr = "";
                    }
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