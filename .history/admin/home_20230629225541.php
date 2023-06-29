<div class="row mg-bottom ">
    <div class="box-phai">
        <?php include "boxright.php"; ?>
    </div>
    <div class="box-trai mg-r">
        <div class="row">
            <div class="banner2">
                <!-- Slideshow container -->
                <div class="slideshow-container">

                    <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="https://s3-ap-southeast-1.amazonaws.com/pnj-watch-images/Category/5/dong-ho-casio.jpg"
                            style="width:100%">
                        <div class="text">Casio</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="https://dong-ho-nam.com/wp-content/uploads/2014/07/banner_rolex_1.jpg" style="width:100%">
                        <div class="text">Caption Two</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="https://s3-ap-southeast-1.amazonaws.com/pnj-watch-images/Category/5/dong-ho-casio.jpg"
                            style="width:100%">
                        <div class="text">Caption Three</div>
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
                </div>
            </div>
        </div>
        <div class="row box-content-trai">
            <?php
            $i = 0;
            foreach ($spnew as $sp) {
                extract($sp);
                $linksp = "index.php?act=sanphamct&idsp=" .$id;
                $hinh = $img_path.$img;
                if (($i == 2) || ($i == 5) || ($i == 8)) {
                    $mr = "";
                } else {
                    $mr = "mg-r";
                }
                echo '<div class="box-sp ' .$mr. '">
                        <div class="row img-sp">
                            <a href="' .$linksp. '"><img src="' .$hinh. '" alt="" width="220px" class="img-fluid"></a>
                        </div>
                        <div class="tt">
                            <a href="' .$linksp. '">' .$name. '</a>
                            <p> Giá Bán: <span> ' .$gia. ' VND</span> </p>
                        </div>
                        <div class="row btaddtocart"> 
                        <form class="form_add" action="index.php?act=addtocart" method="post">
                        <input type="hidden" name="id" value="' .$id. '">
                        <input type="hidden" name="name" value="' .$name. '">
                        <input type="hidden" name="img" value="' .$img. '">
                        <input type="hidden" name="gia" value="' .$gia. '">
                        <input type="submit" class="addtocart" name="addtocart" value="Thêm vào giỏ hàng">
                        </form>
                        </div>
                    </div>';
                $i += 1;
            }

            ?>
        </div>
    </div>