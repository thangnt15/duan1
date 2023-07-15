<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="view/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>

    <!-- <div class="bietEm">
    <iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/642699891&color=%23ff5500&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/music-1-beat" title="Music Beat" target="_blank" style="color: #cccccc; text-decoration: none;">Music Beat</a> · <a href="https://soundcloud.com/music-1-beat/stephanie-poetri-i-love-you-3000" title="Stephanie Poetri - I Love You 3000" target="_blank" style="color: #cccccc; text-decoration: none;">Stephanie Poetri - I Love You 3000</a></div>
        </div> -->
        <div class="img-slider">
        <!-- <div class="slide active">
            <img src="./imgTaiNguyen/slidershow-1.jpg" alt="">
            <div class="info sl1">
                <p id="text1_sl1">Chào mừng bạn đến với</p>
                <h2 id="h2_sl1">PENGUIN</h2>
                <p id="text2_sl1">Mang đến trải nghiệm sản phẩm tốt nhất</p>
                <a href="#">Trải nghiệm ngay</a>
            </div>
        </div> -->
        <div class="slide">
            <img src="./view/image/1520238935596.jpg" alt="" style="height: 548px;">
            <div class="info sl2">
                <p id="text1_sl2">Chào mừng bạn đến với</p>
                <h2 id="h2_sl2">SNEAKER</h2>
                <p id="text2_sl2">Mang đến trải nghiệm sản phẩm tốt nhất</p>
                <a href="#">Trải nghiệm ngay</a>
            </div>
        </div>
        <div class="slide">
            <img src="./imgTaiNguyen/slidershow-3.jpg" alt="">
            <div class="info sl3">
                <p id="text1_sl3">Chào mừng bạn đến với</p>
                <h2 id="h2_sl3">SNEAKER</h2>
                <p id="text2_sl3">Mang đến trải nghiệm sản phẩm tốt nhất</p>
                <a href="#">Trải nghiệm ngay</a>
            </div>
        </div>
        <div class="navigation">
            <!-- <div class="btn active"></div> -->
            <div class="btn"></div>
            <div class="btn"></div>
        </div>
    </div>

    <script type="text/javascript">
        var slides = document.querySelectorAll('.slide');
        var btns = document.querySelectorAll('.btn');
        let currentSlide = 1;

        // Javascript for image slider manual navigation
        var manualNav = function (manual) {
            slides.forEach((slide) => {
                slide.classList.remove('active');

                btns.forEach((btn) => {
                    btn.classList.remove('active');
                });
            });

            slides[manual].classList.add('active');
            btns[manual].classList.add('active');
        }

        btns.forEach((btn, i) => {
            btn.addEventListener("click", () => {
                manualNav(i);
                currentSlide = i;
            });
        });

        // Javascript for image slider autoplay navigation
        var repeat = function (activeClass) {
            let active = document.getElementsByClassName('active');
            let i = 1;

            var repeater = () => {
                setTimeout(function () {
                    [...active].forEach((activeSlide) => {
                        activeSlide.classList.remove('active');
                    });

                    slides[i].classList.add('active');
                    btns[i].classList.add('active');
                    i++;

                    if (slides.length == i) {
                        i = 0;
                    }
                    if (i >= slides.length) {
                        return;
                    }
                    repeater();
                }, 4000);
            }
            repeater();
        }
        repeat();
    </script>
    <main>
        <div class="cate">

            <div class="image">
                <a href="#">
                    <img class="image__img" src="./imgTaiNguyen/img1.png" alt="Bricks">
                </a>
                <div class="image__overlay image__overlay--primary">
                <div class="image__title">Sự kiện
                    </div>
                    <p class="image__description">
                    <a href="index.php?act=tintuc">Xem ngay</a>
                    </p>
                </div>
            </div>
             <div class="image">
                <a href="#">
                    <img class="image__img" src="./imgTaiNguyen/img2.png" alt="Bricks">
                </a>
                <div class="image__overlay image__overlay--primary">
                    <div class="image__title">Quần áo nam </div>
                    <p class="image__description">
                    <a href="index.php?act=sanpham&iddm=1">Xem ngay</a>
                    </p>
                </div>
            </div>
            <div class="image">
                <a href="#">
                    <img class="image__img" src="./imgTaiNguyen/img3.png" alt="Bricks">
                </a>
                <div class="image__overlay image__overlay--primary">
                    <div class="image__title">Quần áo nữ</div>
                    <p class="image__description">
                    <a href="index.php?act=sanpham&iddm=2">Xem ngay</a>
                    </p>
                </div>
            </div>
        </div> 
         

         <div class="product_top3">
            <nav>
                <a href="#"><h1>Sản phẩm mới nhất</h1></a>
                 <a href="#">Sản phẩm bán chạy</a>
                <a href="#">Sản phẩm nổi bật</a> 
                <div class="animation start-home"></div>
            </nav>
        </div>
         product_top3 
        <div class="img_product">
     
            
                
              
                
                        <!-- <p>Quần âu nam</p> -->
                    
                    <div class="start">
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                    </div>
                    
               <div class="chiTiet">
               <a href="'.$linksp.'">Xem chi tiết</a>
           </div>'
               
            </div>
        </div>
        <!-- end img_product -->

        <div class="view_more">
            <a href="index.php?act=sanpham">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Xem thêm <i class="fas fa-angle-double-right"></i>
            </a>
        </div>
        <!-- end view_more -->




        <!-- <div class="event">
            <div class="img_event">
                <img src="./imgTaiNguyen/sunset.png" alt="">
            </div>
            <div class="content">
                <p>Giảm giá các sản phẩm trong sự kiện</p>
                <h3>Mừng Sinh Nhật cùng <span>PENGUIN</span></h3>
                <div class="launch-time">
                    <div class="clock">
                        <p id="days">00</p>
                        <span>Days</span>
                    </div>
                    <div class="clock">
                        <p id="hours">00</p>
                        <span>Hours</span>
                    </div>
                    <div class="clock">
                        <p id="minutes">00</p>
                        <span>Minutes</span>
                    </div>
                    <div class="clock">
                        <p id="seconds">00</p>
                        <span>Seconds</span>
                    </div>
                </div>
                <a href="index.php?act=tintuc">Xem ngay</a>
            </div>
            <div class="rocket">
                <img src="./imgTaiNguyen/rocket.png" alt="">
            </div>
        </div> -->
        <!-- end event -->
        <script>
            var countDownDate = new Date("Mar 15, 2022 00:00:00").getTime();
            var x = setInterval(function () {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("days").innerHTML = days;
                document.getElementById("hours").innerHTML = hours;
                document.getElementById("minutes").innerHTML = minutes;
                document.getElementById("seconds").innerHTML = seconds;
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("days").innerHTML = "00";
                    document.getElementById("hours").innerHTML = "00";
                    document.getElementById("minutes").innerHTML = "00";
                    document.getElementById("seconds").innerHTML = "00";
                }
            }, 1000);
        </script>
        <!-- end event -->


        <div class="product_cate3">
        <!-- <nav> -->
        
            <!-- <div class="animation start-home"></div> -->
        <!-- </nav> -->
        
            <nav>
                <a href="#"><h1>Sản phẩm nổi bật</h1></a>
                <!-- <a href="#">Quần áo nữ</a>
                <a href="#">Phụ kiện thời trang</a> -->
                <div class="animation start-home"></div>
            </nav>
        </div>
        <!-- product_cate3 -->

        <div class="img_product">
            
            
            <!-- <div class="img_pro">
                <div class="img">
                    <a href=""><img src="./imgTaiNguyen/Quần áo nam/áo cọc tay đen.jfif" alt=""></a>
                </div>
                <div class="infor">
                    <div class="text">
                        <p>Quần âu nam</p>
                    </div> -->
                    <div class="start">
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                    </div>
               
                
            <!-- </div> -->
            <!-- end img_pro -->

            <!-- <div class="img_pro">
                <div class="img">
                    <a href=""><img src="./imgTaiNguyen/Quần áo nam/áo cọc tay đen.jfif" alt=""></a>
                </div>
                <div class="infor">
                    <div class="text">
                        <p>Quần âu nam</p>
                    </div>
                    <div class="start">
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                    </div>
                </div>
                <div class="money">
                    <p>140.000 VNĐ</p>
                </div>
                <div class="chiTiet">
                    <a href="#">Xem chi tiết</a>
                </div>
            </div>
            <-- end img_pro -->

            <!-- end img_pro -->

            <!-- <div class="img_pro">
                <div class="img">
                    <a href=""><img src="./imgTaiNguyen/Quần áo nam/áo cọc tay đen.jfif" alt=""></a>
                </div>
                <div class="infor">
                    <div class="text">
                        <p>Quần âu nam</p>
                    </div>
                    <div class="start">
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                    </div>
                </div>
                <div class="money">
                    <p>140.000 VNĐ</p>
                </div>
                <div class="chiTiet">
                    <a href="#">Xem chi tiết</a>
                </div>
            </div> -->
            <!-- end img_pro -->
            <!-- <div class="img_pro">
                <div class="img">
                    <a href=""><img src="./imgTaiNguyen/Quần áo nam/áo cọc tay đen.jfif" alt=""></a>
                </div>
                <div class="infor">
                    <div class="text">
                        <p>Quần âu nam</p>
                    </div>
                    <div class="start">
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                    </div>
                </div>
                <div class="money">
                    <p>140.000 VNĐ</p>
                </div>
                <div class="chiTiet">
                    <a href="#">Xem chi tiết</a>
                </div>
            </div> -->
            <!-- end img_pro -->

            <!-- <div class="img_pro">
                <div class="img">
                    <a href=""><img src="./imgTaiNguyen/Quần áo nam/áo cọc tay đen.jfif" alt=""></a>
                </div>
                <div class="infor">
                    <div class="text">
                        <p>Quần âu nam</p>
                    </div>
                    <div class="start">
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                    </div>
                </div>
                <div class="money">
                    <p>140.000 VNĐ</p>
                </div>
                <div class="chiTiet">
                    <a href="#">Xem chi tiết</a>
                </div>
            </div> -->
            <!-- end img_pro -->

        </div>
        <!-- end img_product -->

        <div class="view_more">
            <a href="index.php?act=sanpham">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Xem thêm <i class="fas fa-angle-double-right"></i>
            </a>
        </div>
        <!-- end view_more -->

        <div class="feedback">
            <h3>Trải nghiệm của khách hàng</h3>
            <div class="icon_feed1">
                <i class="fas fa-quote-left"></i>
            </div>
            <div class="text_feed">
                <div class="mid_text">
                    <p>
                    Xin chào... 
                    </p>
                </div>
            </div>
            <!-- end feedback -->
            <div class="img_feed">
                <img src="./imgTaiNguyen/drawing-pad.png" alt="">
            </div>
        </div>






        <div class="post">
            <nav>
                <a href="#">Bài viết mới nhất</a>
                <div class="ani page_post"></div>
            </nav>
            <div class="content_post">
                <div class="img_post">
                    <img src="./imgTaiNguyen/gifts.png" alt="" width="500" height="">
                </div>
                <div class="text_post">
                    <div class="title_post">
                        <p>
                            Mừng Sinh Nhật PENGUIN
                        </p>
                    </div>
                    <div class="content_text_post">
                        <p>
                            Chúc mừng sinh nhật PENGUIN!
                        </p>
                        <a href="index.php?act=tintuc">Xem thêm</a>
                    </div>
                </div>
            </div>
            <!-- end content_post -->
        </div>
        <!-- end post -->




    </main>
    <!-- end main -->
    </body>
</html>

