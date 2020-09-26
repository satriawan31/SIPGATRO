<?php

include("../inc/koneksi.php");
$code = $_GET['c'];
$type = $_GET['t'];

if($type == "gardu"){
    $del = mysqli_query($link, "DELETE FROM gardu WHERE id='$code'");
    if($del){
        echo "<script>alert('Berhasil menghapus data');window.location='list_gardu'</script>";
    }else{
        echo "<script>alert('Gagal menghapus data');window.location='list_gardu'</script>";
    }
}else if($type == "pengukuran"){
    $del = mysqli_query($link, "DELETE FROM pengukuran WHERE id='$code'");
    if($del){
        echo "<script>alert('Berhasil menghapus data');window.location='list_pengukuran'</script>";
    }else{
        echo "<script>alert('Gagal menghapus data');window.location='list_pengukuran'</script>";
    }
}
?>