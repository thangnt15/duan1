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
    <link rel="stylesheet" href="../css/style.css">
    <style>
    .binhluan table {
        width: 90%;
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

    .comment {
        margin: 40px;
    }

    .submitbl {
        height: 35px;
        border: 2px solid gray;
    }

    .submitbl:hover {
        color: #1b00fb;
        cursor: pointer;
    }

    .inputbl {
        border: 2px solid gray;
        height: 35px;
        width: 200px;
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
            echo "Comment content here: ";
            foreach ($dsbl as $bl) {
                extract($bl);
                echo ' <tr> <td>'.$noidung.'</td>';
                echo '<td>'.$iduser.'</td>';
                echo '<td>'.$ngaybinhluan.'</td> </tr>';
            }
            ?>
                </table>
            </ul>
        </div>
        <div class="box-footer binhluanform">

            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                <input type="hidden" name="idpro" value="<?=$idpro?>">

                <div class="comment">
                    <input class="inputbl" type="text" name="noidung">
                    <input class="submitbl" type="submit" name="guibinhluan" value="Comment">
                </div>
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