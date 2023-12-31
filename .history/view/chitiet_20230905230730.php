<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_SESSION['name'])) {
    $_SESSION['name'] = 1;
}else{
    $_SESSION['name'] += 1;
}
// echo "Lượt truy cập:".$_SESSION['name'];
$luotxem= $_SESSION['name'];
$up_luot_xem=up_luot_xem($luotxem,$id);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./view/css/xyz.css">
    <link href="//fonts.googleapis.com/css?family=Poppins:400,200,300,400,400i,500,600,600i,700,700i,800,900,900i">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet">
    <title>Chi tiết sản phẩm</title>
</head>

<body>
    <?php
      extract($onesp);
      $img=$img_path.$img;
      echo '<div class="containerct">
      <div class="card">
        <div class="shoeBackground">
          <div class="gradients">
            
            
            
          </div>
  
            <img src="'.$img.'" alt="" class="logo"> 
           
          
  
          <img src="img/blue.png" alt="" class="shoe show" color="Blue">
          <img src="img/red.png" alt="" class="shoe" color="Red">
          <img src="img/white.png" alt="" class="shoe" color="White">
          <img src="img/green.png" alt="" class="shoe" color="Green">
          <img src="img/orange.png" alt="" class="shoe" color="Orange">
          <img src="img/black.png" alt="" class="shoe" color="Black">
          <img src="img/pink.png" alt="" class="shoe" color="Pink">
  
        </div>
        <div class="info">
          <div class="shoeName">
            <div>
              <h1 class="big">'.$name.'</h1>
              <span class="new">new</span>
            </div>
            <div class="small"><span class="small">'.number_format($giamoi).' VNĐ</span><del class="smalll">'.number_format($giacu).' VNĐ</del></div>
            <!-- <h3 class="small">120.000 VNĐ</h3> -->
          </div>
          <div class="description">
            <h3 class="title">Mô tả</h3>
        
           <p class="text">'.$mota.'</p>
      
          </div>
          
          <div class="size-container">
            <h3 class="title">size</h3>
            <div class="sizes">
              <span class="size">36</span>
              <span class="size">37</span>
              <span class="size">38</span>
              <span class="size">39</span>
              <span class="size">40</span>
            </div>
          </div>
          <form action="index.php?act=addtocart" method="post" id="formCart">
            <div class="quantity">
              <h3 class="title">Số lượng</h3>
              <input type="number" name="soluong" min="1" placeholder="1" value="1">
            </div>
  
              <input type="hidden" name="id" value="'.$id.'">
              <input type="hidden" name="name" value="'.$name.'">
              <input type="hidden" name="img" value="'.$img.'">
              <input type="hidden" name="giamoi" value="'.$giamoi.'">
              <div class="buy-price">
              <button type="submit" class="buy" name="addtocart" value="Add to card"><i class="fas fa-shopping-cart"></i>Add to card</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    ';
  ?>

    <script>

    </script>
    <script src="./view/js/chiTiet.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#binhluan").load("view/binhluan/binhluanform.php", {
            idpro: <?=$id?>
        });
    });
    </script>
    <div class="row" id="binhluan">

    </div>

    <div class="lienQuan">
        <h2>Sản phẩm cùng loại</h2>

        <div class="img_product">
            <?php
      foreach ($sp_cung_loai as $sp_cung_loai) {
          extract($sp_cung_loai);
          $hinh=$img_path.$img;
          $linksp="index.php?act=sanphamct&idsp=".$id;
          echo '<div class="img_pro">
          <div class="img">
              <a href="'.$linksp.'"><img src="'.$hinh.'" alt=""></a>
          </div>
          <div class="infor">
          <div class="text">
              <p>'.$name.'</p>
          </div>'
      ?>
            <!-- <div class="start">
                <ion-icon name="star-outline"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
            </div> -->
            <?php
            echo '</div>'
            ?>
            <?php
              echo '<div class="money">
              <p>'.number_format($giamoi).' VNĐ</p>
          </div>
          <div class="chiTiet">
            <a href="'.$linksp.'">Xem chi tiết</a>
        </div>'
        ?>
            <?php
                echo ' </div>';}
  ?>

        </div>

    </div>
</body>

</html>