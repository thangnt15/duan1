<?php

    session_start();
    include "../../model/pdo.php";
    include "../../model/binhluan.php";

    $idpro=$_REQUEST['idpro'];

    $dsbl=loadall_binhluan($idpro);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/xyz.css">
    <style>
    .binhluan table {
        width: 9%;
        margin-left: 5%;
        margin-top: 20px;
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

    .binhluan table td {
        margin: 20px 0px;
    }

    .h1 {
        color: red;
        font-size: 20px;
    }
    </style>
</head>

<body>

    <div class="row mg-bottom ">
        <div class="boxtitle">
            <h1>COMMENT</h1>

        </div>
        <div class="box-content2 binhluan">
            <ul>
                <table>
                    <?php
            // echo "Comment content here: ";
            foreach ($dsbl as $bl) {
                extract($bl);
                echo '<tr>
                          <td>'.$noidung.'</td>';
            
                if ($username == '') {
                    echo '<td>khách</td>';
                } else {
                    echo '<td>'.$username.'</td>';
                }
            
                echo '<td>'.$ngaybinhluan.'</td>
                      </tr>';
            }
            
            ?>
                </table>
            </ul>
        </div>
        <div class="box-footer binhluanform">

            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                <input type="hidden" name="idpro" value="<?=$idpro?>">

                <?php
        if (isset($_SESSION['user'])) {
            echo '<input type="text" name="noidung" class="question" id="nme" required autocomplete="off" />
          <label for="msg"><span>Bình luận</span></label>
          <input type="submit" name="guibinhluan" value="Gửi" />';
        } else {
            echo '<h1 class="h1">Bạn hãy đăng nhập để bình luận</h1>';
        }
        ?>
            </form>
        </div>

        <?php 
    if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
        $noidung=$_POST['noidung'];
        $idpro=$_POST['idpro'];
        $iduser=$_SESSION['user']['id'];
        $ngaybinhluan=date('h:i:sa d/m/Y');
        insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }

    ?>

    </div>
</body>

</html>