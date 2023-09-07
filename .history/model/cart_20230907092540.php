<?php
function viewcart($del)
{
    global $img_path;
    $tong = 0;
    $i = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $hinh = $img_path . $cart[2];
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;
        if ($del == 1) {
            $xoasp_th = '<th>thao tác</th>';

            $xoasp_td = '<td></td><a href="index.php?act=delcart&idcart=' . $i . '"> <input type="button" value="xóa"> </a></td>';
        } else {
            $xoasp_th = '';
            $xoasp_td = '';
        }
        echo

        '
        <tr>
        <th style="width:100px">Ảnh</th>
        <th>Sản phẩm</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
       ' . $xoasp_th . '
      </tr>
        <tr>
            <td><img src="' . $hinh . '"></td>
            <td>' . $cart[1] . '</td>
            <td>' . $cart[3] . '</td>
            <td>' . $cart[4] . '</td>
            <td>' . $ttien . '</td>
        
        ' . $xoasp_td . ' 


        </tr>';
        $i += 1;
    }
    echo '<tr>
        <td colspan="4">Tổng đơn</td>
        <td>' . $tong . '</td>
        <td></td>
    </tr>';
}
function bill_chi_tiet($listbill)
{
    global $img_path;
    $tong = 0;

    echo '
    <tr>
        <th>Ảnh</th>
        <th>Sản phẩm</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
    </tr>';
    if (!empty($listbill)) :
        foreach ($listbill as $cart) {
            $hinh = $img_path . $cart['img'];
            $tong += $cart['thanhtien'];

            echo '<tr>
            <td><img src="' . $hinh . '"></td>
            <td>' . $cart['name'] . '</td>
            <td>' . $cart['price'] . '</td>
            <td>' . $cart['soluong'] . '</td>
            <td>' . $cart['thanhtien']  . '</td>
        </tr>';
        }
    endif;
    // if (isset($listbill) && is_array($listbill)) {
    //     foreach ($listbill as $cart) {
    //         $hinh = $img_path . $cart['img'];
    //         $tong += $cart['thanhtien'];

    //         echo '<tr>
    //         <td><img src="' . $hinh . '"></td>
    //         <td>' . $cart['name'] . '</td>
    //         <td>' . $cart['price'] . '</td>
    //         <td>' . $cart['soluong'] . '</td>
    //         <td>' . $cart['thanhtien']  . '</td>
    //     </tr>';
    //     }
    // } else {
    //     echo "Danh sách hóa đơn không hợp lệ hoặc không tồn tại.";
    // }
    echo '<tr>
    <td colspan="4">Tổng đơn</td>
    <td>' . $tong . '</td>
</tr>';
}

function tongdonhang()
{
    $tong = 0;

    foreach ($_SESSION['mycart'] as $cart) {
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;
    }
    return $tong;
}
function insert_bill($iduser, $hoten, $dress, $tell, $email, $pttt, $tongdonhang, $ngaydathang)
{
    $sql = "insert into bill(iduser,bill_name,bill_address,bill_tell,bill_email,bill_pttt,total,ngaydathang) values
('$iduser','$hoten','$dress','$tell','$email','$pttt','$tongdonhang','$ngaydathang')";
    return pdo_execute_return_lastInsertId($sql);
}
// $idbill = $_GET['idbill']; // Thay 'idbill' bằng tên tham số thích hợp trong URL hoặc form data

// if (empty($idbill)) {
// echo "ID Bill is missing or invalid.";
// exit;
// }
function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill)
{
    $sql = "insert into cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values ('$iduser', '$idpro', '$img','
$name', '$price', '$soluong','$thanhtien', '$idbill')";
    // die($sql);
    return pdo_execute($sql);
}
function loadone_cart($idbill)
{
    $idbill = $_GET['id'];
    $sql = "select * from bill where id=" . $idbill;
    $bill = pdo_query_one($sql);
    return $bill;
}
// function loadone_cart($idbill)
// {
//     $sql = "SELECT * FROM bill WHERE id = :idbill";

//     try {
//         $conn = pdo_get_connection();
//         $stmt = $conn->prepare($sql);
//         $stmt->bindParam(':idbill', $idbill, PDO::PARAM_INT);
//         $stmt->execute();
//         $bill = $stmt->fetch(PDO::FETCH_ASSOC);
//         return $bill;
//     } catch (PDOException $e) {
//         echo "Có lỗi xảy ra: " . $e->getMessage();
//         // Thay vì in thông báo lỗi, chúng ta nên ném ra ngoại lệ để xử lý ở cấp cao hơn.
//         throw $e;
//     } finally {
//         unset($conn);
//     }
// }

function loadone_bill($id)
{
    // cai lodaone nay` kh lay ra id cua no a` sao bạn hỏi tôi ci địt
    // loadone bill chay o dau z 
    // $id = $_GET['id'];

    $sql = "SELECT * FROM bill WHERE id = :id";

    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $bill = $stmt->fetch(PDO::FETCH_ASSOC);
        return $bill;
    } catch (PDOException $e) {
        echo "Có lỗi xảy ra: " . $e->getMessage();
        // Thay vì in thông báo lỗi, chúng ta nên ném ra ngoại lệ để xử lý ở cấp cao hơn.
        throw $e;
    } finally {
        unset($conn);
    }
}

function loadall_cart($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
}
function loadall_cart_count($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return sizeof($bill);
}
// function loadall_bill($iduser)
// {
//     $sql = "select * from bill where 1";
//     if ($iduser > 0) $sql .= " AND iduser=" . $iduser;
//     $sql .= "oder by id desc";
//     $listbill = pdo_query($sql);
//     return  $listbill;
// }
function loadall_bill($iduser)
{
    $sql = "SELECT * FROM bill WHERE 1";
    if ($iduser > 0) $sql .= " AND iduser=" . $iduser;
    $sql .= " ORDER BY id DESC"; // Sửa lỗi ở đây
    $listbill = pdo_query($sql);
    return $listbill;
}

function get_ttdh($n)
{
    switch ($n) {
        case '0':

            $tt = "Đơn hàng mới";
            break;
        case '1':
            $tt = "ĐANG XỬ LÍ";
            break;
        case '2':
            $tt = "ĐANG GIAO HÀNG";
            break;
        case '3':
            $tt = "Hoàn tất";
            break;
        default:
            $tt = "Đơn hàng mới"; 
            break;
    }
    return $tt;
}
// function delete_bill($iduser)
// {
//     $sql = "delete from bill where iduser=" . $iduser;
//     pdo_execute($sql);
// }
// function delete_bill($id)
// { // Sửa tham số thành $id
//     $sql = "DELETE FROM bill WHERE id=" . $id;
//     pdo_execute($sql);
// }
function delete_bill($id)
{ // Sửa tham số thành $id
    $sql = "DELETE FROM bill WHERE id=" . $id;
    pdo_execute($sql);
}
function update_bill($id, $bill_status)
{
    $sql = "UPDATE bill SET bill_status='" . $bill_status . "' WHERE id=" . $id;
    pdo_execute($sql);
}


// function loadall_cart($idbill)
// {
// $sql = "SELECT * FROM cart WHERE idbill = :idbill";
// $stmt = pdo_prepare($sql);
// pdo_execute($stmt, [':idbill' => $idbill]);
// $bill = pdo_fetchAll($stmt);
// return $bill;
// }