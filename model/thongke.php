<?php

function  loadall_thongke() {
    $sql = " select danhmuc.id as madm,
     danhmuc.name as tendm ,count(sanpham.id) 
     as countsp, min(sanpham.giamoi) as minprice, max(sanpham.giamoi) as maxprice,avg(sanpham.giamoi) as avgprice";
    $sql.=" from sanpham  left join danhmuc on danhmuc.id =sanpham.iddm where 1 ";
    $sql.=" group by danhmuc.id order by danhmuc.id desc ";
    $listtk = pdo_query($sql);
    return $listtk;
}
?>