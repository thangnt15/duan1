<?php 
    function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan)
    {
        $sql = "INSERT INTO binhluan(noidung,iduser,idpro,ngaybinhluan) VALUES('$noidung','$iduser','$idpro','$ngaybinhluan')";
        pdo_execute($sql);
    }
function loadall_binhluan($idpro)
{
    $sql = "SELECT taikhoan.hoten as username,binhluan.*   FROM binhluan,taikhoan where binhluan.iduser=taikhoan.id";
    if($idpro>0)
    $sql.=" AND idpro='".$idpro."'";
    $sql.=" order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}
function delete_binhluan($id)
{
    $sql = "DELETE FROM binhluan WHERE id =" . $id;
    pdo_execute($sql);
}

?>